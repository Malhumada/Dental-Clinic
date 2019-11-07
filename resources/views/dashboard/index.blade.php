@extends('main')
@section('content')





    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

 <br>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading >
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div-->

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Posts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">


                  </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">My Comments</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">




                       </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body ">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">My Info: </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <br>
                      PHP version: {{ phpversion()}} 
                      @if( phpversion() < '7.2.0')<br>
                      <font color="red">It is height recommand to update PHP version to 7.2</font>
                      @endif

<br>
                      <br>
                          {{strtoupper(auth::user()->name)}}

                          <br>
                       <h4>  {{' IP: '.$_SERVER['REMOTE_ADDR'] }}</h4>

                        


                         </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-users" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>






           




            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Appointment for Today:</h6>
                  <div class="dropdown no-arrow"></div>

                  
                </div>
                <!-- Card Body -->
                <div class="card-body">


                  @if(count($appoint) === 0   )
                  No Appointments for today 

                @else





<table class="table">
      <thead>
                          <tr>
                  <th>Appointment Number:</th>
                  <th>Patient name:</th>
                  <th>State:</th>
                  <th>Complete status:</th>
                          </tr>
                        </thead>     <tbody>           
                         @foreach ($appoint as $item)
                    
                    
@if($item->complete_status == 'Not yet')
               
                      <tr>
                        <th scope="row"> {{$item->id}} </th>
                        <td>{{$item->name }}</td>

                        @if( $item->state  ===  "Emergency" )
                      <td>    <font color="red"><b> {{$item->state }} </b></font></td>
                       @else
                       <td>{{$item->state }}</td> 
                       @endif


                       <td>( {{$item->complete_status}} ) &nbsp 
                        {!! Form::open(['action'=>'PatientCtrl@AppointPickup','method'=>'post']) !!}
                        @csrf {!! Form::hidden('_method', 'get') !!}
                        {!! Form::hidden('unique_id', $item->unique_id ) !!}
                        {!! Form::submit('Pickup',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
 </td>
                      </tr>

                      @else
                      <th scope="row">All done for today </th>    
                 @endif

                    @endforeach
</tbody></table>
  @endif

                </div>
              </div>
            </div>







            









      <div class="col-lg-6 mb-4" >
          <!-- Approach -->

                @if(auth::user()->role == 1 )
                <!-- Categories --><section id="userlist">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add patient:</h6>
                  </div>
                  <div class="card-body">


                      @include('pages.add_pe')


                   </div>
                  </div> </section>
                  @endif
  </div>







  <div class="col-lg-6 mb-4" >
      <!-- Approach -->

            @if(auth::user()->role == 1 )
            <!-- Categories --><section>
            <div class="card shadow mb-4"  id="Patients-List">
              <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Patients List: </h6>
                  </div>
                  <div class="card-body">

            
                    

<div id="QRcamera" style="display:none ; ">     

    <video id="preview" width="100%"></video>


    <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

      scanner.addListener('scan', function (content) {


      document.getElementById('myInput').value = content ;
      scanner.stop();
   document.getElementById('QRcamera').style.display="none";

      });


    </script>
</div>







<button class="btn btn-info form-control" onclick="Function()" id="QRbtn">Scan QR</button>

<script>
function Function() {
  //var myWindow = window.open("QrcodeReader" , "", "width=700,height=480");
  document.getElementById('QRcamera').style.display=' block' ;

  Instascan.Camera.getCameras().then(function (cameras) {

if (cameras.length > 0) {

  scanner.start(cameras[0]);

  document.getElementById("SearchP").disabled = false;
  document.getElementById('QRbtn').innerHTML="Search profile";

} else {

  console.error('No cameras found.');

  document.getElementById("SearchP").disabled = false;

  document.getElementById("QRbtn").disabled = true;
  document.getElementById('QRbtn').innerHTML="No camera found";

}

}).catch(function (e) {

console.error(e);

});
}

</script>
<center> 
  {!! Form::open(['action'=>'PatientCtrl@SearchP', 'mehtod'=>'post', 'onsubmit'=>"if(document.getElementById('myInput').value !== ''){} else{this.innerHTML='scan the QR code first'; this.disabled=true;}" ]) !!}
  {!! Form::hidden('_method', "get") !!}
<input type="text" value="" id="myInput" name="unique_id"><br> 
   <button type="submit"  class="btn btn-primary" id="SearchP"  >Search profile</button>   

   {!! Form::close() !!}

  </center>

<br>
<br>
    
@include('pages.patient-list')



                  </div>
                </div> </section>
                @endif
</div>









<!-------------------------------------------------------- -->

 
<!-------------------------------------------------------- -->
              
  











            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users List:</h6>

                </div>


                <!-- Card Body -->
                <div class="card-body">

                  @include('pages.add_user')

              </div>
            </div>
          </div>











          <div class="col-lg-6 mb-4" id="banner" >
          <!-- Approach -->

                @if(auth::user()->role == 1 )
                <!-- Categories --><section id="userlist">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Banner info :</h6>
                  </div>
                  <div class="card-body">



{!! Form::open(['action'=>'SettingsCtrl@banner','method'=>'post']) !!}
{!! Form::hidden('_method', 'get') !!}


Location:
{!! Form::text('location', $location->implode('set_code'),['class'=> 'form-control' ,  'required'] ) !!}



Openning Hours:
{!! Form::text('open_hours', $open_hours->implode('set_code'),['class'=> 'form-control' ,  'required'] ) !!}


Mobile:
{!! Form::text('mobile', $mobile->implode('set_code'),['class'=> 'form-control' ,  'required'] ) !!}





{!!  Form::submit('Save',['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}







<br> <hr>


<h5>Add slider to banner:</h5>

{!! Form::open(['action'=>'SettingsCtrl@slider','method'=>'post']) !!}
{!! Form::hidden('_method', 'get') !!}
@csrf
Slide title:
{!! Form::text('slide_title', "",['class'=> 'form-control' ,  'required'] ) !!}

Slide text:
{!! Form::text('slide_text', "",['class'=> 'form-control' ,  'required'] ) !!}

{!!  Form::submit('Save',['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}





<br><hr> 
  <h5>Banner slide available:</h5>
<div id="slider" class="card" style=" width:90%;">
@if(count($slider) !== 0)



  <div style="grid-template-columns: auto auto auto ; display:grid;">
      <table class="table">
          <thead>
              <tr>
                  <th>Name:</th>
                  <th>Delete</th>
         </tr>
     </thead>
     <tbody>
 @foreach ($slider as $item)


<tr>  <td scope="row">                        
{!! Form::open([ 'action'=> 'SettingsCtrl@sliderDel' , 'method'=>'post']) !!}
{!! Form::hidden('_method','get') !!}
{!! Form::hidden('id', $item->id) !!}
@csrf
{{$item->set_value}} 
<th> {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!} </th>

{!! Form::close() !!}



</td> </tr>


@endforeach

        
     </tbody>
 </table>            

<br> <br>



</div>

@else
<div class="card" style=" width:90%;">
No record

</div>
@endif


</div>



                   
                   <br> <hr>


                   {!! Form::open(['action'=>'SettingsCtrl@Testimo','method'=>'post']) !!}
                   {!! Form::hidden('_method', 'get') !!}
                   @csrf
                   <h4>Testimonials slider:</h4>
                   {!! Form::text('Testimo_title', "",['class'=> 'form-control' ,  'required'] ) !!}
                   
                   Testimo text:
                   {!! Form::text('Testimo_text', "",['class'=> 'form-control' ,  'required'] ) !!}
                   
                   {!!  Form::submit('Save',['class'=>'btn btn-primary']) !!}
                   
                   {!! Form::close() !!}
                   
                   <br><hr><br>
                   
                   <div id="Testimo" class="container" style=" width:90%;">
                   @if(count($Testimo) !== 0)
                   
                   
                     <h4>Testimonials available:</h4>
                     <div style="grid-template-columns: auto auto auto ; display:grid;">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th>Name:</th>
                                     <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($Testimo as $item)
                   
                   
                   <tr>  <td scope="row">                        
                   {!! Form::open([ 'action'=> 'SettingsCtrl@TestimoDel' , 'method'=>'post']) !!}
                   {!! Form::hidden('_method','get') !!}
                   {!! Form::hidden('id', $item->id) !!}
                   @csrf
                   {{$item->set_value}} 
                   <th> {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!} </th>
                   
                   {!! Form::close() !!}
                   </td> </tr>
                   @endforeach
                        </tbody>
                    </table>            
                   
                   <br> <br>
                   </div> 
                   @else
                   <div class="card" style=" width:90%;">
                   No records
               </div>   
                @endif
                   </div>
























                   

                   
                   <br> <hr>


                   {!! Form::open(['action'=>'SettingsCtrl@Services','method'=>'post']) !!}
                   {!! Form::hidden('_method', 'get') !!}
                   @csrf
                   <h4>Services:</h4>
                   {!! Form::text('Services_title', "",['class'=> 'form-control' ,  'required'] ) !!}
                   
                   Services text:
                   {!! Form::text('Services_text', "",['class'=> 'form-control' ,  'required'] ) !!}
                   
                   {!!  Form::submit('Save',['class'=>'btn btn-primary']) !!}
                   
                   {!! Form::close() !!}
                   
                   <br><hr><br>
                   
                   <div id="Services" class="container" style=" width:90%;">
                   @if(count($Services) !== 0)
                   
                   
                     <h4>Services available:</h4>
                     <div style="grid-template-columns: auto auto auto ; display:grid;">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th>Name:</th>
                                     <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($Services as $item)
                   
                   
                   <tr>  <td scope="row">                        
                   {!! Form::open([ 'action'=> 'SettingsCtrl@ServicesDel' , 'method'=>'post']) !!}
                   {!! Form::hidden('_method','get') !!}
                   {!! Form::hidden('id', $item->id) !!}
                   @csrf
                   {{$item->set_value}} 
                   <th> {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!} </th>
                   
                   {!! Form::close() !!}
                   </td> </tr>
                   @endforeach
                        </tbody>
                    </table>            
                   
                   <br> <br>
                   </div> 
                   @else
                   <div class="card" style=" width:90%;">
                   No records
               </div>   
                @endif
                   </div>


                   
                  
                  
                  </div> </section>
                  @endif
  </div>










 




          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#content-wrapper">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  @endsection

