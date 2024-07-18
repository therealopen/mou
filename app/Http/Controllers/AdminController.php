<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
use App\Models\AuditTrail;

class AdminController extends Controller
{
    // Function to handle the submission of the form for adding a new user
    public function addUser(Request $request)
    {
        // Validate the incoming request data
     
        $request->validate([
         'first_name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z]+$/'],
        'last_name' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'email' => 'required|email|unique:users',
            // 'role_id' => 'required|exists:roles,id',
            'role'=> ['required', 'string', 'max:255'],
            'phone_number' => [
                'nullable',
                'string',
                'regex:/^255[2-9][0-9]{8}$/',
            ],
        ]);

        // Create the new user
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make(strtoupper($request->last_name)); // Set the username as password in uppercase
        // 'password' => Hash::make('Admin@123'),
        $user->role = $request->role;
        $user->save();

        // Assign role to the user
        // $role = Role::findOrFail($request->role_id);
        // $user->roles()->attach($role);

        return redirect()->back()->with('success', 'User added successfully.');
    }

    // Function to handle the submission of the form for changing user roles
    public function changeUserRole(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Find the user
        $user = User::findOrFail($request->user_id);

        // Detach all current roles
        $user->roles()->detach();

        // Attach the new role
        $role = Role::findOrFail($request->role_id);
        $user->roles()->attach($role);

        return redirect()->back()->with('success', 'User role changed successfully.');
    }

    public function changePassword(){
      
        $notifications = Notification::all();
        return view('pages.admin.change_password',compact('notifications'));
    }

    public function auditTrailler(){
        $notifications = Notification::all();
        $audits = AuditTrail::all();
        
        return view('pages.admin.audit_trailler',compact('audits','notifications'));
    }

    public function editUser(){
        return view('pages.admin.edit_user',compact('audits','notifications'));
       
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone_number' => 'required|string|max:255',
        'role' => 'required|string',
    ]);

    $user = User::findOrFail($id);
    $user->update($request->all());

    return redirect()->route('view_users')->with('success', 'User updated successfully.');
}

public function changeStatus(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'status' => 'required|string|in:active,deactivate',
    ]);

    $user = User::findOrFail($request->user_id);
    $user->status = $request->status;
    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'User status updated successfully.');
}



}
