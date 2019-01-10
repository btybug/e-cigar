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

    public function sendEmailCreate($id = null)
    {
        $model = CustomEmails::find($id);
        $froms = Emails::where('type', 'from')->pluck('email', 'email');
        $shortcodes = new ShortCodes();
        $users = User::all()->pluck('name', 'id');
        return $this->view('send.email_create', compact('users', 'shortcodes', 'froms', 'model'));
    }

    public function sendEmailView($id = null)
    {
        $model = CustomEmails::find($id);
//        dd($model->toArray());
        $froms = Emails::where('type', 'from')->pluck('email', 'email');
        $shortcodes = new ShortCodes();
        $users = User::all()->pluck('name', 'id');
        if($model['status'] == 0){
            abort("404");
        }
        return $this->view('send.email_view', compact('users', 'shortcodes', 'froms', 'model'));
    }

    public function postSendEmailCreate(Request $request)
    {
        $data = $request->only('from', 'type');
        $data['status'] = 0;
        $users = $request->get('users');
        $translatable = $request->get('translatable');
        $email = CustomEmails::updateOrCreate($request->id, $data, $translatable);
        $email->users()->attach($users, ['status' => 0]);
        return redirect()->route('admin_emails_notifications_send_email');
    }

    public function postSendEmailCreateSend(Request $request)
    {
        $data = $request->only('from', 'type');
        $data['status'] = 1;
        $users = $request->get('users');
        $translatable = $request->get('translatable');
        $email = CustomEmails::updateOrCreate($request->id, $data, $translatable);
        $email->users()->attach($users, ['status' => 1]);
        return redirect()->route('admin_emails_notifications_send_email');
    }

    public function emails()
    {
        return $this->view('emails.index');
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
        return redirect()->route('admin_emails_notifications_emails');
    }

    public function sendEmailSendNow(Request $request)
    {
        CustomEmails::where('id', $request->id)->update(['status' => 1]);
        return response()->json(['error' => false]);
    }

    public function sendEmailCopy(Request $request)
    {
        $email = CustomEmails::find($request->id);
        $new_email = $email->replicate();
        $new_email->status = 0;
        $new_email->push();
        foreach ($email->languages as $language) {
            $new_language = $language->replicate();
            $new_language->custom_emails_id = $new_email->id;
            $new_language->push();
        }
        $new_email->users()->attach($email->users->pluck('id'), ['status' => 0]);
        return response()->json(['error' => false]);
    }
}