<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\CustomNotificationRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomNotificationRequest;
use App\Models\CustomNotification;

class CustomNotificationController extends Controller
{
    use CheckPermission;

    public $page  =  'customnotification';

    protected $customNotiRepo;

    public function __construct(CustomNotificationRepo $customNotiRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->customNotiRepo         = $customNotiRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.custom-notification.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->customNotiRepo->getCustomNoti($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.custom-notification.create', compact('page'));
    }

    public function store(CustomNotificationRequest $request)
    {
        $this->customNotiRepo->saveNoti($request);

        return redirect('admin/customnotification')->with('flash_message', 'Custom Notification added!');
    }

    public function show($id)
    {
        $customnotification = CustomNotification::findOrFail($id);

        return view('admin.custom-notification.show', compact('customnotification'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $customnotification = $this->customNotiRepo->getNoti($id);
        return view('admin.custom-notification.edit', compact('customnotification', 'page'));
    }

    public function update(CustomNotificationRequest $request, $id)
    {
        $customnotification = $this->customNotiRepo->saveNoti($request, $id);

        if ($customnotification) {
            return redirect()->route("customnotification.index")->with('flash_message', 'Custom Notification Update!');
        } else {
            return redirect()->route("customnotification.index")->with('flash_message', 'Custom Notification Update!');
        }

        return redirect('admin/customnotification')->with('flash_message', 'Custom Notification updated!');
    }

    public function destroy($id)
    {
        $this->customNotiRepo->deleteNoti($id);

        return redirect('admin/customnotification')->with('flash_message', 'Custom Notification deleted!');
    }

    public function statusChange(Request $request)
    {
        $status = $this->customNotiRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }
}
