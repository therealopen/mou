<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contract;

use App\Models\Consultant;
use App\Models\Comment;
use App\Models\Notification;

class ApproveController extends Controller
{
    public function processapprovecontracts(Request $request)
    {

        $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'contract_status' => 'required',
            'comment' => 'required|string',
        ]);
    
        // Find the contract by ID
        $contract = Contract::find($request->contract_id);
    
        // Update the contract status
        $contract->approval_status = 'approved';
        $contract->save();
    
        // Validate incoming request data
        $validatedData = $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'contract_status' => 'required|string',
            'comment' => 'required|string',
        ]);
    
        // Retrieve the contract ID and user ID
        $contractId = $validatedData['contract_id'];
        $userId = auth()->id();
    
        // Find the contract by ID
        $contract = Contract::find($contractId);
    
        if ($contract) {
            // Update the contract status
            $contract->approval_status = 'approved';
            $contract->save();
    
            // Create a new comment instance
            $comment = new Comment([
                'contract_id' => $contractId,
                'contract_status' => $validatedData['contract_status'],
                'reason_name' => $validatedData['comment'],
                'user_id' => $userId,
            ]);
            $comment->save();
    
            // Create a new notification
            $notification = new Notification([
                'title' => 'Approve Contract',
                'content' => 'Contract has been Approved.',
            ]);
            $notification->save();

            $user = auth()->user();
    
            $contact_number ='255625944781'; 
        
    //  $api_key='fad0eff07f559b68';
    //  $secret_key = 'YzRiOWY4MWU1MjdjZDE4NTk4MjdiODliNzA0MmUzMWIzOTMyOTgyYjdmYjdkNDc2OTY1YWI2Y2M2NDgzMzI5MQ==';
     
     $api_key='ed58594bae76e5f6';
     $secret_key = 'Y2M0NzA5MjNiZDY0ZGY1NzZjZGExMmE0NGUyMGJjMzZhMTk1NTM0MzkyNmQzMWIxZWM2NjYyM2RiY2IzZTQ5YQ==';
     $postData = array(
         'source_addr' => 'INFO',
         'encoding'=>0,
         'schedule_time' => '',
         'message' =>'Your contract has been approved',
         'recipients' => [array('recipient_id' => '1','dest_addr'=>$contact_number),array('recipient_id' => '2','dest_addr'=>$contact_number)]
     );
     
     $Url ='https://apisms.beem.africa/v1/send';
     
     $ch = curl_init($Url);
     error_reporting(E_ALL);
     ini_set('display_errors', 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt_array($ch, array(
         CURLOPT_POST => TRUE,
         CURLOPT_RETURNTRANSFER => TRUE,
         CURLOPT_HTTPHEADER => array(
             'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
             'Content-Type: application/json'
         ),
         CURLOPT_POSTFIELDS => json_encode($postData)
     ));
     
     $response = curl_exec($ch);
     
     if($response === FALSE){
             echo $response;
     
         die(curl_error($ch));
     }
     var_dump($response);
    
        return redirect()->back()->with('success', 'Contract is resend and comment saved.');
    
            // Return a success message
            return redirect()->back()->with('success', 'Contract has been approved successfully.');
        } else {
            // Contract not found
            return redirect()->back()->with('error', 'Contract not found.');
        }
    }
    
}