<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Notification;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all();
        return view('pages.admin.add_consultant',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */

        public function saveConsultant(Request $request)
        {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:consultants'],
                'phone_number' => [
                    'nullable',
                    'string',
                    'regex:/^(?:(?:\+255)|(?:0))[2-8][0-9]{8}$/',
                ],
                'address' => ['required', 'string', 'max:255'],
                'licence' => ['required', 'string', 'max:255'],

                
            ]);
            
    
            $consultant = new Consultant([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'licence' => $request->licence,
            ]);
            $consultant->save();
            return redirect()->route('viewconsultants')->with('success', 'Consultant added successfully.');
    }

    public function viewConsultant(){
        $consultants = Consultant::all();
        $notifications = Notification::all();
        return view('pages.admin.view_consultant', compact('consultants','notifications'));
    }
    public function destroy($id)
    {
        $consultant = Consultant::findOrFail($id);
        $consultant->delete();

        return redirect()->route('view_consultant')->with('success', 'Consultant deleted successfully.');
    }

    public function edit($id)
    {
        $consultant = Consultant::findOrFail($id);
        $notifications = Notification::all();
        return view('pages.admin.edit_consultant',compact('consultant','notifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
         
            'first_name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'last_name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:consultants,email,'.$id],
            'phone_number' => [
                'nullable',
                'string',
                'regex:/^(?:(?:\+255)|(?:0))[2-8][0-9]{8}$/',
            ],
            'address' => ['required', 'string', 'max:255'],
            'licence' => ['required', 'string', 'max:255'],
        ]);

        $consultant = Consultant::findOrFail($id);
        $consultant->first_name = $request->first_name;
        $consultant->last_name = $request->last_name;
        $consultant->email = $request->email;
        $consultant->phone_number = $request->phone_number;
        $consultant->address = $request->address;
        $consultant->licence = $request->licence;
        $consultant->save();

        return redirect()->route('consultants.index')->with('success', 'Consultant updated successfully.');
    }

   
}
