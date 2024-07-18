<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\Notification;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        // Fetch all roles and permissions to display them in the form
        $roles = Role::paginate(6);
        $permissions = Permission::all();
        $notifications = Notification::all();

        return view('admin.roles.index', compact('roles','permissions','notifications'));
    }

    public function create()
    {
        // Fetch all permissions to display them in the form
        $permissions = Permission::all();
        $notifications = Notification::all();

        return view('admin.roles.create', compact('permissions','notifications'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $notifications = Notification::all();

        return view('admin.roles.change_role.blade', compact('role', 'permissions','notifications'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'role_name' => 'required|unique:roles,role_name|max:255',
            'permissions' => 'required|array',
        ]);

        // Create a new role
        $role = Role::create([
            'role_name' => $request->role_name,
        ]);

        // Attach permissions to the role
        $role->permissions()->attach($request->permissions);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully.');
    }

    public function update(Request $request, Role $role)
    {
        // Validate the request data
        $request->validate([
            'role_name' => 'required|max:255',
            'permissions' => 'array', // Check if permissions are sent as an array
        ]);

        // Update the role name
        $role->role_name = $request->role_name;
        $role->save();

        // Sync permissions for the role
        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        } else {
            // If no permissions are selected, detach all permissions
            $role->permissions()->detach();
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }
}
