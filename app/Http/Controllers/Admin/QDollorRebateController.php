<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\QDollorRebate;
use App\Traits\CheckPermission;
use App\Repositories\QDollarRepo;
use App\Http\Controllers\Controller;

class QDollorRebateController extends Controller
{
    // use CheckPermission;
    
    public $page  =  'QDollarRebate';

    protected $qdollorRebate;

    public function __construct(QDollarRepo $qdollorRebate)
    {
        $this->middleware('role:admin,marketing');
        // $this->checkPermission();   
        $this->qdollorRebate = $qdollorRebate;
    }
    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.q-dollor-rebate.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->qdollorRebate->getData($request);
    }

    public function create()
    {
        return view('admin.q-dollor-rebate.create');
    }

   
    public function store(Request $request)
    {
        $this->qdollorRebate->saveQDollar($request);
        return redirect('admin/q-dollor-rebate')->with('flash_message', 'QDollorRebate added!');
    }

    
    public function edit($id)
    {
        $qdollorRebate = QDollorRebate::findOrFail($id);

        return view('admin.q-dollor-rebate.edit', compact('qdollorRebate'));
    }
    public function show($id)
    {
        // 
    }
   
    public function update(Request $request, $id)
    {
        $this->qdollorRebate->saveQDollar($request,$id);
        return redirect('admin/q-dollor-rebate')->with('flash_message', 'QDollorRebate updated!');
    }

   
    public function destroy($id)
    {
        QDollorRebate::destroy($id);

        return redirect('admin/q-dollor-rebate')->with('flash_message', 'QDollorRebate deleted!');
    }


}
