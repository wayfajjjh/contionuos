  <fieldset>
                 





                  <?php

                    $query=pg_query($connection,"SELECT * FROM perusahaan WHERE status_perusahaan='sudah_dikonfirmasi'
                    
                    ORDER BY id_perusahaan desc" );

                    while($r = pg_fetch_array($query)){
                     

                   ?>
                      
                          <div class="col-md-4 col-xs-12 " >
                              <div style="height:280px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                             

                              <img src=<?php echo "img/perusahaan/perusahaan_thumbnails/$r[foto_profil_perusahaan]" ?> alt="" style="width:100%; height:150px; ">
                            <a href=<?php echo "home_admin.php?page=halaman_perusahaan&id=$r[id_perusahaan]"; ?>>
                             <center><h5> <?php echo "$r[nama_perusahaan]"; ?> </h5></a></center> 


                            
                            

                            
                              
                              

                             


                            </div>
                            

                              
                            </div>
                          


                              
                          
                       

                    





                       <?php }
                       ?>

              












  

  </fieldset>
      