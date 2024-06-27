<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\SubKeyItemTagFormRequest;
use App\Models\SubKeyItemTag;
use App\Models\KeyItemTag;
use App\Models\Territory;
use App\Repositories\SubKeyItemTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class SubKeyItemTagController extends Controller
{

    use CheckPermission;

    public $page  =  'sub_key_item_tag';

    protected $subKeyItemTagRepo;

    public function __construct(SubKeyItemTagRepo $subKeyItemTagRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->subKeyItemTagRepo = $subKeyItemTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page        = $this->page;
        $key_item_tags = KeyItemTag::get(['id', 'name_en']);

        return view('admin.sub-key-item-tag.index',compact('page', 'key_item_tags'));
    }

    public function getData(Request $request)
    {
        return $this->subKeyItemTagRepo->getSubKeyItemTags($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page        = $this->page;
        $key_item_tags = KeyItemTag::pluck('name_en', 'id');

        return view('admin.sub-key-item-tag.create',compact('page','key_item_tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SubKeyItemTagFormRequest $request)
    {
        $this->subKeyItemTagRepo->saveSubKeyItemTag($request);

        return redirect('admin/sub-key-item-tag')->with('flash_message', 'SubKeyItemTag added!');
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
        $subKeyItemTag = SubKeyItemTag::findOrFail($id);

        return view('admin.sub-key-item-tag.show', compact('subKeyItemTag'));
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
        $page        = $this->page;
        $sub_key_item_tag    = $this->subKeyItemTagRepo->getSubKeyItemTag($id);
        $key_item_tags = KeyItemTag::pluck('name_en', 'id');

        return view('admin.sub-key-item-tag.edit', compact('sub_key_item_tag', 'page','key_item_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SubKeyItemTagFormRequest $request, $id)
    {
        $subKeyItemTags = $this->subKeyItemTagRepo->saveSubKeyItemTag($request,$id);

        if($subKeyItemTags) {
            return redirect()->route("sub-key-item-tag.index")->with('flash_message', 'SubKeyItemTag Update!');
        }
        else {
            return redirect()->route("sub-key-item-tag.edit",$id)->with('flash_message', 'SubKeyItemTag update!');
        }

        return redirect('admin/sub-key-item-tag')->with('flash_message', 'SubKeyItemTag updated!');
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
        $this->subKeyItemTagRepo->deleteSubKeyItemTag($id);

        return redirect('admin/sub-key-item-tag')->with('flash_message', 'SubKeyItemTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->subKeyItemTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function sub_key_item_tag_translate(Request $request)
    {
        $data=$this->subKeyItemTagRepo->translateContent($request);
        return $data;

    }

}

