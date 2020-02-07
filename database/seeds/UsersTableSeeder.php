<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('secret'),
            'last_name'=>'Adminyan',
            'phone'=>'311113',
            'country'=>'Yerevan',
            'status'=>1,
            'gender'=>'male',
            'email_verified_at'=>date('m/d/Y', now()->getTimestamp()),
            'role_id'=>1
        ]);
    }
}
