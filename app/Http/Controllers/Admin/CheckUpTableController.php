<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\CheckUpItem;
use App\Models\CheckUpType;
use App\Models\CheckUpGroup;
use App\Models\CheckUpTable;
use Illuminate\Http\Request;
use App\Models\CheckTableItem;
use App\Models\CheckUpTableType;
use App\Models\CheckTableGroupItem;
use App\Http\Controllers\Controller;
use App\Repositories\CheckUpTableRepo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\CheckUpTableRequest;

class CheckUpTableController extends Controller
{
    public $page = 'check_up_table';

    protected $checkUpTableRepo;

    public function __construct(CheckUpTableRepo $checkUpTableRepo)
    {
        $this->middleware('role:admin,marketing,manager');
        $this->checkUpTableRepo = $checkUpTableRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    =  $this->page;
        // return view('admin.check-up-table.index', compact('page'));

        $checkups = CheckUpTable::latest()->get();
        return view('admin.check-up-table.index', compact('checkups','page'));
    }

    public function getData(Request $request)
    {
        return $this->checkUpTableRepo->getCheckUpTable($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $page           = $this->page;
        $checkuptype    = CheckUpType::get(['id', 'name_en']);
        $checkupgroup   = CheckUpGroup::get(['id', 'name_en']);
        $checkupitem    = CheckUpItem::get(['id', 'name_en']);

        return view('admin.check-up-table.create', compact('page', 'checkuptype', 'checkupgroup', 'checkupitem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CheckUpTableRequest $request)
    {
        $checkuptable   =  $this->checkUpTableRepo->saveCheckUpTable($request);

        return redirect(url('admin/check-up-table/'.$checkuptable->id.'/edit?type_id=2'));
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
        $checkuptable = CheckUpTable::findOrFail($id);

        return view('admin.check-up-table.show', compact('checkuptable'));
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
        $page           = $this->page;
        $re_table_ids = CheckUpTableType::where('check_up_table_id', $id)
            ->where('check_up_type_id', request()->type_id)
            ->whereNotNull("check_up_group_id")
            ->pluck('check_up_group_id')
            ->toArray();
        $checkuptype    = CheckUpType::orderBy('created_at','asc')->get(['id', 'name_en']);
        $checkupgroup   = CheckUpGroup::whereNotIn('id', $re_table_ids)->get(['id', 'name_en']);
        $checkupitem    = CheckUpItem::get(['id', 'name_en']);
        $checkuptable   = $this->checkUpTableRepo->getCheckUpTableData($id);

        return view('admin.check-up-table.edit', compact('page', 'checkuptype', 'checkupgroup', 'checkupitem', 'checkuptable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CheckUpTableRequest $request, $id)
    {

        $checkuptable = $this->checkUpTableRepo->saveCheckUpTable($request, $id);

        if ($checkuptable) {
            return redirect()->route("check-up-table.index")->with('flash_message', 'Check Up Table Update!');
        } else {
            return redirect()->route("check-up-table.edit", $id)->with('flash_message', 'Check Up Table update!');
        }

        return redirect('admin/check-up-table')->with('flash_message', 'CheckUpTable updated!');
    }

    public function saveCheckUpTableData(Request $request, $id)
    {
        $check_up_table_id   = $id;
        $typeId   = $request->typeId;
        $check_up_type_id    = $request->check_up_type_id;
        $check_up_group_id   = $request->check_up_group_id ?? null;
        $check_up_item_id    = $request->check_up_item_id ?? null;

        $check_up_table_type = CheckUpTableType::create([
            'check_up_table_id' => $check_up_table_id,
            'check_up_type_id'  => $check_up_type_id,
            'check_up_group_id' => $check_up_group_id,
        ]);

        if (count($check_up_item_id) > 0) {
            foreach ($check_up_item_id as $key => $item_id) {

                $this->addCheckUpItems($item_id, $check_up_table_type->id, $check_up_type_id, $check_up_group_id);
            }
        }

        return Redirect::away(url('admin/check-up-table/' . $id . '/edit?type_id=' . $typeId));
    }


    public function updateCheckUpTableData(Request $request, $id)
    {
        $table_id   = $request->table_id;
        $typeId   = $request->typeId;
        $check_up_type_id    = $request->check_up_type_id;
        $check_up_group_id   = $request->check_up_group_id ?? null;
        $check_up_item_id    = $request->check_up_item_id ?? null;
        $check_up_table_type    = $request->check_up_table_type_id ?? null;
        if (count($check_up_item_id) > 0) {
            CheckUpTableType::where('id',$request->check_up_table_type_id)
            ->where('check_up_type_id',$check_up_type_id)->update(['check_up_group_id' => $check_up_group_id]);

            CheckTableItem::where('check_up_table_type_id', $request->check_up_table_type_id)
                ->where('check_up_type_id', $check_up_type_id)
               ->delete();

            foreach ($check_up_item_id as $key => $item_id) {

                $this->addCheckUpItems($item_id, $check_up_table_type, $check_up_type_id, $check_up_group_id);
            }
        }

        return Redirect::away(url('admin/check-up-table/' . $table_id . '/edit?type_id=' . $typeId));
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
        $this->checkUpTableRepo->deleteCheckUpTable($id);

        return redirect('admin/check-up-table')->with('flash_message', 'Check Up Table deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->checkUpTableRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function checkup_table_translate()
    {
        $val = \request()->val;
        $name = \request()->name;
        $fields = [
            "name" => $name,
        ];
        $data = autoTranslate($val, $fields);
        return $data;
    }

    public function addCheckUpItems($item_id, $check_up_table_type_id, $check_up_type_id, $check_up_group_id)
    {
        $checkUpTableItems = CheckTableItem::create([
            'check_up_table_type_id' => $check_up_table_type_id,
            'check_up_type_id'       => $check_up_type_id,
            'check_up_group_id'       => $check_up_group_id,
            'check_up_item_id'       => $item_id,
        ]);
        return ($checkUpTableItems) ? $checkUpTableItems : false;
    }

    public function getCheckUpType(Request $request)
    {
        $check_up_type_id  = $request->checktypeid;
        $check_up_groups   = null;
        $check_type_id     = null;

        if (isset($check_up_type_id)) {
            if (count($check_up_type_id) > 1) {
                foreach ($check_up_type_id as $id) {
                    $check_up_groups   = DB::table('check_up_type_check_up_group')->where('check_up_type_id', $id)
                        ->leftJoin('check_up_groups', function ($join) {
                            return $join->on('check_up_type_check_up_group.check_up_group_id', '=', 'check_up_groups.id');
                        })
                        ->select('check_up_groups.*')->get();
                    $check_type_id    = $id;
                    // return response()->json(['check_up_groups' => $check_up_groups, 'check_type_id' => $check_type_id]);
                }
            } else {
                $check_up_groups   = DB::table('check_up_type_check_up_group')->where('check_up_type_id', $check_up_type_id[0])
                    ->leftJoin('check_up_groups', function ($join) {
                        return $join->on('check_up_type_check_up_group.check_up_group_id', '=', 'check_up_groups.id');
                    })
                    ->select('check_up_groups.*')->get();
                $check_type_id     = $check_up_type_id[0];

                return response()->json(['check_up_groups' => $check_up_groups, 'check_type_id' => $check_type_id]);
            }
            // dd($check_up_type_id, $id);
        }

        return response()->json(['check_up_groups' => $check_up_groups, 'check_type_id' => $check_type_id]);
    }


    public function getCheckUpGroup(Request $request)
    {
        $checkgroups        = $request->checkgroups;
        $check_up_items     = null;
        $check_group_id     = null;

        if (isset($checkgroups)) {
            if (count($checkgroups) > 1) {
                foreach ($checkgroups as $id) {
                    $check_up_items    = DB::table('check_up_group_check_up_item')->where('check_up_group_id', $id)
                        ->leftJoin('check_up_items', function ($join) {
                            return $join->on('check_up_group_check_up_item.check_up_item_id', '=', 'check_up_items.id');
                        })
                        ->select('check_up_items.*')->get();
                    $check_group_id    = $id;
                }
            } else {
                $check_up_items    = DB::table('check_up_group_check_up_item')->where('check_up_group_id', $checkgroups[0])
                    ->leftJoin('check_up_items', function ($join) {
                        return $join->on('check_up_group_check_up_item.check_up_item_id', '=', 'check_up_items.id');
                    })
                    ->select('check_up_items.*')->get();
                $check_group_id    = $checkgroups[0];

                return response()->json(['check_up_items' => $check_up_items, 'check_group_id' => $check_group_id]);
            }
        }

        return response()->json(['check_up_items' => $check_up_items, 'check_group_id' => $check_group_id]);
    }


    public function destorygp(Request $request)
    {
        CheckUpTableType::where('check_up_table_id',$request['table_id'])->where('check_up_type_id',$request['type_id'])->where('check_up_group_id',$request['group_id'])->delete();
        CheckTableItem::where('check_up_table_type_id',$request['table_id'])->where('check_up_type_id',$request['type_id'])->where('check_up_group_id',$request['group_id'])->delete();
        return redirect()->back()->with('flash_message', 'Check Up Group deleted!');;
    }
}
