<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\PageFormRequest;
use App\Models\Page;
use App\Models\User;
use App\Repositories\PageRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function PHPUnit\Framework\returnArgument;

class PagesController extends Controller
{

    use CheckPermission;

    public $page  =  'page';

    protected $pageRepo;

    public function __construct(PageRepo $pageRepo)
    {
        $this->checkPermission();   
        $this->middleware('role:admin,marketing');
        $this->pageRepo = $pageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $p    = $this->page;

        return view('admin.pages.index',compact('p'));
    }

    public function getData(Request $request)
    {
        return $this->pageRepo->getPages($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $p   = $this->page;

        return view('admin.pages.create',compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PageFormRequest $request)
    {
        $this->pageRepo->savePage($request);

        return redirect('admin/pages')->with('flash_message', 'Page added!');
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
        $page = Page::findOrFail($id);

        return view('admin.pages.show', compact('page'));
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
        $p     = $this->page;
        $page  = $this->pageRepo->getPage($id);

        return view('admin.pages.edit', compact('page', 'p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PageFormRequest $request, $id)
    {
        $pages = $this->pageRepo->savePage($request,$id);

        if($pages) {
            return redirect()->route("pages.index")->with('flash_message', 'Page Update!');
        }
        else {
            return redirect()->route("pages.edit",$id)->with('flash_message', 'Page update!');

        }

        return redirect('admin/pages')->with('flash_message', 'Page updated!');
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
        $this->pageRepo->deletePage($id);

        return redirect('admin/pages')->with('flash_message', 'Page deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->pageRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function page_translate(Request $request)
    {

        $data = $this->pageRepo->translateContent($request);

        return $data;

    }

}
