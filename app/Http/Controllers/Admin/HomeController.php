<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\Repositories\HomeRepo;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeFormRequest;

class HomeController extends Controller
{


    use CheckPermission;

    public $page  =  'home';

    protected $homeRepo;
    public function __construct(HomeRepo $homeRepo)
    {
        $this->middleware('role:admin,marketing');
        $this->checkPermission();
        $this->homeRepo = $homeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page   = $this->page;
        $home =  Home::first();

        return view('admin.home.edit',compact('home','page'));
    }

    public function getData(Request $request)
    {
        return $this->homeRepo->getHomes($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $page  = $this->page;
        $home =  Home::first();

        return view('admin.home.create',compact('home','page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(HomeFormRequest $request)
    {
    //    dd($request);
        $this->homeRepo->saveHome($request);

        return redirect('admin/home')->with('flash_message', 'Home added!');
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
        $home = Home::findOrFail($id);

        return view('admin.home.show', compact('home'));
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
        $page   = $this->page;
        $home  = $this->homeRepo->getHome($id);

        return view('admin.home.edit', compact('page', 'home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update(HomeFormRequest $request)
    {
        // dd("hello");
        $homes = $this->homeRepo->saveHome($request);

        return redirect('admin/home')->with('flash_message', 'Home updated!');
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
        $this->homeRepo->deleteHome($id);

        return redirect('admin/home')->with('flash_message', 'Home deleted!');
    }

    public function statusChange(Request $request)
    {
        // dd($request);
        $status = $this->homeRepo->changeStatus($request);

        return response()->json(["success" => true]);
    }

    public function home_translate(Request $request)
    {

        $data = $this->homeRepo->translateContent($request);

        return $data;

    }
    public function removeImage(Request $request)
    {

    $col= $request->col;
    $reward_image = Home::where('id',$request->id)->get([$request->col]);
    $array = json_decode($reward_image[0]->$col, true)?? null;
    // $array =explode(',',$array[0]);
    unset( $array[$request->key]);
    if(count($array)!=0){
        // $array = $array;
        // $array = [implode(",", array_values($array))];
        $array = json_encode($array);
    }else{
        $array = null;
    }

    $reward_image = Home::where('id',$request->id)->update([$request->col => $array]);
        return redirect('admin/home')->with('flash_message', 'Successfully deleted image!');
    }

}
