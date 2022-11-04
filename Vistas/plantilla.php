<?php ob_start(); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trucks</title>
  <!-- fontawesome --><link rel="stylesheet" type="text/css" href="Vistas/Librerias/fontawesome/css/all.css">
  <!-- bootstrap-Local --> <link rel="stylesheet" href="Vistas/Css/bootstrap.min.css">   <script src="Vistas/Js/jquery-3.6.0.min.js"></script>   <script src="Vistas/Js/popper.min.js"></script>   <script src="Vistas/Js/bootstrap.min.js"></script>
  <!-- Google Font: Source Sans Pro -->  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->  <link rel="stylesheet" href="Vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->  <link rel="stylesheet" href="Vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->  <link rel="stylesheet" href="Vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->  <link rel="stylesheet" href="Vistas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->  <link rel="stylesheet" href="Vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->  <link rel="stylesheet" href="Vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->  <link rel="stylesheet" href="Vistas/plugins/summernote/summernote-bs4.min.css">
  <!-- Google Font: Source Sans Pro -->  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->  <link rel="stylesheet" href="Vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables --><link rel="stylesheet" href="Vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> <link rel="stylesheet" href="Vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> <link rel="stylesheet" href="Vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
  <!-- jQuery --><script src="Vistas/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 --><script src="Vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->  <script>   $.widget.bridge('uibutton', $.ui.button)  </script>
  <!-- Bootstrap 4 --><script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS --><script src="Vistas/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline <script src="Vistas/plugins/sparklines/sparkline.js"></script> -->
  <!-- JQVMap --><script src="Vistas/plugins/jqvmap/jquery.vmap.min.js"></script> <script src="Vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart --><script src="Vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker --><script src="Vistas/plugins/moment/moment.min.js"></script> <script src="Vistas/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 --><script src="Vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote --><script src="Vistas/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars --><script src="Vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App --><script src="Vistas/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes <script src="Vistas/dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) <script src="Vistas/dist/js/pages/dashboard.js"></script> -->
  <!-- jQuery --><script src="Vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 --><script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins --> <script src="Vistas/plugins/datatables/jquery.dataTables.min.js"></script> <script src="Vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> <script src="Vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> <script src="Vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> <script src="Vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> <script src="Vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> <script src="Vistas/plugins/jszip/jszip.min.js"></script> <script src="Vistas/plugins/pdfmake/pdfmake.min.js"></script> <script src="Vistas/plugins/pdfmake/vfs_fonts.js"></script> <script src="Vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script> <script src="Vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script> <script src="Vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App --><script src="Vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes <script src="Vistas/dist/js/demo.js"></script>-->
  <!-- sweetAlert2 --><script src="Vistas/Js/sweetalert2-07052022.all.min.js"></script>
  </head>
  <script type="text/javascript">
    Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
  </script>
  <?php if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {
    echo '
  <body class="hold-transition sidebar-collapse sidebar-mini layout-fixed">
    <div class="wrapper">';
    include 'Vistas/Modulos/navSup.php';
    include 'Vistas/Modulos/menuLat.php';
    echo '<div class="content-wrapper">';
    $vista=new MvcControlador; $vista->enlacesPaginasControlador();
    echo '</div>';
    #include 'Vistas/Modulos/footer.php'; 
    echo '</div>';
  }else{
    echo '<body class="hold-transition sidebar-mini layout-fixed login-page">';
    include 'Vistas/Paginas/login.php';
  } ?>
  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
<?php ob_end_flush(); ?>