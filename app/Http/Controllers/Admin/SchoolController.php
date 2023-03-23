<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::orderBy('id', 'DESC')->get();
        return view('back.school.index', compact('schools'));
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
        //Validate Date
        $this->validate($request, array(
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ));

        $school = new School;
        $school->name = $request->name;
        $school->address = $request->address;

        $school->save();

        return redirect()->route('school.index')->with('success', 'New school is added successfully');
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
        $school = School::findOrFail(intval($id));
        return view('back.school.edit', compact('school'));
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
        $school = School::findOrFail(intval($id));
        
        //Validate Date
        $this->validate($request, array(
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ));

        $school->name = $request->name;
        $school->address = $request->address;

        $school->save();

        return redirect()->route('school.index')->with('success', 'School has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
