
@extends('main')

@section('content')
<br>



 

<div class="container " style="width:50%;">
 
   
    <div class="form-group"  >
     {!! Form::open(['action'=>'AppointCtrl@store','method'=>'post']) !!}

      Name: <font color="red">*</font> 
   {!! Form::text('name', '', ['class'=>'form-control' , 'required']) !!}

   <br>

   
   
    Phone:     <i class="fa fa-mobile-phone" aria-hidden="true"></i>   <font color="red">*</font> 
   {!! Form::number('phone','', ['class'=>'form-control' , 'required']) !!}

   <br><br>


   Address:     <i class="fa fa-mobile-phone" aria-hidden="true"></i>   <font color="red">*</font> 
  {!! Form::text('address','', ['class'=>'form-control' , 'required']) !!}

  <br><br>



 
  <h5> Appointment Date and time:  <font color="red">*</font></h5> <br>
<i class="fa fa-calendar" aria-hidden="true"></i> Date: <font color="red">*</font>
   {!! Form::date('date', '', ['class'=>'card' , 'required']) !!} &nbsp; Example: 1/1/2020 
   <br>
   <br>
   <i class="fa fa-clock-o" aria-hidden="true"></i> Time: <font color="red">*</font>
   {!! Form::time('time', '', ['class'=>'card' ,'required']) !!} &nbsp; Example: 10:00 AM
   <br> 
   <br> <br>
 
   State : <i class="fa fa-star" aria-hidden="true"></i>  <font color="red">*</font>      <div style="width:50%;"> 
  {!! Form::select('state', ['Normal'=>'Normal','Emergency'=>'Emergency'], 'Normal', ['class'=>'form-control','required']) !!}
   <br></div>
   
   <br>  <br>  
{!! Form::submit('Save', ['class'=>'btn btn-primary form-control']) !!}
   <br> 

 <br>  <br>  <br>  <br>

</div>

{!! Form::close() !!}

</div>
@endsection
