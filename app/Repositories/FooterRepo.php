<?php


namespace App\Repositories;


use App\Models\Footer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Yajra\DataTables\Facades\DataTables;

class FooterRepo
{
    public function getFooters($request)
    {
        $footers      = $this->footerData($request);

        $datatables = DataTables::of($footers)
            ->addIndexColumn()
            ->addColumn('no', function ($footers) {
                return '';
            })

            ->editColumn('content', function($footers) {
                $content  = $footers->content_en;

                return $content;
            })

            ->addColumn('action', function ($footers) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true){
                    $btn .=' <a href="'. route('footers.edit', $footers->id) .'" title="Edit Footer"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                    $btn .= '<form action="'.route('footers.destroy', $footers->id) .'" method="POST" style="display:inline">
                                                            '.csrf_field().''.method_field("DELETE").'
                                                                <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                            </form>
                                                        </div>';
                }
                else{
                    $btn .=' <a href="'. route('footers.edit', $footers->id) .'" title="Edit Footer"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                }

            

                return "<div class='action-column'>" . $btn . "</div>";

            })
            ->rawColumns(['content','action']);

        return $datatables->make(true);
    }

    public function footerData($request)
    {
        $search   = $request->search;

        $data     = DB::table('footers')->orderBy('id', 'DESC');

        if($search){
            $data->orWhere('content_en', 'LIKE', "%$search%");
            $data->orWhere('content_tc', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function getFooter($id)
    {
        $footer = Footer::findOrFail($id);

        return $footer;
    }

    public function saveFooter(Request $request)
    {

        $input  = $request->all();
        $footer = Footer::first();
        // dd($input);
        if($footer){
            $footer->update($input);
        }else{
            $footer  = Footer::create($input);
        }

        return ($footer) ? $footer : FALSE;

    }

    public function deleteFooter($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();

        return ($footer) ? $footer : false;
    }

    public function translateContent($request)
    {
        $val=$request->val;
        $about_content=$request->about_content;
        $service_content=$request->service_content;
        $membership_content=$request->membership_content;
        $payment_content=$request->payment_content;
        $transaction_content=$request->transaction_content;
        $content=$request->cont;

        $fields=[
            'about_content'=>$about_content,
            'service_content'=>$service_content,
            'membership_content'=>$membership_content,
            'payment_content'=>$payment_content,
            'transaction_content'=>$transaction_content,
            'content'=>$content
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }
}


