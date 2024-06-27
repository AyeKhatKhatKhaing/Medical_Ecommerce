<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Traits\CheckPermission;
use App\Repositories\RelationshipTypeRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RelationshipTypeRequest;
use App\Models\RelationshipType;

class RelationshipTypeController extends Controller
{
    use CheckPermission;

    public $page  =  'relationshiptype';

    protected $relationshipTypeRepo;

    public function __construct(RelationshipTypeRepo $relationshipTypeRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->relationshipTypeRepo         = $relationshipTypeRepo;
    }

    public function index(Request $request)
    {
        $page  = $this->page;
        return view('admin.relationship-type.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->relationshipTypeRepo->getRelationshipType($request);
    }

    public function create()
    {
        $page  = $this->page;
       
        return view('admin.relationship-type.create', compact('page'));
    }

    public function store(RelationshipTypeRequest $request)
    {
        $this->relationshipTypeRepo->saveRelationship($request);

        return redirect('admin/relationshiptype')->with('flash_message', 'Relationship Type added!');
    }

    public function show($id)
    {
        $relationshiptype = RelationshipType::findOrFail($id);

        return view('admin.relationship-type.show', compact('relationshiptype'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $relationshiptype = $this->relationshipTypeRepo->getRelationship($id);
        return view('admin.relationship-type.edit', compact('relationshiptype', 'page'));
    }

    public function update(RelationshipTypeRequest $request, $id)
    {
        $relationshiptype = $this->relationshipTypeRepo->saveRelationship($request, $id);

        if ($relationshiptype) {
            return redirect()->route("relationshiptype.index")->with('flash_message', 'Relationship Type Update!');
        } else {
            return redirect()->route("relationshiptype.index")->with('flash_message', 'Relationship Type Update!');
        }

        return redirect('admin/relationshiptype')->with('flash_message', 'Relationship Type updated!');
    }

    public function destroy($id)
    {
        $this->relationshipTypeRepo->deleteNoti($id);

        return redirect('admin/relationshiptype')->with('flash_message', 'Relationship Type deleted!');
    }

}
