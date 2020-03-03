<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PostalRates;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostalRateController extends Controller
{
    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostalRates::latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'file_name' => 'required|string|max:191',
            'description' => 'required',
            // 'file' => 'required',
        ]);
        $path="";
        if ($request->file) {
            if ($request->file->getClientOriginalName()) {
                $ext = $request->file->getClientOriginalExtension();
                $file = date('YmdHis') . rand(1, 99999) . '.' . $ext;
                $path = $request->file->move('postal-rates', $file);

            }
        }else{
            $path="";
        }



        return PostalRates::create([
            'file_name'  => $request->file_name,
            'description'  => $request->description,
            'file'  => $path
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request;
         $postalRate=PostalRates::findOrfail($id);
         $this->validate($request,[
            'file_name' => 'required|string|max:191',
            'description' => 'required',
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {
            File::delete($receiver->file);
            $extension = "." . $request->file->getClientOriginalExtension();
            $name = basename($request->file->getClientOriginalName(), $extension) . time();
            $name = $name . $extension;
            $path =  $request->file->move('postal-rates', $name);
            $receiver->file = $path;
        }
        $postalRate->file_name=$request->file_name;
        $postalRate->description=$request->description;

        $postalRate->save();
        return ['message'=>'updated'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postalRate=PostalRates::findOrfail($id);
        $postalRate->delete();
        return ['message'=>'Delete Staff'];
    }
}
