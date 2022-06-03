<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aisyah Amini | JWP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- jsGrid -->
  <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="../../plugins/jsgrid/jsgrid-theme.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- sisebar --><center>
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Menghitung Luas </span><br>
      <span class="brand-text font-weight-light">Bangun Datar</span>
    </a></center>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tampil_segitiga.php" class="nav-link">
              
              <p>
                Segitiga
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tampil_persegi.php" class="nav-link">
              
              <p>
                Persegi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tampil_lingkaran.php" class="nav-link">
              
              <p>
                Lingkaran
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lingkaran</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <!-- form input -->
          <h3 class="card-title">Tambah Lingkaran</h3><br><br>
          <div>
			<form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jari - Jari (r)</label>
                        <div class="col-sm-8">
                            <input type="varchar" class="form-control" id="r" name="r" placeholder="jari - jari" required>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                    <a href="tampil_segitiga.php" title="Kembali" class="btn btn-secondary">Batal</a>
                </div>
            </form>
            <?php

                if (isset ($_POST['Simpan'])){

                //menangkap post masuk
                $r=$_POST['r'];

                $tanggal = date('Y-m-d'); //menyimpan tanggal saat ini pada variabel tanggal
                $jam = date('h:i:s'); // menyimpan waktu (timestamp) pada variabel jam
                //rumus menghitung luas
                $luas = ($r * $r) * 3.14;
                  //query menambahkan data kedalam databasr
                  $sql_simpan = "INSERT INTO lingkaran (r, hasil) VALUES (
                    '".$_POST['r']."',
                    '".$luas."')";
                    $query_simpan = mysqli_query($koneksi, $sql_simpan);
                    mysqli_close($koneksi);

                //fungsi untuk menghitung luas lingkaran
                function luas_lingkaran($r) { //nama function luas_lingkaran menangkap nilai pada kedua variabel yaitu pada nilai jari lingkaran
                    $luas = 3.14 * ($r * $r);//rumus luas lingkaran yaitu Phi kali jari-jari kuadrat
                    return $luas; //mengembalikan nilai perhitungan luas
                }
$file = fopen("file/lingkaran_luas.txt","w");
fwrite($file, //proses penulisan pada file txt
'====================================================
      HASIL PERHITUNGAN LUAS LINGKARAN ANDA
====================================================
Tanggal Perhitungan     : '. $tanggal.' 
Jam Perhitungan         : '. $jam. ' 
Nilai Jari-Jari         : '. $r. ' 
Phi                     : 3.14
Rumus Luas Lingkaran    : Phi x Jari-Jari x Jari-Jari
                          3.14 x '. $r. ' x '. $r. ' 
Luas Lingkaran          : '.luas_lingkaran($r));
fclose($file);

                //mulai proses simpan data
                    
                        
                if ($query_simpan) {
                echo "<center>DATA BERHASIL DISIMPAN</center><br>";
			    echo "<a href='tampil_lingkaran.php'>Kembali</a>";
                }else{
                echo "<center>DATA GAGAL DISIMPAN</center><br>";
			    echo "<a href='tampil_lingkaran.php'>Kembali</a>";
            }
           }   //selesai proses simpan data
            ?>

			</div>
        </div>
        <!-- /.card-header -->
        
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jsGrid -->
<script src="../../plugins/jsgrid/demos/db.js"></script>
<script src="../../plugins/jsgrid/jsgrid.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#jsGrid1").jsGrid({
        height: "100%",
        width: "100%",

        sorting: true,
        paging: true,

        data: db.clients,

        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married" }
        ]
    });
  });
</script>
</body>
</html>
