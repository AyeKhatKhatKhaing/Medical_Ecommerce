<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Supplementary;
use App\Repositories\SupplementaryRepo;
use Illuminate\Http\Request;

class SupplementaryController extends Controller
{
    public $page  = 'supplementary';

    protected $supplementaryRepo;

    public function __construct(SupplementaryRepo $supplementaryRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->supplementaryRepo = $supplementaryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.supplementary.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->supplementaryRepo->getSupplementary($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;

        return view('admin.supplementary.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->supplementaryRepo->saveSupplementary($request);

        return redirect('admin/supplementary')->with('flash_message', 'Supplementary added!');
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
        $supplementary = Supplementary::findOrFail($id);

        return view('admin.supplementary.show', compact('supplementary'));
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
        $supplementary = $this->supplementaryRepo->getSupplementaryData($id);

        return view('admin.supplementary.edit', compact('supplementary', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $supplementary = $this->supplementaryRepo->saveSupplementary($request,$id);

        if($supplementary) {
            return redirect()->route("supplementary.index")->with('flash_message', 'faq Update!');
        }
        else {
            return redirect()->route("supplementary.edit",$id)->with('flash_message', 'faq update!');

        }

        return redirect('admin/supplementary')->with('flash_message', 'Supplementary updated!');
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
        $this->supplementaryRepo->deleteSupplementary($id);

        return redirect('admin/supplementary')->with('flash_message', 'Supplementary deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->supplementaryRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }


}
