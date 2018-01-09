

<fieldset>                                                                                            
              <div class="col-xs-12">
                    <center><h2>Tambah Syarat Lowongan</h2></center><hr>

                    <form  method="POST" action="perusahaan/php/proses_tambah_syarat_lowongan.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;" >

                                        <div class="content">
                                            <div class="row">                                      
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div id='TextBoxesGroup'>  
                                                            <div id="TextBoxDiv1">   
                                                                <h4>Syarat Lowongan 1</h4>
                                                                <input type="text" class="form-control border-input" name="syarat" id="syarat1" placeholder="Syarat Lowongan" required="required"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 34px;">
                                                    <input type='button' class="btn-link" value='Tambah Syarat' id='addButton'>
                                                    <input type='button' class="btn-link" value='Kurangi Syarat' id='removeButton'>
                                                </div>
                                                <div class="text-center" style="margin-bottom: 34px;">
                                                    <?php
                                                        if(isset($_GET['from'])){
                                                    ?>
                                                        <input type="hidden" name="from" value="<?php echo $_GET['from'];?>"/>
                                                    <?php
                                                        }
                                                    ?>
                                                    <input type="hidden" name="id" value=<?php echo $_GET['id_lowongan'] ?>>
                                                     <input type="hidden" name="id_pt" value=<?php echo $_GET['id'] ?>>

                                                    <input type="hidden" name="array_syarat" id="array_syarat"/>
                                                    <input type="submit" class="btn btn-info btn-fill btn-wd" id='getButtonValue' value="Submit Data"/>
                                                     <br><br><br><hr>
                                                </div>
                                            </div>
                                        </div>
                                  
                              


                           
                       
                    </form>

              </div>                          
                    
                        


</fieldset> 