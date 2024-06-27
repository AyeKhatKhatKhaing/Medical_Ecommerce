<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestPrice;
use App\Models\BestPriceDetail;
use App\Repositories\BestPriceRepo;
use Illuminate\Http\Request;

class BestPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page  =  'best_price';

    protected $best_price;

    public function __construct(BestPriceRepo $best_price)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,marketing');
        $this->best_price         = $best_price;
    }

    public function index(Request $request)
    {
        //
        $page         = $this->page;
        $best_price        = BestPrice::first();
        $best_price_detail        = BestPriceDetail::get();
        return view('admin.best-price.edit', compact('page', 'best_price', 'best_price_detail'));
    }

    public function getBestPrice(Request $request)
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
                        <div class="col-md-6">
                            <label class="form-label required">Name (' . $lngcode . ')</label>
                            <input type="text" class="form-control"
                                id="best_price_title_' . $attr . $awesome_booking_row . '"
                                name="best_price_title_' . $attr . '[]" cols="50" rows="10">
                            <div class="mt-4">
                            <label class="form-label required">Text (' . $lngcode . ')</label>
                            <textarea class="form-control" id="best_price_text_' . $attr . $awesome_booking_row . '"
                                name="best_price_text_' . $attr . '[]" cols="50" rows="10"></textarea>
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
                                        <div id="holder-best-price-img">
                                            <img src="' . $imagePath . '"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-best-price-img" data-input="best-price-img" data-preview="holder-best-price-img"
                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                    <i class="bi bi-image-fill me-2"></i>Select
                                                    File
                                                </a>
                                            </span>
                                            <input id="best-price-img" class="form-control" type="text" name="best_price_img[]">
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
                    <textarea class="form-control editor" id="best_price_description_' . $attr . $awesome_booking_row . '"
                        name="best_price_description_' . $attr . '[]" cols="50" rows="10"></textarea>
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
        $best_price               = $this->best_price->saveBestPrice($request);
        $process_plan        = $this->best_price->saveBestPriceDetail($request);
        return redirect()->route('best-price.index')->with('flash-message', 'Data added!');

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
       
        $best_price               = $this->best_price->saveBestPrice($request);
        $process_plan        = $this->best_price->saveBestPriceDetail($request);
        return redirect()->route('best-price.index')->with('flash-message', 'Data updated!');
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
