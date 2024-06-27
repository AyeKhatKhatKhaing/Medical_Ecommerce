<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\MainOptionalItem;
use App\Repositories\MainOptionalItemRepo;
use Illuminate\Http\Request;

class MainOptionalItemController extends Controller
{
    public $page = "main_optional_item";

    protected $mainOptionalItemRepo;

    public function __construct(mainOptionalItemRepo $mainOptionalItemRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->mainOptionalItemRepo = $mainOptionalItemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.main-optional-item.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->mainOptionalItemRepo->getMainOptional($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;

        return view('admin.main-optional-item.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->mainOptionalItemRepo->saveMainOptionalItem($request);

        return redirect('admin/main-optional-item')->with('flash_message', 'MainOptionalItem added!');
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
        $mainoptionalitem = MainOptionalItem::findOrFail($id);

        return view('admin.main-optional-item.show', compact('mainoptionalitem'));
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
        $page             = $this->page;
        $mainoptionalitem = $this->mainOptionalItemRepo->getMainOptionalData($id);

        return view('admin.main-optional-item.edit', compact('mainoptionalitem', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $main_optional_item = $this->mainOptionalItemRepo->saveMainOptionalItem($request,$id);

        if($main_optional_item) {
            return redirect()->route("main-optional-item.index")->with('flash_message', 'Main Optional Item Update!');
        }
        else {
            return redirect()->route("main-optional-item.edit",$id)->with('flash_message', 'Main Optional Item update!');

        }

        return redirect('admin/main-optional-item')->with('flash_message', 'MainOptionalItem updated!');
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
        $this->mainOptionalItemRepo->deleteMainOptional($id);

        return redirect('admin/main-optional-item')->with('flash_message', 'MainOptionalItem deleted!');
    }


    public function statusChange(Request $request)
    {
        $status = $this->mainOptionalItemRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function main_optional_item_translate(Request $request)
    {

        $data = $this->mainOptionalItemRepo->translateContent($request);

        return $data;

    }

}
