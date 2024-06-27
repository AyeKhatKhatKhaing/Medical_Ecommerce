<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\CheckUpItemRequest;
use App\Models\CheckUpItem;
use App\Repositories\CheckUpItemRepo;
use Illuminate\Http\Request;

class CheckUpItemController extends Controller
{

    public $page = 'check_up_item';

    protected $checkUpItemRepo;

    public function __construct(CheckUpItemRepo $checkUpItemRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkUpItemRepo = $checkUpItemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.check-up-item.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->checkUpItemRepo->getCheckUpItem($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;

        return view('admin.check-up-item.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CheckUpItemRequest $request)
    {
        $this->checkUpItemRepo->saveCheckUpItem($request);

        return redirect('admin/check-up-item')->with('flash_message', 'CheckUpItem added!');
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
        $checkupitem = CheckUpItem::findOrFail($id);

        return view('admin.check-up-item.show', compact('checkupitem'));
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
        $page        = $this->page;
        $checkupitem = $this->checkUpItemRepo->getCheckUpItemData($id);

        return view('admin.check-up-item.edit', compact('checkupitem', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CheckUpItemRequest $request, $id)
    {
        $checkupitem = $this->checkUpItemRepo->saveCheckUpItem($request,$id);

        if($checkupitem) {
            return redirect()->route("check-up-item.index")->with('flash_message', 'Check Up Item Update!');
        }
        else {
            return redirect()->route("check-up-item.edit",$id)->with('flash_message', 'Check Up Item update!');

        }

        return redirect('admin/check-up-item')->with('flash_message', 'CheckUpItem updated!');
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
        $this->checkUpItemRepo->deleteCheckUpItem($id);

        return redirect('admin/check-up-item')->with('flash_message', 'CheckUpItem deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->checkUpItemRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

}
