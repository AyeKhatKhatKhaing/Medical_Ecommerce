<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Package;

use App\Models\TableTitle;
use App\Models\TableColumn;
use App\Models\TableHeader;
use App\Models\CheckUpTable;
use Illuminate\Http\Request;
use App\Models\User as Merchant;
use App\Repositories\PackageRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageFormRequest;

class PackagesController extends Controller
{
    public $page  =  'package';

    protected $package;

    public function __construct(PackageRepo $package)
    {
        $this->middleware('role:admin,marketing,manager');
        $this->package = $package;
    }

    public function index(Request $request)
    {

        $page = $this->page;
        return view('admin.packages.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->package->getData($request);
    }

    public function create()
    {
        $page   = $this->page;
        $checkUpTables = CheckUpTable::get();
        $merchants = Merchant::where('is_merchant', true)->get();
        return view('admin.packages.create', compact('checkUpTables', 'merchants', 'page'));
    }


    public function store(PackageFormRequest $request)
    {
    //    dd($request->all());
        $requestData = $request->all();
        if(!existImagePath($requestData['img'])){
            $requestData['img'] = null ;
        }else{
            $requestData['img'] = getImage($request->img) ;
        }
    //    dd( $requestData['img']);
        $requestData['is_published']  = $request->is_published == 'on' ? 1 : 0;
        $package = Package::create($requestData);
        if (isset($requestData['tableHeaders']) && count($requestData['tableHeaders']) > 0) {
            foreach ($requestData['tableHeaders'] as $item) {
                $this->addHeaders($package->id, $item);
            }
        }
        if (isset($requestData['tableTitles']) && count($requestData['tableTitles']) > 0) {
            foreach ($requestData['tableTitles'] as $key => $item) {
                $title = $this->addTitles($package->id, $item);
                if(isset($item['tableColumns']) && $item['tableColumns'] != null && array_key_exists($key, $requestData['tableTitles'])){
                    foreach($item['tableColumns']  as $column){
                        $this->addColumns($package->id,$title->id,$column);
                    }
                }
            }
        }
        return redirect('admin/packages')->with('flash_message', 'Package added!');
    }

    public function show($id)
    {
        $package = Package::findOrFail($id);

        return view('admin.packages.show', compact('package'));
    }


    public function edit($id)
    {
        $page   = $this->page;
        $checkUpTables = CheckUpTable::get();
        $merchants = Merchant::where('is_merchant', true)->get();
        $package = Package::findOrFail($id);
        $tableColumns = $package->tableTitles()->with(['tableColumns'])->get();
        $ptitleCols = [];
        $pv = $package->load(['tableTitles.tableColumns']);
        foreach ($pv->tableTitles as $key => $pvs) {
            $ptitleCols[$key] = $pvs;
            $eachCols = [];
            foreach ($pvs->tableColumns as $pkey => $pValue) {
                $eachCols[$pkey] = [
                    "col_name_en" => $pValue->col_name_en,
                    "col_name_tc" => $pValue->col_name_tc,
                    "col_name_sc" => $pValue->col_name_sc,
                ];
            }
            $ptitleCols[$key]['tableColumns'] = $eachCols;
        }

        return view('admin.packages.edit', compact('package', 'checkUpTables', 'merchants', 'page','tableColumns','ptitleCols'));
    }

    public function update(PackageFormRequest $request, $id)
    {
        $requestData = $request->all();
        if(!existImagePath($requestData['img'])){
            $requestData['img'] = null ;
        }else{
            $requestData['img'] = getImage($request->img) ;
        }
    //    dd( $requestData['img']);

        $requestData['is_published']  = $request->is_published == 'on' ? 1 : 0;

        $package = Package::findOrFail($id);

        $package->update($requestData);

        if (isset($requestData['tableHeaders']) && count($requestData['tableHeaders']) > 0) {

            $this->removeTableHeaderBy($id);

            foreach ($requestData['tableHeaders'] as $item) {

                $this->addHeaders($id, $item);
            }
        }
        if (isset($requestData['tableTitles']) && count($requestData['tableTitles']) > 0) {

            $this->removeTableTitleBy($id);

            $this->removeTableColumnBy($id);
            foreach ($requestData['tableTitles'] as $key => $item) {

                $title = $this->addTitles($id, $item);

                if(isset($item['tableColumns']) &&  array_key_exists($key, $requestData['tableTitles'])){

                    foreach($item['tableColumns']  as $column){

                        $this->addColumns($id, $title->id, $column);

                    }
                }
            }
        }
        return redirect('admin/packages')->with('flash_message', 'Package updated!');
    }

    public function destroy($id)
    {
        Package::destroy($id);

        return redirect('admin/packages')->with('flash_message', 'Package deleted!');
    }

    public function package_translate()
    {
        $val = \request()->val;
        $name = \request()->name;
        $content = \request()->cont;
        $fields = [
            "name" => $name,
            "content" => $content,
        ];
        $data = autoTranslate($val, $fields);
        return $data;
    }

    public function statusChange(Request $request)
    {
        $status = $this->package->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function removeTableHeaderBy($package_id)
    {
        TableHeader::where('package_id', $package_id)->delete();
    }

    public function removeTableTitleBy($package_id)
    {
        TableTitle::where('package_id', $package_id)->delete();
    }

    public function removeTableColumnBy($package_id)
    {
        TableColumn::where('package_id', $package_id)->delete();
    }

    public function addHeaders($package_id, $item)
    {
        if($item['header_en'] != null){
            $header = TableHeader::create([
            'package_id' => $package_id,
            'header_en' => $item['header_en'] ?? null,
            'header_tc' => $item['header_tc'] ?? null,
            'header_sc' => $item['header_sc'] ?? null,
            ]);
            return $header? $header : false;
        }
    }

    public function addTitles($package_id, $item)
    {
        if($item['title_en'] != null){
            $title = TableTitle::create([
            'package_id' => $package_id,
            'title_en' => $item['title_en'] ?? null,
            'title_tc' => $item['title_tc'] ?? null,
            'title_sc' => $item['title_sc'] ?? null,
            ]);
            return $title? $title : false;
        }
    }

    public function addColumns($package_id,$title_id, $item)
    {
        if($item['col_name_en'] != null){
            $column = TableColumn::create([
            'package_id' => $package_id,
            'table_title_id' => $title_id,
            'col_name_en' => $item['col_name_en'] ?? null,
            'col_name_tc' => $item['col_name_tc'] ?? null,
            'col_name_sc' => $item['col_name_sc'] ?? null,
            ]);
            return $column? $column : false;
        }
    }
}
