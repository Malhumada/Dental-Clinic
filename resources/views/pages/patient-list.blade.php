 
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
 
<div id="Patients"> 
 {!! Form::open(['action'=>'PatientCtrl@findPatient','method'=>'post']) !!}
@csrf
 {!! Form::hidden('_method', 'get') !!}
<input type="text" id="myInput" name="findPatient" placeholder="Search by any part of word" title="Type in a name" required>

{!! Form::submit('Search', ['class'=>'btn btn-info form-control']) !!}
{!! Form::close() !!}


<br>
<br>
<br>


    <table  id="myTable" class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
        
          <th>Date</th>
          <th>Profile</th>
        </tr>
      </thead>
      <tbody>









          @if($findPatient  === '1')
       
           @foreach ($pa as $item)
        <tr>
            {!! Form::open(['action'=>'PatientCtrl@SearchP','method'=>'post']) !!}
            {!! Form::hidden('_method', 'get') !!}
            {!! Form::hidden('unique_id', $item->unique_id) !!}
        <td> {{  $item->name }} </td>
        <td>{{$item->created_at}}</td>
        <td>{!! Form::submit('profile',['class'=>'btn btn-info']) !!}  </td>

            {!! Form::close() !!}
        </tr>
            @endforeach

            

            @else
            @foreach ($findPatient as $item)
            <tr>
              @if(count($findPatient) === 0 )
              <td rowspan="3">No profile found</td>


              @endif 

              {!! Form::open(['action'=>'PatientCtrl@SearchP','method'=>'post']) !!}
              {!! Form::hidden('_method', 'get') !!}
              {!! Form::hidden('unique_id', $item->unique_id) !!}
              @csrf
          <td> {{  $item->name }} </td>
          <td>{{$item->created_at}}</td>
          <td>{!! Form::submit('profile',['class'=>'btn btn-info']) !!}  </td>

              {!! Form::close() !!}

        </tr>
        @endforeach
        @endif     
      




      </tbody>
    </table>


     {{ $pa->links()}}

</div>
