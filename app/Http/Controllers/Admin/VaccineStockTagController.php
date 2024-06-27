<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\VaccineStockTag;
use App\Repositories\VaccineStockTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class VaccineStockTagController extends Controller
{
    use CheckPermission;

    public $page  =  'vaccine_stock_tag';

    protected $vaccineStockTagRepo;

    public function __construct(VaccineStockTagRepo $vaccineStockTagRepo)
    {
        $this->middleware('role:admin,manager');
        $this->checkPermission();
        $this->vaccineStockTagRepo = $vaccineStockTagRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page   = $this->page;

        return view('admin.vaccine-stock-tag.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->vaccineStockTagRepo->getVaccineStockTag($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->page;

        return view('admin.vaccine-stock-tag.create', compact('page'));
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
        $this->vaccineStockTagRepo->saveVaccineStockTag($request);

        return redirect('admin/vaccine-stock-tag')->with('flash_message', 'VaccineStockTag added!');
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
        $vaccinestocktag = VaccineStockTag::findOrFail($id);

        return view('admin.vaccine-stock-tag.show', compact('vaccinestocktag'));
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
        $page                 = $this->page;
        $vaccinestocktag      = $this->vaccineStockTagRepo->getVaccineStockTagData($id);

        return view('admin.vaccine-stock-tag.edit', compact('vaccinestocktag', 'page'));
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
        $vaccineStockTag = $this->vaccineStockTagRepo->saveVaccineStockTag($request,$id);

        if($vaccineStockTag) {
            return redirect()->route("vaccine-stock-tag.index")->with('flash_message', 'Vaccine Stock Tag Update!');
        }
        else {
            return redirect()->route("vaccine-stock-tag.edit",$id)->with('flash_message', 'Vaccine Stock Tag update!');

        }

        return redirect('admin/vaccine-stock-tag')->with('flash_message', 'VaccineStockTag updated!');
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
        $this->vaccineStockTagRepo->deleteVaccineStockTag($id);

        return redirect('admin/vaccine-stock-tag')->with('flash_message', 'VaccineStockTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->vaccineStockTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }


}
