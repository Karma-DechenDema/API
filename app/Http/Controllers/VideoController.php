<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Video;
use App\Http\Resources\Video as AudioResource;
use Illuminate\Support\Facades\Route;

class VideoController extends Controller
{

     public function index()
    {
        // //Get all file
       

  $videos = Video::paginate(15);

  return VideoResource::collection($videos);


 
        // // Return a collection of $file with pagination
        // return FileResource::collection($files);

        //try

  

    }

 
    public function show($id)
    {
        //Get the file
        $video = Video::findOrfail($id);
 
        // Return a single file
        return new VideoResource($video);
    }
 
    public function destroy($id)
    {
        //Get the file
        $video = Video::findOrfail($id);
 
        if($video->delete()) {
            return new FileResource($video);
        } 
 
    }
 
    public function store(Request $request)  {
 
        $video = $request->isMethod('put') ? Audio::findOrFail($request->video_id) : new File;
            
        $video->id = $request->input('video_id');
        $video->title = $request->input('title');
       
        $video->user_id =  1; //$request->user()->id;
 		 $video->author = $request->input('author');
         $video->video = $request->get('video');

        if($video->save()) {
            return new FileResource($video);
        } 
        
    }
}


