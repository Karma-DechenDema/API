<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\File;
use App\Http\Resources\File as FileResource;
use Illuminate\Support\Facades\Route;

class FileController extends Controller
{
     public function index()
    {
        // //Get all file
        
            

  $files = File::paginate(15);

  return FileResource::collection($files);


 
        // // Return a collection of $file with pagination
        // return FileResource::collection($files);

        //try

  

    }

 
    public function show($id)
    {
        //Get the file
        $file = File::findOrfail($id);
 
        // Return a single file
        return new FileResource($file);
    }
 
    public function destroy($id)
    {
        //Get the file
        $file = File::findOrfail($id);
 
        if($file->delete()) {
            return new FileResource($file);
        } 
 
    }
 
    public function store(Request $request)  {
 
        $file = $request->isMethod('put') ? File::findOrFail($request->file_id) : new File;
            
        $file->id = $request->input('file_id');
        $file->title = $request->input('title');
        $file->overview = $request->input('overview');
        $file->user_id =  1; //$request->user()->id;
 		 $file->story = $request->input('story');
 		 $file->author = $request->input('author');
         $file->image = $request->get('image');

        if($file->save()) {
            return new FileResource($file);
        } 
        
    }
}
