<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\TerritoryFormRequest;
use App\Models\Territory;
use App\Repositories\TerritoryRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class TerritoriesController extends Controller
{
    use CheckPermission;

    public $page  =  'territory';

    protected $territoryRepo;

    public function __construct(TerritoryRepo $territoryRepo)
    {
        $this->middleware('role:admin,manager');
        $this->checkPermission();
        $this->territoryRepo = $territoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.territories.index',compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->territoryRepo->getTerritories($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page        = $this->page;
        $territory   = Territory::first();

        return view('admin.territories.create',compact('page','territory'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TerritoryFormRequest $request)
    {
        $this->territoryRepo->saveTerritory($request);

        return redirect('admin/territories')->with('flash_message', 'Territory added!');
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
        $territory = Territory::findOrFail($id);

        return view('admin.territories.show', compact('territory'));
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
        $page       = $this->page;
        $territory  = $this->territoryRepo->getTerritory($id);

        return view('admin.territories.edit', compact('territory', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TerritoryFormRequest $request, $id)
    {
        $territories = $this->territoryRepo->saveTerritory($request,$id);

        if($territories) {
            return redirect()->route("territories.index")->with('flash_message', 'Territory Update!');
        }
        else {
            return redirect()->route("territories.edit",$id)->with('flash_message', 'Territory update!');
        }

        return redirect('admin/territories')->with('flash_message', 'Territory updated!');
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
        $this->territoryRepo->deleteTerritory($id);

        return redirect('admin/territories')->with('flash_message', 'Territory deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->territoryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function territory_translate(Request $request)
    {
        $data=$this->territoryRepo->translateContent($request);
        return $data;
    }

}

