<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\CheckUpType;
use Illuminate\Http\Request;
use App\Models\CheckUpGroup;

class CheckUpTypeRepo
{

    public function getCheckUpType($request)
    {
        $check_up_type  =  $this->checkUpTypeData($request);

        $datatables      = DataTables::of($check_up_type)
            ->addColumn('no', function ($check_up_type) {
                return '';
            })

            ->editColumn('name', function ($check_up_type) {
                $name  = $check_up_type->name_en;

                return $name;
            })

            // ->editColumn('check_up_group_id', function($check_up_type) {
            //     $group_item_id     = DB::table('check_up_type_check_up_group')->where('check_up_type_id', $check_up_type->id)->pluck('check_up_group_id');

            //     $group_array       = [];

            //     foreach($group_item_id as $id){
            //         $group_name    = CheckUpGroup::where('id', $id)->pluck('name_en');
            //         array_push($group_array, $group_name);
            //     }

            //     return $group_array;
            // })

            ->editColumn('status', function ($check_up_type) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('checkUpTableStatus') . "'";
                if ($check_up_type->is_published) {
                    $btn  .= '<input data-id="' . $check_up_type->id . '" onclick="statusChange(' . $check_up_type->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $check_up_type->id . '" onclick="statusChange(' . $check_up_type->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->editColumn('updated_at', function ($check_up_type) {
                $latest_update   =  '';
                $latest_update  .= $check_up_type->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= $check_up_type->updated_by ? $check_up_type->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->editColumn('status', function ($check_up_type) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('checkUpTypeStatus') . "'";
                if ($check_up_type->is_published) {
                    $btn  .= '<input data-id="' . $check_up_type->id . '" onclick="statusChange(' . $check_up_type->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $check_up_type->id . '" onclick="statusChange(' . $check_up_type->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->addColumn('action', function ($check_up_type) {
                $btn  = '';
                $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('check-up-type.edit', $check_up_type->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>';
                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'status', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function checkUpTypeData($request)
    {
        $search   = $request->search;
        $status   = $request->status;
        $group    = $request->checkupgroup;
        $data     = DB::table('check_up_types');
        // ->leftJoin('check_up_type_check_up_group', function ($join) {
        //     return $join->on('check_up_types.id', '=', 'check_up_type_check_up_group.check_up_group_id')
        //         ->where('check_up_type_check_up_group.check_up_group_id', '=', 'check_up_types.id');
        // })
        // ->leftJoin('check_up_groups', function ($join) {
        //     return $join->on('check_up_type_check_up_group.check_up_group_id', '=', 'check_up_groups.id');
        // })
        // ->select('check_up_types.*', 'check_up_groups.name_en as check_group_name_en')
        // ->orderBy('check_up_types.id', 'DESC')
        // ->where('check_up_types.deleted_at', null);

        if ($search) {
            $data->Where('check_up_types.name_en', 'LIKE', "%$search%");
            $data->orWhere('check_up_types.name_tc', 'LIKE', "%$search%");
        }

        if (isset($group) && $group != 'all') {
            $data->where('check_up_types.check_up_group_id', $group);
        }

        if (isset($status) && $status != 'all') {
            $data->where('check_up_types.is_published', $status);
        }

        return $data->get();
    }

    public function saveCheckUpType(Request $request, $id = null)
    {
        $input                   = $request->all();

        if ($id === NULL) {
            $check_up_type       = CheckUpType::create($input);

            if (isset($request->check_groups)) {
                foreach ($request->check_groups as $item) {
                    $check_up_type->checkUpGroups()->attach($item);
                }
            }
        } else {
            $input['updated_by'] = auth()->user()->name;
            $check_up_type       = CheckUpType::findOrFail($id);

            $check_up_type->update($input);

            $check_up_type->checkUpGroups()->detach();

            if (isset($request->check_groups)) {
                foreach ($request->check_groups as $item) {
                    $check_up_type->checkUpGroups()->attach($item);
                }
            }
        }

        return ($check_up_type) ? $check_up_type : FALSE;
    }

    public function getCheckUpTypeData($id)
    {
        $check_up_type = CheckUpType::findOrFail($id);

        return $check_up_type;
    }

    public function deleteCheckUpType($id)
    {
        $check_up_type = CheckUpType::findOrFail($id);
        $check_up_type->delete();

        return $check_up_type;
    }

    public function changeStatus($request)
    {
        $check_up_type    = CheckUpType::findOrFail($request->id);
        $check_up_type->update(['is_published' => !$check_up_type->is_published]);

        return $check_up_type;
    }
}
