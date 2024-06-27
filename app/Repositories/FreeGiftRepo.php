<?php


namespace App\Repositories;


use Illuminate\Http\Request;
use App\Models\FreeGift;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class FreeGiftRepo
{
    public function getData($request)
    {
        $freeGift = FreeGift::get();
        $datatables = DataTables::of($freeGift)
                        ->addIndexColumn()
                        ->addColumn('no', function ($freeGift) {
                            return '';
                        })

                        ->editColumn('name', function($freeGift) {
                            $name  = $freeGift->name_en;

                            return $name;
                        })
                        ->editColumn('updated_by', function($freeGift) {
                            $latest_update   =  '';
                            $latest_update  .= $freeGift->updated_at;
                            $latest_update  .= "<br>";
                            $latest_update  .= "<span class='fw-bold'>";
                            $latest_update  .= $freeGift->updated_by ? $freeGift->updated_by : '';
                            $latest_update  .= "</span>";

                            return $latest_update;
                        })

                        ->addColumn('action', function ($freeGift) {
                            $checkAdminRole = false;
                            foreach(auth()->user()->roles as $data) {
                                if($data->name=='admin' ){
                                    $checkAdminRole = true;
                                    break;
                                }
                            }
                            $btn  = '';
                            if($checkAdminRole == true){
                                $btn .=' <a href="'. route('free-gift.edit', $freeGift->id) .'" title="Edit freeGift"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                                $btn .= '<form action="'.route('free-gift.destroy', $freeGift->id) .'" method="POST" style="display:inline">
                                                                        '.csrf_field().''.method_field("DELETE").'
                                                                            <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                                        </form>
                                                                    </div>';
    
                            }
                            else{
                                $btn .=' <a href="'. route('free-gift.edit', $freeGift->id) .'" title="Edit freeGift"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                            }
                          
                            return "<div class='action-column'>" . $btn . "</div>";

                        })
                        ->rawColumns(['name','updated_by','action']);

        return $datatables->make(true);
    }


    public function saveFreeGift(Request $request, $id = null)
    {

        $input = $request->all();
        if ($id === NULL) {
            $freeGift = new FreeGift();
        }
        else {
            $freeGift = FreeGift::findOrFail($id);
        }
        $input['updated_by'] = auth()->user()->name;
        $saved  = $freeGift->fill($input)->save();

        return ($saved) ? $freeGift : FALSE;

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

