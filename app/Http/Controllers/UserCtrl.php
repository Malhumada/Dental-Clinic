<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;

class UserCtrl extends Controller
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pass' => 'required',
            'role' => 'required',
            'roleName' => 'required',


        ]);



        $userCheck =user::where('email',$request->email)->get();
        if(count($userCheck) == 0 ){
        
            $user= new User()    ;
            $user->name=$request->name;
            $user->email = $request->email; 
            $user->password = Hash::make($request->pass);
            $user->role = $request->role;
           $user->role_name=$request->roleName;
   
           $user->save();
   
           return redirect('dashboard#userlist')->with('success','User addedd successfully') ;
   
        }
       else{
           return redirect('dashboard#userlist')->with('danger','This Email address is exist') ;
           
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


        $usrConfrim = user::get();

        if(count($usrConfrim) == 1 )
        {
            $userConfrim= user::find($id);
        if($userConfrim->role == 1  ){
 return back()->with('danger','You cannot delete the last admin account');
      
    }}
    else{

             $user = user:: find($id);
 
         $user->delete();

        return back();
    }





    }

}
