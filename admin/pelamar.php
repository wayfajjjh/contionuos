<div class="col-md-12">
  <?php

         $query=pg_query($connection,"SELECT * FROM pelamar
          order by id_pelamar desc ");
         while($lamaran=pg_fetch_array($query)){


              if(empty($lamaran['pelamar_alamat'])  AND empty($lamaran['jenis_kelamin']) AND empty($lamaran['tempat_lahir']) 
               AND empty($lamaran['tanggal_lahir']) AND empty($lamaran['status']) 
               AND empty($lamaran['telepon']) AND empty($lamaran['foto_profil'])){




         ?>


         <?php

       }else{


       

         ?>

          <div class="col-md-4 col-xs-12 " >
                            <div style="height:280px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <a href="<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?>"><img src=<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?> alt="" style="width:100%; height:150px; "></a>
                           <center><a href=<?php echo "home_admin.php?page=profil_pelamar&id_pelamar=$lamaran[id_pelamar]"; ?>>
                              <h5> <?php echo "$lamaran[pelamar_nama_lengkap]"; ?> </h5></a></center> 
                             
                             

                            </div>
                        </div>



                        <?php

                }

                        ?>



         <?php

          }

         ?>
  
</div>
