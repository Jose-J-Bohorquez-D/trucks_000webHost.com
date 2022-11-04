<?php ob_start(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Vehicle Administration</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Vehicle Administration Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Registered Vehicle List</h3>
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
<button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#crearVehiculo">
  Create New Vehicle
</button>

  </div>
</div>
        <table id="example1" class="table table-dark table-hover  table-borderless table-sm text-nowrap">
          <thead>
          <tr>
            <th>ACTION</th>
            <th>PLACA</th>
            <th>MODEL</th>
            <th>YEAR</th>
            <th>VIN #</th>
            <th>VALUE-COST</th>
            <th>DOT #</th>
            <th>SLOPE1</th>
            <th>SLOPE2</th>
            <th>SLOPE3</th>
            <th>ASSIGNED TO:</th>
          </tr>
          </thead>
          <tbody>
<?php $mostrarVehiculos=new ControladorVehiculos; $mostrarVehiculos->ctrMostrarVehiculos(); ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="crearVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Vehiculo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <label>Placa: </label>
          <input type="text" name="placa" placeholder="write a plate" class="form-control"
          style="text-transform:uppercase;"  
          onkeyup="javascript:this.value=this.value.toUpperCase();"required><br>

          <label>Model: </label>
          <input type="text" name="modelo" placeholder="Write The Model" class="form-control" required><br>

          <label>Year: </label>
          <input type="text" name="year" placeholder="Write The Year" class="form-control" required><br>

          <label>VIN #: </label>
          <input type="text" name="vin" placeholder="Write the VIN#" class="form-control" required><br>

          <label>Value-Cost: </label>
          <input type="text" name="valor" placeholder="Write The Value" class="form-control" required><br>

          <label>DOT #: </label>
          <input type="text" name="dot" placeholder="Write the DOT#" class="form-control" required><br>

          <label>Slope 1: </label>
          <input type="text" name="pend1" placeholder="Write information 1" class="form-control" required><br>
          
          <label>Slope 2: </label>
          <input type="text" name="pend2" placeholder="Write information 2" class="form-control" required><br>
          
          <label>Slope 3: </label>
          <input type="text" name="pend3" placeholder="Write information 3" class="form-control" required><br>

          <label>Assigned To: </label>
          <select name="asignado" class="form-select" aria-label="Default select example" required>
            <option value="">(Click) To View Clients</option>
<?php $mostrarCliente=new ControladorVehiculos; $mostrarCliente->ctrMostrarClientes(); ?>
          </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create Vehicle</button>
      </div>
        </form>
    </div>
  </div>
</div>
 <?php $registro = new ControladorVehiculos; $registro->ctrCrearVehiculo(); ?> 
<?php $elim=new ControladorVehiculos; $elim->ctrEliminarVehiculo(); ?>
<?php  
if (isset($_GET['action'])) {
  if ($_GET['action']=="okVehiculo") {
    echo '
        <script>
        Swal.fire(
                  "Nice Job!",
                  "You just created a new vehicle!",
                  "success"
                  )
        </script>
        ';
  }
}
if (isset($_GET['action'])) {
  if ($_GET['action']=="cambioVehiculo") {
    echo '
        <script>
        Swal.fire(
                  "Nice Job!",
                  "You just upgraded a vehicle!",
                  "success"
                  )
        </script>
        ';
  }
}
if (isset($_GET['action'])) {
  if ($_GET['action']=="elimV") {
    echo '
        <script>
        Swal.fire(
                  "Nice Job!",
                  "You just removed a vehicle!",
                  "success"
                  )
        </script>
        ';
  }
}
?>