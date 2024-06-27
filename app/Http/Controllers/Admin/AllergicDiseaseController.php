<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\AllergicDiseaseRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiseaseRequest;
use App\Models\AllergicDisease;

class AllergicDiseaseController extends Controller
{
    use CheckPermission;

    public $page  =  'allergicdisease';

    protected $diseaseRepo;

    public function __construct(AllergicDiseaseRepo $diseaseRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->diseaseRepo         = $diseaseRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.allergic-disease.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->diseaseRepo->getAllergicDiseaseData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.allergic-disease.create', compact('page'));
    }

    public function store(DiseaseRequest $request)
    {
        $this->diseaseRepo->saveAllergicDisease($request);

        return redirect('admin/allergicdisease')->with('flash_message', 'Allergic Disease added!');
    }

    public function show($id)
    {
        $disease = AllergicDisease::findOrFail($id);

        return view('admin.allergic-disease.show', compact('disease'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $disease = $this->diseaseRepo->getAllergicDisease($id);
        return view('admin.allergic-disease.edit', compact('disease', 'page'));
    }

    public function update(DiseaseRequest $request, $id)
    {
        $disease = $this->diseaseRepo->saveAllergicDisease($request, $id);

        if ($disease) {
            return redirect()->route("allergicdisease.index")->with('flash_message', 'Allergic Disease Update!');
        } else {
            return redirect()->route("allergicdisease.index")->with('flash_message', 'Allergic Disease Update!');
        }

        return redirect('admin/allergicdisease')->with('flash_message', 'Allergic Disease updated!');
    }

    public function destroy($id)
    {
        $this->diseaseRepo->deleteAllergicDisease($id);

        return redirect('admin/allergicdisease')->with('flash_message', 'Allergic Disease deleted!');
    }

}
