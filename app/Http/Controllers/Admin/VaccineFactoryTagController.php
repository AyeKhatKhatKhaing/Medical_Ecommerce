<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\VaccineFactoryTagFormRequest;
use App\Models\VaccineFactoryTag;
use App\Repositories\VaccineFactoryTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class VaccineFactoryTagController extends Controller
{

    use CheckPermission;

    public $vaccineFactoryTag  =  'vaccine_factory_tag';

    protected $vaccineFactoryTagRepo;

    public function __construct(VaccineFactoryTagRepo $vaccineFactoryTagRepo)
    {
        $this->middleware('role:admin,manager');
        $this->checkPermission();
        $this->vaccineFactoryTagRepo = $vaccineFactoryTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->vaccineFactoryTag;

        return view('admin.vaccine-factory-tag.index',compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->vaccineFactoryTagRepo->getVaccineFactoryTags($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->vaccineFactoryTag;

        return view('admin.vaccine-factory-tag.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(VaccineFactoryTagFormRequest $request)
    {
        $this->vaccineFactoryTagRepo->saveVaccineFactoryTag($request);

        return redirect('admin/vaccine-factory-tag')->with('flash_message', 'VaccineFactoryTag added!');
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
        $vaccineFactoryTag = VaccineFactoryTag::findOrFail($id);

        return view('admin.vaccine-factory-tag.show', compact('vaccineFactoryTag'));
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
        $page     = $this->vaccineFactoryTag;
        $vaccine_factory_tag  = $this->vaccineFactoryTagRepo->getVaccineFactoryTag($id);

        return view('admin.vaccine-factory-tag.edit', compact('vaccine_factory_tag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(VaccineFactoryTagFormRequest $request, $id)
    {
        $vaccineFactoryTags = $this->vaccineFactoryTagRepo->saveVaccineFactoryTag($request,$id);

        if($vaccineFactoryTags) {
            return redirect()->route("vaccine-factory-tag.index")->with('flash_message', 'VaccineFactoryTag Update!');
        }
        else {
            return redirect()->route("vaccine-factory-tag.edit",$id)->with('flash_message', 'VaccineFactoryTag update!');

        }

        return redirect('admin/vaccine-factory-tag')->with('flash_message', 'VaccineFactoryTag updated!');
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
        $this->vaccineFactoryTagRepo->deleteVaccineFactoryTag($id);

        return redirect('admin/vaccine-factory-tag')->with('flash_message', 'VaccineFactoryTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->vaccineFactoryTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function vaccine_factory_tag_translate(Request $request)
    {

        $data = $this->vaccineFactoryTagRepo->translateContent($request);

        return $data;

    }

}
