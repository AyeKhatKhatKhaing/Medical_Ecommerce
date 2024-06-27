<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = \App\Models\Role::all();

        \App\Models\User::create([
            'name' => 'MediQ Admin',
            'email'=>'laramaster@visibleone.com',
            'email_verified_at' => now(),
            'password' => Hash::make('LaraTe@m'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = \App\Models\User::find(1);
        $user->roles()->attach(1);
    }
}
