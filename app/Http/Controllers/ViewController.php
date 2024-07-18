<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Notification;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function viewUsers(Request $request)
    {
        // Fetching user information from the database, including the 'roles' relationship
        $query = User::with('roles');

        // Search functionality
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%");
            });
        }

        // Paginate the results
        $users = User::all();

        // Fetching all roles
        $roles = Role::all();
        $notifications = Notification::all();

        return view('admin.pages.view_users', compact('users', 'roles','notifications'));
    }

    public function ViewRoles()
    {
        $notifications = Notification::all();
        return view('admin.pages.view_roles',compact('notifications'));
    }

    public function showAddUserPage()
    {
        $roles = Role::all();
        $users = User::all();
        $notifications = Notification::all();
        return view('admin.pages.add_users', compact('roles', 'users','notifications'));
    }
}
