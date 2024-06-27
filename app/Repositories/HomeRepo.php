<?php


namespace App\Repositories;


use App\Models\Blog;
use App\Models\Home;
use App\Models\Page;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Stichoza\GoogleTranslate\GoogleTranslate;

class HomeRepo
{

    public function getHomes($request)
    {
        $home    = $this->homeData($request);
        $datatables       = DataTables::of($home)
            ->addIndexColumn()
            ->addColumn('no', function ($home) {
                return '';
            })

            ->editColumn('banner_title', function ($home) {
                $banner_title  = $home->banner_title_en;

                return $banner_title;
            })

            ->editColumn('banner_image', function ($home) {
                return "<img src='" . $home->banner_img . "'style='width: 132px;height: 50px !important;'/>";
            })

            ->editColumn('status', function ($home) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('homeChangeStatus') . "'";
                if ($home->is_published) {
                    $btn  .= '<input data-id="' . $home->id . '" onclick="statusChange(' . $home->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $home->id . '" onclick="statusChange(' . $home->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->editColumn('updated_at', function ($home) {
                $latest_update   =  '';
                $latest_update  .= $home->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= $home->updated_by ? $home->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })



            ->addColumn('action', function ($home) {
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
                    <a href="' . route('home.edit', $home->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('home.destroy', $home->id) . '" method="POST" class="action-form" style="display:inline">
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
                    <a href="' . route('home.edit', $home->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
            ->rawColumns(['banner_title', 'banner_image', 'status', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function homeData($request)
    {
        $search   = $request->search;
        $status   = $request->status;
        $data   = Home::whereNull('deleted_at');
        // dd($data);

        if (isset($status) && $status != 'all') {
            $data = $data->where('is_published', $status);
        }

        if ($search) {
            $data = $data->Where('name_en', 'LIKE', "%$search%")->orWhere('name_tc', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all' && isset($search)) {
            $data = $data->where('is_published', $status)->Where('name_en', 'LIKE', "%$search%")->orWhere('name_tc', 'LIKE', "%$search%");
        }
        return $data->get();
    }

    public function getHome($id)
    {
        $home = Home::findOrFail($id);

        return $home;
    }

    public function saveHome(Request $request)
    {

        $input   = $request->all();
        // dd($input);
        if (existImagePath($input['banner_img_en'])) {
            $input['banner_img_en'] = getImage($request->banner_img_en);
        } else {
            $input['banner_img_en'] = null;
        }
        if (existImagePath($input['banner_img_tc'])) {
            $input['banner_img_tc'] = getImage($request->banner_img_tc);
        } else {
            $input['banner_img_tc'] = null;
        }
        if (existImagePath($input['banner_img_sc'])) {
            $input['banner_img_sc'] = getImage($request->banner_img_sc);
        } else {
            $input['banner_img_sc'] = null;
        }
        if (existImagePath($input['promotion_img'])) {
            $input['promotion_img'] = getImage($request->promotion_img);
        } else {
            $input['promotion_img'] = null;
        }
        if (existImagePath($input['onsale_banner_img'])) {
            $input['onsale_banner_img'] = getImage($request->onsale_banner_img);
        } else {
            $input['onsale_banner_img'] = null;
        }
        if (existImagePath($input['popup_img_en'])) {
            $input['popup_img_en'] = getImage($request->popup_img_en);
        } else {
            $input['popup_img_en'] = null;
        }
        if (existImagePath($input['popup_img_tc'])) {
            $input['popup_img_tc'] = getImage($request->popup_img_tc);
        } else {
            $input['popup_img_tc'] = null;
        }
        if (existImagePath($input['popup_img_sc'])) {
            $input['popup_img_sc'] = getImage($request->popup_img_sc);
        } else {
            $input['popup_img_sc'] = null;
        }
        // dd($input['promotion_img']);

        // if($input['member_reward_img_en'][0] != null){
        //     $member_reward_img_en=json_encode($input['member_reward_img_en']);
        //     $input['member_reward_img_en'] = $member_reward_img_en ;
        // }else{
        //     $input['member_reward_img_en'] = null ;
        // }
        // if($input['member_reward_img_sc'][0] != null){
        //     $member_reward_img_sc=json_encode($input['member_reward_img_sc']);
        //     $input['member_reward_img_sc'] = $member_reward_img_sc ;
        // }else{
        //     $input['member_reward_img_sc'] = null ;
        // }
        // if($input['member_reward_img_tc'][0] != null){
        //     $member_reward_img_tc=json_encode($input['member_reward_img_tc']);
        //     $input['member_reward_img_tc'] = $member_reward_img_tc ;
        // }else{
        //     $input['member_reward_img_tc'] = null ;
        // }
        if (isset($request->member_reward_img_en) && $input['member_reward_img_en'][0] != null && isset($request->reward_image_order_en) && count($request->reward_image_order_en) > 0) {
            $image1 = $request->reward_image_order_en;
            $image2 = explode(",", $request->member_reward_img_en[0]);
            $input['member_reward_img_en'] = array_merge($image1, $image2);
            // dd($input['member_reward_img_en']);
        } elseif (isset($request->member_reward_img_en) && $request->member_reward_img_en[0] != null) {
            $member_reward_img_en =  explode(",", $request->member_reward_img_en[0]);
            $input['member_reward_img_en'] = json_encode($member_reward_img_en);
        } elseif (isset($request->reward_image_order_en) && count($request->reward_image_order_en) > 0) {
            $input['member_reward_img_en'] = $request->reward_image_order_en;
        } else {
            $input['member_reward_img_en'] = null;
        }
        // dd($input['member_reward_img_en']);
        if (isset($request->member_reward_img_sc) && $input['member_reward_img_sc'][0] != null && isset($request->reward_image_order_sc) && count($request->reward_image_order_sc) > 0) {
            $image1 = $request->reward_image_order_sc;
            // $image2 =$input['member_reward_img_sc'];
            $image2 = explode(",", $request->member_reward_img_sc[0]);
            $input['member_reward_img_sc'] = array_merge($image1, $image2);
        } elseif (isset($request->member_reward_img_sc) && $request->member_reward_img_sc[0] != null) {
            $member_reward_img_sc = explode(",", $request->member_reward_img_sc[0]);
            $input['member_reward_img_sc'] = json_encode($member_reward_img_sc);
        } elseif (isset($request->reward_image_order_sc) && count($request->reward_image_order_sc) > 0) {
            $input['member_reward_img_sc'] = $request->reward_image_order_sc;
        } else {
            $input['member_reward_img_sc'] = null;
        }

        if (isset($request->member_reward_img_tc) && $input['member_reward_img_tc'][0] != null && isset($request->reward_image_order_tc) && count($request->reward_image_order_tc) > 0) {
            $image1 = $request->reward_image_order_tc;
            // $image2 =$input['member_reward_img_tc'];
            $image2 = explode(",", $request->member_reward_img_tc[0]);
            $input['member_reward_img_tc'] = array_merge($image1, $image2);
        } elseif (isset($request->member_reward_img_tc) && $request->member_reward_img_tc[0] != null) {
            $member_reward_img_tc = explode(",", $request->member_reward_img_tc[0]);
            $input['member_reward_img_tc'] = json_encode($member_reward_img_tc);
        } elseif (isset($request->reward_image_order_tc) && count($request->reward_image_order_tc) > 0) {
            $input['member_reward_img_tc'] = $request->reward_image_order_tc;
        } else {
            $input['member_reward_img_tc'] = null;
        }
        // dd( $input['member_reward_img_sc']);
        $home = home::first();

        if ($home) {
            $home->update($input);
        } else {
            $home  = home::create($input);
        }

        $saved    = $home->fill($input)->save();

        return ($saved) ? $home : FALSE;
    }

    public function deleteHome($id)
    {

        $home = Home::findOrFail($id);
        $home->delete();
        return ($home) ? $home : false;
    }

    public function changeStatus($request)
    {
        $home    = Home::findOrFail($request->id);
        $home->update(['is_published' => !$home->is_published]);
        return $home;
    }

    public function translateContent($request)
    {
        $val        = $request->val;
        $banner     = $request->banner;
        $promation  = $request->promation;
        $reward     = $request->reward;
        $message = $request->message;

        $fields    = [
            "banner"    => $banner,
            "promation" => $promation,
            "reward" => $reward,
            "message" => $message,
        ];

        $data      = autoTranslate($val, $fields);

        return $data;
    }
}
