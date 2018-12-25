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
use App\Services\ShortCodes;

class EmailsNotificationsController extends Controller
{
    protected $view = 'admin.emails_notifications';

    public function settings()
    {
        return $this->view('settings');
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