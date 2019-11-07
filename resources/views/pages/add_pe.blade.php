
 {!! Form::open(['action'=>'PatientCtrl@store','method'=>'post']) !!}
 @csrf

 <div class="form-title">

    <h2>New Patient Form</h2><br>

Full Name:  *
    {!! Form::text('name', "",['class'=> 'form-control' ,  'required'] ) !!}



<br>



Date of Birth:  *
    {!! Form::date('birth', "",['class'=> 'form-control' ,  'required'] ) !!}



<br>




Phone number:  *
    {!! Form::number('phone', "",['class'=> 'form-control' ,  'required'] ) !!}



<br>



address:  *
    {!! Form::text('address', "",['class'=> 'form-control' ,  'required'] ) !!}



<br>



Do you have any allergies? If yes. please indicate what you are allergic to:
    {!! Form::text('allergies', "None",['class'=> 'form-control' ,  'required'] ) !!}



<br>




Please list medications you are currently using (if applicable):
    {!! Form::text('medic', "None",['class'=> 'form-control' ,  'required'] ) !!}




<br>


Dental Pathological case :
        {!! Form::textarea('patho', "None",['class'=> 'form-control',  'required' ] ) !!}

   


    <br>


 
    {!!  Form::submit('Save',['class'=>'btn btn-primary']) !!}
</div>
 

<br>





{!! Form::close() !!}
