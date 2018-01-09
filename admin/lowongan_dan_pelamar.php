
<div class="col-xs-12">

	<?php

	$q1=pg_query($connection,"SELECT * FROM perusahaan WHERE status_perusahaan='sudah_dikonfirmasi'");
	$perusahaan=pg_num_rows($q1);

		$q2=pg_query($connection,"SELECT * FROM gagal ");
		$gagal=pg_num_rows($q2);


		$q6=pg_query($connection,"SELECT * FROM lowongan ");
		$lowongan=pg_num_rows($q6);



	$q5=pg_query($connection,"SELECT * FROM pelamar");
	$pelamar=pg_num_rows($q5);


      $q3=pg_query($connection,"SELECT * FROM lamaran_perusahaan Where status_lamaran='Lolos' ");
		$lolos=pg_num_rows($q3);

 $q4=pg_query($connection,"SELECT * FROM lamaran_perusahaan  ");

    

      $tunggu=0;
      while($menunggu=pg_fetch_array($q4)){
          if($menunggu['status_lamaran']!='Lolos'){
            $tunggu++;
          }

      }





	?>




<script>
window.onload = function () {

// Construct options first and then pass it as a parameter
var options1 = {
	animationEnabled: true,
	title: {
		text: "Pelamar Dan Lowongan"
	},
	data: [{
		type: "column", //change it to line, area, bar, pie, etc
    legendText: "copyright© 2017 Powered by AyoKerja.com",
		showInLegend: true,
		dataPoints: [
			 { y: <?php echo "$perusahaan"  ?>, label:"Perusahaan" },
      { y: <?php echo "$pelamar"  ?>, label:"Pelamar" },
     { y: <?php echo "$lowongan"  ?>, label:"Lowongan"},
                               { y: <?php echo "$lolos"  ?>, label:"Lolos"},
                                { y: <?php echo "$gagal"  ?>, label:"Gagal"},
                                 { y: <?php echo "$tunggu"  ?>, label:"Menunggu"}
                                  
			]
		}]
};

$("#resizable").resizable({
	create: function (event, ui) {
		//Create chart.
		$("#chartContainer1").CanvasJSChart(options1);
	},
	resize: function (event, ui) {
		//Update chart size according to its container size.
		$("#chartContainer1").CanvasJSChart().render();
	}
});

}
</script>

<div id="resizable" style="height: 500px;border:1px solid gray;">
	<div id="chartContainer1" style="height: 100%; width: 100%;"></div>
</div>
	
</div>