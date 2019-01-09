<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Audio;
use App\Http\Resources\Audio as AudioResource;
use Illuminate\Support\Facades\Route;

class AudioController extends Controller
{

     public function index()
    {
        // //Get all file
       

  $audios = Audio::paginate(15);

  return AudioResource::collection($audios);


 
        // // Return a collection of $file with pagination
        // return FileResource::collection($files);

        //try

  

    }

 
    public function show($id)
    {
        //Get the file
        $audio = Audio::findOrfail($id);
 
        // Return a single file
        return new AudioResource($audio);
    }
 
    public function destroy($id)
    {
        //Get the file
        $audio = Audio::findOrfail($id);
 
        if($audio->delete()) {
            return new FileResource($audio);
        } 
 
    }
 
    public function store(Request $request)  {
 
        $audio = $request->isMethod('put') ? Audio::findOrFail($request->audio_id) : new File;
            
        $audio->id = $request->input('audio_id');
        $audio->title = $request->input('title');
       
        $audio->user_id =  1; //$request->user()->id;
 		 $audio->author = $request->input('author');
         $audio->audio = $request->get('audio');

        if($audio->save()) {
            return new FileResource($audio);
        } 
        
    }
}


