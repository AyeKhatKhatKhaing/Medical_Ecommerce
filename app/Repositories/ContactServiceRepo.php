<?php

namespace App\Repositories;

use Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\ContactService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class ContactServiceRepo
{
    public function getContactService($request)
    {
        $contact_service     = $this->contactServiceData($request);

        $datatables       = DataTables::of($contact_service)
            ->addIndexColumn()
            ->addColumn('no', function ($contact_service) {
                return '';
            })

            ->editColumn('icon', function ($contact_service) {
                $img = isset($contact_service->icon) ? $contact_service->icon : asset('/backend/media/blank-image.svg');
                return "<img src='" . $img . "'style='width: 132px;height: 50px !important;'/>";
            })

            ->editColumn('name', function ($contact_service) {
                $name  = $contact_service->name_en;

                return $name;
            })
            ->editColumn('link', function ($contact_service) {
                $link  = $contact_service->link;

                return $link;
            })

            ->editColumn('updated_at', function ($contact_service) {
                $latest_update   =  '';
                $latest_update  .= $contact_service->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= $contact_service->updated_by ? $contact_service->updated_by : '';
                $latest_update  .= "</span>";

                return $latest_update;
            })

            ->editColumn('status', function ($contact_service) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('contactServiceChangeStatus') . "'";
                if ($contact_service->is_published) {
                    $btn  .= '<input data-id="' . $contact_service->id . '" onclick="statusChange(' . $contact_service->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $contact_service->id . '" onclick="statusChange(' . $contact_service->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })->addColumn('action', function ($contact_service) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole == true){
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                    <a href="' . route('contact-service.edit', $contact_service->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('contact-service.destroy', $contact_service->id) . '" method="POST" class="action-form" style="display:inline">
                    ' . csrf_field() . '' . method_field("DELETE") . '
                        <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm confirm_delete" data-kt-docs-table-filter="delete_row">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </a>
                    </form>
                </div>';
                }
                else{
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                    <a href="' . route('contact-service.edit', $contact_service->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                </div>';
                }
        

                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['icon', 'name', 'link', 'status', 'updated_at', 'action']);

        return $datatables->make(true);
    }

    public function contactServiceData($request)
    {
        $search   = $request->search;
        $status   = $request->status;

        $data   = ContactService::whereNull('deleted_at');

        if (isset($status) && $status != 'all') {
            $data = $data->where('is_published', $status);
        }

        if ($search) {
            $data = $data->Where('name_en', 'LIKE', "%$search%")->orWhere('name_tc', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all' && isset($search)) {
            $data = $data->where('is_published', $status)->Where('name_en', 'LIKE', "%$search%")->orWhere('name_tc', 'LIKE', "%$search%");
        }


        return $data->get();
    }

    public function saveContactService(Request $request, $id = null)
    {

        $input    = $request->all();
        if (!existImagePath($input['icon'])) {
            $input['icon'] = null;
        } else {
            $input['icon'] = getImage($request->icon);
        }

        if ($id === NULL) {
            $contact_service = new ContactService();
        } else {
            $input['updated_by'] = auth()->user()->name;
            $contact_service        = ContactService::findOrFail($id);
        }

        $saved    = $contact_service->fill($input)->save();

        return ($saved) ? $contact_service : FALSE;
    }

    public function getContactServiceData($id)
    {
        $contact_service = ContactService::findOrFail($id);

        return $contact_service;
    }


    public function deleteContactService($id)
    {
        $contact_service = ContactService::findOrFail($id);
        $contact_service->delete();

        return ($contact_service) ? $contact_service : false;
    }

    public function changeStatus($request)
    {
        $contact_service    = ContactService::findOrFail($request->id);
        $contact_service->update(['is_published' => !$contact_service->is_published]);

        return $contact_service;
    }
}
