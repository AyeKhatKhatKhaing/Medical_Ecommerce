<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\QDollorRebate;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class QDollarRepo
{
    public function getData($request)
    {
        $dollars = QDollorRebate::get();
        $search   = $request->search;
        if (isset($search)) {
            $dollars = QDollorRebate::where('name_en', 'LIKE', "%$search%")->get();
        }
        $datatables = DataTables::of($dollars)
            ->addIndexColumn()
            ->addColumn('no', function ($dollars) {
                return '';
            })

            ->editColumn('name', function ($dollars) {
                $name  = $dollars->name_en;

                return $name;
            })
            ->editColumn('updated_by', function ($dollars) {
                $latest_update   =  '';
                $latest_update  .= $dollars->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-bold'>";
                $latest_update  .= $dollars->updated_by ? $dollars->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            // ->addColumn('action', function ($dollars) {
            //     $btn  = '';

            //     $btn .=' <a href="'. route('q-dollor-rebate.edit', $dollars->id) .'" title="Edit dollor"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

            //     $btn .= '<form action="'.route('q-dollor-rebate.destroy', $dollars->id) .'" method="POST" style="display:inline">
            //                                             '.csrf_field().''.method_field("DELETE").'
            //                                                 <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
            //                                             </form>
            //                                         </div>';

            //     return "<div class='action-column'>" . $btn . "</div>";

            // })
            ->addColumn('action', function ($dollars) {
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
                    <a href="' . route('q-dollor-rebate.edit', $dollars->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('q-dollor-rebate.destroy', $dollars->id) . '" method="POST" class="action-form" style="display:inline">
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
                    <a href="' . route('q-dollor-rebate.edit', $dollars->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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

            ->rawColumns(['name', 'updated_by', 'action']);

        return $datatables->make(true);
    }

    public function getQDollar($id)
    {
        $dollor = QDollorRebate::findOrFail($id);

        return $dollor;
    }

    public function saveQDollar(Request $request, $id = null)
    {

        $input = $request->all();
        if ($id === NULL) {
            $dollor = new QDollorRebate();
        } else {
            $dollor = QDollorRebate::findOrFail($id);
        }
        $input['updated_by'] = auth()->user()->name;
        $saved    = $dollor->fill($input)->save();

        return ($saved) ? $dollor : FALSE;
    }

    public function deleteQDollar($id)
    {
        $dollor = QDollorRebate::findOrFail($id);
        $dollor->delete();

        return ($dollor) ? $dollor : false;
    }

    public function translateQDollar($request)
    {
        $val = $request()->val;
        $name = $request()->name;
        $fields = [
            'name' => $name
        ];
        $data = autoTranslate($val, $fields);
        return $data;
    }
}
