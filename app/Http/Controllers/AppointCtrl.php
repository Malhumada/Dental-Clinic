<?php

namespace App\Http\Controllers;

use App\Appoint;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 
 
use Illuminate\Http\Request;

class AppointCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        
        return view('pages.appointment');

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
        $ap_co = DB::table('appoints')->count();
        $ap= new Appoint();
        $ap->name = $request->name;
       
        $ap->phone = $request->phone;
        $ap->date = $request->date;
        $ap->unique_id = $ap_co . '-' . Str::random(4) ;
        $ap->time = $request->time ;
        $ap->state = $request->state;
        $ap->address = $request->address;
        $ap->complete_status = "Not yet";

        $ap->save();

        return redirect('/')->with('success','Appointment added successfully') ;


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
        //
    }
}
