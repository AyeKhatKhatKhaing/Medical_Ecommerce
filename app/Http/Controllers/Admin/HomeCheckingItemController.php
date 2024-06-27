<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HomeCheckingItem;
use Illuminate\Http\Request;

class HomeCheckingItemController extends Controller
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
            $homecheckingitem = HomeCheckingItem::where('service_solution_id', 'LIKE', "%$keyword%")
                ->orWhere('tags', 'LIKE', "%$keyword%")
                ->orWhere('content_en', 'LIKE', "%$keyword%")
                ->orWhere('content_tc', 'LIKE', "%$keyword%")
                ->orWhere('content_sc', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $homecheckingitem = HomeCheckingItem::latest()->paginate($perPage);
        }

        return view('admin.home-checking-item.index', compact('homecheckingitem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.home-checking-item.create');
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
        
        HomeCheckingItem::create($requestData);

        return redirect('admin/home-checking-item')->with('flash_message', 'HomeCheckingItem added!');
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
        $homecheckingitem = HomeCheckingItem::findOrFail($id);

        return view('admin.home-checking-item.show', compact('homecheckingitem'));
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
        $homecheckingitem = HomeCheckingItem::findOrFail($id);

        return view('admin.home-checking-item.edit', compact('homecheckingitem'));
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
        
        $homecheckingitem = HomeCheckingItem::findOrFail($id);
        $homecheckingitem->update($requestData);

        return redirect('admin/home-checking-item')->with('flash_message', 'HomeCheckingItem updated!');
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
        HomeCheckingItem::destroy($id);

        return redirect('admin/home-checking-item')->with('flash_message', 'HomeCheckingItem deleted!');
    }


}
