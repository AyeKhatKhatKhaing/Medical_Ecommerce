<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogTagFormRequest;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Repositories\BlogTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{

    use CheckPermission;

    public $page  = 'blog_tag';
    protected $blogTagRepo;

    public function __construct(BlogTagRepo $blogTagRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->blogTagRepo = $blogTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.blog-tag.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->blogTagRepo->getBlogTag($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;
        $categories = BlogCategory::where('is_published', 1)->get();

        return view('admin.blog-tag.create', compact('page', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BlogTagFormRequest $request)
    {

        $this->blogTagRepo->saveBlogTag($request);

        return redirect('admin/blog-tag')->with('flash_message', 'BlogTag added!');
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
        $blogtag = BlogTag::findOrFail($id);

        return view('admin.blog-tag.show', compact('blogtag'));
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
        $blogTag  = $this->blogTagRepo->getBlogTagData($id);
        $categories = BlogCategory::where('is_published', 1)->get();

        return view('admin.blog-tag.edit', compact('blogTag', 'page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogTagFormRequest $request, $id)
    {

        $blog_tag = $this->blogTagRepo->saveBlogTag($request,$id);

        if($blog_tag) {
            return redirect()->route("blog-tag.index")->with('flash_message', 'Blog Update!');
        }
        else {
            return redirect()->route("blog-tag.edit",$id)->with('flash_message', 'Blog update!');

        }

        return redirect('admin/blog-tag')->with('flash_message', 'BlogTag updated!');
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
        $this->blogTagRepo->deleteBlogTag($id);

        return redirect('admin/blog-tag')->with('flash_message', 'BlogTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->blogTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function blog_tag_translate()
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
