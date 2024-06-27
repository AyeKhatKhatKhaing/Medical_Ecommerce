<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Category;
use App\Models\CategoryImage;
use Illuminate\Http\Request;
use Session;

class CategoryRepo
{
    public function getCategory($request)
    {
        $category       =  $this->categoryData($request);

        $datatables     = DataTables::of($category)
            ->addColumn('no', function ($category) {
                return '';
            })

            // ->editColumn('image', function($category) {
            //     $img = isset($category->img) ? $category->img : asset('/backend/media/blank-image.svg');
            //     return "<img src='".$img."'style='width: 132px;height: 50px !important;'/>";
            // })

            ->editColumn('name', function ($category) {
                $name  = $category->name_en;

                return $name;
            })

            ->editColumn('status', function ($category) {

                $btn      = '';

                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('categoryChangeStatus') . "'";
                if ($category->is_published) {
                    $btn .= '<input data-id="' . $category->id . '" onclick="statusChange(' . $category->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0" checked >';
                    $btn .= '</div>';
                } else {
                    $btn .= '<input data-id="' . $category->id . '" onclick="statusChange(' . $category->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  >';
                    $btn .= '</div>';
                }

                return $btn;
            })

            ->editColumn('updated_at', function ($category) {
                $latest_update   =  '';
                $latest_update  .= $category->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-bold'>";
                $latest_update  .= $category->updated_by ? $category->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->addColumn('action', function ($category) {
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
                    <a href="' . route('category.edit', $category->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('category.destroy', $category->id) . '" method="POST" class="action-form" style="display:inline">
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
                    <a href="' . route('category.edit', $category->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
            ->rawColumns(['name', 'status', 'is_published', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function categoryData($request)
    {
        $search   = $request->search;
        $status   = $request->status;

        $data     = DB::table('categories')
            ->orderBy('id', 'DESC')
            ->whereNull('deleted_at');

        if ($search) {
            $data->Where('name_en', 'LIKE', "%$search%");
            $data->orWhere('name_tc', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all') {
            $data->where('is_published', $status);
        }

        return $data->get();
    }

    public function saveCategory($request, $id = null)
    {
        // dd($request);
        if ($id === NULL) {
            $category = new Category();
        } else {
            $request->updated_by = auth()->user()->name;
            $category            = Category::findOrFail($id);
        }

        $saved        = $category->fill($request->all())->save();
        $category_id = $category->id;


        $holder4_arr = [];
        $holder5_arr = [];
        foreach ($request['image'] as $key => $horder4) {
            if (!existImagePath($horder4)) {

                $holder4_arr[$key] = null;
            } else {

                $holder4_arr[$key] = getImage($horder4);
            }
        }

        foreach ($request['imageM'] as $key => $horder5) {
            if (!existImagePath($horder5)) {

                $holder5_arr[$key] = null;
            } else {

                $holder5_arr[$key] = getImage($horder5);
            }
        }

        $details = $request['details_ids_en'];

        if(isset($details)){
            $detail = CategoryImage::where('category_id',$id)->pluck('id')->all();
            $diffs = array_diff($detail, $details);
            // dd($diffs);
            if (count($diffs) > 0) {
                foreach ($diffs as $key => $diff) {
                    CategoryImage::where('id', $diff)->delete();
                }
            }
        }

        $title_en = $request['title_en'];
        if (isset($title_en)) {
            for ($i = 0; $i < count($title_en); $i++) {
                //  dd($request['type'][$i]);
                $data        =   [
                    "category_id"       => $category_id,
                    "title_en"       => $request['title_en'][$i],
                    "title_sc"       => $request['title_sc'][$i],
                    "title_tc"       => $request['title_tc'][$i],
                    //"type"       => $request['type'][$i],
                    "image"    => $holder4_arr[$i],
                    "imageM"    => $holder5_arr[$i],
                ];

                if (isset($details) == null) {
                    $details   =   new CategoryImage();
                } else {
                    $details   =   CategoryImage::get();
                }

                if (isset($details[$i])) {
                   // dd('old');
                    $details[$i]->update($data);
                } else {
                   // dd('new');
                    $newDetail = new CategoryImage();
                    $newDetail->fill($data)->save();
                }
            }
        }
        // $this->saveCategoryImages($category_id, collect($request->all()));

        return ($saved) ? $category : FALSE;
    }


    public function saveCategoryImages($id, $request)
    { 
        // dd($request,$id);
        $holder4_arr = [];
        $holder5_arr = [];
        foreach ($request['image'] as $key => $horder4) {
            if (!existImagePath($horder4)) {

                $holder4_arr[$key] = null;
            } else {

                $holder4_arr[$key] = getImage($horder4);
            }
        }

        $holder5_arr = [];
        foreach ($request['imageM'] as $key => $horder5) {
            if (!existImagePath($horder5)) {

                $holder5_arr[$key] = null;
            } else {

                $holder5_arr[$key] = getImage($horder5);
            }
        }
        
        // $details = $request->details_ids_en;
        $details = $request['details_ids_en'];
        $details_m = $request['details_ids_m_en'];
        // $details_m = $request->details_ids_m_en;
        // dd($details);
        if(isset($details)){
            $detail = CategoryImage::pluck('id')->all();
            $diffs = array_diff($detail, $details);
            // dd($diffs);
            if (count($diffs) > 0) {
                foreach ($diffs as $key => $diff) {
                    CategoryImage::where('id', $diff)->delete();
                }
            }
        }

        if(isset($details_m)){
            $detail_m = CategoryImage::pluck('id')->all();
            $diffs_m = array_diff($detail_m, $details_m);
            if (count($diffs_m) > 0) {
                foreach ($diffs_m as $key => $diff_m) {
                    CategoryImage::where('id', $diff_m)->delete();
                }
            }
        }

        $title_en = $request['title_en'];
        $title_m_en = $request['title_m_en'];

        if (isset($title_en)) {
            // dd(count($title_en));
            for ($i = 0; $i < count($title_en); $i++) {
                $data        =   [
                    "category_id"       => $id,
                    "title_en"       => $request['title_en'][$i],
                    "title_sc"       => $request['title_sc'][$i],
                    "title_tc"       => $request['title_tc'][$i],
                    "type"       => 0,
                    "image"    => $holder4_arr[$i],
                ];

                if (isset($details) == null) {
                    $details   =   new CategoryImage();
                } else {
                    $details   =   CategoryImage::get();
                }

                if (isset($details[$i])) {
                   // dd('old');
                    $details[$i]->update($data);
                } else {
                   // dd('new');
                    $newDetail = new CategoryImage();
                    $newDetail->fill($data)->save();
                }
            }
        }

        if (isset($title_m_en) && $title_m_en != null) {
            // dd($title_m_en);
            for ($i = 0; $i < count($title_m_en); $i++) {
                $data        =   [

                    "category_id"       => $id,
                    "title_en"       => $request['title_m_en'][$i],
                    "title_sc"       => $request['title_m_sc'][$i],
                    "title_tc"       => $request['title_m_tc'][$i],
                    "type"       => 1,
                    "image"    => $holder5_arr[$i],
                ];

                if (isset($details_m) == null) {
                    $details_m   =   new CategoryImage();
                } else {
                    $details_m   =   CategoryImage::get();
                }

                if (isset($details_m[$i])) {
                    $details_m[$i]->update($data);
                } else {
                    $newDetail_m = new CategoryImage();
                    $newDetail_m->fill($data)->save();
                }
            }
        }
    }

    public function getCategoryData($id)
    {
        $category = Category::findOrFail($id);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return ($category) ? $category : false;
    }

    public function changeStatus($request)
    {
        $category    = Category::findOrFail($request->id);
        $category->update(['is_published' => !$category->is_published]);

        return $category;
    }

    public function getCategoryList()
    {
        $category = Category::where('is_published', true)->get(['id', 'name_en']);

        return $category;
    }

    public function translateContent($request)
    {
        $val       = $request->val;
        $name      = $request->name;
        $content   = $request->cont;

        $fields    = [
            "name"    => $name,
            "content" => $content,
        ];

        $data      = autoTranslate($val, $fields);

        return $data;
    }
}
