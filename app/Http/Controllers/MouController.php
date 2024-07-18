<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Mou;
use Illuminate\Support\Facades\View; // Import the View facade
use Dompdf\Options;
use Dompdf\Dompdf;
use App\Jobs\GenerateMouPDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\MyMou;
use App\Models\Partner;
use App\Models\AuditTrail;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; // Import the Storage facade


use Illuminate\Support\Facades\Log;

//use PDF;

class MouController extends Controller
{
    public function addMou()
    {
        $partners = Partner::all();
        $notifications = Notification::all();
        return view('pages.admin.add_mous',compact('notifications','partners'));
       
    }

    public function initializeMou(Request $request)
   {
    $validatedData = $request->validate([
        // Validation rules for mou
        'mou_title' => 'required|string',
        'mou_description' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'partner_id'=> 'required',
        'mou_document' => 'required|file|mimes:pdf|max:2048', // Adjust the file types and size as needed
    ]);

    // Handle file upload
if ($request->hasFile('mou_document')) {
    $path = $request->file('mou_document')->store('mous', 'public');
    $validatedData['mou_document'] = $path;
}

    // Save data to database
      // Create a new Contract instance with the validated data
      $mous = new Mou($validatedData);
      $mous->approval_mou_status = 'pending_approval';
      $mous->save();

         // Create a new Audit Trailer
    $userId = auth()->id();
    $AuditTrail = new AuditTrail([
        'title' => 'New Contract',
        'content' => 'New Contract has been Added.',
        'user_id' => $userId,
        'action'=>'Add Mou',
        'description'=>'New Mou Is Added',
    ]);
    // Dump and die to check the title and content
    //dd($notification->title, $notification->content);

    // Save the notification
    $AuditTrail->save();

      // Create a new notification
      $notification = new Notification([
        'title' => 'New Mou',
        'content' => 'New Mou has been Added.',
    ]);
    // Dump and die to check the title and content
    //dd($notification->title, $notification->content);

    // Save the notification
    $notification->save();
    return redirect()->route('manage.mous')->with('success', 'MOU Added successfully.');
}

public function manageMou(){
// Fetch all contracts from the database
$mous = Mou::all();
$notifications = Notification::all();

$partners = Partner::all();
// Pass the contracts data to the view
return view('pages.mou.manage_mous', compact('mous','notifications','partners'));

}

public function generatemoupreviewPDF($id)
{
    // Increase maximum execution time
    ini_set('max_execution_time', 300); // 300 seconds = 5 minutes

    $startTime = microtime(true);

    // Fetch MOU data
    $mou = Mou::find($id);

    // Check if the record exists
    if (!$mou) {
        return response()->json(['error' => 'No MOU data found for the specified ID'], 404);
    }

    $fetchTime = microtime(true);
    Log::info('Data fetch time: ' . ($fetchTime - $startTime) . ' seconds');
    
    // Load the view and pass the MOU data
    $html = View::make('pages.admin.pdf_preview_mou', compact('mou'))->render();
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


public function getotherMoupart($id){
   
    $mous = Mou::find($id);
$notifications = Notification::all();
    return view('pages.admin.mou_otherpart', compact('mous','notifications'));
    
}




public function saveMou($id)
    {
        // Fetch the MOU by ID
        $mou = Mou::find($id);

        // Check if the MOU exists
        if (!$mou) {
            return redirect()->back()->with('error', 'MOU not found.');
        }

        // Get the email of the currently authenticated user
        $email = Auth::user()->email;

        // Create a new entry in the my_mou table
        MyMou::create([
            'mou_id' => $mou->id,
            'email' => $email,
        ]);

        return redirect()->back()->with('success', 'MOU saved successfully.');
    }


 
    public function deleteMou($id) {
        $mou = Mou::find($id);

        if (!$mou ) {
            return redirect()->route('mous.view')->with('error', 'Mou not found');
        }

        $mou->delete();

        return redirect()->route('mous.view')->with('success', 'Mou deleted successfully');
        // Pass the contracts data to the view

    }

    public function getmouDocument(){
        // Fetch all contracts from the database
        $contracts = Contract::all();
        $mous = Mou::all();
        $notifications = Notification::all();
       
        // Pass the contracts data to the view
        return view('pages.mou.mou_document', compact('contracts','notifications','mous'));
   }
   
   public function viewDocument($id)
   {
    $mou = Mou::findOrFail($id);
    $documentPath = $mou->mou_document;

    if (Storage::disk('public')->exists($documentPath)) {
        return response()->file(storage_path('app/public/' . $documentPath));
    } else {
        return redirect()->back()->with('error', 'Document not found.');
    }
   }
    



}
