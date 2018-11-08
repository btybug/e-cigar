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

}