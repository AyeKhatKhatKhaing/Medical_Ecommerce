<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\HeaderFormRequest;
use App\Models\Header;
use App\Repositories\HeaderRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeadersController extends Controller
{
    use CheckPermission;

    public $page  =  'header';

    protected $headerRepo;

    public function __construct(HeaderRepo $headerRepo)
    {
        $this->checkPermission();
        $this->middleware('role:admin,marketing');
        $this->headerRepo = $headerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page   =  $this->page;
        $header =  Header::first();

        return view('admin.headers.edit', compact('header', 'page'));
    }

    public function getData(Request $request)
    {
        return $this->headerRepo->getHeaders($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        $header = Header::first();
        dd($header);
        return view('admin.headers.create', compact('page', 'header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(HeaderFormRequest $request)
    {
        $requestData = $request->all();

        $this->headerRepo->saveHeader($request);

        return redirect('admin/headers')->with('flash_message', 'Header added!');
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
        $header = Header::findOrFail($id);

        return view('admin.headers.show', compact('header'));
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
        $header  = $this->headerRepo->getHeader($id);

        return view('admin.headers.edit', compact('header', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(HeaderFormRequest $request)
    {
        $headers = $this->headerRepo->saveHeader($request);

        return redirect('admin/header')->with('flash_message', 'Header updated!');
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
        $this->headerRepo->deleteHeader($id);

        return redirect('admin/headers')->with('flash_message', 'Header deleted!');
    }

    public function header_translate(Request $request)
    {
        $data = $this->headerRepo->translateContent($request);
        return $data;
    }
    public function getSlideText(Request $request)
    {
        $slide_text_row = $request->slide_text_row;

        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html    = '<div class=" mt-4 new-slide-text-input' . $slide_text_row . '">

                            <div class="row">
                                <div class="form-group col-md-8 mt-4 mb-5">

                                    <input type="textarea" class="form-control editor" id="slide_text_' . $attr . $slide_text_row . '" name="slide_text_' . $attr . '[]" cols="50" rows="10"></input>
                                </div>
                                <div class="col-md-4 mt-4 mb-5 text-end">
                                    <button data-attr="' . $attr . '" type="button" class="removeSlideText_new' . $slide_text_row . ' btn btn-danger" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                </div>

                            </div>

                        </div>';
            array_push($returnHtml, $html);
        }

        return $returnHtml;
    }
}
