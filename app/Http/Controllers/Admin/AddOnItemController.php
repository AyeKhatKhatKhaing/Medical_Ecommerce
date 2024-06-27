<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\AddOnItem;
use Illuminate\Http\Request;
use App\Models\User as Merchant;
use App\Repositories\AddOnItemRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddOnItemController extends Controller
{
    public $page = 'add_on_item';

    protected $addOnItemRepo;

    public function __construct(AddOnItemRepo $addOnItemRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,manager,marketing');
        $this->addOnItemRepo = $addOnItemRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.add-on-item.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->addOnItemRepo->getAddOnItem($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        $merchants = Merchant::where('is_merchant', true)->get();
        return view('admin.add-on-item.create', compact('page', 'merchants'));
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
        // $this->validate($request, [
        //     'merchant' => 'required',
        // ]);
        $validator = Validator::make(request()->all(), [
            'merchant' => 'required',
            // 'code' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors);
        }
        $this->addOnItemRepo->saveAddOnItem($request);

        return redirect('admin/add-on-item')->with('flash_message', 'AddOnItem added!');
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
        $addonitem = AddOnItem::findOrFail($id);

        return view('admin.add-on-item.show', compact('addonitem'));
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
        $page      = $this->page;
        $addonitem = $this->addOnItemRepo->getAddOnItemData($id);
        $merchants = Merchant::where('is_merchant', true)->get();
        return view('admin.add-on-item.edit', compact('addonitem', 'page', 'merchants'));
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
        $this->validate($request, [
            'merchant' => 'required',
            // 'code' => 'required',
        ]);
        $add_on_item = $this->addOnItemRepo->saveAddOnItem($request, $id);

        if ($add_on_item) {
            return redirect()->route("add-on-item.index")->with('flash_message', 'Add On Item Update!');
        } else {
            return redirect()->route("add-on-item.edit", $id)->with('flash_message', 'Add On Item update!');
        }

        return redirect('admin/add-on-item')->with('flash_message', 'AddOnItem updated!');
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
        $this->addOnItemRepo->deleteAddOnItem($id);

        return redirect('admin/add-on-item')->with('flash_message', 'AddOnItem deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->addOnItemRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function add_on_item_translate(Request $request)
    {

        $data = $this->addOnItemRepo->translateContent($request);

        return $data;
    }
}
