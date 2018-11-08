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
        $email = new \App\Models\MailTemplates(['slug' => 'confirm_email','from'=>'hr@hook.am']);
        $email->save();
        $email->translateOrNew($locale)->subject = 'please confirm';
        $email->translateOrNew($locale)->content = '';
        $email->save();

        $email = new \App\Models\MailTemplates(['slug' => 'reset_password','from'=>'hr@hook.am']);
        $email->save();
        $email->translateOrNew($locale)->subject = 'please reset';
        $email->translateOrNew($locale)->content = '';
        $email->save();

        $email = new \App\Models\MailTemplates(['slug' => 'ticket','from'=>'hr@hook.am']);
        $email->save();
        $email->translateOrNew($locale)->subject = 'New Ticket';
        $email->translateOrNew($locale)->content = '';
        $email->save();
    }
}
