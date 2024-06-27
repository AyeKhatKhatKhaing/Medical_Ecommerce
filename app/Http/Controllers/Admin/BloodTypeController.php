<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\BloodTypeRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgeGroupRequest;
use App\Models\BloodType;

class BloodTypeController extends Controller
{
    use CheckPermission;

    public $page  =  'bloodtype';

    protected $bloodTypeRepo;

    public function __construct(BloodTypeRepo $bloodTypeRepo)
    {
        $this->checkPermission();
        $this->bloodTypeRepo         = $bloodTypeRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.blood-type.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->bloodTypeRepo->getBloodTypeData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.blood-type.create', compact('page'));
    }

    public function store(AgeGroupRequest $request)
    {
        $this->bloodTypeRepo->saveBloodType($request);

        return redirect('admin/bloodtype')->with('flash_message', 'Blood Type added!');
    }

    public function show($id)
    {
        $bloodtype = BloodType::findOrFail($id);

        return view('admin.blood-type.show', compact('bloodtype'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $bloodtype = $this->bloodTypeRepo->getBloodType($id);
        return view('admin.blood-type.edit', compact('bloodtype', 'page'));
    }

    public function update(AgeGroupRequest $request, $id)
    {
        $bloodtype = $this->bloodTypeRepo->saveBloodType($request, $id);

        if ($bloodtype) {
            return redirect()->route("bloodtype.index")->with('flash_message', 'Blood Type Update!');
        } else {
            return redirect()->route("bloodtype.index")->with('flash_message', 'Blood Type Update!');
        }

        return redirect('admin/bloodtype')->with('flash_message', 'Blood Type updated!');
    }

    public function destroy($id)
    {
        $this->bloodTypeRepo->deleteBloodType($id);

        return redirect('admin/bloodtype')->with('flash_message', 'Blood Type deleted!');
    }

}
