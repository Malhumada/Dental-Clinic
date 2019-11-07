<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\DB;




class SettingsCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $nav= Settings::where('set_name',$request->set_name)->delete();

        $nav = new Settings();
        $nav->set_name = $request->set_name;
        $nav->set_value = $request->site_value ;
        $nav->set_code =$request->site_value ;
        $nav->save();
        return redirect('dashboard#'.$request->set_name)->with('success','Site Name saved');

        
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function banner(Request $request)
    {


        $ba = DB::table('settings')->where('set_value','location')->update(['set_code'=>$request->location]);
        $ba = DB::table('settings')->where('set_value','open_hours')->update(['set_code'=>$request->open_hours]);
        $ba = DB::table('settings')->where('set_value','Mobile')->update(['set_code'=>$request->mobile]);

        return redirect('dashboard#banner')->with('success','Setting updated');

    }

    

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slider(Request $request)
    {

        $slider = DB::insert('insert into Settings (set_name, set_value, set_code) values (?, ?, ?)', ['slider' , $request->slide_title, $request->slide_text]);

 
        return redirect('dashboard#banner')->with('success','Setting updated');

    }

    

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sliderDel(Request $request)
    {
        $slide = DB::table('settings')->where('id',$request->id)->delete();

        return redirect('dashboard#slider')->with('success','Setting updated');


    }



   

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Testimo(Request $request)
    {

        $Testimo = DB::insert('insert into Settings (set_name, set_value, set_code) values (?, ?, ?)', ['Testimo' , $request->Testimo_title, $request->Testimo_text]);

 
        return redirect('dashboard#Testimo')->with('success','Setting updated');

    }    
    

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function TestimoDel(Request $request)
    {
        $Testimo = DB::table('settings')->where('id',$request->id)->delete();

        return redirect('dashboard#Testimo')->with('success','Setting updated');


    }



   

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Services(Request $request)
    {

        $Services = DB::insert('insert into Settings (set_name, set_value, set_code) values (?, ?, ?)', ['Services' , $request->Services_title, $request->Services_text]);

 
        return redirect('dashboard#Services')->with('success','Setting updated');

    }    
    

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ServicesDel(Request $request)
    {
        $Services = DB::table('settings')->where('id',$request->id)->delete();

        return redirect('dashboard#Services')->with('success','Setting updated');


    }



    

}
