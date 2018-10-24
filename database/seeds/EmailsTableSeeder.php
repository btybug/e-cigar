<?php

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locale='gb';
        $email = new \App\Models\Emails(['slug' => 'confirm_email','from'=>'hr@hook.am']);
        $email->save();
        $email->translateOrNew($locale)->title = 'Email Confirmation';
        $email->translateOrNew($locale)->subject = 'please confirm';
        $email->translateOrNew($locale)->content = '';
        $email->save();

        $email = new \App\Models\Emails(['slug' => 'reset_password','from'=>'hr@hook.am']);
        $email->save();
        $email->translateOrNew($locale)->title = 'Reset Password';
        $email->translateOrNew($locale)->subject = 'please reset';
        $email->translateOrNew($locale)->content = '';
        $email->save();
    }
}
