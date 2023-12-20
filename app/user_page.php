<?php
@session_start();
@ob_start();
define("DATA", "data/");
define("PAGE", "include/");
define("userPAGE", "include/user/");
define("myCLASS", "class/");
include_once(DATA."Connection.php");
define("WEB",$webURL);
if (!empty($_SESSION["ID"]) && !empty($_SESSION["user_name"]) && !empty($_SESSION["avatar"])) {
}
else
{
    header("location:".$webURL);
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$webTitle?></title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?=WEB?>dist/img/icon-lib.png"/>
  <meta http-equiv="keywords" content="<?=$webKey?>">
  <meta http-equiv="description" content="<?=$webDescription?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=WEB?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=WEB?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=WEB?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=WEB?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=WEB?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=WEB?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=WEB?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=WEB?>plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?=WEB?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php
include_once(DATA."navbar.php");
include_once(DATA."menu.php");

if($_GET && !empty($_GET["page"]))
{
    $page = $_GET["page"].".php";
    if(file_exists(userPAGE.$page)) {
        include_once(userPAGE.$page);
    }
    elseif (file_exists(PAGE.$page)) {
        include_once(PAGE.$page);
    }
    else
    {
        include_once(PAGE."home.php");
    }
}
else
{
    include_once(PAGE."home.php");
}

include_once(DATA."footer.php");
?>
    
    
    
    
    


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=WEB?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=WEB?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=WEB?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=WEB?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=WEB?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=WEB?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=WEB?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=WEB?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=WEB?>plugins/moment/moment.min.js"></script>
<script src="<?=WEB?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=WEB?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=WEB?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=WEB?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=WEB?>dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?=WEB?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=WEB?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=WEB?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=WEB?>dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
