

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

   <!-- jsGrid -->
   <link rel="stylesheet" href="/adminlte/plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/jsgrid/jsgrid-theme.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php
    $active=  $_GET["navitem"];
    if (is_null($active)){
      $active="jsgrid";
    }
    include "layout/navbar.php";
    
    /* first step*/
      # include "layout/sidebar-main.php";
    /* second Step*/
      include "layout/sidebar-main-procedure.php";
    
   
    ?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php
     //   include "layout/content-header.php";
     //   include "layout/countent-main.php";
     $compmentScriptContent = "compment/".$active.".php";
     
    include $compmentScriptContent;

        
   ?>


  </div>
  <!-- /.content-wrapper -->



  <?php
  include "layout/sidebar.php";
  include "layout/footer.php";
  
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

<!-- Target App Script -->
<?php
/* Second Step*/
    $compmentScript = "compment/".$active."-script.php";
    include $compmentScript;
?>
</body>
</html>
