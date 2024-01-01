<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminRoleController extends Controller
{
    public function create(): View
    {
        return view('admin.roles.create');
    }

    public function index(): View
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'role remove with success');
    }
}
