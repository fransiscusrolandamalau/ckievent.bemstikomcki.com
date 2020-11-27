<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Admin\PermissionRequest;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->get();

        return view('admin.pages.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $input = $request->all();

        Permission::create($input);

        return redirect()->route('permissions.index')
            ->with('message', 'Permission created successfully');
    }

    public function edit(Permission $permission)
    {
        return view('admin.pages.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('permissions.index')
            ->with('message', 'Permission updated successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('message', 'Permission deleted successfully');
    }
}
