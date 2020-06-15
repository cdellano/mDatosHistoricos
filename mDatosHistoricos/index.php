<?php
// Conexion mysqli
include"../conexion/conexionli.php";
include"../sesiones/verificar_sesion.php";
include"../sesiones/variables_sesion.php";

include"../funciones/colores.php";

$titular="Graficas";
$fecha=date("Y-m-d"); 
// Varibles POST
if (empty($_POST["colorModulo"])) {
  ?>
    <script >
        window.location="../mInicio/index.php";
    </script>
  <?php 
}
$color     = $_POST["colorModulo"];
$parametro = $_POST["parametro"];
$color     = colorear($color);
$idModulo  = $_POST["idModulo"];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SSNL | <?php echo $titular?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../plugins/ionicons/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Animate -->
  <link href="../plugins/animate/animate.css" rel="stylesheet">
  <!-- sweet alert -->
  <link href="../plugins/bootstrap-sweetalert-master/dist/sweetalert.css" media="all" rel="stylesheet" type="text/css"/>
  <!-- Alertifyjs -->
  <link rel="stylesheet" href="../plugins/alertifyjs/css/alertify.min.css">
  <link rel="stylesheet" href="../plugins/alertifyjs/css/themes/default.min.css">
  <!-- Select 2 -->
  <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <?php
      include"../layout/navbar.php"
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php
      include"menu.php"
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $titular?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../mInicio/index.php">Inicio</a></li>
              <li class="breadcrumb-item active"><?php echo $titular?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">

        <div class="card card-<?php echo $color?> animated  zoomIn">

          <section style="display:none" id="vista1" class=""></section>
          <section style="display:none" id="vista2"></section>
          <section style="display:none" id="vista3"></section>

        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php
      include"../layout/footer.php"
    ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="../plugins/raphael/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- sweetalert -->
<script src="../plugins/bootstrap-sweetalert-master/dist/sweetalert.js" type="text/javascript"></script>
<!-- Funciones de inicio -->
<script src="../script.js"></script>
<!-- Alertifyjs -->  
<script src="../plugins/alertifyjs/alertify.min.js"></script> 
<!-- Select 2 -->
<script type="text/javascript" src="../plugins/select2-master/dist/js/select2.full.min.js"></script>

<!-- Librerias de highcharts -->
<script src="../plugins/Highcharts/code/highcharts.js"></script>
<script src="../plugins/Highcharts/code/modules/exporting.js"></script>
<script src="../plugins/Highcharts/code/modules/export-data.js"></script>
<script src="../plugins/Highcharts/code/modules/accessibility.js"></script>

<!-- Funciones del modulo -->
<script src="script.js"></script>



<script>
    var p="<?php echo $parametro; ?>";
    p=parseInt(p);
    cuestionario(p);
</script>


</body>
</html>
