<div class="col-md-12">
  <div id="chartContainer" style="height: 500px; width: 100%;"></div>
      <?php

     $q=pg_query($connection,"SELECT * FROM gagal ");
      $q2=pg_query($connection,"SELECT * FROM lamaran_perusahaan Where status_lamaran='Lolos' ");
            $q3=pg_query($connection,"SELECT * FROM lamaran_perusahaan  ");

      $gagal=pg_num_rows($q);
      $lolos=pg_num_rows($q2);

      $tunggu=0;
      while($menunggu=pg_fetch_array($q3)){
          if($menunggu['status_lamaran']!='Lolos'){
            $tunggu++;
          }

      }






      ?>
                 <script>
                      window.onload = function () {

                      var options = {
                        title: {
                          text: "Pelamar Gagal, Lolos, Dan Menunggu"
                        },
                       
                        animationEnabled: true,
                        data: [{
                          

                          type: "pie",
    startAngle: 40,
    toolTipContent: "<b>{label}</b>: {y}",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 16,
    indexLabel: "{label} - {y}",
                         
                          dataPoints: [
                            { y: <?php echo "$tunggu"  ?>, label:"Menunggu"},
                               { y: <?php echo "$gagal"  ?>, label:"Gagal"},
                              { y: <?php echo "$lolos"  ?>, label:"Lolos"}


                          
                          ]
                        }]
                      };
                      $("#chartContainer").CanvasJSChart(options);

                    }
                                      
                </script>


  
</div>