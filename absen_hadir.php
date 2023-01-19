<?php
session_start();

require 'conn.php';
date_default_timezone_set('Asia/Jakarta');
if (!isset($_SESSION["login"])) {
  header("Location: login_user.php");
  exit;
}

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username]'");
  $row    = mysqli_fetch_assoc($result);

  $tgl = date('Y-m-d');
  $tgl1 = date('l jS \of F Y');
  $results = mysqli_query($conn, "SELECT * FROM tb_kehadiran WHERE nobp = '$row[username]' and tanggal = '$tgl' ");
  $rows    = mysqli_fetch_assoc($results);
  
  $numRows = mysqli_num_rows($result);
  if($numRows>0){
    $PresensiID = $rows['id']; 
  }else{
    $PresensiID = '';
  }

  if($rows){
    $dataPresensi = ['jam_masuk'=>$rows['jam_masuk'], 'jam_keluar'=>$rows['jam_keluar'], 'tanggal'=>$rows['tanggal'],'status'=>$rows['status']];
  }else{
    $dataPresensi = ['jam_masuk'=>"00:00:00", 'jam_keluar'=>"00:00:00", 'status'=>"", "tanggal" => "-"];  
  }
 

?>


<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="icon" type="image/png" href="img/pln.png" />
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <script type="text/javascript"> 
        function display_ct6() {
        var x = new Date()
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
        x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
        document.getElementById('ct6').innerHTML = x1;
        display_c6();
        }
        function display_c6(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct6()',refresh)
        }
        display_c6()
    </script>

    <title>Absensi</title>
</head>

<body onload=display_ct6();>
    <div class="dashboard-main-wrapper">
        
         <!-- Mulai Navbar -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="index.html" style ="color:#2a93a7"> PLN UID SUMBAR <!-- <img src="img/Logo_PLN.svg.png" alt="Logo" width = "10%" class="d-inline-block align-text-top" style ="margin=2px"> --></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                 
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt="" > <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/pln.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"> Admin </h5>
                                    <span class="status"></span><span class="ml-2"><?php echo $row['username']; ?></span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="setting.php"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
       <!-- Akhir Navbar -->

    <!-- Mulai Sidebar -->
    <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="admin.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="mahasiswa.php">Dashboard</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>
                    
                         
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Kehadiran</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="absen_hadir.php">Daftar Hadir</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Riwayat</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="mahasiswa_harian.php">Laporan Harian</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="mahasiswa_bulanan.php">Laporan Bulanan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/data-tables.html">Cetak Laporan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
     
                        
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Selesai Sidebar -->


        <!-- Mulai Body -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Halo <?php echo $row['nama']; ?>, Silahkan Isi Presensi! </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Sistem Informasi Absensi Mahasiswa PKL (Magang)</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="ecommerce-widget">

                    <div class="row">
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                       <div class="col-xl-12 text-center">
                                           <h2><?php echo $tgl1 ?></h2>
                                           <h2 id="ct6"></h2>
                                           <button id="btnCheckin" class="btn btn-warning">Check-In</button>
                                           <button id="btnCheckOut" class="btn btn-success">Check-Out</button>
                                        </div>
                                        <div class="row justify-content-center mt-2 text-center">
                                           <div class="col-2 text-right">
                                           <p id="txtJamMasuk"><?php echo $dataPresensi['jam_masuk']; ?></p>
                                           </div>
                                          <div class="col-2 text-left ">
                                          <p id="txtJamKeluar"><?php echo $dataPresensi['jam_keluar']; ?></p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                        </div>              
                    </div>

    
                    <input type="text" id="idKehadiran" value="<?=$PresensiID?>" hidden>
                    <div class="row">
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="table-responsive">

                                    <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Tanggal</th>
                                  <th scope="col">Jam Masuk</th>
                                  <th scope="col">Jam Keluar</th>
                                  <th scope="col">Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><?php echo $dataPresensi['tanggal'] ?></td>
                                  <td><?php echo $dataPresensi['jam_masuk'] ?></td>
                                  <td><?php echo $dataPresensi['jam_keluar'] ?></td>
                                  <td><?php echo $dataPresensi['status']; ?></td>
                                </tr>
                             
                              </tbody>
                            </table>
    </div>
                                    </div>
                                </div>
                        </div>
                  
                    </div>

                  
                </div>
            </div>




            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2022 PT. PLN UID Sumatera Barat. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <!-- <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- Akhir Body -->

    </div>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    
    <script type="text/javascript">
    jQuery(function($){
        var jam_masuk = $("#txtJamMasuk").text();
        var jam_keluar = $("#txtJamKeluar").text();

        if (jam_masuk=='00:00:00'){
            $("#btnCheckin").attr('disabled', false);
            $("#btnCheckOut").attr('disabled', true);
        }else{
            $("#btnCheckin").attr('disabled', true);
            $("#btnCheckOut").attr('disabled', false);
        }

        $(document).on('click', "#btnCheckin", function(e){
            confirm("Anda Mengisi Absensi ?");
            var uri = "masuk.php?id="+<?= $row['username']; ?>;
        
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: uri,
                success: function(data){
                    $("#idKehadiran").val(data.id);
                    $("#txtJamMasuk").text(data.jam);
                    $("#btnCheckin").attr('disabled', true);
                    $("#btnCheckOut").attr('disabled', false);
                     alert(data.msg);
                     console.log(data);
                }
            });
        });

        $(document).on('click', "#btnCheckOut", function(e){
            confirm("Anda Ingin Check-Out ?");
            var id = $("#idKehadiran").val();
            var keluar = "keluar.php?id="+id;
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: keluar,
                success: function(data){
                    console.log(data);
                    $("#txtJamKeluar").text(data.jam);
                    $("#btnCheckin").attr('disabled', true);
                    $("#btnCheckOut").attr('disabled', true);
                     alert(data.msg);
                }
            });
        });

        if (jam_keluar!='00:00:00'){
            $("#btnCheckin").attr('disabled', true);
            $("#btnCheckOut").attr('disabled', true);
        }
    });
    </script>
</body>
 
</html>