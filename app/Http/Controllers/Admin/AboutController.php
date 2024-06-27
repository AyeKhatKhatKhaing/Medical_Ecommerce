<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\AboutFormRequest;
use App\Models\About;
use App\Models\Empower;
use App\Repositories\AboutRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AboutController extends Controller
{
    public $page  =  'about';

    protected $aboutRepo;

    public function __construct(AboutRepo $aboutRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,marketing');
        $this->aboutRepo         = $aboutRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page         = $this->page;
        $about        = About::first();
        $empower         = Empower::first();

        return view('admin.about.edit', compact('page', 'about','empower'));
    }

    public function getData(Request $request)
    {
        return $this->aboutRepo->getAbouts($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page         = $this->page;

        return view('admin.about.create', compact('page'));
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

        $this->aboutRepo->saveAbout($request);

        return redirect('admin/about')->with('flash_message', 'About added!');
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
        $about = About::findOrFail($id);

        return view('admin.about.show', compact('about'));
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
        $about         = $this->aboutRepo->getAbout($id);
        $empower         = Empower::first();

        return view('admin.about.edit', compact('about', 'page','empower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {

        $abouts = $this->aboutRepo->saveAbout($request);

        return redirect('admin/about')->with('flash_message', 'About updated!');
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
        $this->aboutRepo->deleteAbout($id);

        return redirect('admin/about')->with('flash_message', 'About deleted!');
    }

    public function about_translate(Request $request)
    {
        $data = $this->aboutRepo->translateContent($request);

        return $data;

    }

}
