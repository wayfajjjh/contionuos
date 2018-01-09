 <ul class="list-unstyled">
		<?php
   $ulang=pg_query($connection,"SELECT * FROM pesan WHERE id_pelamar=$_SESSION[id_pelamar] AND id_login=$_GET[id_pelamar_nya] OR id_pelamar=$_GET[id_pelamar_nya] AND id_login=$_SESSION[id_pelamar] ORDER BY id_pesan DESC");

   while ($k=pg_fetch_array($ulang)) {
      if($k['id_pelamar']==$_SESSION['id_pelamar'] AND $k['id_login']==$_GET['id_pelamar_nya']){
    
?>
    

                  <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">

                         <?php 
                           $query_kita=pg_query($connection,"SELECT * FROM pelamar WHERE id_pelamar=$_SESSION[id_pelamar] ");
                           $kita=pg_fetch_array($query_kita);
                         ?>

                     <img src="<?php echo "img/pelamar/foto_profil/$kita[foto_profil]" ?>" alt="User Avatar" class="img-circle">
                    
                     </span>
                     <div class="chat-body1 clearfix">
                        <p style="background-color:#FFC8C8; border-radius:5px;"><?php echo " $k[isi_pesan]"; ?></p>
                     </div>
                  </li>



		 
		

   <?php
}if($k['id_pelamar']==$_GET['id_pelamar_nya'] AND $k['id_login']==$_SESSION['id_pelamar']){

   ?>
     
                     <li class="left clearfix" >
                        <?php 
                           $query_teman=pg_query($connection,"SELECT * FROM pelamar WHERE id_pelamar=$_GET[id_pelamar_nya] ");
                           $teman=pg_fetch_array($query_teman);
                         ?>

                     <span class="chat-img1 pull-left">
                        
                     <a href="<?php echo"home_pelamar.php?page=profil_pelamar&page_profil=profil_kita&id_pelamar_nya=$_GET[id_pelamar_nya]" ?>">
<img src="<?php echo "img/pelamar/foto_profil/$teman[foto_profil]" ?>" alt="User Avatar" class="img-circle">
                     </a>
                     </span>
                     <div class="chat-body1 clearfix "  >
               <p  style="background-color:#E6FCFF; border-radius:5px;"><?php echo " $k[isi_pesan]"; ?></p>
              
                     </div>
                  </li>

   <?php
}

   ?>

























      <?php

   
}

      ?>

       </ul>