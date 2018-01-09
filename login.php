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
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-uppercase">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false" style="color: #FFFFFF; border-radius: 10px;">
                                Perusahaan
                            </a>
                            <ul class="dropdown-menu dropdown-info" aria-labelledby="dLabel">
                                <li>
                                    <a href="login.php?page=login_perusahaan">Sign In</a>
                                </li>
                                <li>
                                    <a href="login.php?page=daftar_perusahaan">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false" style="color: #FFFFFF; background-color: #00B16A; border-radius: 10px;">
                                Calon Pekerja
                            </a>
                            <ul class="dropdown-menu dropdown-info" aria-labelledby="dLabel">
                                <li>
                                    <a href="login.php?page=login_pelamar">Sign In</a>
                                </li>
                                <li>
                                    <a href="login.php?page=daftar_pelamar">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>

                     <?php
                    error_reporting(0);
                    $page = $_GET['page'];

                    if($page == 'login_perusahaan' OR $page =='daftar_perusahaan'){
                      include "perusahaan/$page".".php";
                    }else if($page == 'login_pelamar' OR $page == 'daftar_pelamar'){
                      include "pelamar/$page".".php";

                    }

                    else{
                      include "login_awal.php";
                    }

             ?>

                


                

        

        
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>

    </html>