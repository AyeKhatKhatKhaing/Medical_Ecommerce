<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\VaccineRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VaccineRequest;
use App\Models\Vaccine;

class VaccineController extends Controller
{
    use CheckPermission;

    public $page  =  'vaccine';

    protected $vaccineRepo;

    public function __construct(VaccineRepo $vaccineRepo)
    {
        $this->middleware('role:admin,manager');
        $this->checkPermission();
        $this->vaccineRepo         = $vaccineRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.vaccine.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->vaccineRepo->getVaccineData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.vaccine.create', compact('page'));
    }

    public function store(VaccineRequest $request)
    {
        $this->vaccineRepo->saveVaccine($request);

        return redirect('admin/vaccine')->with('flash_message', 'Vaccine added!');
    }

    public function show($id)
    {
        $vaccine = Vaccine::findOrFail($id);

        return view('admin.vaccine.show', compact('vaccine'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $vaccine = $this->vaccineRepo->getVaccine($id);
        return view('admin.vaccine.edit', compact('vaccine', 'page'));
    }

    public function update(VaccineRequest $request, $id)
    {
        $vaccine = $this->vaccineRepo->saveVaccine($request, $id);

        if ($vaccine) {
            return redirect()->route("vaccine.index")->with('flash_message', 'Vaccine Update!');
        } else {
            return redirect()->route("vaccine.index")->with('flash_message', 'Vaccine Update!');
        }

        return redirect('admin/vaccine')->with('flash_message', 'Vaccine updated!');
    }

    public function destroy($id)
    {
        $this->vaccineRepo->deleteVaccine($id);

        return redirect('admin/vaccine')->with('flash_message', 'Vaccine deleted!');
    }

}
