<?php


namespace App\Repositories;

use App\Models\Header;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Yajra\DataTables\Facades\DataTables;

class HeaderRepo
{
    public function getHeaders($request)
    {
        $headers      = $this->headerData($request);

        $datatables = DataTables::of($headers)
            ->addIndexColumn()
            ->addColumn('no', function ($headers) {
                return '';
            })

            ->editColumn('content', function($headers) {
                $content  = $headers->content_en;

                return $content;
            })

            ->addColumn('action', function ($headers) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true){
                    $btn .=' <a href="'. route('headers.edit', $headers->id) .'" title="Edit Header"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                    $btn .= '<form action="'.route('headers.destroy', $headers->id) .'" method="POST" style="display:inline">
                                                            '.csrf_field().''.method_field("DELETE").'
                                                                <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                            </form>
                                                        </div>';
                }
                else{
                    $btn .=' <a href="'. route('headers.edit', $headers->id) .'" title="Edit Header"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                }
               

                return "<div class='action-column'>" . $btn . "</div>";

            })
            ->rawColumns(['content','action']);

        return $datatables->make(true);
    }

    public function headerData($request)
    {
        $search   = $request->search;

        $data     = DB::table('headers')->orderBy('id', 'DESC');

        if($search){
            $data->orWhere('content_en', 'LIKE', "%$search%");
            $data->orWhere('content_tc', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function getHeader($id)
    {
        $header = Header::findOrFail($id);

        return $header;
    }

    public function saveHeader(Request $request)
    {

        $input  = $request->all();
        $input['slide_text_en']=collect($request->slide_text_en)->filter();
        $input['slide_text_tc']=collect($request->slide_text_tc)->filter();
        $input['slide_text_sc']=collect($request->slide_text_sc)->filter();

        if(count($input['slide_text_en']) == 0){
            $input['slide_text_en'] = null;
        }
        if(count($input['slide_text_tc']) == 0){

            $input['slide_text_tc'] = null;
        }
        if(count($input['slide_text_sc']) == 0){
            // dd('hello');
            $input['slide_text_sc'] = null;
        }

        $header = Header::first();

        if($header){
            $header->update($input);
        }else{
          $header  = Header::create($input);
        }

        return ($header) ? $header : FALSE;

    }

    public function deleteHeader($id)
    {
        $header = Header::findOrFail($id);
        $header->delete();

        return ($header) ? $header : false;
    }

    public function translateContent($request)
    {
        $val=$request->val;
        $content=$request->cont;
        $fields=[
            'content'=>$content
        ];
        $data = autoTranslate($val,$fields);
        return $data;

    }

}
