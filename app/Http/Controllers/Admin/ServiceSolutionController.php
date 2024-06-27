<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ServiceSolutionFormRequest;
use App\Models\ServiceSolution;
use App\Models\DoseTag;
use App\Models\VaccineFactoryTag;
use App\Models\KeyItemTag;
use App\Models\HighlightTag;
use App\Models\RecommendTag;
use App\Repositories\ServiceSolutionRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class ServiceSolutionController extends Controller
{
    public $page  = 'service_solution';
    protected $serviceSolutionRepo;

    public function __construct(ServiceSolutionRepo $serviceSolutionRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->serviceSolutionRepo = $serviceSolutionRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.service-solution.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->serviceSolutionRepo->getServiceSolution($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;

        return view('admin.service-solution.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ServiceSolutionFormRequest $request)
    {

        $data=$this->serviceSolutionRepo->saveServiceSolution($request);
        return redirect('admin/service-solution')->with('flash_message', 'ServiceSolution added!');
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
        $milestoneyear = ServiceSolution::findOrFail($id);

        return view('admin.service-solution.show', compact('milestoneyear'));
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
        $page          = $this->page;
        $servicesolution  = $this->serviceSolutionRepo->getServiceSolutionData($id);
        $checkingitem  = $this->serviceSolutionRepo->getCheckingItem($id);

        return view('admin.service-solution.edit', compact('servicesolution', 'page','checkingitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ServiceSolutionFormRequest $request, $id)
    {

        $milestone_year = $this->serviceSolutionRepo->saveServiceSolution($request,$id);
        $recommendTags=RecommendTag::get('id','name_en');
        $keyItemTags=KeyItemTag::get('id','name_en');
        $vaccineFactoryTags=VaccineFactoryTag::get('id','name_en');
        $highlightTags=HighlightTag::get('id','name_en');
        
        $recommendTags=$recommendTags->merge($keyItemTags);
        $recommendTags=$recommendTags->merge($vaccineFactoryTags);
        $recommendTags=$recommendTags->merge($highlightTags);
        if($milestone_year) {
            return redirect()->route("service-solution.index")->with('flash_message', 'Service Solution Update!');
        }
        else {
            return redirect()->route("service-solution.edit",$id)->with('flash_message', 'Service Solution update!');

        }

        return redirect('admin/service-solution')->with('flash_message', 'ServiceSolution updated!');
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
        $this->serviceSolutionRepo->deleteServiceSolution($id);

        return redirect('admin/service-solution')->with('flash_message', 'ServiceSolution deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->serviceSolutionRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function checkingItemForm(Request $request)
    {
        $attr       = $request->attr;
        $index       = $request->index;
        $returnHtml=[];

            $html = view('admin.service-solution.checking_item_form')
                ->with(["index"=>$index])
                ->render();
            array_push($returnHtml,$html);

        return $returnHtml;
    }

    public function service_solution_translate()
    {
        $val=\request()->val;
        $main_title=\request()->main_title;
        $description=\request()->description;
        $main_sub_title=\request()->main_sub_title;
        $title=\request()->title;
        $sub_title=\request()->sub_title;
        $fields=[
            "main_title"=>$main_title,
            "description"=>$description,
            "main_sub_title"=>$main_sub_title,
            "title"=>$title,
            "sub_title"=>$sub_title,
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }

}

