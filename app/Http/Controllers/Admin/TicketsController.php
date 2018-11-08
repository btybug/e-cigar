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
use App\Models\Reply;
use App\Models\Statuses;
use App\Models\Ticket;
use App\Models\TicketFiles;
use App\Services\FileService;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    protected $view = 'admin.ticket';

    private $statuses;
    private $category;
    private $user;
    private $fileService;

    public function __construct(
        Statuses $statuses,
        Category $category,
        User $user,
        FileService $fileService
    )
    {
        $this->statuses = $statuses;
        $this->category = $category;
        $this->user = $user;
        $this->fileService = $fileService;
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
        $all_ext = implode(',',  $this->fileService->allExtensions());

        $validate = $this->fileService->validate($request->all(), [
            'subject' => 'required',
            'summary' => 'required',
            'attachments.*' => 'sometimes|file|mimes:' . $all_ext . '|max:' . $max_size
        ]);

        if($validate) return redirect()->back()->withErrors($validate);

        $data['user_id'] = \Auth::id();
        $ticket = Ticket::create($data);

        if($ticket){
            if($request->hasfile('attachments')){
                foreach($request->file('attachments') as $file){
                    $this->fileService->saveFiles($ticket->attachments(),$file);
                }
            }
        }

        return redirect()->route('admin_tickets');
    }

    public function getEdit ($id)
    {
        $model = Ticket::findOrFail($id);

        $statuses = $this->statuses->where('type','tickets')->get()->pluck('name','id')->all();
        $priorities = $this->statuses->where('type','ticket_priority')->get()->pluck('name','id')->all();
        $categories = $this->category->where('type','tickets')->get()->pluck('name','id')->all();
        $staff = $this->user->pluck('name','id')->all();
        $replies = $model->replies()->main()->get();

        return $this->view('edit',compact(['model','statuses','priorities','categories','staff','replies']));

    }

    public function reply(Request $request)
    {
        $data = $request->all();
        $rules = [
            'ticket_id' => 'required|exists:tickets,id',
            'reply' => 'required|min:2|max:1000'
        ];

        $result = [
            'ticket_id' => $data['ticket_id'],
            'parent_id' => (isset($data['parent_id'])) ? $data['parent_id'] : null,
            'author_id' => \Auth::id(),
            'reply' => trim(htmlspecialchars($data['reply']))
        ];

        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            return \Response::json(['errors' => $validator->messages(),'success' => false]);
        }

        $reply = new Reply();
        $reply->create($result);
        $ticket = Ticket::find($data['ticket_id']);
        $replies = $ticket->replies()->main()->get();
        $html = \View::make('admin.ticket._partials.comments',compact('replies'))->render();

        return \Response::json(['success' => true,'message' => 'Success','html' => $html]);
    }

}