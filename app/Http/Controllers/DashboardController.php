<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Consultant;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade if needed
use App\Models\Contract;
use App\Models\Mou;
use App\Models\TaskDelivery;
use App\Models\TaskDeliveryReport;
use App\Models\Task;
use Illuminate\Support\Facades\Auth; // Import the Auth facade



class DashboardController extends Controller
{
    

    public function adminDashboard()
{
    $totalUsers = User::count();
    $notifications = Notification::all();
    $totalContract = Contract::count();
    $totalConsultants = Consultant::count();
    $mouCount = Mou::count();

         $totalUsers = User::count();
        $totalConsultants = Consultant::count();
        $totalNotifications = Notification::count();
        $totalContracts = Contract::count();
        $totalMous = Mou::count();
        $totalTaskDeliveries = TaskDelivery::count();
        $totalTaskDeliveryReports = TaskDeliveryReport::count();
        $totalTasks = Task::count();

        // Count total contracts where status_tpc is complete
        $totalCompletedContracts = Contract::where('status_tpc', 'complete')->count();
         // Count total contracts where status_tpc is complete
         $totalProgressContracts = Contract::where('status_tpc', 'complete')->count();


    
    // Get the currently logged-in user
    $user = Auth::user();

    // Count the total tasks assigned to the currently logged-in user
    $assignedTasksCount = Task::whereHas('assignedUsers', function($query) use ($user) {
        $query->where('user_id', $user->id);
    })->count();
 // Count total tasks in progress (assigned but not completed)
 // Assuming 'In Progress' is the exact string you're checking for in the 'task_status_name' field
$totalInProgressTasks = Task::whereHas('assignedUsers', function($query) use ($user) {
    $query->where('user_id', $user->id);
})
->where('task_status_name', 'In Progress')->count();

// Count total completed tasks (tasks with delivery reports)
$totalCompletedTasks =  Task::whereHas('assignedUsers', function($query) use ($user) {
    $query->where('user_id', $user->id);
})
->where('task_status_name', 'Completed')->count();





        return view('dashboard', compact('totalUsers','totalConsultants','notifications','assignedTasksCount','totalInProgressTasks','totalCompletedTasks',
    'totalContracts','totalCompletedContracts','totalMous','totalTasks','totalConsultants'));
  
}




}