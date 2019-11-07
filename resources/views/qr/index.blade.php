<!DOCTYPE html>

<html>

<head>

	<title>Find profile by QRcode </title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>

<body>



    <i class="fa fa-qrcode" aria-hidden="true"></i>



    <h1>Put QRcode in front of the camera :</h1>

    

    <video id="preview"></video>

<input type="text" value="" id="myInput">
 
    <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

      scanner.addListener('scan', function (content) {


      document.getElementById('myInput').value = content ;

  
      });

      Instascan.Camera.getCameras().then(function (cameras) {

        if (cameras.length > 0) {

          scanner.start(cameras[0]);

        } else {

          console.error('No cameras found.');

        }

      }).catch(function (e) {

        console.error(e);

      });

    </script>


</body>

</html>