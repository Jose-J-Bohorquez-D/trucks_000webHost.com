<?php ob_start(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Perfiles</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active">Perfiles</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Lista De Perfiles Para Los Usuarios De Trucks</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

      <div class="table-responsive">
<div class="row d-flex justify-content-center">
  <div class="col col-2">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#crearPerfil">
        Crear Nuevo Perfil
      </button>
  </div>
</div>
        <table id="example1" class="table table-dark table-hover  table-borderless table-sm">
<div class="row d-flex justify-content-center">
  <div class="col col-4">
<?php 
$crearPerfil=new ControladorPerfiles;
$crearPerfil->ctrCrearPerfil();
if (isset($_GET['action'])) {
  if ($_GET['action']=="okPerfil") {
    echo '
        <script>
        Swal.fire(
                  "Buen Trabajo!",
                  "Acabas De Crear Un Nuevo Perfil!",
                  "success"
                  )
        </script>
        ';
  }
}
?>
  </div>
</div>
          <thead>
          <tr>
            <th>ACTION</th>
            <th>NOMBRE PERFIL</th>
            <th>ESTADO</th>
            <th>CREATE</th>
            <th>UPDATE</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $perfiles=new ControladorPerfiles; 
            $perfiles->ctrMostrarPerfiles();
            $perfiles->ctrEliminarPerfiles();
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="crearPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post">

          <label for="nombre perfil">Nombre Perfil:</label>
          <input type="text" name="nombrePerfil" placeholder="Escriba Un Nombre Para El Nuevo Perfil" class="form-control" required>
          <br>

          <label for="direccion">Seleccione Un Estado:</label>
          <select class="form-select" aria-label="Default select example" name="estadoPerfil" required>
            <option value="">(Click) Para Mostrar Estados</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
          <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Crear Perfil</button>
        </form>

      </div>
    </div>
  </div>
</div>
<?php 
if (isset($_GET['action'])) {
  if ($_GET['action']=="cambio") {
    echo '
    <script>
      Swal.fire(
      "Buen Trabajo",
      "Perfil Actualizado Con Exito!",
      "success"
      )
    </script>
    ';
  }
}
if (isset($_GET['action'])) {
  if ($_GET['action']=="okDelPerf") {
    echo '
    <script>
      Swal.fire(
      "Buen Trabajo",
      "Perfil Eliminado Con Exito!",
      "success"
      )
    </script>
    ';
  }
}
ob_end_flush();
?>