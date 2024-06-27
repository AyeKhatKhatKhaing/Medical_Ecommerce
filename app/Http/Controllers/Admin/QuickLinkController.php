<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuickLinkFormRequest;
use App\Models\Page;
use App\Models\QuickLink;
use App\Repositories\QuickLinkRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    use CheckPermission;

    public $page  =  'quick_link';

    protected $quickLinkRepo;

    public function __construct(QuickLinkRepo $quickLinkRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->quickLinkRepo = $quickLinkRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.quick-link.index', compact('page'));
    }


    public function getData(Request $request)
    {
        return $this->quickLinkRepo->getQuickLinks($request);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        $pages = Page::all();

        return view('admin.quick-link.create', compact('page','pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(QuickLinkFormRequest $request)
    {
        $this->quickLinkRepo->saveQuickLink($request);

        return redirect('admin/quick-link')->with('flash_message', 'QuickLink added!');
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
        $quickLink = QuickLink::findOrFail($id);

        return view('admin.quick-link.show', compact('quickLink'));
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
        $page  = $this->page;
        $quicklink  = $this->quickLinkRepo->getQuickLink($id);
        $pages = Page::all();

        return view('admin.quick-link.edit', compact('quicklink', 'page','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(QuickLinkFormRequest $request, $id)
    {

        $quickLinks = $this->quickLinkRepo->saveQuickLink($request,$id);

        if($quickLinks) {
            return redirect()->route("quick-link.index")->with('flash_message', 'QuickLink Update!');
        }
        else {
            return redirect()->route("quick-link.edit",$id)->with('flash_message', 'QuickLink update!');

        }

        return redirect('admin/quick-link')->with('flash_message', 'QuickLink updated!');
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
        $this->quickLinkRepo->deleteQuickLink($id);

        return redirect('admin/quick-link')->with('flash_message', 'QuickLink deleted!');
    }
    public function statusChange(Request $request)
    {
        $status = $this->quickLinkRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
}

