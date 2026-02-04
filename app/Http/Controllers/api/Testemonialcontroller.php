<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Testemonial;
use Illuminate\Http\Request;

class Testemonialcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testemonials=Testemonial::all();
        return response()->json($testemonials);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image',
            'title'=>'required|string',
            'user_name'=>'required|string',
            'description'=>'required|string',
            'rating'=>'required|number',
        ]);
            $image=$request->file('image');
            $imagename=time().".".$image->getclientoriginalname();
            $image->move(public_path("files/images"),$imagename);
            $testemonial=new Testemonial([
                'image'=>$imagename,
                'title'=>$request->title,
                'user_name'=>$request->user_name,
                'rating'=>$request->rating,
                'description'=>$request->description,]);
            auth()->user()->testemonials()->save($testemonial);
            return response()->json(['message'=>'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testemonial=Testemonial::find($id);
        if(empty($testemonial)){
            return response()->json(['message'=>'testemonial not found']);
        }
        $image_path=public_path('files/images'.$testemonial->image);
        unlink($image_path);
        $testemonial->delete();
        return response()->json(['message'=>'success']);
    }
    }

