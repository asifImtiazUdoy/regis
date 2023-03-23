<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Exhibitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExhibitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibitors = Exhibitor::orderBy('id', 'DESC')->get();
        return view('back.exhibitor.index', compact('exhibitors'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exhibitor = Exhibitor::findOrFail(intval($id));
        return view('back.exhibitor.show', compact('exhibitor'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exhibitor = Exhibitor::findOrFail(intval($id));
        
        $image_path = '/home/livingar/exhibition.livingartbg.com/uploads/images/'.$exhibitor->image;
        $artwork_path = '/home/livingar/exhibition.livingartbg.com/uploads/images/'.$exhibitor->artwork;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        
        if(File::exists($artwork_path)){
            File::delete($artwork_path);
        }
        
        $exhibitor->delete();
        return redirect()->route('participants.index')->with('success', 'An Exhibitor is deleted successfully');
    }
}
