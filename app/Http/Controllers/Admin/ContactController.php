<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\ContactFormRequest;
use App\Models\Contact;
use App\Repositories\ContactRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ContactController extends Controller
{
    public $page  =  'contact';

    protected $contactRepo;

    public function __construct(ContactRepo $contactRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->contactRepo         = $contactRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page         = $this->page;
        $contact        = Contact::first();

        return view('admin.contact.edit', compact('page', 'contact'));
    }

    public function getData(Request $request)
    {
        return $this->contactRepo->getContacts($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page         = $this->page;

        return view('admin.contact.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ContactFormRequest $request)
    {

        $this->contactRepo->saveContact($request);

        return redirect('admin/contact')->with('flash_message', 'Contact added!');
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
        $contact = Contact::findOrFail($id);

        return view('admin.contact.show', compact('contact'));
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
        $contact         = $this->contactRepo->getContact($id);

        return view('admin.contact.edit', compact('contact', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {

        $contacts = $this->contactRepo->saveContact($request);

        return redirect('admin/contact')->with('flash_message', 'Contact updated!');
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
        $this->contactRepo->deleteContact($id);

        return redirect('admin/contact')->with('flash_message', 'Contact deleted!');
    }

    public function contact_translate(Request $request)
    {
        $data = $this->contactRepo->translateContent($request);

        return $data;

    }

}
