<?php 

session_start();
if (!isset( $_SESSION['admin_login'])) {
header('location:/');
exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Sistem Gaji Karyawan - <?php echo $_SESSION['nama_admin'];  ?></title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for table -->
    <link href="../asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

         <div class="allert" data-infodata="<?php if(isset($_SESSION['data-allert'])){ echo $_SESSION['data-allert']; } unset($_SESSION['data-allert']); ?>"></div>

        <!-- Sidebar -->
        <!-- Sidebar topic -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion nav" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?pages=dashboard">
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active" >
                <a class="nav-link" href="?pages=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master
                </div>

                <!-- Nav Item - Pages Collapse Menu -->


                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseTwo">
                   <i class="fas fa-fw fa-users"></i>
                    <span>Data Karyawan</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Karyawan :</h6>
                    <a class="collapse-item" href="?pages=data-karyawan-aktif">Karyawan Aktif</a>
                    <a class="collapse-item" href="?pages=data-karyawan-nonaktif">Karyawan Non Aktif</a>
                </div>
                </div>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="?pages=data-gaji">
                      <i class="fas fa-fw fa-money-bill-wave"></i>
                      <span>Data Gaji</span></a>
                  </li>


                  <!-- Divider -->
                  <hr class="sidebar-divider">


                

                  <!-- Heading -->
                  <div class="sidebar-heading">
                    Upload Data
                  </div>


                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Upload</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Upload Data :</h6>
                    <a class="collapse-item" href="?pages=upload-data-karyawan">Upload Data Karyawan</a>
                    <a class="collapse-item" href="?pages=upload-data-gaji">Upload Data Gaji</a>
                </div>
                </div>
                </li>


                  <!-- Divider -->
                  <hr class="sidebar-divider">

                  <!-- Heading -->
                  <div class="sidebar-heading">
                    Informasi
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="?pages=pengumuman">
                        <i class="fas fa-fw fa-bullhorn"></i>
                        <span>Pengumuman</span></a>
                    </li>


                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Pengaturan
                    </div>

                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link" href="?pages=akun">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Akun</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>


                    </ul>

        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">               




                <!-- Nav Item - Messages -->
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_admin'];  ?> </span>

                    <i class="fas fa-user"></i>
                    <!-- <img class="img-profile rounded-circle"
                    src="../asset/img/undraw_profile.svg"> -->
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?pages=akun">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Akun
                </a>
                <div class="dropdown-divider"></div>
                <a href="action/logout.php" class="dropdown-item logout-data" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keluar
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
<!-- Begin Page Content -->

<?php 

$pages  = @$_GET['pages'];

                       
if ($pages == 'dashboard') {
     include 'p-db.php';

} elseif ($pages == 'data-karyawan-aktif') {
    include 'p-kr.php';
                     
} elseif ($pages == 'data-karyawan-nonaktif') {
    include 'p-kr-n.php';
                     
} elseif ($pages == 'data-gaji') {
    include "p-gk.php";
                     
} elseif ($pages == 'akun') {
    include "p-add-profile.php";
                     
} elseif ($pages == 'upload-data-gaji') {
    include "p-udata-gaji.php";
                     
} elseif ($pages == 'upload-data-karyawan') {
    include "p-udata-karyawan.php";
                     
} elseif ($pages == 'tambah-data-karyawan') {
    include "p-add-kr.php";
                     
} elseif ($pages == 'edit-data-karyawan') {
    include "p-edit-kr.php";
                     
} elseif ($pages == 'tambah-gaji-karyawan') {
    include "p-add-gk.php";
                     
} elseif ($pages == 'lihat-slip') {
    include "p-view-gk.php";
                     
} elseif ($pages == 'edit-data-gaji') {
    include "p-edit-gk.php";
                     
} elseif ($pages == 'pengumuman') {
    include "p-dp.php";
                     
} elseif ($pages == 'edit-pengumuman') {
    include "p-edit-dp.php";
                     
} elseif ($pages == 'tambah-pengumuman') {
    include "p-add-dp.php";
                     
} elseif ($pages == '') {
    include 'p-db.php';
} else {
    include "404.php";
}

?>

<!-- Page Content end -->
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; https://mastau.fun, Payroll Version 1.2</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="../asset/vendor/jquery/jquery.min.js"></script>
<script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../asset/js/demo/datatables-demo.js"></script>

<!-- allert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
<script src="../asset/js/allert/sb-allert-1.js"></script>
<script src="../asset/js/allert/sb-allert-2.js"></script>

<!-- money extension -->
<script src="../asset/js/moneyextension/money-extension-sb-1.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<!-- tooltip -->
<script src="../asset/js/sb-admin-tooltip-1.js"></script>
<script src="../asset/js/counter/counter.js"></script>

</body>
</html>