<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\DoseTag;

use Illuminate\Http\Request;
use App\Traits\CheckPermission;
use App\Repositories\DoseTagRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoseTagFormRequest;

class DoseTagController extends Controller
{
    use CheckPermission;

    public $page  =  'dose_tag';

    protected $doseTagRepo;

    public function __construct(DoseTagRepo $doseTagRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->doseTagRepo = $doseTagRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;
        // return view('admin.dose-tag.index', compact('page'));

        return view('admin.dose-tag.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->doseTagRepo->getDoseTags($request);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->page;

        return view('admin.dose-tag.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DoseTagFormRequest $request)
    {
        $this->doseTagRepo->saveDoseTag($request);

        return redirect('admin/dose-tag')->with('flash_message', 'DoseTag added!');
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
        $dosetag = DoseTag::findOrFail($id);

        return view('admin.dose-tag.show', compact('dosetag'));
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
        $page     = $this->page;
        $dosetag  = $this->doseTagRepo->getDoseTagData($id);

        return view('admin.dose-tag.edit', compact('dosetag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(DoseTagFormRequest $request, $id)
    {

        $dosetag = $this->doseTagRepo->saveDoseTag($request,$id);

        if($dosetag) {
            return redirect()->route("dose-tag.index")->with('flash_message', 'DoseTag Update!');
        }
        else {
            return redirect()->route("dose-tag.edit",$id)->with('flash_message', 'DoseTag update!');

        }

        return redirect('admin/dose-tag')->with('flash_message', 'DoseTag updated!');
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
        $this->doseTagRepo->deleteDoseTag($id);

        return redirect('admin/dose-tag')->with('flash_message', 'DoseTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->doseTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function dose_tag_translate(Request $request)
    {

        $data = $this->doseTagRepo->translateContent($request);

        return $data;

    }
}
