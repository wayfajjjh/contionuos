<fieldset>
	<div class="section section-header">
            <div class="parallax filter filter-color-black">
                <div class="image" style="background-image: url('img/12.jpg')">
                </div>
                 <div class="container" style="opacity: .95;">
                    <div style="margin-top: 128px;">
                        <form class="form-signin" method="POST" action="perusahaan/php/proses_daftar_perusahaan.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;">
                            <!--<img src="img/logo.png" width="90px" style="margin-bottom: 20px;"/>-->
                            <h7 class="login-text">Daftar sebagai <b>Perusahaan</b>.</h7>
                            <input class="form-control" type="text" name="nama" placeholder="Nama Perusahaan" required/>
                            <input class="form-control" type="text" name="email" placeholder="Email" required/>
                            <input class="form-control" type="text" name="username" placeholder="Username" required/>
                            <input class="form-control" type="password" name="password" placeholder="Password" required/>
                            <input class="form-control" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required/>
                           	<input class="form-control" type="password" name="imb" placeholder="Nomor IMB" required/>
                            <input class="form-control" type="hidden" name="alamat" value="" required/>
                            <input class="form-control" type="hidden" name ="kota_id" value="1" required/>
                            <input class="form-control" type="hidden" name="telepon" value="" required/>
                            <input class="btn btn-primary" type="submit" value="Daftar" style="padding: 14px 20px; margin-top: 20px;"
                                required/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</fieldset>	