<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FileManagerController extends Controller
{
    public $page  =  "filemanager";
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,manager,marketing');

    }

    public function fileManager()
    {
        $page = $this->page;

        return view('admin.filemanager.filemanager', compact('page'));
    }
}
