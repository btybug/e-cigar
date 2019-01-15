<?php
/**
 * Created by PhpStorm.
 * User: hook
 * Date: 1/15/2019
 * Time: 4:00 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Http\File;

class ImportController extends Controller
{
    protected $view = 'admin.import';

    public function index()
    {
        return $this->view('index');
    }

    public function import(Request $request)
    {
        $rules = [
            'exl_file' => 'required|max:10000|mimes:csv'
        ];

        $this->validate($request,$rules);


        $file = $request->file('exl_file');
//        dd($file);

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
//        $destinationPath = 'public/uploads';
//        $file->move($destinationPath,$file->getClientOriginalName());
    }
}