<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\CheckUpGroup;
use App\Models\CheckUpItem;
use Illuminate\Http\Request;

class CheckUpGroupRepo
{

    public function getCheckUpGroup($request)
    {
        $check_up_group = $this->checkUpGroupData($request);

        $datatables = DataTables::of($check_up_group)
            ->addColumn('no', function ($check_up_group) {
                return '';
            })

            ->editColumn('name', function ($check_up_group) {
                $name  = $check_up_group->name_en;

                return $name;
            })

            // ->editColumn('check_up_item_id', function($check_up_group) {

            //     $item_id           = DB::table('check_up_group_check_up_item')->where('check_up_group_id', $check_up_group->id)->pluck('check_up_item_id');

            //     $item_array        = [];

            //     foreach($item_id as $id){
            //         $group_name    = CheckUpItem::where('id', $id)->pluck('name_en');
            //         array_push($item_array, $group_name);
            //     }

            //     return $item_array;
            // })

            ->editColumn('updated_at', function ($check_up_group) {
                $latest_update   =  '';
                $latest_update  .= $check_up_group->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= $check_up_group->updated_by ? $check_up_group->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->editColumn('status', function ($check_up_group) {
                $btn       = '';
                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('checkUpGroupStatus') . "'";
                if ($check_up_group->is_published) {
                    $btn  .= '<input data-id="' . $check_up_group->id . '" onclick="statusChange(' . $check_up_group->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $check_up_group->id . '" onclick="statusChange(' . $check_up_group->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->addColumn('action', function ($check_up_group) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true)
                {
                $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('check-up-group.edit', $check_up_group->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            <form action="' . route('check-up-group.destroy', $check_up_group->id) . '" method="POST" class="action-form" style="display:inline">
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
                        </div>
                            ';
                }
                else{
                $btn   .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('check-up-group.edit', $check_up_group->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            </div>
                        ';
                }
                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'status', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function checkUpGroupData($request)
    {
        $search   = $request->search;
        $status   = $request->status;
        $item     = $request->checkupitem;

        $data     = DB::table('check_up_groups');
        // ->leftJoin('check_up_group_check_up_item', function ($join) {
        //     return $join->on('check_up_groups.id', '=', 'check_up_group_check_up_item.check_up_group_id')
        //         ->where('check_up_group_check_up_item.check_up_group_id', '=', 'check_up_groups.id');
        // })
        // ->leftJoin('check_up_items', function ($join) {
        //     return $join->on('check_up_group_check_up_item.check_up_item_id', '=', 'check_up_items.id');
        // })
        // ->select('check_up_groups.*', 'check_up_items.name_en as check_item_name', 'check_up_items.id as check_item_id')
        // ->orderBy('check_up_groups.id', 'DESC')
        // ->where('check_up_groups.deleted_at', null);

        if ($search) {
            $data->Where('check_up_groups.name_en', 'LIKE', "%$search%");
        }

        // if (isset($item) && $item != 'all') {
        //     $data->where('check_up_items.id', $item);
        // }

        if (isset($status) && $status != 'all') {
            $data->where('check_up_groups.is_published', $status);
        }

        return $data->whereNull('check_up_groups.deleted_at')->get();
    }

    public function saveCheckUpGroup(Request $request, $id = null)
    {
        // dd($id);
        $input                    = $request->all();
        // $input['is_published']  = $request->is_published == 'on' ? 1 : 0;


        if ($id === NULL) {
            $check_up_group       = CheckUpGroup::create($input);
            if (isset($request->check_items)) {
                foreach ($request->check_items as $item) {
                    $check_up_group->checkUpItems()->attach($item);
                }
            }
        } else {
            $input['updated_by']  = auth()->user()->name;
            $check_up_group       = CheckUpGroup::findOrFail($id);

            $check_up_group->update($input);
            $check_up_group->checkUpItems()->detach();

            if (isset($request->check_items)) {
                foreach ($request->check_items as $item) {
                    $check_up_group->checkUpItems()->attach($item);
                }
            }
        }

        return ($check_up_group) ? $check_up_group : FALSE;
    }

    public function getCheckUpGroupData($id)
    {
        $check_up_group = CheckUpGroup::findOrFail($id);

        return $check_up_group;
    }

    public function deleteCheckUpGroup($id)
    {
        $check_up_group = CheckUpGroup::findOrFail($id);
        $check_up_group->delete();

        return $check_up_group;
    }

    public function changeStatus($request)
    {
        $check_up_group    = CheckUpGroup::findOrFail($request->id);
        $check_up_group->update(['is_published' => !$check_up_group->is_published]);
        return $check_up_group;
    }
}
