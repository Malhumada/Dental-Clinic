
@extends('main')

@section('content')
 



 

{!! Form::open(['action'=>'PatientCtrl@store','method'=>'post']) !!}

 
<div class="container" style="width:50%; padding:60px;">

   
<script>function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
   
        document.body.innerHTML = printContents;
   
        window.print();
   
        document.body.innerHTML = originalContents;
   }</script>

 
    <div style="border:black dotted;">
 <div id="printableArea"> 
   
 <center>    profile ID : <br>
     {{$pa->implode('name')}} <br>
           {!! QrCode::size(200)->generate($pa->implode('unique_id')); !!}
  
</center>
 </div></div>
 <input type="button" onclick="printDiv('printableArea')" value="Print ID" class="btn btn-dark" />

<br> <br>
<br> <br>
<div class="form-title">Full Name:  *
    {!! Form::text('name', $pa->implode('name'),['class'=> 'form-control' ,  'required'] ) !!}

</div>

<br>

{!! Form::hidden('unique_id', $pa->implode('unique_id')) !!}

<div class="form-title">Date of Birth:  *
    {!! Form::date('birth', $pa->implode('date'),['class'=> 'form-control' ,  'required'] ) !!}

</div>

<br>




<div class="form-title">Phone number:  *
    {!! Form::number('phone', $pa->implode('phone'),['class'=> 'form-control' ,  'required'] ) !!}

</div>

<br>



<div class="form-title">address:  *
    {!! Form::text('address',$pa->implode('address'),['class'=> 'form-control' ,  'required'] ) !!}

</div>

<br>



<div class="form-title">Do you have any allergies? If yes. please indicate what you are allergic to:
    {!! Form::text('allergies', "None",['class'=> 'form-control' ,  'required'] ) !!}

</div>

<br>




<div class="form-title">Please list medications you are currently using (if applicable):
    {!! Form::text('medic', "None",['class'=> 'form-control' ,  'required'] ) !!}

</div>


<br>


<div class="form-title">Dental Pathological case :
        {!! Form::textarea('patho', "None",['class'=> 'form-control',  'required' ] ) !!}

    </div>


    <br>


<div class="form-title">
    {!!  Form::submit('Save',['class'=>'btn btn-primary form-control']) !!}

</div>


 
</div>





{!! Form::close() !!}




@endsection