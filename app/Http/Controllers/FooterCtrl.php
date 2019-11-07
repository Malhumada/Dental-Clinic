<?php

namespace SoftEngin\Http\Controllers;

use Illuminate\Http\Request;
use SoftEngin\Settings;

class FooterCtrl extends Controller
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

$chk= Settings::where('set_value', $request->data)->get();

        if(count($chk) !== 0){
            return redirect("dashboard#footer")->with('danger','It is exist, you can delete it befor add again');
        }
        else{

        
        $footer = new Settings();
        $footer->set_name = 'footer';
        $footer->set_value = $request->data;
        $footer->set_code = $request->footer_text;
        $footer->save();


        return redirect("dashboard#footer")->with('success','Value Added');
}

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
        $footer = Settings::where('id',$id)->delete();
        

        return redirect('dashboard#sidebar')->with('success','Copyright deleted');
    }
}
