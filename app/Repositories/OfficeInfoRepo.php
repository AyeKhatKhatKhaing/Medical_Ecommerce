<?php

namespace App\Repositories;

use App\Models\BankInfo;
use Yajra\DataTables\DataTables;
use App\Models\ContactService;
use App\Models\OfficeInfo;
use Illuminate\Http\Request;

class OfficeInfoRepo
{
    public function getOfficeInfo($request)
    {
        $office_info     = $this->officeInfoData($request);

        $datatables       = DataTables::of($office_info)
            ->addIndexColumn()
            ->addColumn('no', function ($office_info) {
                return '';
            })

            ->editColumn('logo', function ($office_info) {
                $img = isset($office_info->logo) ? $office_info->logo : asset('/backend/media/blank-image.svg');
                return "<img src='" . $img . "'style='width: 132px;height: 50px !important;'/>";
            })



            ->editColumn('office_name_en', function ($office_info) {
                $latest_update   =  '';
                $latest_update  .= $office_info->office_name_en;
                $latest_update  .= "</br>";
                $latest_update  .= $office_info->office_name_tc;
                $latest_update  .= "</br>";
                $latest_update  .= $office_info->office_name_sc;
                return $latest_update;
            
            })
            ->editColumn('address_en', function ($office_info) {
                $latest_update   =  '';
                $latest_update  .= $office_info->address_en;
                // $latest_update  .= "</br>";
                // $latest_update  .= $office_info->address_tc;
                // $latest_update  .= "</br>";
                // $latest_update  .= $office_info->address_sc;
                return $latest_update;
            })
            ->addColumn('action', function ($office_info) {
                $btn  = '';
                $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('office-info.edit', $office_info->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
            ->rawColumns(['image', 'office_name_en','address_en', 'action']);

        return $datatables->make(true);
    }

    public function officeInfoData($request)
    {
        $search   = $request->search;

        $data   = OfficeInfo::whereNull('deleted_at');

        if ($search) {
            $data = $data->Where('office_name_en', 'LIKE', "%$search%")->orWhere('office_name_tc', 'LIKE', "%$search%")->orWhere('office_name_sc', 'LIKE', "%$search%");
        }
        return $data->get();
    }

    public function saveOfficeInfo(Request $request, $id = null)
    {

        // if(isset($request->holder4) &&  count($request->holder4) > 0){
        //     $request['image'] = $request->holder4;
        //     if(!existImagePath($request['holder4'])){
        //         $request['holder4'] = null ;
        //     }else{
        //         $request['holder4'] = getImage($request->holder4);
        //     }
        // }else{
        //     $request['image'] = null;
        // }
        $holder4_arr = [];
        foreach ($request['holder4'] as $key => $horder4) {

            if (!existImagePath($horder4)) {

                $holder4_arr[$key] = null;
            } else {

                $holder4_arr[$key] = getImage($horder4);
            }
        }
        $request['image'] = $holder4_arr;

        if ($id === NULL) {
            $office_info = new OfficeInfo();
        } else {
            $office_info        = OfficeInfo::findOrFail($id);
        }

        $saved    = $office_info->fill($request->all())->save();

        return ($saved) ? $office_info : FALSE;
    }

    public function getofficeInfoData($id)
    {
        $office_info = OfficeInfo::findOrFail($id);

        return $office_info;
    }


    public function deleteOfficeInfo($id)
    {
        $office_info = OfficeInfo::findOrFail($id);
        $office_info->delete();

        return ($office_info) ? $office_info : false;
    }

}
