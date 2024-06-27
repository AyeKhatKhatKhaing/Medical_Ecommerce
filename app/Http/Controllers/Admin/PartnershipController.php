<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partnership;
use App\Models\PartnershipDetail;
use App\Models\PartnershipHelp;
use App\Repositories\PartnershipRepo;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page  =  'partnership';

    protected $partner;

    public function __construct(PartnershipRepo $partner)
    {
        $this->middleware('role:admin,marketing');
        $this->partner         = $partner;
    }
    public function index()
    {
        //
        $page         = $this->page;
        $partnership        = Partnership::first();
        // dd($partnership);
        $partnership_detail        = PartnershipDetail::get();
        $partnership_help       = PartnershipHelp::get();
        return view('admin.partnership.index', compact('page', 'partnership', 'partnership_detail','partnership_help'));
    }


    public function getPartnershiphelp(Request $request)
    {
        $awesome_booking_row = $request->awesome_booking_row;
        $imagePath = asset('/backend/media/blank-image.svg');
        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html    = '
            <div class="card mt-4 border new-awesome_booking-input' . $awesome_booking_row . '">
                <div class="card-body" style="background-color: #f5f8fa;">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button data-attr="' . $attr . '" type="button"
                                class="removeAwesomeBooking' . $awesome_booking_row . ' btn btn-danger"
                                style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                        </div>
                    </div>
                    <div class="form-group mt-4 mb-5">
                        <div class="row mb-4">
                            <div class="">
                                <label class="form-label required">Name (' . $lngcode . ')</label>
                                <input type="text" class="form-control" id="help_subtitle_' . $attr . $awesome_booking_row . '"
                                    name="help_subtitle_' . $attr . '[]">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4 mb-5">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="form-label required">Description(' . $lngcode . ')</label>
                            </div>
                        </div>
                        <textarea class="form-control editor" id="help_description_' . $attr . $awesome_booking_row . '"
                            name="help_description_' . $attr . '[]" cols="50" rows="10"></textarea>
                    </div>
                </div>
            </div>
            ';
            array_push($returnHtml, $html);
        }

        return $returnHtml;
    }
    public function getPartnershipdetail(Request $request)
    {
        $details = $request->details;
        $imagePath = asset('/backend/media/blank-image.svg');
        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html    = '
            <div class="card mt-4 border new-details-input' . $details . '">
            <div class="card-body" style="background-color: #f5f8fa;">
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button data-attr="' . $attr . '" type="button" class="removeDetails' . $details . ' btn btn-danger"
                            style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                    </div>
                </div>
                <div class="form-group mt-4 mb-5">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Title with color (' . $lngcode . ')</label>
                                <input type="text" class="form-control" id="title_' . $attr . $details . '"
                                    name="title_' . $attr . '[]">
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label">Title without color (' . $lngcode . ')</label>
                                <input type="text" class="form-control" id="title1_' . $attr . $details . '"
                                    name="title1_' . $attr . '[]">
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label">Link Text (' . $lngcode . ')</label>
                                <input type="text" class="form-control" id="link_text_' . $attr . $details . '"
                                    name="link_text_' . $attr . '[]">
                            </div>

                            <div class="mb-3">
                            <label class="form-label">Link (' . $lngcode . ')</label>
                            <input type="text" class="form-control" id="link_' . $attr . $details . '"
                                name="link_' . $attr . '[]">
                            </div>
        
                        </div>
        
                        <div class="col-md-6">
                            <div class="card-body pt-0">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        <span style="color: #B5B5C3">Image
                                            Size(1200 x
                                            630)px</span>
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        <div id="holder-image">
                                            <img src="' . $imagePath . '" class="img-thumbnail">
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-image" data-input="image"
                                                    data-preview="holder-image"
                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                    <i class="bi bi-image-fill me-2"></i>Select
                                                    File
                                                </a>
                                            </span>
                                            <input id="image" class="form-control" type="text" name="image[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
                <div class="form-group mt-4 mb-5">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label required">Description(' . $lngcode . ')</label>
                        </div>
                    </div>
                    <textarea class="form-control editor" id="description_' . $attr . $details . '"
                        name="description_' . $attr . '[]" cols="50" rows="10"></textarea>
                </div>
            </div>
        </div>
            ';
            array_push($returnHtml, $html);
        }

        return $returnHtml;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $partner               = $this->partner->savepartnership($request);
        $partner_detail        = $this->partner->savePartnershipDetail($request);
        $partner_help       = $this->partner->savePartnershipHelp($request);
        return redirect()->route('partnership.index')->with('flash-message', 'Data added!');

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
        $partner               = $this->partner->savepartnership($request);
        $partner_detail        = $this->partner->savePartnershipDetail($request);
        $partner_help       = $this->partner->savePartnershipHelp($request);
        return redirect()->route('partnership.index')->with('flash-message', 'Data updated!');

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
}
