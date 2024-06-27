<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Repositories\RoleRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    use CheckPermission;
    
    public $page = "roles";
    protected $roleRepo;

    public function __construct(RoleRepo $roleRepo)
    {
        $this->middleware('role:admin');
        $this->checkPermission();        
        $this->roleRepo = $roleRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.roles.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->roleRepo->getRoles($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $page        = $this->page;
        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'name');

        return view('admin.roles.create', compact('permissions', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->roleRepo->saveRole($request);

        return redirect('admin/roles')->with('flash_message', 'Role added!');
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
        $role = Role::findOrFail($id);

        return view('admin.roles.show', compact('role'));
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
        $page        = $this->page;
        $data        = $this->roleRepo->getRoleData($id);
        $role        = $data['role'];
        $permissions = $data['permissions'];

        return view('admin.roles.edit', compact('role', 'permissions', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->roleRepo->saveRole($request, $id);

        return redirect('admin/roles')->with('flash_message', 'Role updated!');
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
        $this->roleRepo->deleteRole($id);

        return redirect('admin/roles')->with('flash_message', 'Role deleted!');
    }
}
