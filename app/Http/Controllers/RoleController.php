<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('roles.list', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData= $request->validate([
                'name' => 'required|unique:roles,name|max:255',
            ]);
            $role = Role::create($validateData);
            session()->flash('success', 'Role successfully added!');
            return redirect()->route('roles.index');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return redirect()->back()->with('error', $firstError)->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        try {
            $validateData= $request->validate([
                'name' => 'required|unique:roles,name,' . $role->id . '|max:255',
            ]);
            // Update the existing news item with the validated data
            $role->update($validateData);

            session()->flash('success', 'Role successfully updated!');
            return redirect()->route('roles.index');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            $firstError = $e->validator->errors()->first();
            return redirect()->back()->with('error', $firstError)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success', 'Role deleted successfully!');
        return redirect()->route('roles.index');
    }

    /**
     * Assign user a role
     *
     * @param User $user
     * @param Role $role
     * @return void
     */
    public function assignRole(User $user, Role $role)
    {
        $user->assignRole($role->name);
        session()->flash('success', 'Role assigned successfully!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove role for user
     *
     * @param User $user
     * @param Role $role
     * @return void
     */
    public function removeRole(User $user, Role $role)
    {
        $user->removeRole($role->name);
        session()->flash('success', 'Role removed successfully!');
        return redirect()->route('roles.index');
    }
}
