<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CheckUpTypeRequest;
use App\Models\CheckUpType;
use App\Models\CheckUpGroup;
use App\Repositories\CheckUpTypeRepo;
use Illuminate\Http\Request;

class CheckUpTypeController extends Controller
{
    public $page = 'check_up_type';

    protected $checkUpTypeRepo;

    public function __construct(CheckUpTypeRepo $checkUpTypeRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkUpTypeRepo = $checkUpTypeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page          = $this->page;
        // $checkupgroup  = CheckUpGroup::get(['id', 'name_en']);
        // return view('admin.check-up-type.index', compact('page', 'checkupgroup'));

        $checkuptypes = CheckUpType::latest()->get();
        return view('admin.check-up-type.index', compact('checkuptypes','page'));
    }

    public function getData(Request $request)
    {
        return $this->checkUpTypeRepo->getCheckUpType($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page         = $this->page;
        $checkupgroup = CheckUpGroup::select('id', 'name_en')->get()->pluck('name_en', 'id');

        return view('admin.check-up-type.create', compact('page', 'checkupgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CheckUpTypeRequest $request)
    {
        // $this->checkUpTypeRepo->saveCheckUpType($request);
        // return redirect('admin/check-up-type')->with('flash_message', 'CheckUpType added!');

        $data = [
            'name_en' => $request['name_en'],
            'name_sc' => $request['name_sc'],
            'name_tc' => $request['name_tc'],
            'order_by' => $request['order_by']
        ];
        CheckUpType::create($data);
        return redirect('admin/check-up-type')->with('flash_message', 'CheckUpType added!');
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
        $checkuptype = CheckUpType::findOrFail($id);

        return view('admin.check-up-type.show', compact('checkuptype'));
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
        // $checkupgroup = CheckUpGroup::select('id', 'name_en')->get()->pluck('name_en', 'id');
        // $checkuptype  = $this->checkUpTypeRepo->getCheckUpTypeData($id);
        // return view('admin.check-up-type.edit', compact('checkuptype', 'page', 'checkupgroup'));

        $checkupgroup = CheckUpGroup::select('id', 'name_en')->get()->pluck('name_en', 'id');
        $checkuptype = CheckUpType::findOrFail($id);
        return view('admin.check-up-type.edit', compact('checkuptype', 'checkupgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CheckUpTypeRequest $request, $id)
    {
        // $checkuptype = $this->checkUpTypeRepo->saveCheckUpType($request, $id);

        // if ($checkuptype) {
        //     return redirect()->route("check-up-type.index")->with('flash_message', 'Check Up Type Update!');
        // } else {
        //     return redirect()->route("check-up-type.edit", $id)->with('flash_message', 'Check Up Type update!');
        // }

        // return redirect('admin/check-up-type')->with('flash_message', 'CheckUpType updated!');

        $data = [
            'name_en' => $request['name_en'],
            'name_sc' => $request['name_sc'],
            'name_tc' => $request['name_tc'],
            'order_by' => $request['order_by']
        ];
        $checkuptype = CheckUpType::findOrFail($id);
        $checkuptype->update($data);
        return redirect('admin/check-up-type')->with('flash_message', 'CheckUpType updated!');
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
        $this->checkUpTypeRepo->deleteCheckUpType($id);

        return redirect('admin/check-up-type')->with('flash_message', 'CheckUpType deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->checkUpTypeRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function checkup_type_translate(Request $request)
    {
        $val = $request->val;
        $name = $request->name;
        $fields = [
            "name" => $name,
        ];
        $data = autoTranslate($val, $fields);
        return $data;
    }
}
