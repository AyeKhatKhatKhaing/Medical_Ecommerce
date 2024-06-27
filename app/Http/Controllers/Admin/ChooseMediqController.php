<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\ChooseMediqFormRequest;
use App\Models\ChooseMediq;
use App\Repositories\ChooseMediqRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ChooseMediqController extends Controller
{
    public $page  =  'choose_mediq';

    protected $chooseMediqRepo;

    public function __construct(ChooseMediqRepo $chooseMediqRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->chooseMediqRepo         = $chooseMediqRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page         = $this->page;
        $choosemediq  = ChooseMediq::first();
        return view('admin.choose-mediq.edit', compact('page', 'choosemediq'));
    }

    // public function getData(Request $request)
    // {
    //     return $this->chooseMediqRepo->getAbouts($request);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page         = $this->page;

        return view('admin.choose-mediq.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ChooseMediqFormRequest $request)
    {

        $this->chooseMediqRepo->saveChooseMediq($request);

        return redirect('admin/choose-mediq')->with('flash_message', 'Choose MediQ added!');
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
        $chooseMediq = ChooseMediq::findOrFail($id);

        return view('admin.choose-mediq.show', compact('chooseMediq'));
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
        $page         = $this->page;
        $choosemediq  = $this->chooseMediqRepo->getChooseMediq($id);

        return view('admin.choose-mediq.edit', compact('choosemediq', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ChooseMediqFormRequest $request)
    {

        $chooseMediqs = $this->chooseMediqRepo->saveChooseMediq($request);

        return redirect('admin/choose-mediq')->with('flash_message', 'Choose MediQ updated!');
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
        $this->chooseMediqRepo->deleteChooseMediq($id);

        return redirect('admin/choose-mediq')->with('flash_message', 'Choose MediQ deleted!');
    }

    public function choose_mediq_translate(Request $request)
    {
        $data = $this->chooseMediqRepo->translateContent($request);

        return $data;

    }

}
