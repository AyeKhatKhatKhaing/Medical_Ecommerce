<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\MainTypeAlcoholRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiseaseRequest;
use App\Models\MainTypeAlcohol;

class MainTypeAlcoholController extends Controller
{
    use CheckPermission;

    public $page  =  'maintypealcohol';

    protected $mainTypeAlcoholRepo;

    public function __construct(MainTypeAlcoholRepo $mainTypeAlcoholRepo)
    {
        $this->checkPermission();
        $this->mainTypeAlcoholRepo         = $mainTypeAlcoholRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.main-type-alcohol.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->mainTypeAlcoholRepo->getMainTypeAlcoholData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.main-type-alcohol.create', compact('page'));
    }

    public function store(DiseaseRequest $request)
    {
        $this->mainTypeAlcoholRepo->saveMainTypeAlcohol($request);

        return redirect('admin/maintypealcohol')->with('flash_message', 'Main Type Alcohol added!');
    }

    public function show($id)
    {
        $disease = MainTypeAlcohol::findOrFail($id);

        return view('admin.main-type-alcohol.show', compact('disease'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $maintypealcohol = $this->mainTypeAlcoholRepo->getMainTypeAlcohol($id);
        return view('admin.main-type-alcohol.edit', compact('maintypealcohol', 'page'));
    }

    public function update(DiseaseRequest $request, $id)
    {
        $disease = $this->mainTypeAlcoholRepo->saveMainTypeAlcohol($request, $id);

        if ($disease) {
            return redirect()->route("maintypealcohol.index")->with('flash_message', 'Main Type Alcohol Update!');
        } else {
            return redirect()->route("maintypealcohol.index")->with('flash_message', 'Main Type Alcohol Update!');
        }

        return redirect('admin/maintypealcohol')->with('flash_message', 'Main Type Alcohol updated!');
    }

    public function destroy($id)
    {
        $this->mainTypeAlcoholRepo->deleteMainTypeAlcohol($id);

        return redirect('admin/maintypealcohol')->with('flash_message', 'Main Type Alcohol deleted!');
    }

}
