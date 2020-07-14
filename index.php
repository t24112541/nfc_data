<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="./css/cv_style.css?v=1016">
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin-2.min.css?v=1001" rel="stylesheet">
  <script src="./js/jquery-3.4.1.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/cv_js.js?v=1012"></script>
</head>

<body id="page-top">

<?php 
  if(isset($_SESSION['nfc_usr']) && $_SESSION['auth']){ ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    
      <?php
      if(isset($_SESSION['nfc_usr']) && $_SESSION['auth']){
        include("./views/sidebar.html");
      }?>
      <!-- //////////////////////////////////////////////////////////// -->
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->
          <?php 
          if(isset($_SESSION['nfc_usr']) && $_SESSION['auth']){
            include("./views/nav_2.html");
          }?>
          <!-- ///////////////////////////////////////////////////////// -->
        <!-- </nav> -->
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php 
              if(isset($_GET['p_users'])){require_once("./views/p_users.html");}
              else if(isset($_GET['import_drug_tmt'])){require_once("./views/import_drug_tmt.php");}
              else if(isset($_GET['nfc_p_patient']) || isset($_POST['txt_search'])){require_once("./views/nfc_p_patient.html");}
              else if(isset($_GET['nfc_p_drug'])){require_once("./views/nfc_p_drug.html");}
              else if(isset($_GET['nfc_p_staff'])){require_once("./views/nfc_p_staff.html");}
              else if(isset($_GET['sh_patient_detail'])){require_once("./views/nfc_p_patient_detail.php");}
              else if(isset($_GET['nfc_p_patient_detail_add_drug'])){require_once("./views/nfc_p_patient_detail_add_drug.php");}
              else if(isset($_GET['logout'])){
                session_destroy();
                echo "<meta http-equiv='refresh' content='0;url=?'>";
              }
              else{require_once("./views/nfc_p_drug.html");}
            ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer> -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <?php }else{require_once("./views/login.html");}?>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ยืนยันการออกจากระบบ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">คุณต้องการออกจากระบบจริงหรือไม่</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ไม่ใช่</button>
          <a class="btn btn-primary" href="?logout">ใช่</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="./vendor/jquery/jquery.min.js"></script> -->

  <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./js/sb-admin-2.min.js"></script>
  <script src="./js/cv_js.js?v=1011"></script>
  <!-- Page level plugins -->
  <!-- <script src="./vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="./js/demo/chart-area-demo.js"></script>
  <script src="./js/demo/chart-pie-demo.js"></script>
 -->
</body>
<script type="text/javascript">
  var link="http://localhost/nfc_data/call_controller/api.php";
</script>
</html>
