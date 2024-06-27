<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Illuminate\Http\Request;
use Session;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\BlogImage;
use App\Models\BlogSection;

class BlogRepo
{
    public function getBlogs($request)
    {
        $blogs      = $this->blogData($request);
        $datatables = DataTables::of($blogs)
            ->addIndexColumn()
            ->addColumn('no', function ($blogs) {
                return '';
            })->editColumn('title', function ($blogs) {
                $title  = $blogs->title_en;
                return $title;
            })->editColumn('image', function ($blogs) {
                return "<img src='" . $blogs->main_image_url . "'style='width: 132px;height: 50px !important;'/>";
            })->editColumn('category_id', function ($blogs) {
                $category_name  = $blogs->category_name_en;

                return $category_name;
            })->editColumn('status', function ($blogs) {
                $status = '';

                if ($blogs->is_published) {
                    $status .= '<span class="badge bg-primary" style="padding:5px 8px;">Active</span>';
                } else {

                    $status .= '<span class="badge bg-danger" style="padding:5px 8px;">Inactive</span>';
                }

                return $status;
            })->editColumn('updated_at', function ($blogs) {
                $admin = User::find($blogs->updated_person);
                $latest_update   =  '';
                $latest_update  .= $blogs->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= $admin->name_en;
                $latest_update  .= "</span>";

                return $latest_update;
            })->editColumn('is_published', function ($blogs) {

                $btn      = '';

                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('blogChangeStatus') . "'";
                if ($blogs->is_published) {
                    $btn .= '<input data-id="' . $blogs->id . '" onclick="statusChange(' . $blogs->id . ',' . $route . ')"
                                        class="categories-toggle-class form-check-input" type="checkbox"
                                        date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                        data-on="1" data-off="0" checked >';
                    $btn .= '</div>';
                } else {
                    $btn .= '<input data-id="' . $blogs->id . '" onclick="statusChange(' . $blogs->id . ',' . $route . ')"
                                        class="categories-toggle-class form-check-input" type="checkbox"
                                        date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                        data-on="1" data-off="0"  >';
                    $btn .= '</div>';
                }

                return $btn;
            })->addColumn('action', function ($blogs) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true){
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">'.
                    // <a href="' . route('blogDetails', ['blog_id'=>$blogs->id,'title_id'=>1]) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    //     <span class="svg-icon svg-icon-3">
                    //         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    //             <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                    //             <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                    //         </svg>
                    //     </span>
                    // </a>
                    '<a href="' . route('blog.edit', $blogs->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('blog.destroy', $blogs->id) . '" method="POST" class="action-form" style="display:inline">
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
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">'.
                    // <a href="' . route('blogDetails', ['blog_id'=>$blogs->id,'title_id'=>1]) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    //     <span class="svg-icon svg-icon-3">
                    //         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    //             <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                    //             <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                    //         </svg>
                    //     </span>
                    // </a>
                    '<a href="' . route('blog.edit', $blogs->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
            })->rawColumns(['image', 'status', 'title', 'category_id', 'is_published', 'updated_at', 'action']);
        return $datatables->make(true);
    }

    public function blogData($request)
    {
        $search   = $request->search;
        $category = $request->category;
        $status   = $request->status;

        $data     = DB::table('blog')
            ->leftJoin('blog_category', function ($join) {
                return $join->on('blog.category_id', '=', 'blog_category.id');
            })
            ->select('blog.*', 'blog_category.name_en as category_name_en')
            ->orderBy('blog.id', 'DESC')
            ->where('blog.deleted_at', null);

        if ($search) {
            $data->Where('blog.name_en', 'LIKE', "%$search%");
        }

        if (isset($category) && $category != 'all') {
            $data->where('blog.category_id', $category);
        }

        if (isset($status) && $status != 'all') {
            $data->where('blog.is_published', $status);
        }

        return $data->get();
    }

    public function getBlog($id)
    {
        $blog = Blog::findOrFail($id);

        return $blog;
    }

    public function saveBlog(Request $request, $id = null)
    {
        $input                  = $request->all();
        $input['is_published']  = $request->is_published == 'on' ? 1 : 0;
        $input['is_home_featured']       = $request->is_home_featured == 'on' ? 1 : 0;
        $input['is_popular']  = $request->is_popular == 'on' ? 1 : 0;
        if($request->recommended_blog_id!=null && count($request->recommended_blog_id)>0) {
            $input['recommended_blog_id']  = implode (",",  $request->recommended_blog_id);
        }
        $field = 'hidden-related_keywords';
        $input['related_keywords'] = $request->{$field};

        if (!existImagePath($input['main_image_url'])) {
            $input['main_image_url'] = null;
        } else {
            $input['main_image_url'] = getImage($request->main_image_url);
        }

        if (!existImagePath($input['meta_image'])) {
            $input['meta_image'] = null;
        } else {
            $input['meta_image'] = getImage($request->meta_image);
        }

        if(isset($request->source_title_en))
        {
            $input['source_title_en'] = json_encode($request->source_title_en);
        } else {
            $input['source_title_en'] = NULL;
        }

        if(isset($request->source_title_tc))
        {
            $input['source_title_tc'] = json_encode($request->source_title_tc);
        } else {
            $input['source_title_tc'] = NULL;
        }

        if(isset($request->source_title_sc))
        {
            $input['source_title_sc'] = json_encode($request->source_title_sc);
        } else {
            $input['source_title_sc'] = NULL;
        }

        if(isset($request->source_title_link))
        {
            $input['source_title_link'] = json_encode($request->source_title_link);
        } else {
            $input['source_title_link'] = NULL;
        }

        if ($id === NULL) {
            $blog = new Blog();
            $input['created_person'] = auth()->user()->id;
            $input['updated_person'] = auth()->user()->id;
        } else {
            $input['updated_person'] = auth()->user()->id;
            $blog                = Blog::findOrFail($id);
        }

        $saved    = $blog->fill($input)->save();

        return ($saved) ? $blog : FALSE;
    }

    public function saveSection(Request $request, $id)
    {
        $input = [];
        $count = $request->section_count;
        for( $i = 0; $i < $count; $i++) { 
            $para = 'feature_section_'.$request->section_row[$i];
            $input['section_name_en'] = $request->section_name_en[$i];
            $input['section_name_sc'] = $request->section_name_sc[$i];
            $input['section_name_tc'] = $request->section_name_tc[$i];
            $input['feature_type'] = isset($request->$para) ? json_encode($request->$para) : NULL;
            $input['blog_id'] = $id;
            $input['sort_no'] = $request->sort_no[$i];

            BlogSection::create($input);
        }
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return ($blog) ? $blog : false;
    }


    public function changeStatus($request)
    {
        $blog    = Blog::findOrFail($request->id);
        $blog->update(['is_published' => !$blog->is_published]);

        return $blog;
    }

    public function translateContent($request)
    {
        $val         = request()->val;
        $name        = request()->name;
        $slug        = request()->slug;
        $content     = request()->cont;
        $meta_title  = request()->meta_title;
        $meta_des    = request()->meta_des;
        $tandc    = request()->tandc;

        $fields      = [
            "name"       => $name,
            "slug"       => $slug,
            "content"    => $content,
            "meta_title" => $meta_title,
            "meta_des"   => $meta_des,
            "tandc"      => $tandc
        ];

        $data = autoTranslate($val, $fields);

        return $data;
    }

    public function translateContentToEng($request)
    {
        $val         = request()->val;
        $name        = request()->name;
        $slug        = request()->slug;
        $content     = request()->cont;
        $meta_title  = request()->meta_title;
        $meta_des    = request()->meta_des;
        $tandc    = request()->tandc;

        $fields      = [
            "name"       => $name,
            "slug"       => $slug,
            "content"    => $content,
            "meta_title" => $meta_title,
            "meta_des"   => $meta_des,
            "tandc"      => $tandc
        ];

        $data = autoTranslateToEng($val, $fields);

        return $data;
    }

    public function updateBlogImages($request)
    {
        $holder5_arr = [];
        $holder6_arr = [];
        if($request->has('holder5')){
            foreach($request['holder5'] as $key => $holder5){
                if(!existImagePath($holder5)){
                    $holder5_arr[$key] = null ;
                }else{
                    $holder5_arr[$key] = getImage($holder5) ;

                }
            }
        }else{
            $holder5_arr = NULL;
        }
        if($request->has('holder6')){
            foreach($request['holder6'] as $key => $holder6){
                if(!existImagePath($holder6)){
                    $holder6_arr[$key] = null ;
                }else{
                    $holder6_arr[$key] = getImage($holder6) ;

                }
            }
        }else{
            $holder6_arr = NULL;
        }

        $is_record = BlogImage::where('blog_details_no', $request->title_id)->where('blog_id', $request->blog_id)->first();
        if ($is_record) {
            $blog_images = BlogImage::where('blog_details_no', $request->title_id)->where('blog_id',  $request->blog_id)->first();
            if($request->title_id==2) {
                $data = [
                    "img" => $holder5_arr,
                ];
            }else{
                $data = [
                    "img" => $holder6_arr,
                ];
            }
          
            $blog_images->update($data);
        } else {
            if($request->title_id==2) {
                $img= $holder5_arr;
            }else{
                $img= $holder6_arr;
            }
            $data = [
                "blog_id" => (int)$request->blog_id,
                "blog_details_no" => (int)$request->title_id,
                "img" => json_encode($img),
                "updated_by" => auth()->user()->name
            ];
            BlogImage::create($data);
        }
    }

    public function getBlogsFormSubmisions($request)
    {
        $blogs      = $this->blogFormSubmissionsData($request);
        $datatables = DataTables::of($blogs)
            ->addIndexColumn()
            ->addColumn('no', function ($blogs) {
                return '';
            })->editColumn('title', function ($blogs) {
                $title  = $blogs->title;
                return $title;
            })->editColumn('first_name', function ($blogs) {
                $first_name  = $blogs->first_name;
                return $first_name;
            })->editColumn('last_name', function ($blogs) {
                $last_name  = $blogs->last_name;
                return $last_name;
            })->editColumn('email', function ($blogs) {
                $email  = $blogs->email;
                return $email;
            })->editColumn('phone', function ($blogs) {
                $phone  = $blogs->phone_no1;
                return $phone;
            })->editColumn('created_at', function ($blogs) {
                $created_at  = $blogs->created_at;
                return $created_at;
            })->addColumn('action', function ($blogs) {
                $btn  = '';
                $btn .= '<a href="' . route('blogDetailsFormSubmissions', ['id'=>$blogs->id]) . '" title="view Blog">
                            <button class="btn btn-icon btn btn-secondary w-30px h-30px">
                                <i class="bi bi-eye" aria-hidden="true"></i>
                            </button>
                        </a>';
                return "<div class='d-flex justify-content-center flex-shrink-0'>" . $btn . "</div>";
            })->rawColumns(['title', 'first_name', 'last_name', 'email', 'phone', 'created_at', 'action']);
        return $datatables->make(true);
    }

    public function blogFormSubmissionsData($request)
    {
        $data     = DB::table('blog_details_form')->select('blog_details_form.*')->get();
        return $data;
    }

    public function getBlogsFormSubmisionsDetails($id) {
        $data     = DB::table('blog_details_form')->select('blog_details_form.*')->where("id",$id)->first();
        return $data;
    }
}
