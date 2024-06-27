<?php


namespace App\Repositories;


use Illuminate\Http\Request;
use App\Models\MerchantCoupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class MerchantCouponRepo
{
    public function getData($request)
    {
        $merchantCoupons = MerchantCoupon::latest();
        $datatables = DataTables::of($merchantCoupons)
                        ->addIndexColumn()
                        ->addColumn('no', function ($merchantCoupons) {
                            return '';
                        })

                        ->editColumn('name', function($merchantCoupons) {
                            $name  = $merchantCoupons->name_en;

                            return $name;
                        })
                        ->editColumn('updated_by', function($merchantCoupons) {
                            $latest_update   =  '';
                            $latest_update  .= $merchantCoupons->updated_at;
                            $latest_update  .= "<br>";
                            $latest_update  .= "<span class='fw-bold'>";
                            $latest_update  .= $merchantCoupons->updated_by ? $merchantCoupons->updated_by : '';
                            $latest_update  .= "</span>";

                            return $latest_update;
                        })

                        ->addColumn('action', function ($merchantCoupons) {
                            $checkAdminRole = false;
                            foreach(auth()->user()->roles as $data) {
                                if($data->name=='admin' ){
                                    $checkAdminRole = true;
                                    break;
                                }
                            }
                            $btn  = '';
                            if($checkAdminRole == true){
                                $btn .=' <a href="'. route('merchant-coupon.edit', $merchantCoupons->id) .'" title="Edit dollor"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                                $btn .= '<form action="'.route('merchant-coupon.destroy', $merchantCoupons->id) .'" method="POST" style="display:inline">
                                                                        '.csrf_field().''.method_field("DELETE").'
                                                                            <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                                        </form>
                                                                    </div>';
                            }
                            else{
                                $btn .=' <a href="'. route('merchant-coupon.edit', $merchantCoupons->id) .'" title="Edit dollor"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                            }
                            return "<div class='action-column'>" . $btn . "</div>";

                        })
                        ->rawColumns(['name','updated_by','action']);

        return $datatables->make(true);
    }


    public function saveMerchantCoupon(Request $request, $id = null)
    {

        $input = $request->all();
        if ($id === NULL) {
            $dollor = new MerchantCoupon();
        }
        else {
            $dollor = MerchantCoupon::findOrFail($id);
        }
        $input['updated_by'] = auth()->user()->name;
        $saved    = $dollor->fill($input)->save();

        return ($saved) ? $dollor : FALSE;

    }


    public function translateQDollar($request)
    {
        $val=$request()->val;
        $name=$request()->name;
        $fields=[
            'name'=>$name
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }
}

