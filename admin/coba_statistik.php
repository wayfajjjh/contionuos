<div id="char" style="height: 300px; width: 100%;"></div>
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

                      var options = {
                        title: {
                          text: "Kategori Lowongan Favorit"
                        },
                       
                        animationEnabled: true,
                        data: [{
                          type: "pie",
                          startAngle: 40,
                          toolTipContent: "<b>{label}</b>:({y})",
                          showInLegend: "true",
                          legendText: "{label}",
                          indexLabelFontSize: 8,
                         
                          dataPoints: [
                            { y: <?php echo "$qtek_jumlah"  ?>, label:"Teknologi"},
                             { y:<?php echo "$qpolitik_jumlah"  ?>, label:"Politik"},
                              { y: <?php echo "$qpertahanan_jumlah"  ?>, label:"Pertahanan"},
                               { y: <?php echo "$qpembangunan_jumlah"  ?>, label:"Pembangunan"},
                                { y: <?php echo "$qtrans_jumlah"  ?>, label:"Transportasi"},
                                 { y: <?php echo "$qindustri_jumlah"  ?>, label:"Industri"},
                                  { y: <?php echo "$qperkantoran_jumlah"  ?>, label:"Perkantoran"},
                                   { y: <?php echo "$qscience_jumlah"  ?>, label:"Science"}
                          
                          ]
                        }]
                      };
                      $("#char").CanvasJSChart(options);

                    }
                                      
                </script>