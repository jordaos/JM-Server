<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Project;
use App\Image;

class ImagesController extends Controller
{

    public function index() {
        return (new Response('', 404));
    }

    public function indexView() {
        $projects = Project::all();
        return view('image.create')->withProjects($projects);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new Image();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;
        $entry->pt_description = $request->pt_description;
        $entry->en_description = $request->en_description;
        $entry->project()->associate($request->project_id);
		$entry->save();
 
		return response()->json($entry, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);

        if(!$image) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $image->fileUrl = \Illuminate\Support\Facades\Request::root() . "/images/" . $image->filename;

        return response()->json($image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showImage($filename)
    {
        $entry = Image::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
 
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($filename)
    {
        $entry = Image::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->delete($entry->filename);
        $entry->delete();
 
		return (new Response('', 204));
    }
}
