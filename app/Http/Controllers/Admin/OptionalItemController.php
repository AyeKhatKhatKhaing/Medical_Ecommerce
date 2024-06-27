<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainOptionalItem;
use App\Models\OptionalItem;
use App\Repositories\OptionalItemRepo;
use Illuminate\Http\Request;

class OptionalItemController extends Controller
{
    public $page  =  'optional_item';

    protected $optionalItemRepo;

    public function __construct(OptionalItemRepo $optionalItemRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->optionalItemRepo = $optionalItemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->page;

        return view('admin.optional-item.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->optionalItemRepo->getOptionalItem($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page          = $this->page;
        $main_optional = MainOptionalItem::pluck('name_en', 'id');

        return view('admin.optional-item.create', compact('page', 'main_optional'));
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
        $this->optionalItemRepo->saveOptionalItem($request);

        return redirect('admin/optional-item')->with('flash_message', 'OptionalItem added!');
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
        $optionalitem = OptionalItem::findOrFail($id);

        return view('admin.optional-item.show', compact('optionalitem'));
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
        $optionalitem  = $this->optionalItemRepo->getOptionalData($id);
        $main_optional = MainOptionalItem::pluck('name_en', 'id');

        return view('admin.optional-item.edit', compact('optionalitem', 'main_optional', 'page'));
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

        $optional_item = $this->optionalItemRepo->saveOptionalItem($request, $id);

        if($optional_item) {
            return redirect()->route("optional-item.index")->with('flash_message', 'Main Optional Item Update!');
        }
        else {
            return redirect()->route("optional-item.edit",$id)->with('flash_message', 'Main Optional Item update!');

        }

        return redirect('admin/optional-item')->with('flash_message', 'OptionalItem updated!');
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
        OptionalItem::destroy($id);

        return redirect('admin/optional-item')->with('flash_message', 'OptionalItem deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->optionalItemRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function optional_item_translate(Request $request)
    {

        $data = $this->optionalItemRepo->translateContent($request);

        return $data;

    }
}
