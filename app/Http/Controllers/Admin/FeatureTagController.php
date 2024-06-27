<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\FeatureTagFormRequest;
use App\Models\FeatureTag;
use App\Repositories\FeatureTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;
class FeatureTagController extends Controller
{

    use CheckPermission;

    public $featureTag  =  'feature_tag';

    protected $featureTagRepo;

    public function __construct(FeatureTagRepo $featureTagRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkPermission();
        $this->featureTagRepo = $featureTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->featureTag;

        return view('admin.feature-tag.index',compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->featureTagRepo->getFeatureTags($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->featureTag;

        return view('admin.feature-tag.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(FeatureTagFormRequest $request)
    {
        $this->featureTagRepo->saveFeatureTag($request);

        return redirect('admin/feature-tag')->with('flash_message', 'FeatureTag added!');
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
        $featureTag = FeatureTag::findOrFail($id);

        return view('admin.feature-tag.show', compact('featureTag'));
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
        $page     = $this->featureTag;
        $feature_tag  = $this->featureTagRepo->getFeatureTag($id);

        return view('admin.feature-tag.edit', compact('feature_tag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(FeatureTagFormRequest $request, $id)
    {
        $featureTags = $this->featureTagRepo->saveFeatureTag($request,$id);

        if($featureTags) {
            return redirect()->route("feature-tag.index")->with('flash_message', 'FeatureTag Update!');
        }
        else {
            return redirect()->route("feature-tag.edit",$id)->with('flash_message', 'FeatureTag update!');

        }

        return redirect('admin/feature-tag')->with('flash_message', 'FeatureTag updated!');
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
        $this->featureTagRepo->deleteFeatureTag($id);

        return redirect('admin/feature-tag')->with('flash_message', 'FeatureTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->featureTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function feature_tag_translate(Request $request)
    {

        $data = $this->featureTagRepo->translateContent($request);

        return $data;

    }

}

