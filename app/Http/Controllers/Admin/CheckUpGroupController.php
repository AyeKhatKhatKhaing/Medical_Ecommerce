<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CheckUpGroupRequest;
use App\Models\CheckUpGroup;
use App\Models\CheckUpItem;
use App\Repositories\CheckUpGroupRepo;
use Database\Factories\CheckupGroupFactory;
use Illuminate\Http\Request;

class CheckUpGroupController extends Controller
{
    public $page  = 'check_up_group';

    protected $checkUpGroupRepo;

    public function __construct(CheckUpGroupRepo $checkUpGroupRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkUpGroupRepo = $checkUpGroupRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page         = $this->page;
        // $checkupitem  = CheckUpItem::get(['id', 'name_en']);

        $checkupitems  = CheckUpGroup::whereNull('deleted_at')->latest()->orderBy('id', 'desc')->get();
        return view('admin.check-up-group.index', compact('page', 'checkupitems'));
    }

    public function getData(Request $request)
    {
        return $this->checkUpGroupRepo->getCheckUpGroup($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page        = $this->page;
        $checkupitem = CheckUpItem::pluck('name_en', 'id');

        return view('admin.check-up-group.create', compact('page', 'checkupitem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CheckUpGroupRequest $request)
    {
        $this->checkUpGroupRepo->saveCheckUpGroup($request);
        // dd($request);
        return redirect('admin/check-up-group')->with('flash_message', 'CheckUpGroup added!');
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
        $checkupgroup = CheckUpGroup::findOrFail($id);

        return view('admin.check-up-group.show', compact('checkupgroup'));
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
        // $page         = $this->page;
        // $checkupgroup = $this->checkUpGroupRepo->getCheckUpGroupData($id);
        // $checkupitem  = CheckUpItem::select('id', 'name_en')->get()->pluck('name_en', 'id');
        $checkupgroup = CheckUpGroup::find($id);

        // return view('admin.check-up-group.edit', compact('checkupgroup', 'checkupitem', 'page'));
        return view('admin.check-up-group.edit', compact('checkupgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CheckUpGroupRequest $request, $id)
    {
        // $checkupgroup = $this->checkUpGroupRepo->saveCheckUpGroup($request,$id);

        // if($checkupgroup) {
        //     return redirect()->route("check-up-group.index")->with('flash_message', 'Check Up Group Update!');
        // }
        // else {
        //     return redirect()->route("check-up-group.edit",$id)->with('flash_message', 'Check Up Group update!');

        // }
        // return redirect('admin/check-up-group')->with('flash_message', 'CheckUpGroup updated!');
        $data = [
            'name_en' => $request['name_en'],
            'name_sc' => $request['name_sc'],
            'name_tc' => $request['name_tc'],
            'description_en' => $request['description_en'],
            'description_sc' => $request['description_sc'],
            'description_tc' => $request['description_tc'],
            'minimum_item' => $request['minimum_item'],
            // 'is_published' =>  $request->is_published == 'on' ? 1 : 0
        ];
        // dd($data);
        $checkupgroup = CheckUpGroup::findOrFail($id);
        $checkupgroup->update($data);
        return redirect('admin/check-up-group')->with('flash_message', 'CheckUpGroup updated!');
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
        // $this->checkUpGroupRepo->deleteCheckUpGroup($id);
        // return redirect('admin/check-up-group')->with('flash_message', 'CheckUpGroup deleted!');

        $checkupgroup = CheckUpGroup::findOrFail($id);
        CheckUpGroup::destroy($checkupgroup->id);
        return redirect('admin/check-up-group')->with('flash_message', 'CheckUpGroup deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->checkUpGroupRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    // public function checkup_up_translate(Request $request)
    // {
    //     $val = $request->val;
    //     $name = $request->name;
    //     $fields = [
    //         "name" => $name,
    //     ];
    //     $data = autoTranslate($val, $fields);
    //     return $data;
    // }
    public function checkup_up_translate(Request $request)
    {
        // dd($request);
        $val       = $request->val;
        $name      = $request->name;
        $content   = $request->cont;

        $fields    = [
            "name"    => $name,
            "content" => $content,
        ];

        $data      = autoTranslate($val, $fields);
        return $data;
    }
}
