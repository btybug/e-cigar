<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Statuses;
use App\Models\Ticket;
use App\Models\TicketFiles;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    protected $view = 'admin.ticket';

    private $statuses;
    private $category;
    private $user;
    private $ticketFiles;

    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];

    public function __construct(
        Statuses $statuses,
        Category $category,
        User $user,
        TicketFiles $ticketFiles
    )
    {
        $this->statuses = $statuses;
        $this->category = $category;
        $this->user = $user;
        $this->ticketFiles = $ticketFiles;
    }

    public function index()
    {
        return $this->view('index');
    }

    public function getNew ()
    {
        $model = null;
        $statuses = $this->statuses->where('type','tickets')->get()->pluck('name','id')->all();
        $priorities = $this->statuses->where('type','ticket_priority')->get()->pluck('name','id')->all();
        $categories = $this->category->where('type','tickets')->get()->pluck('name','id')->all();
        $staff = $this->user->pluck('name','id')->all();

        return $this->view('new',compact(['model','statuses','priorities','categories','staff']));
    }

    public function postNew (Request $request)
    {
        $data = $request->except('_token','attachments');

        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        $validator = validator($request->all(), [
            'subject' => 'required',
            'summary' => 'required',
            'attachments.*' => 'sometimes|file|mimes:' . $all_ext . '|max:' . $max_size
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $data['user_id'] = \Auth::id();
        $ticket = Ticket::create($data);

        if($ticket){
            if($request->hasfile('attachments')){
                foreach($request->file('attachments') as $file){
                    $this->saveFiles($ticket,$file);
                }
            }
        }

        return redirect()->route('admin_tickets');
    }

    private function saveFiles($model,$file){
        $ext = $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $type = $this->getType($ext);
        $name = uniqid();
        $path = '/public/' . \Auth::id() . '/' . $type;

        if (Storage::putFileAs('/public/' . \Auth::id() . '/' . $type . '/', $file, $name . '.' . $ext)) {
            return $this->ticketFiles->create([
                'ticket_id' => $model->id,
                'name' => $name,
                'original_name' => $originalName,
                'path' => $path,
                'type' => $type,
                'extension' => $ext,
                'user_id' => \Auth::id()
            ]);
        }
    }

    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audio';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'video';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'document';
        }
    }

    private function allExtensions()
    {
        return array_merge($this->image_ext, $this->audio_ext, $this->video_ext, $this->document_ext);
    }
}