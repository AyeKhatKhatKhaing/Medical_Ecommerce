<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\FooterFormRequest;
use App\Models\Footer;
use App\Repositories\FooterRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FootersController extends Controller
{
    use CheckPermission;

    public $page  =  'footer';

    protected $footerRepo;

    public function __construct(FooterRepo $footerRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->footerRepo = $footerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page   =  $this->page;
        $footer =  Footer::first();

        return view('admin.footers.edit',compact('footer', 'page'));
    }

    public function getData(Request $request)
    {
        return $this->footerRepo->getFooters($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        $footer=Footer::first();
        return view('admin.footers.create',compact('page','footer'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(FooterFormRequest $request)
    {
        $requestData = $request->all();

        $this->footerRepo->saveFooter($request);

        return redirect('admin/footers')->with('flash_message', 'Footer added!');
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
        $footer = Footer::findOrFail($id);

        return view('admin.footers.show', compact('footer'));
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
        $page    = $this->page;
        $footer  = $this->footerRepo->getFooter($id);

        return view('admin.footers.edit', compact('footer', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(FooterFormRequest $request)
    {
        $footers = $this->footerRepo->saveFooter($request);

        return redirect('admin/footer')->with('flash_message', 'Footer updated!');
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
        $this->footerRepo->deleteFooter($id);

        return redirect('admin/footers')->with('flash_message', 'Footer deleted!');
    }

    public function footer_translate(Request $request)
    {
        $data=$this->footerRepo->translateContent($request);
        return $data;

    }

}


