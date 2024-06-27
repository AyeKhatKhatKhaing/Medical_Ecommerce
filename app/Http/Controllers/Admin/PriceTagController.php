<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\PriceTagFormRequest;
use App\Models\PriceTag;
use App\Repositories\PriceTagRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class PriceTagController extends Controller
{

    use CheckPermission;

    public $priceTag  =  'price_tag';

    protected $priceTagRepo;

    public function __construct(PriceTagRepo $priceTagRepo)
    {
        $this->middleware('role:admin,manager,marketing');
        $this->checkPermission();
        $this->priceTagRepo = $priceTagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page    = $this->priceTag;

        return view('admin.price-tag.index',compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->priceTagRepo->getPriceTags($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page   = $this->priceTag;

        return view('admin.price-tag.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PriceTagFormRequest $request)
    {
        $this->priceTagRepo->savePriceTag($request);

        return redirect('admin/price-tag')->with('flash_message', 'PriceTag added!');
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
        $priceTag = PriceTag::findOrFail($id);

        return view('admin.price-tag.show', compact('priceTag'));
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
        $page     = $this->priceTag;
        $price_tag  = $this->priceTagRepo->getPriceTag($id);

        return view('admin.price-tag.edit', compact('price_tag', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PriceTagFormRequest $request, $id)
    {
        $priceTags = $this->priceTagRepo->savePriceTag($request,$id);

        if($priceTags) {
            return redirect()->route("price-tag.index")->with('flash_message', 'PriceTag Update!');
        }
        else {
            return redirect()->route("price-tag.edit",$id)->with('flash_message', 'PriceTag update!');

        }

        return redirect('admin/price-tag')->with('flash_message', 'PriceTag updated!');
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
        $this->priceTagRepo->deletePriceTag($id);

        return redirect('admin/price-tag')->with('flash_message', 'PriceTag deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->priceTagRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function price_tag_translate(Request $request)
    {

        $data = $this->priceTagRepo->translateContent($request);

        return $data;

    }

}

