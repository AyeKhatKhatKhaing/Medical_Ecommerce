<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\FreeGift;

use Illuminate\Http\Request;
use App\Repositories\FreeGiftRepo;
use App\Http\Controllers\Controller;

class FreeGiftController extends Controller
{
   
    public $page  =  'freeGift';
    protected $freeGift;

    public function __construct(FreeGiftRepo $freeGift)
    {
        $this->middleware('role:admin,marketing');
        $this->freeGift = $freeGift;
    }

    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.free-gift.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->freeGift->getData($request);
    }

    public function create()
    {
        return view('admin.free-gift.create');
    }

    public function store(Request $request)
    {
        
        $this->freeGift->savefreeGift($request);
        return redirect('admin/free-gift')->with('flash_message', 'FreeGift added!');
    }

   
    public function edit($id)
    {
        $freegift = FreeGift::findOrFail($id);

        return view('admin.free-gift.edit', compact('freegift'));
    }

   
    public function update(Request $request, $id)
    {
        $this->freeGift->saveFreeGift($request, $id);
        return redirect('admin/free-gift')->with('flash_message', 'FreeGift updated!');
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
        FreeGift::destroy($id);

        return redirect('admin/free-gift')->with('flash_message', 'FreeGift deleted!');
    }


}
