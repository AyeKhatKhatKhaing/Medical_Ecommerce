<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogAuthorFormRequest;
use App\Models\Author;
use App\Repositories\BlogAuthorRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class BlogAuthorController extends Controller
{

    use CheckPermission;

    public $page  = 'blog_author';
    protected $blogAuthorRepo;

    public function __construct(BlogAuthorRepo $blogAuthorRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->blogAuthorRepo = $blogAuthorRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.blog-author.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->blogAuthorRepo->getBlogAuthor($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;

        return view('admin.blog-author.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BlogAuthorFormRequest $request)
    {

        $this->blogAuthorRepo->saveBlogAuthor($request);

        return redirect('admin/blog-author')->with('flash_message', 'BlogAuthor added!');
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
        $blogAuthor = Author::findOrFail($id);

        return view('admin.blog-author.show', compact('blogAuthor'));
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
        $blogAuthor  = $this->blogAuthorRepo->getBlogAuthorData($id);

        return view('admin.blog-author.edit', compact('blogAuthor', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BlogAuthorFormRequest $request, $id)
    {

        $blogAuthor = $this->blogAuthorRepo->saveBlogAuthor($request,$id);

        if($blogAuthor) {
            return redirect()->route("blog-author.index")->with('flash_message', 'Blog Author Update!');
        }
        else {
            return redirect()->route("blog-author.edit",$id)->with('flash_message', 'Blog Author update!');

        }

        return redirect('admin/blog-author')->with('flash_message', 'Blog Author updated!');
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
        $this->blogAuthorRepo->deleteBlogAuthor($id);

        return redirect('admin/blog-author')->with('flash_message', 'Blog Author deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->blogAuthorRepo->changeStatus($request);

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
