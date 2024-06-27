<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\AmountOfAlcoholDrinkingRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiseaseRequest;
use App\Models\AmountOfAlcoholDrinking;

class AmountOfAlcoholDrinkingController extends Controller
{
    use CheckPermission;

    public $page  =  'amountofalcoholdrinking';

    protected $amountOfAlcoholDrinkingRepo;

    public function __construct(AmountOfAlcoholDrinkingRepo $amountOfAlcoholDrinkingRepo)
    {
        $this->checkPermission();
        $this->amountOfAlcoholDrinkingRepo         = $amountOfAlcoholDrinkingRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.amount-of-alcohol-drinking.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->amountOfAlcoholDrinkingRepo->getAmountOfAlcoholDrinkingData($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.amount-of-alcohol-drinking.create', compact('page'));
    }

    public function store(DiseaseRequest $request)
    {
        $this->amountOfAlcoholDrinkingRepo->saveAmountOfAlcoholDrinking($request);

        return redirect('admin/amountofalcoholdrinking')->with('flash_message', 'Amount Of Alcohol Drinking added!');
    }

    public function show($id)
    {
        $disease = AmountOfAlcoholDrinking::findOrFail($id);

        return view('admin.amount-of-alcohol-drinking.show', compact('disease'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $amountofalcoholdrinking = $this->amountOfAlcoholDrinkingRepo->getAmountOfAlcoholDrinking($id);
        return view('admin.amount-of-alcohol-drinking.edit', compact('amountofalcoholdrinking', 'page'));
    }

    public function update(DiseaseRequest $request, $id)
    {
        $disease = $this->amountOfAlcoholDrinkingRepo->saveAmountOfAlcoholDrinking($request, $id);

        if ($disease) {
            return redirect()->route("amountofalcoholdrinking.index")->with('flash_message', 'Amount Of Alcohol Drinking Update!');
        } else {
            return redirect()->route("amountofalcoholdrinking.index")->with('flash_message', 'Amount Of Alcohol Drinking Update!');
        }

        return redirect('admin/amountofalcoholdrinking')->with('flash_message', 'Amount Of Alcohol Drinking updated!');
    }

    public function destroy($id)
    {
        $this->amountOfAlcoholDrinkingRepo->deleteAmountOfAlcoholDrinking($id);

        return redirect('admin/amountofalcoholdrinking')->with('flash_message', 'Amount Of Alcohol Drinking deleted!');
    }

}
