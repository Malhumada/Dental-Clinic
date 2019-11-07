 
 <center>
<div class="container justify-content-center"  style="width:90%">

  

 
  <div class="card">
      
          <h4 class="card-title">Footer :</h4>
          <p class="card-text"> 
         
      
          {!! Form::open(['action'=>'FooterCtrl@store','method'=>'post']) !!}
    <select name="data">
      <option value="facebook">Facebook</option>
      <option value="instagram">Instgram</option>
      <option value="linkedin">Linkedin</option>
      <option value="copyright">Copyright</option>
    </select><br><br>
          {!! Form::text('footer_text', "",['class'=> 'form-control' ,  'required'] ) !!}
<br>
    
      {!! Form::submit("Save",['class'=>'btn btn-primary form-control']) !!}
      
      {!! Form::close() !!}
        <!--button onclick='document.getElementById("p").innerHTML+= "<input type=text name=cats[] value="+ document.getElementById("cat_name").value +">" ;'> add</button-->
      </p>    
      


    </div>
      
 
<br>

 
<div class="card" style=" width:90%;">
      <h4>Settings available:</h4>
      <div style="grid-template-columns: auto auto auto ; display:grid;">
          <table class="table">
              <thead>
                  <tr>
                      <th>Name:</th>
                      <th>Value:</th>
                      <th>Delete</th>
                         
       

             </tr>
         </thead>
         <tbody>
 
            
                
                
      @foreach ($footer as $item)
  
<tr>                        
 {!! Form::open(['method'=>'post', 'action'=>['FooterCtrl@destroy', $item->id ]]) !!}
 {!! Form::hidden('_method','delete') !!}
<th>{{$item->set_value}} </th>
<th>{{$item->set_code}} </th>
<th> {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!} </th>

{!! Form::close() !!}


    @endforeach    
  </tr>
 

 
            
         </tbody>
     </table>            

  <br> <br>


  
</div>
 
  
 
  </div></center>