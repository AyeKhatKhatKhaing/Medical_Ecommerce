<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\RecommendTag;
use Illuminate\Http\Request;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;
use App\Repositories\RecommendTagRepo;
use App\Http\Requests\Admin\RecommendTagFormRequest;

class RecommendTagsController extends Controller
{

    use CheckPermission;

    public $page  =  'recommend_tag';

    protected $recommendTagRepo;

    public function __construct(RecommendTagRepo $recommendTagRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkPermission();
        $this->recommendTagRepo = $recommendTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $page  = $this->page;
        return view('admin.recommend-tags.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->recommendTagRepo->getRecommendTags($request);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;

        return view('admin.recommend-tags.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RecommendTagFormRequest $request)
    {

        $this->recommendTagRepo->saveRecommendTag($request);
        return redirect('admin/recommend-tags')->with('flash_message', 'RecommendTag added!');
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
        $recommendtag = RecommendTag::findOrFail($id);

        return view('admin.recommend-tags.show', compact('recommendtag'));
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
        $page          = $this->page;
        $recommendtag  = $this->recommendTagRepo->getRecommendTagData($id);

        return view('admin.recommend-tags.edit', compact('recommendtag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RecommendTagFormRequest $request, $id)
    {

        $recommendtag = $this->recommendTagRepo->saveRecommendTag($request,$id);

        if($recommendtag) {
            return redirect()->route("recommend-tags.index")->with('flash_message', 'RecommendTag Update!');
        }
        else {
            return redirect()->route("recommend-tags.edit",$id)->with('flash_message', 'RecommendTag update!');

        }

        return redirect('admin/recommend-tags')->with('flash_message', 'RecommendTag updated!');
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
        $this->recommendTagRepo->deleteRecommendTag($id);

        return redirect('admin/recommend-tags')->with('flash_message', 'RecommendTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->recommendTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function recommend_tag_translate(Request $request)
    {

        $data = $this->recommendTagRepo->translateContent($request);

        return $data;

    }

}
