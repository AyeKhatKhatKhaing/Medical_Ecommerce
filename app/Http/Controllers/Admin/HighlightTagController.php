<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HighlightTagFormRequest;
use App\Models\HighlightTag;
use App\Repositories\HighlightTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class HighlightTagController extends Controller
{

    use CheckPermission;

    public $highlight  =  'highlight_tag';

    protected $highlightRepo;

    public function __construct(HighlightTagRepo $highlightRepo)
    {
        $this->checkPermission();
        $this->middleware('role:admin,manager,marketing');
        $this->highlightRepo = $highlightRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->highlight;

        return view('admin.highlight-tag.index',compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->highlightRepo->getHighlightTags($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->highlight;

        return view('admin.highlight-tag.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(HighlightTagFormRequest $request)
    {
        $this->highlightRepo->saveHighlightTag($request);

        return redirect('admin/highlight-tag')->with('flash_message', 'HighlightTag added!');
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
        $highlight = HighlightTag::findOrFail($id);

        return view('admin.highlight-tag.show', compact('highlight'));
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
        $page     = $this->highlight;
        $highlight_tag  = $this->highlightRepo->getHighlightTag($id);

        return view('admin.highlight-tag.edit', compact('highlight_tag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(HighlightTagFormRequest $request, $id)
    {
        $highlights = $this->highlightRepo->saveHighlightTag($request,$id);

        if($highlights) {
            return redirect()->route("highlight-tag.index")->with('flash_message', 'HighlightTag Update!');
        }
        else {
            return redirect()->route("highlight-tag.edit",$id)->with('flash_message', 'HighlightTag update!');

        }

        return redirect('admin/highlight-tag')->with('flash_message', 'HighlightTag updated!');
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
        $this->highlightRepo->deleteHighlightTag($id);

        return redirect('admin/highlight-tag')->with('flash_message', 'HighlightTag deleted!');
    }
    public function statusChange(Request $request)
    {
        $status = $this->highlightRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function highlight_tag_translate(Request $request)
    {

        $data = $this->highlightRepo->translateContent($request);

        return $data;

    }

}
