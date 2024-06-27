<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\MaritalStatusRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgeGroupRequest;
use App\Models\MaritalStatus;

class MaritalStatusController extends Controller
{
    use CheckPermission;

    public $page  =  'maritalstatus';

    protected $maritalStatusRepo;

    public function __construct(MaritalStatusRepo $maritalStatusRepo)
    {
        $this->checkPermission();
        $this->maritalStatusRepo         = $maritalStatusRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.marital-status.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->maritalStatusRepo->getMaritalStatusData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.marital-status.create', compact('page'));
    }

    public function store(AgeGroupRequest $request)
    {
        $this->maritalStatusRepo->saveMaritalStatus($request);

        return redirect('admin/maritalstatus')->with('flash_message', 'Marital Status added!');
    }

    public function show($id)
    {
        $maritalstatus = MaritalStatus::findOrFail($id);

        return view('admin.marital-status.show', compact('maritalstatus'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $maritalstatus = $this->maritalStatusRepo->getMaritalStatus($id);
        return view('admin.marital-status.edit', compact('maritalstatus', 'page'));
    }

    public function update(AgeGroupRequest $request, $id)
    {
        $maritalstatus = $this->maritalStatusRepo->saveMaritalStatus($request, $id);

        if ($maritalstatus) {
            return redirect()->route("maritalstatus.index")->with('flash_message', 'Marital Status Update!');
        } else {
            return redirect()->route("maritalstatus.index")->with('flash_message', 'Marital Status Update!');
        }

        return redirect('admin/maritalstatus')->with('flash_message', 'Marital Status updated!');
    }

    public function destroy($id)
    {
        $this->maritalStatusRepo->deleteMaritalStatus($id);

        return redirect('admin/maritalstatus')->with('flash_message', 'Marital Status deleted!');
    }

}
