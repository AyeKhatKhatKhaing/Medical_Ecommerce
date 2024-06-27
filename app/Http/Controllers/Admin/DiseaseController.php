<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\DiseaseRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiseaseRequest;
use App\Models\Disease;

class DiseaseController extends Controller
{
    use CheckPermission;

    public $page  =  'disease';

    protected $diseaseRepo;

    public function __construct(DiseaseRepo $diseaseRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->diseaseRepo         = $diseaseRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.disease.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->diseaseRepo->getDiseaseData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.disease.create', compact('page'));
    }

    public function store(DiseaseRequest $request)
    {
        $this->diseaseRepo->saveDisease($request);

        return redirect('admin/disease')->with('flash_message', 'Disease added!');
    }

    public function show($id)
    {
        $disease = Disease::findOrFail($id);

        return view('admin.disease.show', compact('disease'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $disease = $this->diseaseRepo->getDisease($id);
        return view('admin.disease.edit', compact('disease', 'page'));
    }

    public function update(DiseaseRequest $request, $id)
    {
        $disease = $this->diseaseRepo->saveDisease($request, $id);

        if ($disease) {
            return redirect()->route("disease.index")->with('flash_message', 'Disease Update!');
        } else {
            return redirect()->route("disease.index")->with('flash_message', 'Disease Update!');
        }

        return redirect('admin/disease')->with('flash_message', 'Disease updated!');
    }

    public function destroy($id)
    {
        $this->diseaseRepo->deleteDisease($id);

        return redirect('admin/disease')->with('flash_message', 'Disease deleted!');
    }

}
