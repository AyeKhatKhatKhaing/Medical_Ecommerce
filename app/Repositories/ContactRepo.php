<?php


namespace App\Repositories;


use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ContactRepo
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
            ->whereNull('contacts.deleted_at');

        return $data->get();
    }

    public function getContact($id)
    {
        $contact = Contact::findOrFail($id);

        return $contact;
    }

    public function saveContact(Request $request)
    {
        // dd($request);
        if(!existImagePath($request['contact_us_footer_img1'])){
            $request['contact_us_footer_img1'] = null ;
        }else{
            $request['contact_us_footer_img1']  = getImage($request->contact_us_footer_img1)     ;
        }

        if(!existImagePath($request['contact_us_footer_img2'])){
            $request['contact_us_footer_img2'] = null ;
        }else{
            $request['contact_us_footer_img2']  = getImage($request->contact_us_footer_img2)     ;
        }

        if(!existImagePath($request['contact_us_footer_img3'])){
            $request['contact_us_footer_img3'] = null ;
        }else{
            $request['contact_us_footer_img3']  = getImage($request->contact_us_footer_img3)     ;
        }

        if(!existImagePath($request['help1_icon'])){
            $request['help1_icon'] = null ;
        }else{
            $request['help1_icon']  = getImage($request->help1_icon)     ;
        }
        if(!existImagePath($request['help2_icon'])){
            $request['help2_icon'] = null ;
        }else{
            $request['help2_icon'] = getImage($request->help2_icon)     ;
        }
        if(!existImagePath($request['help3_icon'])){
            $request['help3_icon'] = null ;
        }else{
            $request['help3_icon'] = getImage($request->help3_icon)     ;
        }
        if(!existImagePath($request['payment_method1_icon'])){
            $request['payment_method1_icon'] = null ;
        }else{
            $request['payment_method1_icon'] = getImage($request->payment_method1_icon)     ;
        }
        if(!existImagePath($request['payment_method2_icon'])){
            $request['payment_method2_icon'] = null ;
        }else{
            $request['payment_method2_icon'] = getImage($request->payment_method2_icon)     ;
        }
        $online_payment_img_arr = [];
        if(isset($request->holder4) &&  count($request->holder4) > 0){
            // $request['online_payment_img'] = $request->holder4;
            foreach ($request->holder4 as $key => $holder4) {
    
                if (!existImagePath($holder4)) {
    
                    $online_payment_img_arr[$key] = null;
                } else {
    
                    $online_payment_img_arr[$key] = getImage($holder4);
                }
            }
        }else{
            $request['online_payment_img'] = null;
        }

        $request['online_payment_img'] = $online_payment_img_arr;


        $offline_payment_img_arr = [];
        if(isset($request->holder5) &&  count($request->holder5) > 0){
            // $request['online_payment_img'] = $request->holder4;
            foreach ($request['holder5'] as $key => $holder5) {
    
                if (!existImagePath($holder5)) {
    
                    $offline_payment_img_arr[$key] = null;
                } else {
    
                    $offline_payment_img_arr[$key] = getImage($holder5);
                }
            }
        }else{
            $request['offline_payment_img'] = null;
        }

        $request['offline_payment_img'] = $offline_payment_img_arr;

        // if(!existImagePath($request['help1_icon'])){
        //     $request['help1_icon'] = null ;
        // }else{
        //     $request['help1_icon']  = getImage($request->help1_icon)     ;
        // }

        if(!existImagePath($request['contact_us_header_img'])){
            $request['contact_us_header_img'] = null ;
        }else{
            $request['contact_us_header_img']  = getImage($request->contact_us_header_img)     ;
        }

        $contact   = Contact::first();
        // dd($contact);
        if($contact){
            $contact->update($request->all());
        }else{
            $contact  = Contact::create($request->all());

        }
        return ($contact) ? $contact : FALSE;
    }

    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return ($contact) ? $contact : false;
    }

    public function translateContent($request)
    {
        $val=request()->val;

        $help1_name=request()->help1_name;
        $help2_name=request()->help2_name;
        $help3_name=request()->help3_name;
        $payment_method1_name=request()->payment_method1_name;
        $payment_method2_name=request()->payment_method2_name;
        $help1_description=request()->help1_description;
        $help2_description=request()->help2_description;
        $help3_description=request()->help3_description;
        $payment_method1_description=request()->payment_method1_description;
        $payment_method2_description=request()->payment_method2_description;

        $fields=[
            "help1_name"=>$help1_name,
            "help2_name"=>$help2_name,
            "help3_name"=>$help3_name,
            "payment_method1_name"=>$payment_method1_name,
            "payment_method2_name"=>$payment_method2_name,
            "help1_description"=>$help1_description,
            "help2_description"=>$help2_description,
            "help3_description"=>$help3_description,
            "payment_method1_description"=>$payment_method1_description,
            "payment_method2_description"=>$payment_method2_description,

        ];

        $data = autoTranslate($val,$fields);
        return $data;

    }


}

