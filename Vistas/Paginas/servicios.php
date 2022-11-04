<?php ob_start(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Service Administration</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Service Administration</li>
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
      <h3 class="card-title">Truck Services List</h3>
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
<!-- boton llamado al modal crear -->
<button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#crearServicio">
  Create New Service
</button>
<?php 
$servicios=new ControladorServicios; 
$servicios->ctrCrearServicio(); 
if (isset($_GET['action'])) {
  if ($_GET['action']=="okServicio") {
    echo '
        <script>
        Swal.fire(
                  "Nice job!",
                  "You just created a new service!",
                  "success"
                  )
        </script>
        ';
  }
}
?>
  </div>
</div>
        <table id="example1" class="table table-dark table-hover table-borderless table-sm text-center">
          <thead>
          <tr>
            <th>EDIT</th>
            <th>DELET</th>
            <th>NAME SERVICE</th> <!--
            <th>VALUE</th>
            <th>SERVICE TIME</th>-->
          </tr>
          </thead>
          <tbody>
<?php 
$verServicios= new ControladorServicios;
$verServicios->ctrMostrarServicios();
$verServicios->ctrEliminarServicio();

if (isset($_GET['action'])) {
  if ($_GET['action']=="cambioServicio") {
    echo '
        <script>
        Swal.fire(
                  "Nice job!",
                  "You just updated a service!",
                  "success"
                  )
        </script>
        ';
  }
}
?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="crearServicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <label>Name for the Service: </label>
          <input type="text" name="nameServ" placeholder="Type a name for the service" class="form-control" required><br>

          <!--<label>Assign a Value to the Service: </label>
          <input type="number" name="valServ" placeholder="Write the value of the service" class="form-control" required><br>


          <label>Allocate Time To Service</label>
          <select class="form-select" name="tiempoServ" aria-label="Default select example" required>
            <option value="">(Click)To See Service Times</option>
            <option value="1 month">1 month</option>
            <option value="3 months">3 months</option>
            <option value="6 months">6 months</option>
            <option value="1 year">1 Year</option>
          </select><br>-->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create New Service</button>
      </div>
        </form>
    </div>
  </div>
</div>
<?php 
if (isset($_GET['action'])) {
  if ($_GET['action']=="elimServ") {
    echo '
        <script>
        Swal.fire(
                  "Nice job!",
                  "You just deleted a service!",
                  "success"
                  )
        </script>
        ';
  }
}
 ?>