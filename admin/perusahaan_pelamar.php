<!DOCTYPE HTML>

<div class="col-md-12">
	
<?php

$q1=pg_query($connection,"SELECT * FROM perusahaan WHERE status_perusahaan='sudah_dikonfirmasi'");
$q2=pg_query($connection,"SELECT * FROM pelamar");

$pelamar=pg_num_rows($q2);
$perusahaan=pg_num_rows($q1);

?>

<script>
window.onload = function () {

var options = {
	animationEnabled: true,
	title: {
		text: "Perusahaan dan Pelamar"
	},
	data: [{
		type: "doughnut",
		innerRadius: "40%",
		showInLegend: true,
		legendText: "{label}",
		indexLabel: "{label} ",
		dataPoints: [
			{ label: "Perusahaan", y: <?php echo "$perusahaan" ?> },
			{ label: "Pelamar", y:  <?php echo "$pelamar" ?> }
		
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
	
</div>
