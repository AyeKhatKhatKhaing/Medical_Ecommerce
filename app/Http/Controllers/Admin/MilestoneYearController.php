<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\MilestoneYearFormRequest;
use App\Models\MilestoneYear;
use App\Repositories\MilestoneYearRepo;
use Illuminate\Http\Request;

class MilestoneYearController extends Controller
{
    public $page  = 'milestone_year';
    protected $milestoneYearRepo;

    public function __construct(MilestoneYearRepo $milestoneYearRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->milestoneYearRepo = $milestoneYearRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.milestone-year.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->milestoneYearRepo->getMilestoneYear($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page = $this->page;

        return view('admin.milestone-year.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MilestoneYearFormRequest $request)
    {

        $data=$this->milestoneYearRepo->saveMilestoneYear($request);
//        dd($data->toArray());
        return redirect('admin/milestone-year')->with('flash_message', 'MilestoneYear added!');
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
        $milestoneyear = MilestoneYear::findOrFail($id);

        return view('admin.milestone-year.show', compact('milestoneyear'));
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
        $milestoneyear  = $this->milestoneYearRepo->getMilestoneYearData($id);
        $milestonedetail  = $this->milestoneYearRepo->getMilestoneByYear($id);

        return view('admin.milestone-year.edit', compact('milestoneyear', 'page','milestonedetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MilestoneYearFormRequest $request, $id)
    {

        $milestone_year = $this->milestoneYearRepo->saveMilestoneYear($request,$id);

        if($milestone_year) {
            return redirect()->route("milestone-year.index")->with('flash_message', 'Blog Update!');
        }
        else {
            return redirect()->route("milestone-year.edit",$id)->with('flash_message', 'Blog update!');

        }

        return redirect('admin/milestone-year')->with('flash_message', 'MilestoneYear updated!');
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
        $this->milestoneYearRepo->deleteMilestoneYear($id);

        return redirect('admin/milestone-year')->with('flash_message', 'MilestoneYear deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->milestoneYearRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function monthForm(Request $request)
    {
        $attr       = $request->attr;
        $index       = $request->index;
        $returnHtml=[];

        foreach (config('lng.attr') as $lngcode => $attr)
        {
            $html = view('admin.milestone-year.month_form')
                ->with(["attr"=> $attr,"index"=>$index])
                ->render();
            array_push($returnHtml,$html);
        }

        return $returnHtml;
    }
    public function milestone_year_translate()
    {
        $val=\request()->val;
        $name=\request()->name;
        $content=\request()->con;
        $fields=[
            "name"=>$name,
            "content"=>$content,
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }

}

