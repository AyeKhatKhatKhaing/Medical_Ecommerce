<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Area;
use App\Models\Role;
use App\Models\User;
use App\Models\PlanProcess;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\PlanDescription;
use App\Models\MerchantLocation;
use App\Models\Merchant_Faq;

class UserRepo
{

    public function getUsers($request)
    {
        $user = $this->usersData($request);
       
        if($request->user_type !='merchant') {
            $datatables     = DataTables::of($user)
            ->addColumn('no', function ($user) {
                return '';
            })
            ->editColumn('name', function ($user) {
                $name  = $user->name_en;

                return $name;
            })
            ->editColumn('email', function ($user) {
                $email  = $user->email;

                return $email;
            })
            ->editColumn('phone', function ($user) {
                $phone  = $user->phone;

                return $phone;
            })
            ->editColumn('role', function ($user) {
                $role = $user->role_name;

                return $role;
            })

            ->addColumn('action', function ($user) {
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
                    <a href="' . route('users.edit-user', ["id" => $user->id, "user_type" => $user->is_merchant == 0 ? 'user' : 'merchant']) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('users.destroy-user', ["id" => $user->id, "user_type" => $user->is_merchant == 0 ? 'user' : 'merchant']) . '" method="POST" class="action-form" style="display:inline">
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
                }else{
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                    <a href="' . route('users.edit-user', ["id" => $user->id, "user_type" => $user->is_merchant == 0 ? 'user' : 'merchant']) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
            ->rawColumns(['name', 'email', 'phone', 'role', 'action']);
        }else{
            $datatables     = DataTables::of($user)
            ->addColumn('no', function ($user) {
                return '';
            })
            ->editColumn('name', function ($user) {
                $name  = $user->name_en;

                return $name;
            })
            ->editColumn('email', function ($user) {
                $email  = $user->email;

                return $email;
            })
            ->editColumn('phone', function ($user) {
                $phone  = $user->phone;

                return $phone;
            })
            ->editColumn('role', function ($user) {
                $role = $user->role_name;

                return $role;
            })->editColumn('is_published', function ($user) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('merchantPublishedEnabled') . "'";
                if ($user->is_published==0) {
                    $btn  .= '<input data-id="' . $user->id . '" onclick="statusChange(' . $user->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $user->id . '" onclick="statusChange(' . $user->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  checked>';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->addColumn('action', function ($user) {
                $btn  = '';
                $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('users.edit-user', ["id" => $user->id, "user_type" => $user->is_merchant == 0 ? 'user' : 'merchant']) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            <form action="' . route('users.destroy-user', ["id" => $user->id, "user_type" => $user->is_merchant == 0 ? 'user' : 'merchant']) . '" method="POST" class="action-form" style="display:inline">
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

                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'email', 'phone', 'role', 'is_published','action']);
        }
      

        return $datatables->make(true);
    }

    public function usersData($request)
    {
        $search   = $request->search;
        $user_type = $request->user_type;

        if ($user_type == 'user') {
            $user_type = 0;
        } else {
            $user_type = 1;
        }

        $data = DB::table('users')
            ->where('users.is_merchant', $user_type)
            ->leftJoin('role_user', function ($join) {
                return $join->on('role_user.user_id', '=', 'users.id');
            })
            ->leftJoin('roles', function ($join) {
                return $join->on('role_user.role_id', '=', 'roles.id');
            })
            ->select('users.*', 'roles.name as role_name');

        if ($search) {
            // dd($search);
            // $data->where('users.is_merchant', $user_type);
            $data->where('users.name_en', 'LIKE', "%$search%");
            $data->orWhere('users.email', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function saveUser(Request $request, $id = null)
    {
        if (!is_null($request->image_order)) {
            $data = [];
            foreach ($request->image_order as $image) {
                $file_path = existImagePath($image);
                $data[]    = $file_path;
            }

            $request->merge([
                'gallery' => json_encode($data)
            ]);
        } else {
            $request['gallery'] = null;
        }

        // common_area
        if (!is_null($request->holder4)) {
            $commom_area_data = [];
            foreach ($request->holder4 as $image) {
                $file_path = existImagePath($image);
                $commom_area_data[]    = $file_path;
            }
            $request->merge([
                'commom_area' => json_encode($commom_area_data)
            ]);

            if ($request['commom_area'] == "[]") {
                $request['commom_area'] = [null];
            }
        } else {
            $request['commom_area'] = json_encode($request['commom_area']);
        }

        // // service_facilities
        // if (!is_null($request->holder5)) {
        //     $services_facilities_data = [];
        //     foreach ($request->holder5 as $image) {
        //         $file_path = existImagePath($image);
        //         $services_facilities_data[]    = $file_path;
        //     }
        //     $request->merge([
        //         'services_facilities' => json_encode($services_facilities_data)
        //     ]);
        //     if ($request['services_facilities'] == "[]") {
        //         $request['services_facilities'] = [null];
        //     }
        // } else {
        //     $request['services_facilities'] = json_encode($request['services_facilities']);
        // }

        // // Other
        // if (!is_null($request->holder6)) {
        //     $other_data = [];
        //     foreach ($request->holder6 as $image) {
        //         $file_path = existImagePath($image);
        //         $other_data[]    = $file_path;
        //     }

        //     $request->merge([
        //         'other' => json_encode($other_data)
        //     ]);
        //     if ($request['other'] == "[]") {
        //         $request['other'] = [null];
        //     }
        // } else {
        //     $request['other'] = json_encode($request['other']);
        // }

        // // Video
        // if (!is_null($request->holder7)) {
        //     $video_data = [];
        //     foreach ($request->holder7 as $image) {
        //         $file_path = existImagePath($image);
        //         $video_data[]    = $file_path;
        //     }
        //     $request->merge([
        //         'video' => json_encode($video_data)
        //     ]);
        //     if ($request['video'] == "[]") {
        //         $request['video'] = [null];
        //     }
        // } else {
        //     $request['video'] = json_encode($request['video']);
        // }

        $is_merchant         = $request->user_type == 'user' ? 0 : 1;
        $data                = $request->except('password', 'area_id', 'latitude', 'longitude', 'station_names', 'full_addresses');
        $data['password']    = bcrypt($request->password);
        $data['is_merchant'] = $is_merchant;

        

        if ($data['is_merchant'] == 1) {
            if (!existImagePath($data['banner_img'])) {
                $data['banner_img'] = null;
            } else {
                $data['banner_img'] = getImage($request->banner_img);
            }

            if (!existImagePath($data['icon'])) {
                $data['icon'] = null;
            } else {
                $data['icon'] = getImage($request->icon);
            }
        }


        
        if ($id === NULL) {
            $user  = User::create($data);

            $merchant_role = Role::whereIn('name', $request['roles'])->first();
            $user->assignRole($merchant_role->name);
            // foreach ($request->roles as $role) {
            //     $user->assignRole($role);
            // }
        } else {
            $user  = User::findOrFail($id);
            // dd($user,$id ,$request['roles'],Role::get());
            $user->update($data);

            $user->roles()->detach();
            $merchant_role = Role::whereIn('name', $request['roles'])->first();
            $user->assignRole($merchant_role->name);
            // foreach ($request->roles as $role) {
            //     $user->assignRole($role);
            // }
        }
        $type_id = $user->id;

        // if ($id == null) {
        //     $project_images  =   new ProductImage();
        //     // $request['commom_area'] = json_encode($request['commom_area']);
        // } else {
        //     $project_images   =   ProductImage::where('image_type', 'merchant')->where('type_id', $id)->where('deleted_at', null)->first();
        // }
        // // dd($project_images->toArray());
        // $project_images_data    =   [
        //     "type_id" => $type_id,
        //     "image_type" => "merchant",
        //     "creator_type" => 1,
        //     "common_area" => isset($request['commom_area']) ? $request['commom_area'] : NULL,
        //     "video" => isset($request['video']) ? $request['video'] : NULL,
        //     "services_facilities" => isset($request['services_facilities']) ? $request['services_facilities'] : NULL,
        //     "other" => isset($request['other']) ? $request['other'] : NULL,
        //     "updated_by" => auth()->user()->name

        // ];
        // // dd($project_images_data);
        // if ($id == null) {
        //     $project_images->fill($project_images_data)->save();
        // } else {
        //     $project_images->fill($project_images_data)->update();
        // }

        return ($user) ? $user : FALSE;
    }

    public function saveProcessPlan($user, $request, $id = null)
    {
        $plan_process = $request->plan_process_ids_en;
        if(isset($plan_process)){
            $m_locations = PlanProcess::where('merchant_id', $user->id)->pluck('id')->all();
            $diffs = array_diff($m_locations, $plan_process);
            if (count($diffs) > 0) {
                foreach ($diffs as $key => $diff) {
                    PlanProcess::where('id', $diff)->where('merchant_id', $user->id)->delete();
                }
            }
        }
        $plan_process_en = $request->plan_process_en;

        if (isset($plan_process_en)) {
            for ($i = 0; $i < count($plan_process_en); $i++) {
                $data        =   [
                    "merchant_id"   => $user->id,
                    "name_en"       => $request->plan_process_name_en[$i],
                    "name_sc"       => $request->plan_process_name_sc[$i],
                    "name_tc"       => $request->plan_process_name_tc[$i],
                    "content_en"    => $request->plan_process_en[$i],
                    "content_sc"    => $request->plan_process_sc[$i],
                    "content_tc"    => $request->plan_process_tc[$i],
                ];

                if ($id == null) {
                    $plan_process   =   new PlanProcess();
                } else {
                    $plan_process   =   PlanProcess::where('merchant_id', $user->id)->where('deleted_at', null)->get();
                }

                if ($id == null) {
                    // // dd('null');
                    // $plan_process       = new PlanProcess();
                    $plan_process->fill($data)->save();
                } elseif ($i < count($plan_process)) {
                    // dd('has');
                    // $plan_process       = PlanProcess::where('merchant_id', $user->id)->get();
                    // dd($plan_process);
                    $plan_process[$i]->update($data);
                } else {
                    $plan_process       = new PlanProcess();
                    $plan_process->fill($data)->save();
                }
            }
        }
    }

    public function saveProcessDescription($user, $request)
    {
        // input is null not save
        if ($request->plan_description_name_en[0] == null && $request->plan_description_en[0] == null) {
            return;
        }

        foreach ($request->plan_description_name_en as $key => $plan_desc) {
            $data = [
                "merchant_id"   => $user->id,
                "name_en"       => $request->plan_description_name_en[$key],
                "content_en"    => $request->plan_description_en[$key],
                "name_sc"       => $request->plan_description_name_sc[$key],
                "content_tc"    => $request->plan_description_tc[$key],
                "name_tc"       => $request->plan_description_name_tc[$key],
                "content_sc"    => $request->plan_description_sc[$key],
            ];
            PlanDescription::create($data);
        }
    }

    public function updateProcessDescription($user, $request)
    {

        $plan_description = $request->plan_description_ids_en;
       
        $m_locations = PlanDescription::where('merchant_id', $user->id)->pluck('id')->all();
        if(isset($plan_description)){
            $diffs = array_diff($m_locations, $plan_description);
            if (count($diffs) > 0) {
                foreach ($diffs as $key => $diff) {
                    PlanDescription::where('id', $diff)->where('merchant_id', $user->id)->delete();
                }
            }
        }
        
        // dd($user);
        foreach ($request->plan_description_name_en as $key => $plan_desc) {
            if (isset($request->plan_description_ids_en[$key])) {
                $plan_desc = PlanDescription::findorFail($request->plan_description_ids_en[$key]);
                $data = [
                    "name_en"       => $request->plan_description_name_en[$key],
                    "content_en"    => $request->plan_description_en[$key],
                    "name_sc"       => $request->plan_description_name_sc[$key],
                    "content_tc"    => $request->plan_description_tc[$key],
                    "name_tc"       => $request->plan_description_name_tc[$key],
                    "content_sc"    => $request->plan_description_sc[$key],
                ];
                $plan_desc->update($data);
            } else {
                $data = [
                    "merchant_id"   => $user->id,
                    "name_en"       => $request->plan_description_name_en[$key],
                    "content_en"    => $request->plan_description_en[$key],
                    "name_sc"       => $request->plan_description_name_sc[$key],
                    "content_tc"    => $request->plan_description_tc[$key],
                    "name_tc"       => $request->plan_description_name_tc[$key],
                    "content_sc"    => $request->plan_description_sc[$key],
                ];
                // $is_record = PlanDescription::where('merchant_id', $user->id)->get();
                // if (count($is_record) > 0) {
                //     // dd($is_record);
                //     // PlanDescription::where('merchant_id', $user->id)->delete();
                //     $desc_delete = PlanDescription::where('merchant_id', $user->id)->get();
                //     dd($desc_delete);
                //     $desc_delete->delete();
                // }

                PlanDescription::create($data);

                // PlanDescription::create($data);
            }
        }
    }


    public function updateProcessDescription1($user, $request, $id = null)
    {
        $plan_description_en = $request->plan_description_en;

        if (isset($plan_description_en)) {
            for ($i = 0; $i < count($plan_description_en); $i++) {
                $data = [
                    "merchant_id"   => $user->id,
                    "name_en"       => $request->plan_description_name_en[$i],
                    "name_sc"       => $request->plan_description_name_sc[$i],
                    "name_tc"       => $request->plan_description_name_tc[$i],
                    "content_en"    => $request->plan_description_en[$i],
                    "content_sc"    => $request->plan_description_sc[$i],
                    "content_tc"    => $request->plan_description_tc[$i],
                ];

                // var_dump($data);


                // 
                $is_record = PlanDescription::where('merchant_id', $user->id)->exists();
                if ($is_record) {
                    PlanDescription::where('merchant_id', $user->id)->delete();
                }

                PlanDescription::create($data);


                // if ($id == null) {
                //     $plan_description   =   new PlanDescription();
                //     $plan_description->fill($data)->save();
                // } else {
                //     $is_record = PlanDescription::where('merchant_id', $user->id)->exists();
                //     if ($is_record) {
                //         $plan_description = PlanDescription::where('merchant_id', $user->id)->delete();
                //         $plan_description   =   new PlanDescription();
                //         $plan_description->fill($data)->save();
                //     } else {
                //         $plan_description = new PlanDescription();
                //         $plan_description->fill($data)->save();
                //     }
                // }

                // if ($id == null) {
                //     // // dd('null');
                //     // $plan_description       = new PlanDescription();
                //     $plan_description->fill($data)->save();
                // } elseif ($i < count($plan_description_en)) {
                //     // dd('has');
                //     // $plan_description       = PlanDescription::where('merchant_id', $user->id)->get();
                //     // dd($plan_description);
                //     $plan_description->update($data);
                // } else {
                //     $plan_description       = new PlanDescription();
                //     $plan_description->fill($data)->save();
                // }
            }
        }
    }



    public function saveMerchantLocations($user, $request, $id = null)
    {
        // if (MerchantLocation::where('merchant_id', $id)->exists()) {
        //     // delete wher merchant_id
        //     MerchantLocation::where('merchant_id', $id)->delete();
        // }

        if (!$request->area_id) {
            return;
        }

        // save merchant locations
        foreach ($request->area_id as $key => $location) {
            $m_data = [
                'area_id' => $request->area_id[$key],
                'station_name_en' => $request->station_names['en'][$key],
                'station_name_tc' => $request->station_names['tc'][$key],
                'station_name_sc' => $request->station_names['sc'][$key],
                'full_address_en' => $request->full_addresses['en'][$key],
                'full_address_tc' => $request->full_addresses['tc'][$key],
                'full_address_sc' => $request->full_addresses['sc'][$key],
                'latitude' => $request->latitude[$key],
                'longitude' => $request->longitude[$key],
                'merchant_id' => $user->id,
            ];
            MerchantLocation::create($m_data);
        }
    }

    public function updateMerchantLocations($user, $request)
    {
        $merchantId = $user->id;

        // dd($request->all());

        // if (!$request->area_id) {
        //     MerchantLocation::where('merchant_id', $merchantId)->delete();
        // }

        $areas = $request->area_id;
        $m_locations = MerchantLocation::where('merchant_id', $merchantId)->pluck('area_id')->all();
        $diffs = array_diff($m_locations, $areas);
        if (count($diffs) > 0) {
            foreach ($diffs as $key => $diff) {
                MerchantLocation::where('area_id', $diff)->where('merchant_id', $merchantId)->delete();
            }
        }


        foreach ($request->area_id as $key => $area_id) {
            // find m_locations with area_id and merhcant_id
            $is_record = MerchantLocation::where('area_id', $area_id)->where('merchant_id', $merchantId)->exists();
            if ($is_record) {
                $merchant_location = MerchantLocation::where('area_id', $area_id)->where('merchant_id', $merchantId)->first();
                $m_data = [
                    'area_id' => $request->area_id[$key],
                    'station_name_en' => $request->station_names['en'][$key],
                    'station_name_tc' => $request->station_names['tc'][$key],
                    'station_name_sc' => $request->station_names['sc'][$key],
                    'full_address_en' => $request->full_addresses['en'][$key],
                    'full_address_tc' => $request->full_addresses['tc'][$key],
                    'full_address_sc' => $request->full_addresses['sc'][$key],
                    'latitude' => $request->latitude[$key],
                    'longitude' => $request->longitude[$key],
                    'merchant_id' => $user->id,
                ];
                $merchant_location->update($m_data);
            } else {
                $m_data = [
                    'area_id' => $request->area_id[$key],
                    'station_name_en' => $request->station_names['en'][$key],
                    'station_name_tc' => $request->station_names['tc'][$key],
                    'station_name_sc' => $request->station_names['sc'][$key],
                    'full_address_en' => $request->full_addresses['en'][$key],
                    'full_address_tc' => $request->full_addresses['tc'][$key],
                    'full_address_sc' => $request->full_addresses['sc'][$key],
                    'latitude' => $request->latitude[$key],
                    'longitude' => $request->longitude[$key],
                    'merchant_id' => $user->id,
                ];
                MerchantLocation::create($m_data);
            }
        }
    }

    public function saveMerchantFaq($user, $request, $id = null)
    {
        if (!isset($request->question_['en'])) {
            if (Merchant_Faq::where('merchant_id', $id)->exists()) {
                // delete wher merchant_id
                Merchant_Faq::where('merchant_id', $id)->delete();
            }
            return;
        }
        if (Merchant_Faq::where('merchant_id', $id)->exists()) {
            // delete wher merchant_id
            Merchant_Faq::where('merchant_id', $id)->delete();
        }

        foreach ($request->question_['en'] as $key => $question) {
            $f_data = [
                'question_en' => $request->question_['en'][$key],
                'question_tc' => $request->question_['tc'][$key],
                'question_sc' => $request->question_['sc'][$key],
                'answer_en' => $request->answer_['en'][$key],
                'answer_tc' => $request->answer_['tc'][$key],
                'answer_sc' => $request->answer_['sc'][$key],
                'merchant_id' => $user->id,
            ];
            // dd($f_data);
            Merchant_Faq::create($f_data);
        }
    }

    public function getUserData($id)
    {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');
        $areas = Area::select('id', 'name_en')->get();

        $user = User::with('roles')->findOrFail($id);
        $user_roles = [];
        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }

        $data = [
            "roles"      => $roles,
            "user"       => $user,
            "user_roles" => $user_roles,
            'areas'      => $areas
        ];

        return $data;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return ($user) ? $user : false;
    }

    public function getPlanProcessData($id)
    {
        $plan_process = PlanProcess::where('merchant_id', $id)->whereNull('deleted_at')->get();

        return $plan_process;
    }


    public function getPlanDescriptionData($id)
    {
        $plan_description = PlanDescription::where('merchant_id', $id)->whereNull('deleted_at')->get();

        return $plan_description;
    }

    public function getMerchantLocation($id)
    {
        return MerchantLocation::where('merchant_id', $id)->get();
    }

    public function getProductImage($id)
    {
        return ProductImage::where('image_type', 'merchant')->where('type_id', $id)->whereNull('deleted_at')->get();
    }

    public function getMerchantFAQ($id)
    {
        return Merchant_Faq::where('merchant_id', $id)->get();
    }

    // save product images
    public function saveMerchantImages($request, $user)
    {
        $holder4_arr = [];
        $holder5_arr = [];
        $holder6_arr = [];
        $holder7_arr = [];

        if ($request->has('holder4')) {

            foreach ($request['holder4'] as $key => $holder4) {

                if (!existImagePath($holder4)) {

                    $holder4_arr[$key] = null;
                } else {

                    $holder4_arr[$key] = getImage($holder4);
                }
            }
        } else {

            $holder4_arr = NULL;
        }

        if ($request->has('holder5')) {

            foreach ($request['holder5'] as $key => $holder5) {

                if (!existImagePath($holder5)) {

                    $holder5_arr[$key] = null;
                } else {

                    $holder5_arr[$key] = getImage($holder5);
                }
            }
        } else {

            $holder5_arr = NULL;
        }

        if ($request->has('holder6')) {

            foreach ($request['holder6'] as $key => $holder6) {

                if (!existImagePath($holder6)) {

                    $holder6_arr[$key] = null;
                } else {

                    $holder6_arr[$key] = getImage($holder6);
                }
            }
        } else {

            $holder6_arr = NULL;
        }

        if ($request->has('holder7')) {

            foreach ($request['holder7'] as $key => $holder7) {

                if (!existImagePath($holder7)) {

                    $holder7_arr[$key] = null;
                } else {

                    $holder7_arr[$key] = getImage($holder7);
                }
            }
        } else {

            $holder7_arr = NULL;
        }

        $data = [
            "type_id" => $user->id,
            "image_type" => "merchant",
            "creator_type" => 1,
            "common_area" =>  $holder4_arr,
            "services_facilities" =>  $holder5_arr,
            "other" =>  $holder6_arr,
            "video" =>  $holder7_arr,
            "updated_by" => auth()->user()->name
        ];
        ProductImage::create($data);
    }

    public function updateMercahntImages($request, $merchantId)
    {
        // dd($request->all());
        // dd($merchantId);
        $holder4_arr = [];

        $holder5_arr = [];

        $holder6_arr = [];

        $holder7_arr = [];

        if ($request->has('holder4')) {

            foreach ($request['holder4'] as $key => $horder4) {

                if (!existImagePath($horder4)) {

                    $holder4_arr[$key] = null;
                } else {

                    $holder4_arr[$key] = getImage($horder4);
                }
            }
        } else {

            $holder4_arr = NULL;
        }

        if ($request->has('holder5')) {

            foreach ($request['holder5'] as $key => $holder5) {

                if (!existImagePath($holder5)) {

                    $holder5_arr[$key] = null;
                } else {

                    $holder5_arr[$key] = getImage($holder5);
                }
            }
        } else {

            $holder5_arr = NULL;
        }

        if ($request->has('holder6')) {

            foreach ($request['holder6'] as $key => $holder6) {

                if (!existImagePath($holder6)) {

                    $holder6_arr[$key] = null;
                } else {

                    $holder6_arr[$key] = getImage($holder6);
                }
            }
        } else {

            $holder6_arr = NULL;
        }

        if ($request->has('holder7')) {

            foreach ($request['holder7'] as $key => $holder7) {

                if (!existImagePath($holder7)) {

                    $holder7_arr[$key] = null;
                } else {

                    $holder7_arr[$key] = getImage($holder7);
                }
            }
        } else {

            $holder7_arr = NULL;
        }


        $is_record = ProductImage::where('type_id', $merchantId)->first();
        // dd($is_record);
        if ($is_record) {
            $product_images = ProductImage::where('image_type', 'merchant')->where('type_id', $merchantId)->first();
            // dd($product_images);
            if(isset($product_images)){
                $data = [
                    "common_area" => $request->has('holder4') ? $request['holder4'] : NULL,
                    "services_facilities" => $request->has('holder5') ? $request['holder5'] : NULL,
                    "other" => $request->has('holder6') ? $request['holder6'] : NULL,
                    "video" => $request->has('holder7') ? $request['holder7'] : NULL
                ];
                //dd($data);
                $product_images->update($data);
            }
            else {
                $data = [
                    "type_id" => $merchantId,
                    "image_type" => "merchant",
                    "creator_type" => 1,
                    "common_area" => $holder4_arr,
                    "services_facilities" => $holder5_arr,
                    "other" => $holder6_arr,
                    "video" => $holder7_arr,
                    "updated_by" => auth()->user()->name
                ];
                ProductImage::create($data);
            }
        } else {
            $data = [
                "type_id" => $merchantId,
                "image_type" => "merchant",
                "creator_type" => 1,
                "common_area" =>  $holder4_arr,
                "services_facilities" =>  $holder5_arr,
                "other" =>  $holder6_arr,
                "video" =>  $holder7_arr,
                "updated_by" => auth()->user()->name
            ];
            ProductImage::create($data);
        }
    }

    public function publishedEnabled($request)
    {
        $user    = User::findOrFail($request->id);
        $user->update(['is_published' => !$user->is_published]);

        return $user;
    }
}
