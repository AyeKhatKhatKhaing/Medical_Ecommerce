<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\NotificationTypeRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationTypeRequest;
use App\Models\NotificationType;

class NotificationTypeController extends Controller
{
    use CheckPermission;

    public $page  =  'notificationtype';

    protected $notificationTypeRepo;

    public function __construct(NotificationTypeRepo $notificationTypeRepo)
    {
        $this->checkPermission();
        $this->middleware('role:admin,marketing');
        $this->notificationTypeRepo         = $notificationTypeRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.notification-type.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->notificationTypeRepo->getNotificationType($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.notification-type.create', compact('page'));
    }

    public function store(NotificationTypeRequest $request)
    {
        $this->notificationTypeRepo->saveNoti($request);

        return redirect('admin/notificationtype')->with('flash_message', 'Notification Type added!');
    }

    public function show($id)
    {
        $notificationtype = NotificationType::findOrFail($id);

        return view('admin.notification-type.show', compact('notificationtype'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $notificationtype = $this->notificationTypeRepo->getNoti($id);
        return view('admin.notification-type.edit', compact('notificationtype', 'page'));
    }

    public function update(NotificationTypeRequest $request, $id)
    {
        $notificationtype = $this->notificationTypeRepo->saveNoti($request, $id);

        if ($notificationtype) {
            return redirect()->route("notificationtype.index")->with('flash_message', 'Notification Type Update!');
        } else {
            return redirect()->route("notificationtype.index")->with('flash_message', 'Notification Type Update!');
        }

        return redirect('admin/notificationtype')->with('flash_message', 'Notification Type updated!');
    }

    public function destroy($id)
    {
        $this->notificationTypeRepo->deleteNoti($id);

        return redirect('admin/notificationtype')->with('flash_message', 'Notification Type deleted!');
    }

}
