<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\CarrierDepartment;
use Illuminate\Http\Request;
use Session;

class CarrierDepartmentRepo
{
    public function getCarrierDepartment($request)
    {
        $carrierDepartment    =  $this->carrierDepartmentData($request);

        $datatables           = DataTables::of($carrierDepartment)
            ->addColumn('no', function ($carrierDepartment) {
                return '';
            })

            ->editColumn('name', function ($carrierDepartment) {
                $name  = $carrierDepartment->name_en;

                return $name;
            })

            ->editColumn('status', function ($carrierDepartment) {
                $status = '';

                if ($carrierDepartment->is_published) {
                    $status .= '<span class="badge bg-primary" style="padding:5px 8px;">Active</span>';
                } else {

                    $status .= '<span class="badge bg-danger" style="padding:5px 8px;">Inactive</span>';
                }

                return $status;
            })

            ->editColumn('updated_at', function ($carrierDepartment) {
                $latest_update   =  '';
                $latest_update  .= $carrierDepartment->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-bold'>";
                $latest_update  .= $carrierDepartment->updated_by ? $carrierDepartment->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->editColumn('is_published', function ($carrierDepartment) {

                $btn      = '';

                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('carrierDepartmentStatus') . "'";
                if ($carrierDepartment->is_published) {
                    $btn .= '<input data-id="' . $carrierDepartment->id . '" onclick="statusChange(' . $carrierDepartment->id . ',' . $route . ')"
                                                    class="categories-toggle-class form-check-input" type="checkbox"
                                                    date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                    data-on="1" data-off="0" checked >';
                    $btn .= '</div>';
                } else {
                    $btn .= '<input data-id="' . $carrierDepartment->id . '" onclick="statusChange(' . $carrierDepartment->id . ',' . $route . ')"
                                                    class="categories-toggle-class form-check-input" type="checkbox"
                                                    date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                    data-on="1" data-off="0"  >';
                    $btn .= '</div>';
                }

                return $btn;
            })

            ->addColumn('action', function ($carrierDepartment) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true){
                    $btn .= ' <a href="' . route('carrier-department.edit', $carrierDepartment->id) . '" title="Edit Blog"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                    $btn .= '<form action="' . route('carrier-department.destroy', $carrierDepartment->id) . '" method="POST" style="display:inline">
                                                                        ' . csrf_field() . '' . method_field("DELETE") . '
                                                                            <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                                        </form>
                                                                    </div>';
    
                }
                else{
                    $btn .= ' <a href="' . route('carrier-department.edit', $carrierDepartment->id) . '" title="Edit Blog"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                    $btn .= '</div>';
                }
               
                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'status', 'is_published', 'updated_at', 'action']);


        return $datatables->make(true);
    }

    public function carrierDepartmentData($request)
    {

        $data     = DB::table('carrier_departments')
            ->orderBy('id', 'DESC')
            ->whereNull('deleted_at')
            ->get();

        return $data;
    }

    public function saveCarrierDepartment($request, $id = null)
    {
        $input          = $request->all();

        if ($id === NULL) {
            $carrierDepartment = new CarrierDepartment();
        } else {
            $input['updated_by'] = auth()->user()->name;
            $carrierDepartment   = CarrierDepartment::findOrFail($id);
        }

        $saved        = $carrierDepartment->fill($input)->save();

        return ($saved) ? $carrierDepartment : FALSE;
    }

    public function getCarrierDepartmentData($id)
    {
        $carrierDepartment = CarrierDepartment::findOrFail($id);

        return $carrierDepartment;
    }

    public function deleteCarrierDepartment($id)
    {
        $carrierDepartment = CarrierDepartment::findOrFail($id);
        $carrierDepartment->delete();

        return ($carrierDepartment) ? $carrierDepartment : false;
    }

    public function changeStatus($request)
    {
        $carrierDepartment    = CarrierDepartment::findOrFail($request->id);
        $carrierDepartment->update(['is_published' => !$carrierDepartment->is_published]);

        return $carrierDepartment;
    }

    public function translateCarrer($request)
    {
        $val = $request->val;
        $name = $request->name;
        $fields = [
            'name' => $name
        ];
        $data = autoTranslate($val, $fields);
        return $data;
    }
}
