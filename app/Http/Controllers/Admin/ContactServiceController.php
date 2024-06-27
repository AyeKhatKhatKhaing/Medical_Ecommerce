<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\ContactServiceFormRequest;
use App\Models\ContactService;
use App\Repositories\ContactServiceRepo;
use App\Traits\CheckPermission;
use Illuminate\Http\Request;

class ContactServiceController extends Controller
{
    use CheckPermission;

    public $page  = 'contact_service';

    protected $contactServiceRepo;

    public function __construct(ContactServiceRepo $contactServiceRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->contactServiceRepo = $contactServiceRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page  = $this->page;

        return view('admin.contact-service.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->contactServiceRepo->getContactService($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;

        return view('admin.contact-service.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ContactServiceFormRequest $request)
    {
        $this->contactServiceRepo->saveContactService($request);

        return redirect('admin/contact-service')->with('flash_message', 'ContactService added!');
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
        $contactservice = ContactService::findOrFail($id);

        return view('admin.contact-service.show', compact('contactservice'));
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
        $page         = $this->page;
        $contactservice  = $this->contactServiceRepo->getcontactServiceData($id);

        return view('admin.contact-service.edit', compact('contactservice', 'page'));
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

        $faq_category = $this->contactServiceRepo->saveContactService($request,$id);

        if($faq_category) {
            return redirect()->route("contact-service.index")->with('flash_message', 'Faq Update!');
        }
        else {
            return redirect()->route("contact-service.edit",$id)->with('flash_message', 'Faq update!');
        }

        return redirect('admin/contact-service')->with('flash_message', 'ContactService updated!');
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
        $this->contactServiceRepo->deleteContactService($id);

        return redirect('admin/contact-service')->with('flash_message', 'ContactService deleted!');
    }


    public function statusChange(Request $request)
    {
        $status = $this->contactServiceRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function contact_service_translate()
    {
        $val=\request()->val;
        $name=\request()->name;
        $fields=[
            "name"=>$name,
        ];
        $data = autoTranslate($val,$fields);
        return $data;
    }
}
