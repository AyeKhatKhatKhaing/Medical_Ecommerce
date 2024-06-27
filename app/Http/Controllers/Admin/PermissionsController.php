<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Repositories\PermissionRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    use CheckPermission;

    public $page  = 'permissions';

    protected $permissionRepo;

    public function __construct(PermissionRepo $permissionRepo)
    {
        $this->middleware('role:admin');
        $this->checkPermission();
        $this->permissionRepo = $permissionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.permissions.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->permissionRepo->getPermission($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $page  = $this->page;

        return view('admin.permissions.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->permissionRepo->savePermission($request);

        return redirect('admin/permissions')->with('flash_message', 'Permission added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $permission = $this->permissionRepo->getPermissionData($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->permissionRepo->savePermission($request, $id);

        return redirect('admin/permissions')->with('flash_message', 'Permission updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $this->permissionRepo->deletePermission($id);

        return redirect('admin/permissions')->with('flash_message', 'Permission deleted!');
    }
}
