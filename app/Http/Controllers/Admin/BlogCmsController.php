<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCms;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class BlogCmsController extends Controller
{
    use CheckPermission;

    public $page  = 'blog_cms';

    public function __construct()
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function getData(Request $request)
    {
        $page  = $this->page;
        $data = BlogCms::first();

        return view('admin.blog-cms.index', compact('page','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeData(Request $request)
    {
        $data['desc_en'] = $request->desc_en;
        $data['desc_sc'] = $request->desc_sc;
        $data['desc_tc'] = $request->desc_tc;

        if(isset($request->subscribe_image)) 
        {
            $data['subscribe_image'] = $this->getImagePath($request->subscribe_image);
        } else {
            $data['subscribe_image'] = NULL;
        }

        if(isset($request->banner_image_1)) 
        {
            $data['banner_image_1'] = $this->getImagePath($request->banner_image_1);
        } else {
            $data['banner_image_1'] = NULL;
        }

        if(isset($request->banner_image_2)) 
        {
            $data['banner_image_2'] = $this->getImagePath($request->banner_image_2);
        } else {
            $data['banner_image_2'] = NULL;
        }

        $cms = BlogCms::first();

        if($cms)
        {
            $cms->update($data);
        } else {
            BlogCms::create($data);
        }

        return redirect('admin/blog-cms')->with('flash_message', 'Blog CMS Updated!');
    }

    public function getImagePath($requestData)
    {
        $domain = config('app.url');
        $split = explode($domain, $requestData);
        $image_path = end($split);
        $check = str_starts_with($image_path, '/');
        if($check == true)
        {
            $image_path = $image_path;
        } else {
            $image_path = '/'.$image_path;
        }
        
        return $image_path;
    }
}
