<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\KeyItemTagFormRequest;
use App\Models\KeyItemTag;
use App\Repositories\KeyItemTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class KeyItemTagController extends Controller
{

    use CheckPermission;

    public $keyItemTag  =  'key_item_tag';

    protected $keyItemTagRepo;

    public function __construct(KeyItemTagRepo $keyItemTagRepo)
    {
        $this->checkPermission();
        $this->middleware('role:admin,marketing,manager');
        $this->keyItemTagRepo = $keyItemTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->keyItemTag;

        return view('admin.key-item-tag.index',compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->keyItemTagRepo->getKeyItemTags($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->keyItemTag;

        return view('admin.key-item-tag.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(KeyItemTagFormRequest $request)
    {
        $this->keyItemTagRepo->saveKeyItemTag($request);

        return redirect('admin/key-item-tag')->with('flash_message', 'KeyItemTag added!');
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
        $keyItemTag = KeyItemTag::findOrFail($id);

        return view('admin.key-item-tag.show', compact('keyItemTag'));
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
        $page     = $this->keyItemTag;
        $key_item_tag  = $this->keyItemTagRepo->getKeyItemTag($id);

        return view('admin.key-item-tag.edit', compact('key_item_tag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(KeyItemTagFormRequest $request, $id)
    {
        $keyItemTags = $this->keyItemTagRepo->saveKeyItemTag($request,$id);

        if($keyItemTags) {
            return redirect()->route("key-item-tag.index")->with('flash_message', 'KeyItemTag Update!');
        }
        else {
            return redirect()->route("key-item-tag.edit",$id)->with('flash_message', 'KeyItemTag update!');

        }

        return redirect('admin/key-item-tag')->with('flash_message', 'KeyItemTag updated!');
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
        $this->keyItemTagRepo->deleteKeyItemTag($id);

        return redirect('admin/key-item-tag')->with('flash_message', 'KeyItemTag deleted!');
    }
    public function statusChange(Request $request)
    {
        $status = $this->keyItemTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
    public function key_item_tag_translate(Request $request)
    {

        $data = $this->keyItemTagRepo->translateContent($request);

        return $data;

    }

}
