<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Staff::latest()->paginate(10);
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
            'name' => 'required|string|max:191',
            'staff_post' => 'required',
            'office_no' => 'required',
        ]);
        
        if($request->image){
            $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('images/staff/').$name);
            $request->merge(['image' => $name]);
        }



        return Staff::create([
            'name'  => $request['name'],
            'staff_post'  => $request['staff_post'],
            'email'  => $request['email'],
            'office_no'  => $request['office_no'],
            'image'  => '/images/staff/'.$request['image']
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
        $staff=Staff::findOrfail($id);
        $this->validate($request,[
            'name'              => 'required|string|max:191',
            'staff_post'        => 'required',
            'office_no'         => 'required',
            'image'             => 'required|mimes:jpeg,jpg,png'
        ]);

        $currentImage = $staff->image;
        if($request->image != $currentImage){
            $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            $currentImage = $staff->image;

            \Image::make($request->image)->save(public_path('images/staff/').$name);

            $request->merge(['image' => '/images/staff/'.$name]);

            $staffImage = public_path('images/staff/').$currentImage;
            if(file_exists($staffImage)){
                @unlink($staffImage);
            }
        }

        $staff->update($request->all());
        return ['message'=>'updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff=Staff::findOrfail($id);
        $staff->delete();
        return ['message'=>'Delete Staff'];
    }
}
