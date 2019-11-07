<?php

namespace App\Http\Controllers;
 
 
use App\User;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Patients;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PatientCtrl extends Controller
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
        
        $pa_co = DB::table('patients')->count();
        
        $pa = new patients();
        $pa->name = $request->name;
        $pa->birth= $request->birth;
        $pa->phone = $request->phone;
        $pa->unique_id = $pa_co . '-' . Str::random(4) ;
        $pa->address = $request->address;
        $pa->allergies=$request->allergies;
        $pa->medic = $request->medic;
        $pa->patho = $request->patho;
        $pa->save();


 
        $ppo = DB::table('appoints')->where('unique_id', $request->unique_id)->update(['complete_status'=>'done']);
 
        return redirect('dashboard#Patients-List')->with('success','Patient added successfuly');



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
    public function AppointPickup(Request $request)
    {
      if(Auth::check()){
        $pa = DB::table('appoints')->where('unique_id',$request->unique_id)->get() ;
         

        return view('pages.app_pickup',compact('pa'));

}else{
    return view('/');

}
    
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SearchP(Request $request)
    {
    $SearchPro = DB::table('Patients')->where('unique_id',$request->unique_id)->get();


    return view('pages.patient_profile',compact('SearchPro'));




    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Psave(Request $request)
    { 
 
 
$ppo = DB::table('Patients')->where('unique_id', $request->unique_id)->update(['name' => $request->name ,'phone' => $request->phone, 'unique_id' => $request->unique_id, 'address'=> $request->address, 'allergies'=>$request->allergies ,'medic' => $request->medic, 'patho' => $request->patho]);
 
 
        return redirect('dashboard#Patients-List')->with('success','Saved successfuly');



    }

    

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findPatient(Request $request)
    {
        
    

 
        if( Auth::check())   {

            $pa =  DB::table('patients')->paginate(15);
            $appoint = DB::table('appoints')->orderBy('state')->get();
       $findPatient = DB::table('patients')->where('name','LIKE','%'.$request->findPatient.'%')->paginate(15);
 

                $users_all =User::all();
 
                $SearchPro =['0'];


            // compact('post','comnt')
            return view('dashboard/index',compact('users_all','pa','appoint','SearchPro','findPatient'));


                  } else{

                 return redirect('/');


                  }


        
   
    }





    public function test($name , $id)
    {
        return 'Name: '.$name . '  ID:  '. $id ;

   
    }


}
