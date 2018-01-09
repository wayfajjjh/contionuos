<?php

session_start();
    


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>AyoKerja.com</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css_kita/index.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css_kita/login.css">
        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href="font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="home.php?page=halaman_awal" class="navbar-brand" style="color: #FFFFFF;">
                        AYOKERJA.COM
                    </a>
                </div>
                
                <!-- /.navbar-collapse -->
            </div>
        </nav>

              <div class="section section-header">
            <div class="parallax filter filter-color-black">
                <div class="image" style="background-image: url('img/12.jpg')">
                </div>
                <div class="container" style="opacity: .95;">
                    <div style="margin-top: 156px;">
                        <form class="form-signin" method="POST" action="admin/php/proses_login_admin.php" style="border: none;">
                            <!--<img src="img/logo.png" width="90px" style="margin-bottom: 20px;"/>-->
                            <h7 class="login-text">Login sebagai <b>Admin</b>.</h7>
                            <input class="form-control" type="text" name="username" placeholder="Username" required/>
                            <input class="form-control" type="password" name="password" placeholder="Password" required/>
                            <input class="btn btn-primary" type="submit" value="Login" style="padding: 14px 20px; margin-top: 20px;"
                                required/>
                        </form>
                    </div>
                </div>
            </div>
        </div>


                


                

        

        
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>

    </html>