<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\Consultant;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use App\Models\ContractDelivery;


class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultants = Consultant::all();
        $notifications = Notification::all();
          $contracts = Contract::all();
         $notifications = Notification::all();
      return view('pages.contract.manage_contracts',compact('consultants','notifications','contracts','notifications'));
    }

    public function saveContract(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'consultant_id' => 'required',
            'contract_name' => 'required',
            'contract_type' => 'required',
            'contract_description' => 'required',
            'contract_startDate' => 'required|date',
            'contract_endDate' => 'required|date',
            'contract_value' => 'required|numeric|min:0',
            'employer' => 'required',
            'contract_document' => 'required|file|mimes:pdf|max:2048', // Adjust the file types and size as needed
        ]);
    
        // Handle file upload
        if ($request->hasFile('contract_document')) {
            $file = $request->file('contract_document');
            
            // Check if file size is greater than 2048 KB (2 MB)
            if ($file->getSize() > 2048 * 1024) {
                return back()->withErrors(['contract_document' => 'The file size is too big. Please upload a file smaller than 2MB.']);
            }
    
            $path = $file->store('contracts', 'public');
            $validatedData['contract_document'] = $path;
        
    
        // Create a new Contract instance with the validated data
        $contract = new Contract($validatedData);
        $contract->approval_status = 'pending_approval';
        $contract->site_delivery = '0';
    
        // Save the contract
        $contract->save();
    
        return back()->with('success', 'Your contract has been successfully submitted.');
    }
        
    // Create a new notification
    $notification = new Notification([
        'title' => 'New Contract',
        'content' => 'New Contract has been Added.',
    ]);
    // Dump and die to check the title and content
    //dd($notification->title, $notification->content);

    // Save the notification
    $notification->save();

    $user = auth()->user();
    
    $contact_number ='255657193660'; 

//  $api_key='fad0eff07f559b68';
//  $secret_key = 'YzRiOWY4MWU1MjdjZDE4NTk4MjdiODliNzA0MmUzMWIzOTMyOTgyYjdmYjdkNDc2OTY1YWI2Y2M2NDgzMzI5MQ==';

// $api_key='ed58594bae76e5f6';
// $secret_key = 'Y2M0NzA5MjNiZDY0ZGY1NzZjZGExMmE0NGUyMGJjMzZhMTk1NTM0MzkyNmQzMWIxZWM2NjYyM2RiY2IzZTQ5YQ==';
// $postData = array(
//  'source_addr' => 'INFO',
//  'encoding'=>0,
//  'schedule_time' => '',
//  'message' =>'Your contract is resend to your account due to issue',
//  'recipients' => [array('recipient_id' => '1','dest_addr'=>$contact_number),array('recipient_id' => '2','dest_addr'=>$contact_number)]
// );

// $Url ='https://apisms.beem.africa/v1/send';

// $ch = curl_init($Url);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// curl_setopt_array($ch, array(
//  CURLOPT_POST => TRUE,
//  CURLOPT_RETURNTRANSFER => TRUE,
//  CURLOPT_HTTPHEADER => array(
//      'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
//      'Content-Type: application/json'
//  ),
//  CURLOPT_POSTFIELDS => json_encode($postData)
// ));

// $response = curl_exec($ch);

// if($response === FALSE){
//      echo $response;

//  die(curl_error($ch));
// }
// var_dump($response);



        // Optionally, you can return a response to indicate success or failure
        return redirect()->route('manage_contracts')->with('success', 'Contract added successfully.');
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function show(Contract $contract)
    // {
    //     // Apply the middleware to this method
    //     $this->middleware('check.contract.approval');

    //     return view('contracts.show', compact('contract'));
    // }
    //  public function  viewContract(Contract $contract){
    //      // Fetch all contracts from the database
    //      $contracts = Contract::all();
    //      $notifications = Notification::all();
        
     
    //      // Pass the contracts data to the view
    //      return view('pages.admin.view_contracts', compact('contracts','notifications'));
    //  }


     public function  approveContract(){
        // Fetch all contracts from the database
        $contracts = Contract::all();
        $notifications = Notification::all();
       
        // Pass the contracts data to the view
        return view('pages.admin.approve_contract', compact('contracts','notifications'));
    }

    public function  approveContracts(){
        // Fetch all contracts from the database
        $contracts = Contract::all();
        $notifications = Notification::all();
       
        // Pass the contracts data to the view
        return view('pages.admin.approve_contracts', compact('contracts','notifications'));
    }

    


    public function  viewaprovedContract(Contract $contract){
        // Fetch all contracts from the database
        // Fetch only the approved contracts from the database
    //$contracts = Contract::where('approval_status', 'approved')->get();
     // Fetch all approved contracts along with their associated comments
    // Fetch only the approved contracts from the database
    $contracts = Contract::where('approval_status', 'approved')->with('comments.user')->get();
    $notifications = Notification::all();
    
        // Pass the contracts data to the view
        return view('pages.admin.display_approved', compact('contracts','notifications'));
    }


    public function edit(Contract $contract)

    { 
        $notifications = Notification::all();
        return view('pages.admin.contracts_edit', compact('contract','notifications'));
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();
        return response()->json(['message' => 'Contract deleted successfully']);
    }


    public function  progressContract(){
        // Fetch all contracts from the database
        $contracts = Contract::all();
        $notifications = Notification::all();
        $deliverables= ContractDelivery::all();
       
        // Pass the contracts data to the view
        return view('pages.contract.contract_progress', compact('contracts','notifications','deliverables'));
    }

    public function processProgresscontracts(Request $request){
       // Validate incoming request data
    $validatedData = $request->validate([
        'contract_id' => 'required',
        // 'contract_status' => 'required',
        'comment' => 'required|string',
        'status_tpc' => 'required|string',
    ]);
      // Retrieve the contract ID from the validated data
      $contractId = $validatedData['contract_id'];
      // Get the current authenticated user's ID
    $userId = auth()->id();


    // Create a new comment instance
    $comment = new Comment([
        'contract_id' => $contractId,
        'contract_status' => $validatedData['status_tpc'], // Corrected field name
        'reason_name' => $validatedData['comment'],
        'user_id' => $userId,
        
    ]);
      
    

    $comment->save();


    // Create a new notification
    $notification = new Notification([
        'title' => 'Progress Contract',
        'content' => 'Contract has been progressed.',
    ]);
    // Dump and die to check the title and content
    //dd($notification->title, $notification->content);

    // Save the notification
    $notification->save();

 // Logic to approve contract by STC

$contract = Contract::find($contractId);

if ($contract) {
    // Update approval status to 'approved'
    $contract->status_tpc =$validatedData['status_tpc'];
 

    // Save the changes
    $contract->save();
    

    // Optionally, you can return a success message or redirect the user
    return redirect()->back()->with('success', 'Contract has been progress successfully.');
    

}
    }

    public function extendContract(Request $request)
    {
        $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'extend_end_date' => 'required|date',
        ]);
    
        $contract = Contract::findOrFail($request->contract_id);
        $contract->contract_endDate = $request->extend_end_date;
        $contract->save();
    
        return redirect()->back()->with('success', 'Contract end date extended successfully.');
    }
    
    public function processResendContracts(Request $request)
{
    $request->validate([
        'contract_id' => 'required|exists:contracts,id',
        'contract_status' => 'required',
        'comment' => 'required|string',
    ]);

    // Find the contract by ID
    $contract = Contract::find($request->contract_id);

    // Update the contract status
    $contract->approval_status = $request->contract_status;
    $contract->save();

    // Save the comment
    $comment = new Comment();
    $comment->contract_id = $contract->id;
    $comment->user_id = auth()->id(); // Assuming the user is authenticated
    $comment->contract_status = $request->contract_status;
    $comment->reason_name = $request->comment;
    $comment->save();

    $notification = new Notification([
        'title' => 'Contract Resend',
        'content' => 'Contract has been Resend for Review.',
    ]);
    // Dump and die to check the title and content
    //dd($notification->title, $notification->content);

    // Save the notification
    $notification->save();
    //Api setup
    $user = auth()->user();
    
        $contact_number ='255617446494'; 
    
//  $api_key='fad0eff07f559b68';
//  $secret_key = 'YzRiOWY4MWU1MjdjZDE4NTk4MjdiODliNzA0MmUzMWIzOTMyOTgyYjdmYjdkNDc2OTY1YWI2Y2M2NDgzMzI5MQ==';
 
//  $api_key='ed58594bae76e5f6';
//  $secret_key = 'Y2M0NzA5MjNiZDY0ZGY1NzZjZGExMmE0NGUyMGJjMzZhMTk1NTM0MzkyNmQzMWIxZWM2NjYyM2RiY2IzZTQ5YQ==';
//  $postData = array(
//      'source_addr' => 'INFO',
//      'encoding'=>0,
//      'schedule_time' => '',
//      'message' =>'Your contract is resend to your account due to issue',
//      'recipients' => [array('recipient_id' => '1','dest_addr'=>$contact_number),array('recipient_id' => '2','dest_addr'=>$contact_number)]
//  );
 
//  $Url ='https://apisms.beem.africa/v1/send';
 
//  $ch = curl_init($Url);
//  error_reporting(E_ALL);
//  ini_set('display_errors', 1);
//  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//  curl_setopt_array($ch, array(
//      CURLOPT_POST => TRUE,
//      CURLOPT_RETURNTRANSFER => TRUE,
//      CURLOPT_HTTPHEADER => array(
//          'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
//          'Content-Type: application/json'
//      ),
//      CURLOPT_POSTFIELDS => json_encode($postData)
//  ));
 
//  $response = curl_exec($ch);
 
//  if($response === FALSE){
//          echo $response;
 
//      die(curl_error($ch));
//  }
//  var_dump($response);

    return redirect()->back()->with('success', 'Contract is resend and comment saved.');
}

public function processvcComment(Request $request){
    $request->validate([
        'contract_id' => 'required|exists:contracts,id',
        // 'contract_status' => 'required',
        'comment' => 'required|string',
    ]);

    // Find the contract by ID
    $contract = Contract::find($request->contract_id);

    // Update the contract status
    // $contract->approval_status = $request->contract_status;
    $contract->save();

    // Save the comment
    $comment = new Comment();
    $comment->contract_id = $contract->id;
    $comment->user_id = auth()->id(); // Assuming the user is authenticated
    // $comment->contract_status = $request->contract_status;
    $comment->reason_name = $request->comment;
    $comment->save();

    $notification = new Notification([
        'title' => 'Contract',
        'content' => 'Vc comment Contract.',
    ]);
    // Dump and die to check the title and content
    //dd($notification->title, $notification->content);

    // Save the notification
    $notification->save();

    


    return redirect()->back()->with('success', 'Contract  comment saved.');

}
public function getcontractDocument(){
     // Fetch all contracts from the database
     $contracts = Contract::all();
     $notifications = Notification::all();
    
     // Pass the contracts data to the view
     return view('pages.admin.view_contracts_document', compact('contracts','notifications'));
}

public function viewDocument($id)
{
    $contract = Contract::findOrFail($id);
    $documentPath = $contract->contract_document;

    if (Storage::disk('public')->exists($documentPath)) {
        $documentUrl = Storage::disk('public')->url($documentPath);
        return response()->file(storage_path('app/public/' . $documentPath));
    } else {
        return redirect()->back()->with('error', 'Document not found.');
    }
}





}
    

