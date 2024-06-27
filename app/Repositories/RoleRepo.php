<?php


namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Session;

class RoleRepo
{

    public function getRoles($request)
    {
        $role           = DB::table('roles')->get();
        // dd($role->get());
        $datatables     = DataTables::of($role)
                            ->addColumn('no', function ($role) {
                                return '';
                            })

                            // ->addColumn('action', function ($sale_category) {
                            //     $checkAdminRole = false;
                            //     foreach(auth()->user()->roles as $data) {
                            //         if($data->name=='admin' ){
                            //             $checkAdminRole = true;
                            //             break;
                            //         }
                            //     }
                            //     $btn  = '';
                            //     if($checkAdminRole == true){
                            //         $btn .= '
                            //         <div class="dropdown">
                            //             <a href="javascript:void(0);" class="btn btn-light btn-active-light-primary btn-sm" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            //                 Actions
                            //                 <span class="svg-icon svg-icon-5 m-0">
                            //                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            //                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            //                             <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            //                             <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                            //                         </g>
                            //                     </svg>
                            //                 </span>
                            //             </a>
                    
                            //             <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            //                 <div class="menu-item px-3">
                            //                     <a href="'. route('roles.edit', $sale_category->id) .'" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                            //                         Edit
                            //                     </a>
                            //                 </div>
                                            
                            //                 <div class="menu-item px-3">
                            //                     <form action="'.route('roles.destroy', $sale_category->id) .'" method="POST" class="action-form" style="display:inline">
                            //                             '.csrf_field().''.method_field("DELETE").'
                            //                                 <a href="javascript:void(0);" class="action-btn menu-link px-3 confirm_delete" data-kt-docs-table-filter="delete_row">
                            //                                     Delete
                            //                                 </a>
                            //                     </form>
                            //                 </div>
                            //             </div>
                            //         </div>';
                            //     }else{
                            //         $btn .= '
                            //     <div class="dropdown">
                            //         <a href="javascript:void(0);" class="btn btn-light btn-active-light-primary btn-sm" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            //             Actions
                            //             <span class="svg-icon svg-icon-5 m-0">
                            //                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            //                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            //                         <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            //                         <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                            //                     </g>
                            //                 </svg>
                            //             </span>
                            //         </a>
                
                            //         <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            //             <div class="menu-item px-3">
                            //                 <a href="'. route('roles.edit', $sale_category->id) .'" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                            //                     Edit
                            //                 </a>
                            //             </div>
                            //         </div>
                            //     </div>';
                            //     }
                                
                
                            // return "<div class='action-column'>" . $btn . "</div>";
                
                            // })
                            ->addColumn('action', function ($category) {
                                $checkAdminRole = false;
                                foreach(auth()->user()->roles as $data) {
                                    if($data->name=='admin' ){
                                        $checkAdminRole = true;
                                        break;
                                    }
                                }
                                $btn  = '';
                                if($checkAdminRole == true){
                                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                                    <a href="' . route('roles.edit', $category->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <form action="' . route('roles.destroy', $category->id) . '" method="POST" class="action-form" style="display:inline">
                                    ' . csrf_field() . '' . method_field("DELETE") . '
                                        <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm confirm_delete" data-kt-docs-table-filter="delete_row">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </form>
                                </div>';
                                }
                                else{
                                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                                    <a href="' . route('roles.edit', $category->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>';
                                }
                
                
                                return "<div class='action-column'>" . $btn . "</div>";
                            })
                            ->rawColumns([ 'action' ]);

        return $datatables->make(true);
    }

    public function saveRole(Request $request, $id = null)
    {
        $input     =  $request->all();

        if ($id === NULL) {
            $role  = Role::create($input);

            $role->permissions()->detach();

            if ($request->has('permissions')) {
                foreach ($request->permissions as $permission_name) {
                    $permission = Permission::whereName($permission_name)->first();
                    $role->givePermissionTo($permission);
                }
            }
        }
        else {
            $role  = Role::findOrFail($id);

            $role->update($request->all());
            $role->permissions()->detach();

            if ($request->has('permissions')) {
                foreach ($request->permissions as $permission_name) {
                    $permission = Permission::whereName($permission_name)->first();
                    $role->givePermissionTo($permission);
                }
            }
        }

        return ($role) ? $role : FALSE;
    }

    public function getRoleData($id)
    {
        $role        = Role::findOrFail($id);
        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'name');

        $data        = [
            'role' => $role,
            'permissions' => $permissions
        ];

        return $data;
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return ($role) ? $role : false;
    }
}
