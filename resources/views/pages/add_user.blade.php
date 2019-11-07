 
 <center>
<div class="container justify-content-center">

 
     


 
 
       {!! Form::open(['action'=>'UserCtrl@store','method'=>'post']) !!}  
          <h4 class="card-title">Add User:</h4>
          <p class="card-text"> 

                <table class="table">
                        <thead>
                            <tr>
                                  
      
       
         <th>Name:</th> 
            
         <th>   {!! Form::text('name','' ,['class'=> 'form-control' ,'required']) !!}</th>
         
                            </tr>
         <th>pass:</th>
         <th> {!! Form::text('pass','' ,['class'=> 'form-control' ,'required']) !!}</th> 
 
         <tr> 
        <th>Email:</th>
        <th>{!! Form::email('email','' ,['class'=> 'form-control' ,'required']) !!}</th>
        </tr>

        <tr> 
         <th>role:</th> 
        <th> <select class="form-control" name="role" id="" onchange="document.getElementById('roleName').value= this.options[this.selectedIndex].innerHTML;" >
            <option value="1">Admin</option>
            <option value="2">Audit</option>
            <option value="3">Author</option>
            <option value="4" selected>User</option>
        
        </select> </th> 
        </tr>
 
        {!! Form::hidden('roleName','4',['id'=>'roleName', 'class'=>'']) !!}
      
     <tr>
         <td>   {!! Form::submit("Save",['class'=>'btn btn-primary form-control']) !!} </td>
      </tr>  
      {!! Form::close() !!}
        <!--button onclick='document.getElementById("p").innerHTML+= "<input type=text name=cats[] value="+ document.getElementById("cat_name").value +">" ;'> add</button-->
      </p>    
      
 
      
    </table>
<br>

<div class="card">
      <h2>Users:</h2>
      <div style="grid-template-columns: auto auto auto ; display:grid;">
          <table class="table">
              <thead>
                  <tr>
                      <th>Name:</th>
                      <th>Role</th>
                      <th>Delete</th>
                         
       

             </tr>
         </thead>
         <tbody>
 
            
                
                
                
                 
@foreach ($users_all as $user)
    

<tr>                  
 {!! Form::open(['method'=>'post', 'action'=>['UserCtrl@destroy', $user->id ] , 'onsubmit' => 'return confirm("are you sure ?")']) !!}
 {!! Form::hidden('_method','delete') !!}
 <th>{{$user->name}} </th>
 
 <th>{{$user->role_name}} </th>
<th> {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!} </th>

{!! Form::close() !!}



  </tr>
 

@endforeach

            
         </tbody>
     </table>            

  <br> <br>

</div></div></center>

 