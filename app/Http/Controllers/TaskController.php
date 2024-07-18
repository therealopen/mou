<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Mou;
use App\Models\Task;
use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Support\Facades\View; // Import the View facade
use Dompdf\Options;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Log;
use App\Models\TaskAssignment;
use App\Models\TaskDelivery;
use App\Models\TaskDeliveryReport;
use App\Models\Partner;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{
//   public function addTask(){
//    $mous = Mou::all();
  
   
//    $notifications = Notification::all();
//     return view('pages.mou.add_task',compact('mous','notifications'));
//   }

  public function processTask(Request $request){
    // Validate incoming request data
    $validatedData = $request->validate([
        'Task_title' => 'required',
        'Task_description' => 'required',
        'mou_id' => 'required',
        'task_start_date' => 'required|date',
        'task_end_date' => 'required|date',
       
    ]);

    // Create a new Contract instance with the validated data
    $task = new Task($validatedData);
    $userId = auth()->id();
    
    // Save the contract
    $task->save();
    
// Create a new Audit Trailer
$userId = auth()->id();
$AuditTrail = new AuditTrail([
    'title' => 'Task',
    'content' => 'New Task has been Added.',
    'user_id' => $userId,
    'action'=>'Add Task',
    'description'=>'New Task Is Added',
]);
// Dump and die to check the title and content
//dd($notification->title, $notification->content);

// Save the notification

   $AuditTrail->save();
  // Create a new notification
  $notification = new Notification([
    'title' => 'New Task',
    'content' => 'New Mou Task been Added.',
]);


// Save the notification
$notification->save();

    // Optionally, you can return a response to indicate success or failure
    return redirect()->route('manage.task')->with('success', 'Task added successfully.');
}

public function manageTask(){
  // Fetch all contracts from the database
//   $tasks = Task::all();
$tasks = Task::with(['assignedUsers', 'taskDeliveries.deliveryReports'])->get();
  $users = User::where('role', 'staff')->get();
    
//   $mous = Mou::all();
  $mous = Mou::with('taskDeliveries')->get();

  $notifications = Notification::all();
  $deliverables=TaskDelivery::all();
  // Pass the contracts data to the view
  return view('pages.mou.manage_task', compact('tasks','notifications','users','mous','deliverables'));
  
  }

  public function generatetaskpreviewPDF($id)
{
    // Increase maximum execution time
    ini_set('max_execution_time', 300); // 300 seconds = 5 minutes

    $startTime = microtime(true);
    
    // Fetch MOU data
    $task = Task::find($id);

    // Check if the record exists
    if (!$task) {
        return response()->json(['error' => 'No Task data found for the specified ID'], 404);
    }

    $fetchTime = microtime(true);
    Log::info('Data fetch time: ' . ($fetchTime - $startTime) . ' seconds');
    
    // Load the view and pass the MOU data
    $html = View::make('pages.admin.view_task_summary_pdf', compact('task'))->render();
    $renderTime = microtime(true);
    Log::info('View render time: ' . ($renderTime - $fetchTime) . ' seconds');

    // Setup Dompdf options
    $options = new \Dompdf\Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $options->set('isRemoteEnabled', FALSE); // Enable loading of remote assets

    // Instantiate Dompdf with the configured options
    $dompdf = new \Dompdf\Dompdf($options);

    // Load HTML content
    $dompdf->loadHtml($html);
    $loadHtmlTime = microtime(true);
    Log::info('Load HTML time: ' . ($loadHtmlTime - $renderTime) . ' seconds');

    // Set paper size and orientation (optional)
    $dompdf->setPaper('A4', 'landscape');

    // Render PDF (first buffer)
    $dompdf->render();
    $renderPdfTime = microtime(true);
    Log::info('Render PDF time: ' . ($renderPdfTime - $loadHtmlTime) . ' seconds');

    // Output PDF to browser
    $outputTime = microtime(true);
    Log::info('Output time: ' . ($outputTime - $renderPdfTime) . ' seconds');
    Log::info('Total time: ' . ($outputTime - $startTime) . ' seconds');

    return $dompdf->stream('mou_report.pdf', ["Attachment" => false]);
}

public function deleteTask($id)
{
    // Find the task by ID
    $task = Task::find($id);

    // Check if task exists
    if (!$task) {
        return redirect()->back()->with('error', 'Task not found.');
    }

    // Delete the task
    $task->delete();

    // Optionally, log this action or create an audit trail
    $userId = auth()->id();
    $auditTrail = new AuditTrail([
        'title' => 'Task',
        'content' => 'Task has been deleted.',
        'user_id' => $userId,
        'action' => 'Delete Task',
        'description' => 'A task has been deleted',
    ]);
    $auditTrail->save();

    // Return success message
    return redirect()->route('view.task')->with('success', 'Task deleted successfully.');
}

// TaskController.php

public function editTask($id)
{
    $task = Task::find($id);
    $mous = Mou::all();
    $users = User::all();
    $notifications = Notification::all();
    
    if (!$task) {
        return redirect()->route('view.task')->with('error', 'Task not found.');
    }

    return view('pages.admin.edit_task', compact('task','mous','notifications','users'));
}

public function updateTask(Request $request, $id)
{
    $request->validate([
        'mou_id' => 'required|exists:mous,id',
        'Task_title' => 'required|string|max:255',
        'Task_description' => 'required|string',
        'task_start_date' => 'required|date',
        'task_end_date' => 'required|date|after_or_equal:task_start_date',
    ]);

    $task = Task::find($id);

    

    $task->update([
        'mou_id' => $request->mou_id,
        'Task_title' => $request->Task_title,
        'Task_description' => $request->Task_description,
        'task_start_date' => $request->task_start_date,
        'task_end_date' => $request->task_end_date,
    ]);

    // Optionally, log this action or create an audit trail
    $userId = auth()->id();
    $auditTrail = new AuditTrail([
        'title' => 'Task',
        'content' => 'Task has been updated.',
        'user_id' => $userId,
        'action' => 'Update Task',
        'description' => 'A task has been updated',
    ]);
    $auditTrail->save();

    return redirect()->route('view.task')->with('success', 'Task updated successfully.');
}

public function assign(Request $request)
{
    $request->validate([
        'task_id' => 'required|exists:mou_tasks,id', // Assuming 'mou_tasks' is your actual tasks table
        'user_id' => 'required|exists:users,id',
    ]);

    $taskAssignment = new TaskAssignment([
        'task_id' => $request->task_id,
        'user_id' => $request->user_id,
    ]);

    $taskAssignment->save();

    return redirect()->route('manage.task')->with('success', 'Task assigned successfully.');
}



public function extend(Request $request)
{
    $request->validate([
        'task_id' => 'required|exists:mou_tasks,id', // Assuming 'mou_tasks' is your actual tasks table
        'task_start_date' => 'required|date',
        'task_end_date' => 'required|date|after_or_equal:task_start_date',
    ]);

    $task = Task::find($request->task_id);

    if (!$task) {
        return redirect()->route('view.task')->with('error', 'Task not found.');
    }

    $task->update([
        'task_start_date' => $request->task_start_date,
        'task_end_date' => $request->task_end_date,
    ]);

    return redirect()->route('view.task')->with('success', 'Task duration extended successfully.');
}


public function savedeliveryTasks(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'task_id' => 'required|exists:mou_tasks,id', // Changed 'tasks' to 'mou_tasks'
            'task_delivery_name' => 'required|string|max:255',
            'task_delivery_value' => 'required|string|max:255',
        ]);

        // Create a new TaskDelivery instance
        $taskDelivery = new TaskDelivery([
            'task_id' => $request->input('task_id'),
            'task_delivery_name' => $request->input('task_delivery_name'),
            'task_delivery_value' => $request->input('task_delivery_value'),
        ]);

        // Save the TaskDelivery instance to the database
        $taskDelivery->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Task delivery saved successfully.');
    }

    public function savetaskDeliveryReport(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'task_delivery_id' => 'required|exists:task_deliveries,id',
        'task_report_delivery_value' => 'required|string|max:255',
        'task_delivery_comment' => 'required|string',
    ]);

    // Create a new TaskDeliveryReport instance
    $taskDeliveryReport = new TaskDeliveryReport([
        'task_delivery_id' => $request->input('task_delivery_id'),
        'task_report_delivery_value' => $request->input('task_report_delivery_value'),
        'task_delivery_comment' => $request->input('task_delivery_comment'),
    ]);

    // Save the TaskDeliveryReport instance to the database
    $taskDeliveryReport->save();

    // Redirect back with a success message or any desired response
    return redirect()->back()->with('success', 'Task delivery report saved successfully.');
}

public function getTaskprogressPage()
    {

        // Fetch all contracts from the database
  $tasks = Task::all();
  $users = User::where('role', 'staff')->get();
    
  $mous = Mou::all();
  $notifications = Notification::all();
  $deliverables=TaskDelivery::all();
  // Pass the contracts data to the view
$partners = Partner::all();
$notifications = Notification::all();
        return view('pages.mou.task_progress',compact('partners','tasks','notifications','users','mous','deliverables'));
       
    }

    public function updateTaskStatus(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'task_id' => 'required|exists:mou_tasks,id',
            'task_status_name' => 'required|string',
        ]);

        // Find the task by ID and update the status
        $task = Task::findOrFail($request->input('task_id'));
        $task->task_status_name = $request->input('task_status_name');
        $task->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Task status updated successfully.');
    }

    public function extendTaskDuration(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'task_id' => 'required|exists:mou_tasks,id',
            'task_end_date' => 'required|date|after:task_start_date',
        ]);

        // Find the task by ID and update the end date
        $task = Task::findOrFail($request->input('task_id'));
        $task->task_end_date = $request->input('task_end_date');
        $task->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Task end date extended successfully.');
    }

    public function staffTask()
    {
        // Fetch the logged-in user
        $user = Auth::user();
    
        // Fetch tasks assigned to the logged-in user
        $tasks = $user->tasks()->get();



  
//   $mous = Mou::all();
$mous = Mou::with('taskDeliveries')->get();

$notifications = Notification::all();
$deliverables=TaskDelivery::all();
// Pass the contracts data to the view
return view('pages.mou.staff_task_progress', compact('tasks','notifications','mous','deliverables'));
    
        
    }

    public function staffOnprogressTask()
    {
        // Fetch the logged-in user
        $user = Auth::user();
    
        // Fetch tasks assigned to the logged-in user
        $tasks =  Task::whereHas('assignedUsers', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('task_status_name', 'In Progress')
        ->get();


  
//   $mous = Mou::all();
$mous = Mou::with('taskDeliveries')->get();

$notifications = Notification::all();
$deliverables=TaskDelivery::all();
// Pass the contracts data to the view
return view('pages.mou.stafftask_onprogress', compact('tasks','notifications','mous','deliverables'));
    
        
    }
    
    public function staffCompleteTask()
    {
        // Fetch the logged-in user
        $user = Auth::user();
    
        // Fetch tasks assigned to the logged-in user
        $tasks =  Task::whereHas('assignedUsers', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('task_status_name', 'Completed')
        ->get();


  
//   $mous = Mou::all();
$mous = Mou::with('taskDeliveries')->get();

$notifications = Notification::all();
$deliverables=TaskDelivery::all();
// Pass the contracts data to the view
return view('pages.mou.staff_complete_task', compact('tasks','notifications','mous','deliverables'));
    
        
    }



}