<fieldset>

      


<div class="col-md-12">

	<?php

      $qtek=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=1");
      $qpolitik=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=2");
      $qpertahanan=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=3");
      $qpembangunan=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=4");
      $qtrans=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=5");
      $qindustri=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=6");
      $qperkantoran=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=7");
      $qscience=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=8");

        $qtek_jumlah=pg_num_rows($qtek);
        $qpolitik_jumlah=pg_num_rows($qpolitik);
        $qpertahanan_jumlah=pg_num_rows($qpertahanan);
        $qpembangunan_jumlah=pg_num_rows($qpembangunan);
        $qtrans_jumlah=pg_num_rows($qtrans);
        $qindustri_jumlah=pg_num_rows($qindustri);
        $qperkantoran_jumlah=pg_num_rows($qperkantoran);
        $qscience_jumlah=pg_num_rows($qscience);


      ?>
  <script>
window.onload = function () {

// Construct options first and then pass it as a parameter
var options1 = {
  animationEnabled: true,
  title: {
    text: "Kategori Favorit"
  },
  data: [{
    type: "column", //change it to line, area, bar, pie, etc
    legendText: "copyright© 2017 Powered by AyoKerja.com",
    showInLegend: true,
    dataPoints: [
      { y: <?php echo "$qtek_jumlah"  ?>, label:"Teknologi" },
      { y: <?php echo "$qpolitik_jumlah"  ?>, label:"Politik" },
     { y: <?php echo "$qpertahanan_jumlah"  ?>, label:"Pertahanan"},
                               { y: <?php echo "$qpembangunan_jumlah"  ?>, label:"Pembangunan"},
                                { y: <?php echo "$qtrans_jumlah"  ?>, label:"Transportasi"},
                                 { y: <?php echo "$qindustri_jumlah"  ?>, label:"Industri"},
                                  { y: <?php echo "$qperkantoran_jumlah"  ?>, label:"Perkantoran"},
                                   { y: <?php echo "$qscience_jumlah"  ?>, label:"Science"}
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

<div id="resizable" style="height: 500px;border:0px solid gray;">
  <div id="chartContainer1" style="height: 100%; width: 100%;"></div>
</div>

  
</div>

</fieldset>

