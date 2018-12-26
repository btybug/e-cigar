<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 12/25/2018
 * Time: 5:16 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\MailTemplatesRequest;
use App\Http\Controllers\Controller;
use App\Models\Emails;
use App\Models\MailTemplates;
use App\Models\Notifications\CustomEmails;
use App\Services\ShortCodes;
use App\User;
use Illuminate\Http\Request;

class EmailsNotificationsController extends Controller
{
    protected $view = 'admin.emails_notifications';

    public function sendEmail()
    {
        return $this->view('send.emails');
    }

    public function sendEmailCreate()
    {
        $froms = Emails::where('type', 'from')->pluck('email', 'email');
        $shortcodes = new ShortCodes();
        $users = User::all()->pluck('name', 'id');
        return $this->view('send.email_create', compact('users', 'shortcodes', 'froms'));
    }

    public function postSendEmailCreate(Request $request)
    {
        $data = $request->only('from', 'type');
        $data['status']=0;
        $users = $request->get('users');
        $translatable = $request->get('translatable');
        $email = CustomEmails::updateOrCreate($request->id, $data, $translatable);
        $email->users()->attach($users, ['status' => 0]);
        return redirect()->route('admin_emails_notifications_send_email');
    }
    public function postSendEmailCreateSend(Request $request)
    {
        $data = $request->only('from', 'type');
        $data['status']=1;
        $users = $request->get('users');
        $translatable = $request->get('translatable');
        $email = CustomEmails::updateOrCreate($request->id, $data, $translatable);
        $email->users()->attach($users, ['status' => 1]);
        return redirect()->route('admin_emails_notifications_send_email');
    }

    public function sendNotificationCreate()
    {

        $users = User::all()->pluck('name', 'id');
        return $this->view('send.notification_create', compact('users'));
    }

    public function sendNotifications()
    {
        return $this->view('send.notifications');
    }

    public function emails()
    {
        return $this->view('emails.index');
    }

    public function notifications()
    {
        return $this->view('notifications.index');
    }

    public function getCreateMailTemplates($id = null)
    {

        $model = MailTemplates::find($id);
        $froms = Emails::where('type', 'from')->pluck('email', 'email');
        $tos = Emails::where('type', 'to')->pluck('email', 'email');
        $admin_model = MailTemplates::where('slug', 'admin_' . $model->slug)->first();
        $shortcodes = new ShortCodes();
        return $this->view('emails.manage', compact('model', 'shortcodes', 'admin_model', 'froms', 'tos'));
    }

    public function postCreateOrUpdate(MailTemplatesRequest $request)
    {
        $mail = MailTemplates::findOrFail($request->id);
        $data = $request->except('admin', 'translatable', '_token');
        $translatable = $request->get('translatable');
        $admin_data = $request->get('admin');
        MailTemplates::updateOrCreate($request->id, $data, $translatable);
        $translatable = $admin_data['translatable'];
        unset($admin_data['translatable']);
        $admin_data['slug'] = 'admin_' . $mail->slug;
        $admin_model = MailTemplates::where('slug', $admin_data['slug'])->first();
        $admin_data['is_for_admin'] = 1;
        $id = ($admin_model) ? $admin_model->id : null;
        MailTemplates::updateOrCreate($id, $admin_data, $translatable);
        return redirect()->route('admin_emails');
    }
}