<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ServiceSolution;
use App\Models\HomeCheckingItem;
use App\Models\MilestoneDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ServiceSolutionRepo
{
    public function getServiceSolution($request)
    {
        $serviceSolution     = $this->serviceSolutionData($request);
        $datatables       = DataTables::of($serviceSolution)
            ->addIndexColumn()
            ->addColumn('no', function ($serviceSolution) {
                return '';
            })
            ->editColumn('image', function ($serviceSolution) {
                return "<img src='" . $serviceSolution->img . "'style='width: 132px;height: 50px !important;'/>";
            })
            ->editColumn('title_image', function ($serviceSolution) {
                return "<img src='" . $serviceSolution->title_img . "'style='width: 132px;height: 50px !important;'/>";
            })
            ->editColumn('main_title', function ($serviceSolution) {
                $main_title  = $serviceSolution->main_title_en;

                return $main_title;
            })
            ->editColumn('title', function ($serviceSolution) {
                $title  = $serviceSolution->title_en;

                return $title;
            })


            ->editColumn('updated_at', function ($serviceSolution) {
                $latest_update   =  '';
                $latest_update  .= $serviceSolution->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->editColumn('status', function ($serviceSolution) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('serviceSolutionChangeStatus') . "'";
                if ($serviceSolution->is_published) {
                    $btn  .= '<input data-id="' . $serviceSolution->id . '" onclick="statusChange(' . $serviceSolution->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $serviceSolution->id . '" onclick="statusChange(' . $serviceSolution->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->addColumn('action', function ($serviceSolution) {
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
                    <a href="' . route('service-solution.edit', $serviceSolution->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('service-solution.destroy', $serviceSolution->id) . '" method="POST" class="action-form" style="display:inline">
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
                    <a href="' . route('service-solution.edit', $serviceSolution->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
            ->rawColumns(['image', 'title_image', 'title', 'status', 'main_title', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function serviceSolutionData($request)
    {
        $search   = $request->search;
        $status   = $request->status;

        $data   = ServiceSolution::whereNull('deleted_at');

        if (isset($status) && $status != 'all') {
            $data = $data->where('is_published', $status);
        }

        if ($search) {
            $data = $data->Where('main_title_en', 'LIKE', "%$search%")->orWhere('main_title_tc', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all' && isset($search)) {
            $data = $data->where('is_published', $status)->Where('main_title_en', 'LIKE', "%$search%")->orWhere('main_title_tc', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function saveServiceSolution(Request $request, $id = null)
    {
        $input      = $request->all();
        if (!existImagePath($input['img'])) {
            $service_solution['img'] = null;
        }else{
            $service_solution['img'] = getImage($request->img) ;
        }
        if (!existImagePath($input['title_img'])) {
            $service_solution['title_img'] = null;
        }else{
            $service_solution['title_img'] = getImage($request->title_img) ;
        }
        // dd( $service_solution['title_img'] , $service_solution['img'] );
        $service_solution = [
            "main_title_en" => $input['main_title_en'],
            "main_title_tc" => $input['main_title_tc'],
            "main_title_sc" => $input['main_title_sc'],
            "main_sub_title_en" => $input['main_sub_title_en'],
            "main_sub_title_tc" => $input['main_sub_title_tc'],
            "main_sub_title_sc" => $input['main_sub_title_sc'],
            "title_en" => $input['title_en'],
            "title_tc" => $input['title_tc'],
            "title_sc" => $input['title_sc'],
            "sub_title_en" => $input['sub_title_en'],
            "sub_title_tc" => $input['sub_title_tc'],
            "sub_title_sc" => $input['sub_title_sc'],
            "description_en" => $input['description_en'],
            "description_tc" => $input['description_tc'],
            "description_sc" => $input['description_sc'],
            "img" => $input['img'],
            "title_img" => $input['title_img'],
        ];
        if (isset($input['is_translate'])) {
            $service_solution["is_translate"]  = $input['is_translate'];
        }

        DB::beginTransaction();
        try {

            if ($id == null) {
                $service_solutions        =    ServiceSolution::create($service_solution);
                $solution_id  =    $service_solutions->id;
            } else {
                $solution = ServiceSolution::findOrFail($id);
                $service_solutions   =  $solution->update($service_solution);
                $solution_id  =    $id;

            }
            // $sol    = ServiceSolution::get()->last();
            // $solution_id  =    $sol->id;
            //only for add and update
            for ($i = 0; $i < count($input['indices']); $i++) {
                if ($id == null) {
                    $checking_item   =   new HomeCheckingItem();
                } else {
                    $checking_item   =   HomeCheckingItem::where('service_solution_id', $solution_id)->where('deleted_at', null)->get();
                }
                $data              =   [
                    "service_solution_id" => $solution_id,
                    "title_en"    => $input['checking_item_title_en'][$i],
                    "title_tc"    => $input['checking_item_title_tc'][$i],
                    "title_sc"    => $input['checking_item_title_sc'][$i],
                    "content_en"    => $input['content_en'][$i],
                    "content_tc"    => $input['content_tc'][$i],
                    "content_sc"    => $input['content_sc'][$i],
                    "dose_tag" => isset($input['dose_tag' . $input['indices'][$i]]) ? json_encode($input['dose_tag' . $input['indices'][$i]]) : NULL,
                    "vaccine_factory_tag" => isset($input['vaccine_factory_tag' . $input['indices'][$i]]) ? json_encode($input['vaccine_factory_tag' . $input['indices'][$i]]) : NULL,
                    "highlight_tag" => isset($input['highlight_tag' . $input['indices'][$i]]) ? json_encode($input['highlight_tag' . $input['indices'][$i]]) : NULL,
                    "key_item_tag" => isset($input['key_item_tag' . $input['indices'][$i]]) ? json_encode($input['key_item_tag' . $input['indices'][$i]]) : NULL,
                    "recommend_tag" => isset($input['recommend_tag' . $input['indices'][$i]]) ? json_encode($input['recommend_tag' . $input['indices'][$i]]) : NULL,
                    "sub_category" => isset($input['sub_category' . $input['indices'][$i]]) ? json_encode($input['sub_category' . $input['indices'][$i]]) : NULL,
                    "url" => isset($input['url' . $input['indices'][$i]]) ? $input['url' . $input['indices'][$i]] : NULL,

                ];
                if ($id !== null && count($input['content_en']) < count($checking_item)) {
                    $ids    =   HomeCheckingItem::where('service_solution_id', $solution_id)->where('deleted_at', null)->pluck('id');

                    foreach ($ids as $index) {
                        HomeCheckingItem::findOrFail($index)->delete();
                    }
                    // dd($data);
                    $new_home_checking_item   =   new HomeCheckingItem();
                    $new_home_checking_item->fill($data)->save();

                } else {
                    if ($id == null) {
                        $checking_item->fill($data)->save();
                    } elseif ($i < count($checking_item)) {
                        // dd($data);
                        $result = $checking_item[$i]->update($data);
                    } else {
                        $new_home_checking_item   =   new HomeCheckingItem();
                        $new_home_checking_item->fill($data)->save();
                    }
                }
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getServiceSolutionData($id)
    {
        $milestone_year = ServiceSolution::findOrFail($id);
        return $milestone_year;
    }


    public function deleteServiceSolution($id)
    {
        $milestone_year = ServiceSolution::findOrFail($id);
        $milestone_year->delete();

        return ($milestone_year) ? $milestone_year : false;
    }


    public function changeStatus($request)
    {
        $service_solution   = ServiceSolution::findOrFail($request->id);
        $service_solution->update(['is_published' => !$service_solution->is_published]);

        return $service_solution;
    }


    public function getCheckingItem($id)
    {
        $items = HomeCheckingItem::where('service_solution_id', $id)->get();

        return $items;
    }
}
