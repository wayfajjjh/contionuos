<script src="https://use.fontawesome.com/45e03a14ce.js"></script>
<div class="main_section">
   <div class="container">
      <div class="chat_container">
         <div class="col-md-12 chat_sidebar"  >
    	 <div class="row">

           
            
            </div>
         </div>
         <!--chat_sidebar-->

		 
         <div class="col-xs-12 col-md-9 message_section">
		 <div class="row">
		 <div class="new_message_head">
		
		 </div><!--new_message_head-->
		 
		 <div class="chat_area">
            <?php

       include "isi_pesan.php";

       ?>
		
		 </div><!--chat_area-->
          <div class="message_write">
     <form  method="POST" action="pelamar/php/proses_kirim_pesan.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;" >
            <input class="form-control" type="text" name="isi" placeholder="Masukan Pesan Disini..." style="width:100%; margin-bottom:10px;" required/>
                     <input type="hidden" value="<?php echo"$_SESSION[id_pelamar]" ?>" name="id_kita">
                     <input type="hidden" value="<?php echo"$_GET[id_pelamar_nya]" ?>" name="id_teman">


                   <div class="clearfix"></div>
                   <button class="btn btn-success" type="submit" style="float:right; margin:0px 3px 0px 3px;">Kirim Pesan</button>


         </form>
         
		 </div>
		 </div>
         </div> <!--message_section-->
      </div>
   </div>
</div>