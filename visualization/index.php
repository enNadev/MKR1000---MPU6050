
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Azeem Project</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<style>
.get_reading {
  background-color: rgb(0,0,0,0.5);
  color: #fff;
  font-weight: 600;
  padding: 10px;
}
</style>
<body>
 <div class="container">
  <br><br>
  <h1 style="text-align: center;">Sensor Readings</h1>
  <br><br>
  <div class="col-md-2">
   <label>Ax</label>
   <p class="get_reading" id="Ax1"></p>
   <p class="get_reading" id="Ax2"></p>
   <p class="get_reading" id="Ax3"></p>
   <p class="get_reading" id="Ax4"></p>
   <p class="get_reading" id="Ax5"></p>
   <p class="get_reading" id="Ax6"></p>
   <p class="get_reading" id="Ax7"></p>
   <p class="get_reading" id="Ax8"></p>
   <p class="get_reading" id="Ax9"></p>
   <p class="get_reading" id="Ax10"></p>
   <br><br>
 </div>
 <div class="col-md-2">
   <label>Ay</label>
   <p class="get_reading" id="Ay1"></p>
   <p class="get_reading" id="Ay2"></p>
   <p class="get_reading" id="Ay3"></p>
   <p class="get_reading" id="Ay4"></p>
   <p class="get_reading" id="Ay5"></p>
   <p class="get_reading" id="Ay6"></p>
   <p class="get_reading" id="Ay7"></p>
   <p class="get_reading" id="Ay8"></p>
   <p class="get_reading" id="Ay9"></p>
   <p class="get_reading" id="Ay10"></p>
   <br><br> 
 </div>
 <div class="col-md-2">
   <label>Az</label>
   <p class="get_reading" id="Az1"></p>
   <p class="get_reading" id="Az2"></p>
   <p class="get_reading" id="Az3"></p>
   <p class="get_reading" id="Az4"></p>
   <p class="get_reading" id="Az5"></p>
   <p class="get_reading" id="Az6"></p>
   <p class="get_reading" id="Az7"></p>
   <p class="get_reading" id="Az8"></p>
   <p class="get_reading" id="Az9"></p>
   <p class="get_reading" id="Az10"></p>
   <br><br>
 </div>

 <div class="col-md-2">
   <label>Gyro-1</label>
   <p class="get_reading" id="Gx1"></p>
   <p class="get_reading" id="Gx2"></p>
   <p class="get_reading" id="Gx3"></p>
   <p class="get_reading" id="Gx4"></p>
   <p class="get_reading" id="Gx5"></p>
   <p class="get_reading" id="Gx6"></p>
   <p class="get_reading" id="Gx7"></p>
   <p class="get_reading" id="Gx8"></p>
   <p class="get_reading" id="Gx9"></p>
   <p class="get_reading" id="Gx10"></p>
   <br><br>
 </div>
 <div class="col-md-2">
   <label>Gyro-2</label>
   <p class="get_reading" id="Gy1"></p>
   <p class="get_reading" id="Gy2"></p>
   <p class="get_reading" id="Gy3"></p>
   <p class="get_reading" id="Gy4"></p>
   <p class="get_reading" id="Gy5"></p>
   <p class="get_reading" id="Gy6"></p>
   <p class="get_reading" id="Gy7"></p>
   <p class="get_reading" id="Gy8"></p>
   <p class="get_reading" id="Gy9"></p>
   <p class="get_reading" id="Gy10"></p>
   <br><br>
 </div>
 <div class="col-md-2">
   <label>Gyro-3</label>
   <p class="get_reading" id="Gz1"></p>
   <p class="get_reading" id="Gz2"></p>
   <p class="get_reading" id="Gz3"></p>
   <p class="get_reading" id="Gz4"></p>
   <p class="get_reading" id="Gz5"></p>
   <p class="get_reading" id="Gz6"></p>
   <p class="get_reading" id="Gz7"></p>
   <p class="get_reading" id="Gz8"></p>
   <p class="get_reading" id="Gz9"></p>
   <p class="get_reading" id="Gz10"></p>
   <br><br>
 </div>

 <div class="row">

  <label for="download" style="font-weight: 600; font-size: 24px; margin-left: 400px;"> Generate  CSV : </label>


  <button type="button" name="download" id="down" class="btn btn-primary btn-lg " style="margin-left: 20px; margin-top: -10px;" onclick="save();">Download</button>

</div>
</div> 

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">

  $('#down').click(function(e) {
    // $.ajax({
    //   url: "serviceGenerateCSV.php",
    //   cache: false,
    //   success: function(result)
    //   {
    //     // alert("File Successfully Created");
    //   }
    // });    
    e.preventDefault();  //stop the browser from following
    window.location.href = 'services/serviceGenerateCSV.php';
  });

  function refreshValues(){
    $.ajax({
      url: "services/serviceRefreshValues.php",
      cache: false, 
      success: function(result)
      {
 // console.log(check);
 if(result != "" && result!="0 results"){
  var data=JSON.parse(result);
  
  $('#Ax1').empty();
  $('#Ax1').text(data[0].x);
  $('#Ay1').empty();
  $('#Ay1').text(data[0].y);
  $('#Az1').empty();
  $('#Az1').text(data[0].z);
  $('#Gx1').empty();
  $('#Gx1').text(data[0].g1);
  $('#Gy1').empty();
  $('#Gy1').text(data[0].g2);
  $('#Gz1').empty();
  $('#Gz1').text(data[0].g3);

  $('#Ax2').empty();
  $('#Ax2').text(data[1].x);
  $('#Ay2').empty();
  $('#Ay2').text(data[1].y);
  $('#Az2').empty();
  $('#Az2').text(data[1].z);
  $('#Gx2').empty();
  $('#Gx2').text(data[1].g1);
  $('#Gy2').empty();
  $('#Gy2').text(data[1].g2);
  $('#Gz2').empty();
  $('#Gz2').text(data[1].g3);

  $('#Ax3').empty();
  $('#Ax3').text(data[2].x);
  $('#Ay3').empty();
  $('#Ay3').text(data[2].y);
  $('#Az3').empty();
  $('#Az3').text(data[2].z);
  $('#Gx3').empty();
  $('#Gx3').text(data[2].g1);
  $('#Gy3').empty();
  $('#Gy3').text(data[2].g2);
  $('#Gz3').empty();
  $('#Gz3').text(data[2].g3);

  $('#Ax4').empty();
  $('#Ax4').text(data[3].x);
  $('#Ay4').empty();
  $('#Ay4').text(data[3].y);
  $('#Az4').empty();
  $('#Az4').text(data[3].z);
  $('#Gx4').empty();
  $('#Gx4').text(data[3].g1);
  $('#Gy4').empty();
  $('#Gy4').text(data[3].g2);
  $('#Gz4').empty();
  $('#Gz4').text(data[3].g3);

  $('#Ax5').empty();
  $('#Ax5').text(data[4].x);
  $('#Ay5').empty();
  $('#Ay5').text(data[4].y);
  $('#Az5').empty();
  $('#Az5').text(data[4].z);
  $('#Gx5').empty();
  $('#Gx5').text(data[4].g1);
  $('#Gy5').empty();
  $('#Gy5').text(data[4].g2);
  $('#Gz5').empty();
  $('#Gz5').text(data[4].g3);

  $('#Ax6').empty();
  $('#Ax6').text(data[5].x);
  $('#Ay6').empty();
  $('#Ay6').text(data[5].y);
  $('#Az6').empty();
  $('#Az6').text(data[5].z);
  $('#Gx6').empty();
  $('#Gx6').text(data[5].g1);
  $('#Gy6').empty();
  $('#Gy6').text(data[5].g2);
  $('#Gz6').empty();
  $('#Gz6').text(data[5].g3);

  $('#Ax7').empty();
  $('#Ax7').text(data[6].x);
  $('#Ay7').empty();
  $('#Ay7').text(data[6].y);
  $('#Az7').empty();
  $('#Az7').text(data[6].z);
  $('#Gx7').empty();
  $('#Gx7').text(data[6].g1);
  $('#Gy7').empty();
  $('#Gy7').text(data[6].g2);
  $('#Gz7').empty();
  $('#Gz7').text(data[6].g3);

  $('#Ax8').empty();
  $('#Ax8').text(data[7].x);
  $('#Ay8').empty();
  $('#Ay8').text(data[7].y);
  $('#Az8').empty();
  $('#Az8').text(data[7].z);
  $('#Gx8').empty();
  $('#Gx8').text(data[7].g1);
  $('#Gy8').empty();
  $('#Gy8').text(data[7].g2);
  $('#Gz8').empty();
  $('#Gz8').text(data[7].g3);

  $('#Ax9').empty();
  $('#Ax9').text(data[8].x);
  $('#Ay9').empty();
  $('#Ay9').text(data[8].y);
  $('#Az9').empty();
  $('#Az9').text(data[8].z);
  $('#Gx9').empty();
  $('#Gx9').text(data[8].g1);
  $('#Gy9').empty();
  $('#Gy9').text(data[8].g2);
  $('#Gz9').empty();
  $('#Gz9').text(data[8].g3);

  $('#Ax10').empty();
  $('#Ax10').text(data[9].x);
  $('#Ay10').empty();
  $('#Ay10').text(data[9].y);
  $('#Az10').empty();
  $('#Az10').text(data[9].z);
  $('#Gx10').empty();
  $('#Gx10').text(data[9].g1);
  $('#Gy10').empty();
  $('#Gy10').text(data[9].g2);
  $('#Gz10').empty();
  $('#Gz10').text(data[9].g3);
  
}
else{
  alert("DATA BASE IS EMPTY");
}
}
});
  }
  $(document).ready(function(){
    refreshValues();
    
    setInterval(refreshValues, 1000);
  });


</script>

</body>
</html>
