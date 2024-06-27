<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Merchant_Faq;
use Illuminate\Http\Request;

class Merchant_FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $merchant_faq = Merchant_Faq::where('merchant_id', 'LIKE', "%$keyword%")
                ->orWhere('question_en', 'LIKE', "%$keyword%")
                ->orWhere('question_sc', 'LIKE', "%$keyword%")
                ->orWhere('question_tc', 'LIKE', "%$keyword%")
                ->orWhere('answer_en', 'LIKE', "%$keyword%")
                ->orWhere('answer_sc', 'LIKE', "%$keyword%")
                ->orWhere('answer_tc', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $merchant_faq = Merchant_Faq::latest()->paginate($perPage);
        }

        return view('admin.merchant_-faq.index', compact('merchant_faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.merchant_-faq.create');
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
        
        $requestData = $request->all();
        
        Merchant_Faq::create($requestData);

        return redirect('admin/merchant_-faq')->with('flash_message', 'Merchant_Faq added!');
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
        $merchant_faq = Merchant_Faq::findOrFail($id);

        return view('admin.merchant_-faq.show', compact('merchant_faq'));
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
        $merchant_faq = Merchant_Faq::findOrFail($id);

        return view('admin.merchant_-faq.edit', compact('merchant_faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $merchant_faq = Merchant_Faq::findOrFail($id);
        $merchant_faq->update($requestData);

        return redirect('admin/merchant_-faq')->with('flash_message', 'Merchant_Faq updated!');
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
        Merchant_Faq::destroy($id);

        return redirect('admin/merchant_-faq')->with('flash_message', 'Merchant_Faq deleted!');
    }


}
