<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\SeoRepo;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;

class SeoPageController extends Controller
{

    use CheckPermission;

    public $page  =  'seo-page';

    protected $seoRepo;

    public function __construct(SeoRepo $seoRepo)
    {
        $this->middleware('role:admin');
        $this->checkPermission();
        $this->seoRepo = $seoRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page  = $this->page;
        return view('admin.seo.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page  = $this->page;
        return view('admin.seo.create', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->seoRepo->getSeoDate($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->seoRepo->saveSeo($request);
        return redirect('admin/seo-page')->with('flash_message', 'SEO added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $page  = $this->page;
        $seo  = $this->seoRepo->getSeo($id);
        return view('admin.seo.edit', compact('seo', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->seoRepo->saveSeo($request,$id);
        return redirect('admin/seo-page')->with('flash_message', 'SEO updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function statusChange(Request $request)
    {
        $status = $this->seoRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function seo_translate(Request $request)
    {

        $data = $this->seoRepo->translateContent($request);

        return $data;

    }
}
