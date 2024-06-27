<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\QuickStartPage;
use App\Models\QuickStartGuide;
use App\Http\Controllers\Controller;
use App\Repositories\QuickStartGuideRepo;

class QuickStartGuideController extends Controller
{
    //
    public $page  =  'quick-start-guide';

    protected $quick_guide;

    public function __construct(QuickStartGuideRepo $quick_guide)
    {
        $this->quick_guide         = $quick_guide;
        $this->middleware('role:admin,marketing');
    }

    public function index(Request $request)
    {
        //
        $page         = $this->page;
        $quick_guide        = QuickStartGuide::get();
        $quick_guide_page        = QuickStartPage::first();
        return view('admin.quick-start-guide.index', compact('page', 'quick_guide','quick_guide_page'));
    }

    public function getQuickStartGuide(Request $request)
    {
        $awesome_booking_row = $request->awesome_booking_row;
        // dd($awesome_booking_row);
        $imagePath = asset('/backend/media/blank-image.svg');
        $returnHtml = [];

        // Loop to generate multiple rows
        // foreach (config('lng.attr') as $lngcode => $attr) {
        $html = '

        <div class="col-md-6 new-awesome_booking-input' . $awesome_booking_row . '">
            <div class="card mt-4 border">
                <div class="card-body" style="background-color: #f5f8fa;">
                <div class="row">
                <div class="col-md-12 text-end">
                    <button data-attr="" type="button"
                        class="removeAwesomeBooking' . $awesome_booking_row . ' btn btn-danger"
                        style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card-body pt-0">
                        <div class="list-title mb-3">
                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                <span style="color: #B5B5C3">Image Size(1200 x
                                    630)px</span>
                            </label>
                        </div>
                        <div class="panel-block">
                            <div class="form-group">
                            <div id="holder-img-' . $awesome_booking_row . '">
                            <img src="' . $imagePath . '" class="img-thumbnail">
                        </div>
                                <div class="input-group mt-3">
                                    <span class="input-group-btn">
                                    <a id="lfm-img-' . $awesome_booking_row . '"
                                    data-input="img-' . $awesome_booking_row . '"
                                    data-preview="holder-img-' . $awesome_booking_row . '"
                                    class="btn btn-primary btn-sm text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                    </a>
                                    </span>
                                    <input id="img-' . $awesome_booking_row . '" class="form-control" type="text" name="img[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="separator my-2"></div>
            <div class="row">
                <div class="col-md-10 px-11 ">
                    <div class="form-group mb-5">
                        <div class="list-title mb-3">
                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                <span style="color: #B5B5C3">Sort</span>
                            </label>
                        </div>
                        <div class="">
                            <input class="form-control" name="sort[]" type="number">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            ';

        array_push($returnHtml, $html);
        // }

        return $returnHtml;
    }

    public function update(Request $request)
    {
        $this->quick_guide->saveQuickGuidePage($request);
        $this->quick_guide->saveQuickGuide($request);
        return redirect()->route('admin.quick-start')->with('flash-message', 'Data updated!');
    }
}
