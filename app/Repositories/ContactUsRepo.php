<?php


namespace App\Repositories;


use App\Models\Contact;
use App\Models\ContactUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ContactCustomer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ContactUsRepo
{
    public function getContacts($request)
    {
        $contacts      = $this->contactData($request);
        $datatables = DataTables::of($contacts)
            ->addIndexColumn()
            ->addColumn("no", function ($contacts) {
                return '';
            })

            ->editColumn('banner_photo', function($contacts) {
                return "<img src='".$contacts->banner_img."' width='80px' height='50px' />";

            })

            ->editColumn('banner_title', function($contacts) {
                $banner_title  = Str::limit($contacts->banner_title_en,30);

                return $banner_title;
            })
            ->editColumn('cooperation_photo', function($contacts) {
                return "<img src='".$contacts->cooperation_img."' width='80px' height='50px' />";

            })

            ->editColumn('cooperation_title', function($contacts) {
                $cooperation_title  = Str::limit($contacts->cooperation_title_en,30);

                return $cooperation_title;
            })
            ->editColumn('group_photo', function($contacts) {
                return "<img src='".$contacts->group_img."' width='80px' height='50px' />";

            })

            ->editColumn('group_title', function($contacts) {
                $group_title  = Str::limit($contacts->group_title_en,30);

                return $group_title;
            })


            ->editColumn('updated_at', function($contacts) {
                $latest_update   =  '';
                $latest_update  .= $contacts->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-bold'>";
                $latest_update  .= $contacts->updated_by ? $contacts->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->addColumn('action', function ($contacts) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true){
                    $btn .=' <a href="'. route('contact.edit', $contacts->id) .'" title="Edit Contact"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                    $btn .= '<form action="'.route('contact.destroy', $contacts->id) .'" method="POST" style="display:inline">
                                                            '.csrf_field().''.method_field("DELETE").'
                                                                <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                            </form>
                                                        </div>';
                }
                else{
                    $btn .=' <a href="'. route('contact.edit', $contacts->id) .'" title="Edit Contact"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                }
           

                return "<div class='action-column'>" . $btn . "</div>";

            })
            ->rawColumns([ 'banner_photo', 'banner_title','cooperation_photo', 'cooperation_title', 'group_photo','group_title', 'updated_at', 'action' ]);


        return $datatables->make(true);
    }

    public function contactData($request)
    {
        $search   = $request->search;

        $data     = DB::table('contacts')
            ->orderBy('contacts.id', 'DESC')
            ->where('contacts.deleted_at',null);

        return $data->get();
    }

    public function getContact($id)
    {
        $contact = ContactUs::findOrFail($id);

        return $contact;
    }

    public function saveContact(Request $request)
    {
        if(!existImagePath($request['email_logo'])){
            $request['email_logo'] = null ;
        }else{
            $request['email_logo']  = getImage($request->email_logo)     ;
        }
        if(!existImagePath($request['hotline_logo'])){
            $request['hotline_logo'] = null ;
        }else{
            $request['hotline_logo'] = getImage($request->hotline_logo)     ;
        }
        if(!existImagePath($request['whats_up_logo'])){
            $request['whats_up_logo'] = null ;
        }else{
            $request['whats_up_logo'] = getImage($request->whats_up_logo)     ;
        }

        if(isset($request->holder4) &&  count($request->holder4) > 0){
            $request['online_payment_img'] = $request->holder4;
        }else{
            $request['online_payment_img'] = null;
        }

        if(!existImagePath($request['meta_img'])){
            $request['meta_img'] = null ;
        }else{
            $request['meta_img'] = getImage($request->meta_img) ;
        }

      

        $contact   = ContactUs::first();
        if($contact){
            $contact->update($request->all());
        }else{
            $contact  = ContactUs::create($request->all());

        }
        return ($contact) ? $contact : FALSE;
    }

    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return ($contact) ? $contact : false;
    }


    public function getContactCustomer($request)
    {
        $customers        = $this->contactCustomerData($request);

        $datatables       = DataTables::of($customers)
            ->addIndexColumn()
            ->addColumn('no', function ($customers) {
                return '';
            })

            ->editColumn('name', function ($customers) {
                return $customers->title . ' ' . $customers->name;
            })
            ->addColumn('action', function ($customers) {
                $btn  = '';
                $btn .= '<a href="' . route('contact-us.show', $customers->id) . '" title="view Blog">
                            <button class="btn btn-icon btn btn-secondary w-30px h-30px">
                                <i class="bi bi-eye" aria-hidden="true"></i>
                            </button>
                        </a>';
                return "<div class='d-flex justify-content-center flex-shrink-0'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'action']);

        return $datatables->make(true);
    }

    public function contactCustomerData($request)
    {
        $data  = DB::table('contact_customers');
        $search = $request->search;
        if ($search) {
            $data->where('contact_customers.first_name', 'LIKE', "%$search%");
            $data->orWhere('contact_customers.last_name', 'LIKE', "%$search%");
            $data->orWhere('contact_customers.business_email', 'LIKE', "%$search%");
        }
        return $data->get();
    }

    public function getContactCustomerData($id)
    {
        $customer = ContactCustomer::findOrFail($id);
        return $customer;
    }
}

