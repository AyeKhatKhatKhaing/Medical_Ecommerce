<?php


namespace App\Repositories;

use Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Session;

class ActivityLogRepo
{

    public function getActivityLogs($request)
    {
        $activitylog    = $this->getActivityLogsData($request);

        $datatables     = DataTables::of($activitylog)
            ->addColumn('no', function ($activitylog) {
                return '';
            })

            ->editColumn('activity', function ($activitylog) {
                $description  = $activitylog->description;

                return $description;
            })

            ->editColumn('properties', function ($activitylog) {
                $properties     = '';

                $old_properties = getOldActivityLogsData($activitylog);
                $new_properties = getNewActivityLogsData($activitylog);
                $properties    .= "<span>OLD</span><br>";
                $properties    .= $old_properties . "<br>";
                $properties   .= "<span>NEW</span><br>";
                $properties    .= $new_properties;

                return $properties;
            })

            ->editColumn('actor', function ($activitylog) {
                $name      = $activitylog->user_name;

                return $name;
            })

            ->editColumn('date', function ($activitylog) {
                $date   = $activitylog->created_at;

                return $date;
            })

            ->addColumn('action', function ($activitylog) {
                $btn  = '';
                // $btn .= '<a href="'.route('activitylogs.show', $activitylog->id).'"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-eye" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('activitylogs.destroy', $activitylog->id) . '" method="POST" style="display:inline">
                                                            ' . csrf_field() . '' . method_field("DELETE") . '
                                                                <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px confirm_delete"><i class="bi bi-trash"></i></a>
                                                            </form>
                                                        </div>';

                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns(['actor', 'activity', 'properties', 'date', 'action']);

        return $datatables->make(true);
    }

    public function getActivityLogsData($request)
    {
        $search   = $request->search;

        $data     = DB::table('activity_log')
            ->leftjoin('users', function ($join) {
                return $join->on('activity_log.causer_id', 'users.id');
            })
            ->select('activity_log.*', 'users.name_en as user_name')
            ->get();

        // if($search){
        //     $data = User::where('name', 'LIKE', "%$search%")
        //                 ->orWhere('email', 'LIKE', "%$search%")
        //                 ->get();
        // }

        return $data;
    }

    public function saveUser(Request $request, $id = null)
    {
        $data             = $request->except('password');
        $data['password'] = bcrypt($request->password);

        if ($id === NULL) {
            $user  = User::create($data);

            foreach ($request->roles as $role) {
                $user->assignRole($role);
            }
        } else {
            $user  = User::findOrFail($id);
            $user->update($data);

            $user->roles()->detach();

            foreach ($request->roles as $role) {
                $user->assignRole($role);
            }
        }

        return ($user) ? $user : FALSE;
    }

    public function getUserData($id)
    {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');

        $user = User::with('roles')->select('id', 'name_en', 'email')->findOrFail($id);
        $user_roles = [];
        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }

        $data = [
            "roles"      => $roles,
            "user"       => $user,
            "user_roles" => $user_roles
        ];

        return $data;
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return ($user) ? $user : false;
    }
}
