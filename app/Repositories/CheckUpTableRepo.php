<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\CheckUpTable;
use App\Models\CheckUpType;
use App\Models\CheckTableGroupItem;
use Illuminate\Http\Request;

class CheckUpTableRepo
{

    public function getCheckUpTable($request)
    {
        $check_up_table  =  $this->checkUpTableData($request);

        $datatables      = DataTables::of($check_up_table)
            ->addColumn('no', function ($check_up_table) {
                return '';
            })

            ->editColumn('name', function ($check_up_table) {
                $name  = $check_up_table->name_en;

                return $name;
            })


            ->editColumn('updated_at', function ($check_up_table) {
                $latest_update   =  '';
                $latest_update  .= $check_up_table->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= $check_up_table->updated_by ? $check_up_table->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->editColumn('status', function ($check_up_table) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('checkUpTableStatus') . "'";
                if ($check_up_table->is_published) {
                    $btn  .= '<input data-id="' . $check_up_table->id . '" onclick="statusChange(' . $check_up_table->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $check_up_table->id . '" onclick="statusChange(' . $check_up_table->id . ',' . $route . ')"
                                                class="categories-toggle-class form-check-input" type="checkbox"
                                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->addColumn('action', function ($check_up_table) {
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
                            <a href="' . url('admin/check-up-table/' . $check_up_table->id . '/edit?type_id=2') . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            <form action="' . route('check-up-table.destroy', $check_up_table->id) . '" method="POST" class="action-form" style="display:inline">
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
                        </form></div>';
                }
                else{
                $btn .= 
                        '<div class="d-flex justify-content-center flex-shrink-0">
                           <a href="' . url('admin/check-up-table/' . $check_up_table->id . '/edit?type_id=2') . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
            ->rawColumns(['name', 'status', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function checkUpTableData($request)
    {
        $search   = $request->search;
        $status   = $request->status;
        $group    = $request->checkupgroup;

        $data     = DB::table('check_up_tables')->whereNull('deleted_at');
            // ->leftJoin('check_up_table_check_up_type', function ($join) {
            //     return $join->on('check_up_tables.id', '=', 'check_up_table_check_up_type.check_up_table_id')
            //         ->where('check_up_table_check_up_type.check_up_table_id', '=', 'check_up_tables.id');
            // })
            // ->leftJoin('check_up_types', function ($join) {
            //     return $join->on('check_up_table_check_up_type.check_up_type_id', '=', 'check_up_types.id');
            // })
            // ->select('check_up_tables.*', 'check_up_types.name_en as check_group_name_en')
            // ->orderBy('check_up_tables.id', 'DESC')
            // ->where('check_up_tables.deleted_at', null);

        if ($search) {
            $data->Where('check_up_tables.name_en', 'LIKE', "%$search%");
            $data->orWhere('check_up_tables.name_tc', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all') {
            $data->where('check_up_tables.is_published', $status)->get();
        }

        return $data->get();
    }

    public function saveCheckUpTable(Request $request, $id = null)
    {
        $input                   = $request->all();

        // if ($id === NULL) {
        //     $check_up_table      = CheckUpTable::create($input);
        // }

        if ($id === NULL) {
            $check_up_table = new CheckUpTable();
        } else {
            $check_up_table = CheckUpTable::findOrFail($id);
        }

        $saved              = $check_up_table->fill($input)->save();

        // $check_types         = $request->check_types;

        // for($i=0; $i<count($check_types); $i++) {
        //     $check_groups           = $request->get($check_types[$i].'check_groups');
        //     for($j=0; $j<count($check_groups); $j++) {
        //         $check_items        = $request->get($check_types[$i].$check_groups[$j].'check_items');
        //         for($k=0; $k<count($check_items); $k++) {
        //             $data = [
        //                 'check_up_table_id'  => $check_up_table->id,
        //                 'check_up_type_id'   => isset($check_types[$i])  ? $check_types[$i] : null,
        //                 'check_up_group_id'  => isset($check_groups[$j]) ? $check_groups[$j] : null,
        //                 'check_up_item_id'   => isset($check_groups[$k]) ? $check_items[$k] : null
        //             ];
        //             CheckTableGroupItem::create($data);
        //         }
        //     }
        // }
        // if(count($request->check_types) > 0) {
        //     if($id != null){
        //         $this->removeCheckUpType($id);
        //     }

        //     foreach($request->check_types as $check_type){
        //         $this->saveCheckUpType($check_up_table, $check_type);
        //     }
        // }

        // if(count($request->check_groups) > 0) {
        //     if($id != null){
        //         $this->removeCheckUpGroup($id);
        //     }

        //     foreach($request->check_groups as $check_group){
        //         $this->saveCheckUpGroup($check_up_table, $check_group);
        //     }
        // }

        // if(count($request->check_items) > 0) {
        //     if($id != null){
        //         $this->removeCheckUpItem($id);
        //     }

        //     foreach($request->check_items as $check_item){
        //         $this->saveCheckUpItem($check_up_table, $check_item);
        //     }
        // }

        // if(count($request->check_items) > 0) {
        //     foreach($request->check_items as $check_item){
        //         CheckTableGroupItem::create($check_item);
        //     }
        // }
        // if(isset($request->check_types)){
        //     foreach ($request->check_types as $item) {
        //         $check_up_table->checkUpTypes()->attach($item);
        //     }
        // }
        // }
        // else {
        //     $input['updated_by'] = auth()->user()->name;
        //     $check_types         = $request->check_types;
        //     $check_up_table      = CheckUpTable::findOrFail($id);

        //     $check_up_table->update($input);

        //     $check_up_table->checkUpTableGroupItems()->detach();

        //     $check_lists         = CheckTableGroupItem::where('check_up_table_id', $check_up_table->id)->get();
        //     for($i=0; $i<count($check_types); $i++) {
        //         $check_groups           = $request->get($check_types[$i].'check_groups');
        //         for($j=0; $j<count($check_groups); $j++) {
        //             $check_items        = $request->get($check_types[$i].$check_groups[$j].'check_items');
        //             for($k=0; $k<count($check_items); $k++) {
        //                 $data = [
        //                     'check_up_table_id'  => $check_up_table->id,
        //                     'check_up_type_id'   => isset($check_types[$i]) ? $check_types[$i] : null,
        //                     'check_up_group_id'  => isset($check_groups[$j]) ? $check_groups[$j] : null,
        //                     'check_up_item_id'   => isset($check_groups[$k]) ? $check_items[$k] : null
        //                 ];
        //                 $check_up_table = CheckTableGroupItem::create($data);
        //             }
        //         }
        //     }

        //     // $check_up_table->checkUpTypes()->detach();

        //     // if(isset($request->check_types)){
        //     //     foreach ($request->check_types as $item) {
        //     //         $check_up_table->checkUpType()->asttach($item);
        //     //     }
        //     // }
        // }
        // }

        return ($saved) ? $check_up_table : FALSE;
    }

    public function getCheckUpTableData($id)
    {
        $check_up_table = CheckUpTable::findOrFail($id);

        return $check_up_table;
    }

    public function deleteCheckUpTable($id)
    {
        $check_up_table = CheckUpTable::findOrFail($id);
        $check_up_table->delete();

        return $check_up_table;
    }

    public function changeStatus($request)
    {
        $check_up_table    = CheckUpTable::findOrFail($request->id);
        $check_up_table->update(['is_published' => !$check_up_table->is_published]);

        return $check_up_table;
    }

    public function saveCheckUpType($check_up_table, $check_type)
    {
        // $save_check_type                     = new CheckTableGroupItem();
        // $save_check_type->check_up_table_id  = $check_up_table->id;
        // $save_check_type->check_up_type_id   = $check_type;

        $save_check_type = $check_up_table->checkUpTypes()->sync($check_type);

        return ($save_check_type) ? $save_check_type : false;
    }

    public function removeCheckUpType($id)
    {
        CheckTableGroupItem::where('check_up_table_id', $id)->delete();
    }

    public function saveCheckUpGroup($check_up_table, $check_group)
    {
        // $save_check_group                      = new CheckTableGroupItem();
        // $save_check_group->check_up_table_id   = $check_up_table->id;
        // $save_check_group->check_up_group_id   = $check_group;
        $save_check_group   = $check_up_table->checkUpGroups()->sync($check_group);

        return ($save_check_group) ? $save_check_group : false;
    }

    public function removeCheckUpGroup($id)
    {
        CheckTableGroupItem::where('check_up_table_id', $id)->delete();
    }

    public function saveCheckUpItem($check_up_table, $check_item)
    {
        $save_check_item                      = new CheckTableGroupItem();
        $save_check_item->check_up_table_id   = $check_up_table->id;
        $save_check_item->check_up_item_id    = $check_item;

        return ($save_check_item->save()) ? $save_check_item : false;
    }

    public function removeCheckUpItem($id)
    {
        CheckTableGroupItem::where('check_up_table_id', $id)->delete();
    }
}
