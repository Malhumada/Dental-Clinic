

@extends('main')

@section('content')
<br>


 
 <div class="container" style="width:50%;">  

{!! Form::open(['action'=>'PatientCtrl@Psave','method'=>'post']) !!}
{!! Form::hidden('_method', 'get') !!}
 @csrf
{!! Form::hidden('unique_id',$SearchPro->implode('unique_id') ) !!}

Name:
{!! Form::text('name', $SearchPro->implode('name'),['class'=> 'form-control' ,  'required'] ) !!}

<br>


Birthday:
{!! Form::text('birthday',$SearchPro->implode('birth') ,['class'=> 'form-control' ,  'required'] ) !!}

<br>

Mobile:
{!! Form::text('phone',$SearchPro->implode('phone') ,['class'=> 'form-control' ,  'required'] ) !!}
<br>



address:
{!! Form::text('address',$SearchPro->implode('address') ,['class'=> 'form-control' ,  'required'] ) !!}
<br>

allergies:
{!! Form::text('allergies',$SearchPro->implode('allergies') ,['class'=> 'form-control' ,  'required'] ) !!}
<br>

 

medic:
{!! Form::text('medic',$SearchPro->implode('medic') ,['class'=> 'form-control' ,  'required'] ) !!}

<br>

patho:
{!! Form::text('patho',$SearchPro->implode('patho') ,['class'=> 'form-control' ,  'required'] ) !!}
<br>

created_at:
{!! Form::text('created_at',$SearchPro->implode('created_at') ,['class'=> 'form-control' ,  'required'] ) !!}
<br>

updated_at:
{!! Form::text('updated_at',$SearchPro->implode('updated_at') ,['class'=> 'form-control' ,  'required'] ) !!}
<br>
<br>


{!!  Form::submit('Save',['class'=>'btn btn-primary form-control']) !!} 



{!! Form::close() !!}
<br>
<br>
<center> 
<a href="deletepro/{{$SearchPro->implode('unique_id')}}"><button class="btn btn-danger" onclick="return confirm('Are you sure want to delete this profile ?');"> Delete Profile</button></a> 
 </center>
<br>
<br>
<br>
<br>

{!! Form::close() !!}


</div>



@endsection
