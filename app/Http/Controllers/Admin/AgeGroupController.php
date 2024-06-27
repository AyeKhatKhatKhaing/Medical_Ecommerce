<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\AgeGroupRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgeGroupRequest;
use App\Models\AgeGroup;

class AgeGroupController extends Controller
{
    use CheckPermission;

    public $page  =  'agegroup';

    protected $ageGroupRepo;

    public function __construct(AgeGroupRepo $ageGroupRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->ageGroupRepo         = $ageGroupRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.age-group.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->ageGroupRepo->getAgeGroupData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.age-group.create', compact('page'));
    }

    public function store(AgeGroupRequest $request)
    {
        $this->ageGroupRepo->saveAgeGroup($request);

        return redirect('admin/agegroup')->with('flash_message', 'Age Group added!');
    }

    public function show($id)
    {
        $agegroup = AgeGroup::findOrFail($id);

        return view('admin.age-group.show', compact('agegroup'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $agegroup = $this->ageGroupRepo->getAgeGroup($id);
        return view('admin.age-group.edit', compact('agegroup', 'page'));
    }

    public function update(AgeGroupRequest $request, $id)
    {
        $agegroup = $this->ageGroupRepo->saveAgeGroup($request, $id);

        if ($agegroup) {
            return redirect()->route("agegroup.index")->with('flash_message', 'Age Group Update!');
        } else {
            return redirect()->route("agegroup.index")->with('flash_message', 'Age Group Update!');
        }

        return redirect('admin/agegroup')->with('flash_message', 'Age Group updated!');
    }

    public function destroy($id)
    {
        $this->ageGroupRepo->deleteAgeGroup($id);

        return redirect('admin/agegroup')->with('flash_message', 'Age Group deleted!');
    }

}
