<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\PromoCode;
use App\Models\Category;
use App\Repositories\PromoCodeRepo;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PromoCodeFormRequest;

class PromoCodeController extends Controller
{
    public $page  = 'promo_code';

    protected $promoCodeRepo;

    public function __construct(PromoCodeRepo $promoCodeRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->promoCodeRepo = $promoCodeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.promo-code.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->promoCodeRepo->getPromoCode($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        $categories=Category::select('id','name_en')->get();
        return view('admin.promo-code.create', compact('page','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PromoCodeFormRequest $request)
    {

        $this->promoCodeRepo->savePromoCode($request);

        return redirect('admin/promo-code')->with('flash_message', 'PromoCode added!');
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
        $promocode = PromoCode::findOrFail($id);

        return view('admin.promo-code.show', compact('promocode'));
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
        $page      = $this->page;
        $promocode = $this->promoCodeRepo->getPromoCodeData($id);
        $categories=Category::select('id','name_en')->get();

        return view('admin.promo-code.edit', compact('promocode', 'page','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PromoCodeFormRequest $request, $id)
    {

        $promocode = $this->promoCodeRepo->savePromoCode($request,$id);

        // if($promocode) {
        //     return redirect()->route("promo-code.index")->with('flash_message', 'Promo Code Update!');
        // }
        // else {
        //     return redirect()->route("promo-code.edit",$id)->with('flash_message', 'Promo Code update!');

        // }

        return redirect('admin/promo-code')->with('flash_message', 'PromoCode updated!');
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
        $this->promoCodeRepo->deletePromoCode($id);

        return redirect('admin/promo-code')->with('flash_message', 'PromoCode deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->promoCodeRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function promocodeTranslate()
    {

        $val=\request()->val;
        $description=\request()->description;
        $fields=[
            "description"=>$description,
        ];
        $data = autoTranslate($val,$fields);
        return $data;
    }

}
