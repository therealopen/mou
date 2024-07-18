<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Partner;
use Illuminate\Support\Facades\View; // Import the View facade
use Dompdf\Options;
use Dompdf\Dompdf;
use App\Jobs\GenerateMouPDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\AuditTrail;


class PartnerController extends Controller
{
    public function addParners()
    {
        $notifications = Notification::all();
        return view('pages.admin.add_partners',compact('notifications'));
       
    }
    public function processParners(Request $request){
        // Validate incoming request data
        $validatedData = $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_contact_number' => [
                'nullable',
                'string',
                'regex:/^0[0-9]{9}$/',
            ],
            'company_email' => 'required|email|unique:partners',
            'representation_name' => 'required',
            'representative_title' => 'required',
            'representative_email' => 'required',
            'representative_number' => [
                'nullable',
                'string',
                'regex:/^255[2-9][0-9]{8}$/',
            ],
        ]);
    
        // Create a new Contract instance with the validated data
        $partner = new Partner($validatedData);
    
        // Save the contract
        $partner->save();
        
    // Create a new Audit Trailer
    $userId = auth()->id();
    $AuditTrail = new AuditTrail([
        'title' => 'New Contract',
        'content' => 'New Contract has been Added.',
        'user_id' => $userId,
        'action'=>'Add Partners',
        'description'=>'New Partner Is Added',
    ]);
    // Dump and die to check the title and content
    //dd($notification->title, $notification->content);

    // Save the notification
    $AuditTrail->save();

        // Optionally, you can return a response to indicate success or failure
        return redirect()->route('manage.partners')->with('success', 'Partner added successfully.');
    }

    public function manageParners(){
        // Fetch all partners from the database
        $partners = Partner::all();
        $notifications = Notification::all();


// Pass the contracts data to the view
    return view('pages.mou.manage_partners', compact('partners','notifications'));
    }

    public function deletePartner($id) {
        $partner = Partner::find($id);

        if (!$partner) {
            return redirect()->route('view.partners')->with('error', 'Partner not found');
        }

        $partner->delete();

        return redirect()->route('view.partners')->with('success', 'Partner deleted successfully');
    }

    // Method to show the edit form
    public function edit($id)
    {
        $partner = Partner::find($id);
        $notifications = Notification::all();

        if (!$partner) {
            return redirect()->route('view.partners')->with('error', 'Partner not found');
        }

        return view('pages.admin.edit_partner', compact('partner','notifications'));
    }

    // Method to update the partner data
    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return redirect()->route('view.partners')->with('error', 'Partner not found');
        }

        $validatedData = $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_contact_number' => [
                'nullable',
                'string',
                'regex:/^0[0-9]{9}$/',
            ],
            'company_email' => 'required|email|unique:partners,company_email,' . $partner->id,
            'representation_name' => 'required',
            'representative_title' => 'required',
            'representative_email' => 'required|email',
            'representative_number' => [
                'nullable',
                'string',
                'regex:/^255[2-9][0-9]{8}$/',
            ],
        ]);

        $partner->update($validatedData);

        return redirect()->route('view.partners')->with('success', 'Partner updated successfully.');
    }
    
    
    
}
