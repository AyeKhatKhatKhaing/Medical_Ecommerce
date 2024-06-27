<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCategoryFormRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    use CheckPermission;

    public $page  = 'blog_category';
    protected $blogCategoryRepo;

    public function __construct(BlogCategoryRepo $blogCategoryRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->blogCategoryRepo = $blogCategoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.blog-category.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->blogCategoryRepo->getBlogCategory($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;

        return view('admin.blog-category.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BlogCategoryFormRequest $request)
    {

        $this->blogCategoryRepo->saveBlogCategory($request);

        return redirect('admin/blog-category')->with('flash_message', 'BlogCategory added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);

        return view('admin.blog-category.show', compact('blogcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $page          = $this->page;
        $blogcategory  = $this->blogCategoryRepo->getBlogCategoryData($id);

        return view('admin.blog-category.edit', compact('blogcategory', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogCategoryFormRequest $request, $id)
    {

        $blog_category = $this->blogCategoryRepo->saveBlogCategory($request,$id);

        if($blog_category) {
            return redirect()->route("blog-category.index")->with('flash_message', 'Blog Update!');
        }
        else {
            return redirect()->route("blog-category.edit",$id)->with('flash_message', 'Blog update!');

        }

        return redirect('admin/blog-category')->with('flash_message', 'BlogCategory updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->blogCategoryRepo->deleteBlogCategory($id);

        return redirect('admin/blog-category')->with('flash_message', 'BlogCategory deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->blogCategoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function blog_category_translate()
    {
        $val=\request()->val;
        $name=\request()->name;
        $fields=[
            "name"=>$name,
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }


}
