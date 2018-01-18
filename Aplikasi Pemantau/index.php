<!DOCTYPE html>
<?php 
//include('config.php');
$connect = mysqli_connect("artificial.mysql.database.azure.com","gunglaksman@artificial","Blackteen2+","db_tugasakhir");
$query = "SELECT * FROM tb_bpm";
$query1 = "SELECT * FROM tb_profilemanula";
$result = mysqli_query($connect, $query);
$result1 = mysqli_query($connect, $query1);
?>
<html>
   <head>
      <title>Tugas Akhir</title>
	  
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <meta name="mobile-web-app-capable" content="yes">
       
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
   </head>
   <body> 
       <h4><center>Monitoring Lansia</center></h4>
       <div class="row">
            <div class="col s12">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header">
                      <i class="material-icons">person</i>
                      Profile
                    </div>
                    <div class="collapsible-body center-align">
                        
                            <img class="materialboxed responsive-img" src="../project_root/padrayana.jpg">
                            <p class="center-align">Bagus Padrayana<br>61 tahun</p>
                            
                        
                    </div>
                  </li>
                    
                  <li>
                    <div class="collapsible-header">
                      <i class="material-icons">gesture</i>
                      Status
                      <span class="badge"></span>
                    </div>
                    <div class="collapsible-body">
                          <ul class="collection">
                            <li class="collection-item avatar">
                              <i class="material-icons circle green">place</i>
                              <span class="title">Lokasi</span>
                              <p>Ruang tamu</p>
                            </li>
                            <li class="collection-item avatar">
                              <i class="material-icons circle red">favorite</i>
                              <span class="title">Denyut Jantung</span>
                              <p>71 BpM</p>
                            </li>
                            <li class="collection-item avatar">
                              <i class="material-icons circle light-blue darken-3">directions_walk</i>
                              <span class="title">Tingkat Aktivitas</span>
                              <p>Sedang</p>
                            </li>
                            <li class="collection-item avatar">
                              <i class="material-icons circle orange darken-2">accessible</i>
                              <span class="title">Status Jatuh</span>
                              <p>Tidak Terjatuh</p>
                            </li>
                          </ul>
                    </div>
                  </li>
                </ul>
                <div class="row">
                    <ul class="collection">
                      <li class="collection-item">
                          <div class="collapsible-header">
                              <i class="material-icons">graphic_eq</i>
                              Log BpM
                              <span class="badge"></span>
                          </div>
                          <div id="grafik"></div>
                        </li>
                    </ul>
                                
                 </div>
            </div>
        </div>
       
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="application/javascript">
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawBasic);
            
            function drawBasic() {
    
              var data = new google.visualization.arrayToDataTable([
                 ['waktu','bpm'],
                 <?php 
                  $no = 1;
                  while($row = mysqli_fetch_array($result))
                  {
                      
                      echo "[".$no.", ".$row["bpm"]."],";
                      $no++;
                  }
                  
                  ?>
              ]);

              var options = {
                hAxis: {
                  title: 'Waktu'
                },
                vAxis: {
                  title: 'BpM'
                },
                'legend': 'bottom',
              };

              var chart = new google.visualization.LineChart(document.getElementById('grafik'));

              chart.draw(data, options);
            }
        </script>
       
   </body>
</html>