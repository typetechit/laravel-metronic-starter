<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        $permissions = Permission::with('roles')->latest()->get();
        return view('permission.list', compact('permissions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData= $request->validate([
                'name' => 'required|unique:permissions,name|max:255',
            ]);
            $permission = Permission::create($validateData);
            session()->flash('success', 'Permission successfully added!');
            return redirect()->route('permissions.index');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return redirect()->back()->with('error', $firstError)->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        try {
            $validateData= $request->validate([
                'name' => 'required|unique:permissions,name,' . $permission->id . '|max:255',
            ]);
            // Update the existing news item with the validated data
            $permission->update($validateData);

            session()->flash('success', 'Permission successfully updated!');
            return redirect()->route('permissions.index');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return redirect()->back()->with('error', $firstError)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('success', 'Permission deleted successfully!');
        return redirect()->route('permissions.index');
    }

    /**
     * Give permission to role
     *
     * @param Permission $permission
     * @param Role $role
     * @return void
     */
    public function givePermission(Permission $permission, Role $role)
    {
        $res = $permission->assignRole($role);
        session()->flash('success', 'Permission updated successfully!');
        return redirect()->route('permissions.index');
    }

    /**
     * Revoke permission to role
     *
     * @param Permission $permission
     * @param Role $role
     * @return void
     */
    public function revokePermission(Permission $permission, Role $role)
    {
        $role->revokePermissionTo($permission);
        session()->flash('success', 'Permission updated successfully!');
        return redirect()->route('permissions.index');
    }
}
