<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Area;
use App\Models\Role;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Repositories\UserRepo;
use App\Traits\CheckPermission;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\MerchantLocation;
use App\Repositories\UserRepositoryInterface;
use function PHPUnit\Framework\returnArgument;
use App\Models\WeekDay;

class UsersController extends Controller
{

    use CheckPermission;

    public $page = 'users';

    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->middleware('role:admin');
        $this->checkPermission();
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $page  = $this->page;

        return view('admin.users.index', compact('page'));
    }

    public function getData(Request $request)
    {
        return $this->userRepo->getUsers($request);
    }

    public function userList($user_type)
    {
        $page  = $this->page;

        if ($user_type == 'user') {
            return view('admin.users.index', compact('page', 'user_type'));
        }

        if ($user_type == 'merchant') {
            return view('admin.merchants.index', compact('page', 'user_type'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $page  = $this->page;
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');

        return view('admin.users.create', compact('roles', 'page'));
    }

    public function userCreate($user_type)
    {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');
        $areas = Area::select('id', 'name_en')->get();
        $merchant_locations = [];
        $merchant_faq = [];
        $productsImages = [];
        if ($user_type == 'user') {
            return view('admin.users.create', compact('roles', 'user_type'));
        }

        if ($user_type == 'merchant') {
            return view('admin.merchants.create', compact('roles', 'areas', 'merchant_locations', 'user_type', 'productsImages', 'merchant_faq'));
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        if($request->user_type == "user"){
            $this->validate(
                $request,
                [
                    'name_en' => 'required',
                    'email' => 'required|string|max:255|email|unique:users,email,',
                    // 'phone' => 'required|unique:users,phone,'

                ]
            );
            $user                = $this->userRepo->saveUser($request);
            return redirect()->route('users.list', $request->user_type)->with('flash_message', 'User added!');
        }
        if($request->user_type == "merchant"){
            $this->validate(
                $request,
                [
                    'name_en' => 'required',
                    'name_tc'       => 'required',
                    'name_sc'       => 'required',
                    'email' => 'required|string|max:255|email|unique:users,email,',
                    // 'phone' => 'required|unique:users,phone,'

                ]
            );
            $user                = $this->userRepo->saveUser($request);
            $process_plan        = $this->userRepo->saveProcessPlan($user, $request);
            $process_description = $this->userRepo->saveProcessDescription($user, $request);
            $this->userRepo->saveMerchantLocations($user, $request);
            $mechant_faq = $this->userRepo->saveMerchantFaq($user, $request);
            $this->userRepo->saveMerchantImages($request, $user);

            $merchant_user = $user;
            $merchant_locations = $this->userRepo->getMerchantLocation($user->id);
            $merchant_user->locations = $merchant_locations;
            if (count($merchant_locations) > 0) {
                // return view('admin.merchant-location-calendar.form', compact('merchant_user'));
                return redirect()->route('users.show', $user)->with('flash-message', 'User Updated');
            } else {
                return redirect()->route('users.list', $request->user_type)->with('flash_message', 'User added!');
            }
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $page  = $this->page;
        $user  = User::findOrFail($id);

        $merchant_user = $user;
        $merchant_locations = $this->userRepo->getMerchantLocation($user->id);


        foreach ($merchant_locations as $m_location) {
            $weekdays = WeekDay::where('location_id', $m_location->id)->get();
            $m_location->weekdays = $weekdays;
        }
        $merchant_user->locations = $merchant_locations;

        // return view('admin.users.show', compact('user', 'page'));
        return view('admin.merchant-location-calendar.form', compact('merchant_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $page       = $this->page;
        $data       = $this->userRepo->getUserData($id);

        $user       = $data['user'];
        $roles      = $data['roles'];
        $user_roles = $data['user_roles'];
        $user_type = "user";

        return view('admin.users.edit', compact('user', 'roles', 'user_roles', 'page', 'user_type'));
    }

    public function userEdit($id, $user_type)
    {
        $page             = $this->page;
        $data             = $this->userRepo->getUserData($id);

        $user             = $data['user'];
        $roles            = $data['roles'];
        $user_roles       = $data['user_roles'];
        $areas            = $data['areas'];
        $plan_processes   = $this->userRepo->getPlanProcessData($id);
        $plan_description = $this->userRepo->getPlanDescriptionData($id);
        $merchant_locations = $this->userRepo->getMerchantLocation($id);
        $merchant_faq = $this->userRepo->getMerchantFAQ($id);
        // dd($merchant_faq->toArray());
        $productsImages = ProductImage::where('image_type', 'merchant')->where('type_id', $id)->whereNull('deleted_at')->first();
        // dd($productsImages->toArray());

        if ($user_type == 'user') {
            return view('admin.users.edit', compact('user', 'roles', 'user_roles', 'page', 'user_type'));
        }

        if ($user_type == 'merchant') {
            return view('admin.merchants.edit', compact('user', 'roles', 'areas', 'user_roles', 'page', 'user_type', 'plan_processes', 'plan_description', 'merchant_locations', 'productsImages', 'merchant_faq'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
         if($request->user_type == "user"){
            $this->validate(
                $request,
                [
                    'name_en' => 'required',
                    'email' => 'required|string|max:255|email|unique:users,email,' . $id,
                    'phone' => 'required|unique:users,phone,'. $id,
                    // 'holder4' => 'required',

                ],
               
            );
            $user                = $this->userRepo->saveUser($request, $id);
            return redirect()->route('users.list', $request->user_type)->with('flash_message', 'User updated!');
        }
        if($request->user_type == "merchant"){
            $this->validate(
                $request,
                [
                    'name_en' => 'required',
                    'name_sc' => 'required',
                    'name_tc' => 'required',
                    'email' => 'required|string|max:255|email|unique:users,email,' . $id,
                    // 'holder4' => 'required',
                ],
                [
                    'name_en.required' => 'The name field is required.',
                    'name_tc.required' => 'The name field is required.',
                    'name_sc.required' => 'The name field is required.',
                    'email.required' => 'The email field is required.',
                    'email.string' => 'The email field must be a string.',
                    'email.max' => 'The email field must not exceed 255 characters in length.',
                    'email.email' => 'Please enter a valid email address.',
                    'email.unique' => 'The email address is already in use.',
                    'phone.required' => 'The phone field is required.',
                    'phone.unique' => 'The phone number is already in use.',
                    // 'holder4.required' => 'Common area images are required.',
                ]
            );
            $user                = $this->userRepo->saveUser($request, $id);
            $process_plan        = $this->userRepo->saveProcessPlan($user, $request, $id);
            $process_description = $this->userRepo->updateProcessDescription($user, $request, $id);
            $mechant_faq = $this->userRepo->saveMerchantFaq($user, $request, $id);
            $this->userRepo->updateMercahntImages($request, $id);
            $user_type           = "user";

            $m_locations = MerchantLocation::where('merchant_id', $user->id)->count();
            if ($m_locations > 0 || $request->area_id) {
                $this->userRepo->updateMerchantLocations($user, $request);
                return redirect()->route('users.show', $user)->with('flash-message', 'User Updated');
            } else {
                return redirect()->route('users.list', $request->user_type)->with('flash_message', 'User updated!');
            }
        }

    }

    public function userUpdate(UserFormRequest $request, $id, $user_type)
    {
        $user         = $this->userRepo->saveUser($request, $id);

        if ($user_type == 'user') {
            return redirect()->route('users.list', $request->user_type)->with('flash_message', 'User updated!');
        }

        if ($user_type == 'merchant') {
            $process_plan = $this->userRepo->saveProcessPlan($user, $request, $id);

            return redirect()->route('users.list', $request->user_type)->with('flah_msessage', 'Merchant updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function userDestroy($id, $user_type)
    {
        $this->userRepo->deleteUser($id);

        return redirect()->route('users.list', $user_type)->with('flash_message', 'User deleted!');
    }

    public function getPlanProcess(Request $request)
    {
        $plan_process_row = $request->plan_process_row;

        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html    = '<div class="card mt-4 border new-plan-process-input' . $plan_process_row . '">
                            <div class="card-body" style="background-color: #f5f8fa;">
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button data-attr="' . $attr . '" type="button" class="removePlanProcess' . $plan_process_row . ' btn btn-danger" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-5">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label class="form-label">Name (' . $lngcode . ')</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="plan_processes_name_' . $attr . $plan_process_row . '" name="plan_process_name_' . $attr . '[]" cols="50" rows="10"></input>
                                </div>
                                <div class="form-group mt-4 mb-5">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label class="form-label">Description(' . $lngcode . ')</label>
                                        </div>
                                    </div>
                                    <textarea class="form-control editor" id="plan_processes_' . $attr . $plan_process_row . '" name="plan_process_' . $attr . '[]" cols="50" rows="10"></textarea>
                                </div>
                            </div>
                        </div>';
            array_push($returnHtml, $html);
        }

        return $returnHtml;
    }

    public function getPlanDescription(Request $request)
    {
        $plan_description_row = $request->plan_description_row;

        $returnHtml = [];

        foreach (config('lng.attr') as $lngcode => $attr) {
            $html    = '<div class="card mt-4 border new-plan-description-input' . $plan_description_row . '">
                            <div class="card-body" style="background-color: #f5f8fa;">
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button data-attr="' . $attr . '" type="button" class="removePlanDescription' . $plan_description_row . ' btn btn-danger" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-5">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label class="form-label">Name (' . $lngcode . ')</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="plan_description_name_' . $attr . $plan_description_row . '" name="plan_description_name_' . $attr . '[]" cols="50" rows="10"></input>
                                </div>
                                <div class="form-group mt-4 mb-5">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <label class="form-label">Description(' . $lngcode . ')</label>
                                        </div>
                                    </div>
                                    <textarea class="form-control editor" id="plan_description_' . $attr . $plan_description_row . '" name="plan_description_' . $attr . '[]" cols="50" rows="10"></textarea>
                                </div>
                            </div>
                        </div>';
            array_push($returnHtml, $html);
        }

        return $returnHtml;
    }

    public function getMerchantLocation(Request $request)
    {
        $html = "";
    }

    public function publishedEnabled(Request $request) 
    {
        $status = $this->userRepo->publishedEnabled($request);
        return response()->json(["success" => true]);   
    }
}
