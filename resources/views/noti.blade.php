
<script>

function reload() {
  //document.location.reload();
  $("#notification").fadeOut(1500);
        
}


</script>

<div id="notification">

@if (session('success'))

<div class="alert alert-success text-center">
    
    {{ session('success') }}
    <script>setTimeout(reload, 5000);</script>
 
<button style="float: right;" class="btn btn-danger text-left" onclick="reload()" >  <i class="fa fa-close" aria-hidden="true"></i> </button>
 

</div>
@endif


@if (session('danger'))
<div class="alert alert-danger text-center">
    {{ session('danger') }}
    <script>setTimeout(reload, 5000);</script>
 
<button style="float: right;" class="btn btn-danger text-left" onclick="reload()" >  <i class="fa fa-close" aria-hidden="true"></i> </button>
 

</div>

@endif



   

@if ($errors->any())

    <div class="alert alert-danger text-center">
 <button style="float: right;" class="btn btn-danger text-left" onclick="reload()" >  <i class="fa fa-close" aria-hidden="true"></i> </button>

         <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item">{{ $error }}</li> 
            @endforeach
        </ul>




    </div>
@endif




</div>

