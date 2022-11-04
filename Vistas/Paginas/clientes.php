<?php ob_start(); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Client administration</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Client administration Page</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Trucks Customer List</h3>
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
<button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#crearCliente">
  create new customer
</button><br><br>
  </div>
</div>
        <table id="example1" class="table table-dark table-hover  table-borderless table-sm text-nowrap">
<?php 
$clientes=new ControladorClientes;
$clientes->crearNuevoCliente();
$clientes->ctrEliminarCliente();

if (isset($_GET['action'])) {
  if ($_GET['action']=="okCliente") {
    echo '
        <script>
        Swal.fire(
                  "Nice job!",
                  "You just created a new client!",
                  "success"
                  )
        </script>
        ';
  }
}
 ?>

 <?php 
if (isset($_GET['action'])) {
  if ($_GET['action']=="cambioCliente") {
    echo '
    <script>
      Swal.fire(
      "Nice job!",
      "Client Updated Successfully!",
      "success"
      )
    </script>
    ';
  }
}
  ?>
          <thead>
          <tr>
            <th>ACTION</th>
            <th>COMPANY NAME</th>
            <th>CLIENT NAME</th>
            <th>ADDRESS</th>
            <th># LIC EMP</th>
            <th>PHONE 1</th>
            <th>PHONE 2</th>
            <th>E-MAIL 1</th>
            <th>E-MAIL 2</th>
            <th>ID CGPE</th>
            <th># IFTA</th>
            <th>TAX ID/#EIN</th>
            <th>NY PERMIT #</th>
            <th>NM PERMIT #</th>
            <th>KY PERMIT #</th>
          </tr>
          </thead>
          <tbody>
<?php
$verClientes=new ControladorClientes;
$verClientes->ctrMostrarClientes();
?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="crearCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">create new customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">

          <label>Company Name :</label>
          <input type="text" name="nombre_empresa" placeholder="write company name" class="form-control" required>
          <br>

          <label>Customer Name:</label>
          <input type="text" name="nombre_cliente" placeholder="write customer name" class="form-control" required>
          <br>

          <label>Address:</label>
          <input type="text" name="direccion" placeholder="write the address" class="form-control">
          <br>

          <label>LIC EMP #:</label>
          <input type="text" name="nLicEmp" placeholder="write LIC EMP #" class="form-control" >
          <br>

          <label>Phone 1:</label>
          <input type="number" name="telefono1" placeholder="write phone 1" class="form-control" >
          <br>

          <label>Phone 2:</label>
          <input type="number" name="telefono2" placeholder="write phone 2" class="form-control" >
          <br>

          <label>E-mail 1:</label>
          <input type="email" name="correo1" placeholder="write E-mail 1" class="form-control" required>
          <br>

          <label>E-mail 2:</label>
          <input type="email" name="correo2" placeholder="write E-mail 2" class="form-control" >
          <br>

          <label>ID CGPE:</label>
          <input type="number" name="idCgpe" placeholder="write ID CGPE" class="form-control" >
          <br>

          <label># IFTA:</label>
          <input type="text" name="nIfta" placeholder="write IFTA #" class="form-control" >
          <br>

          <label>TAX ID / # EIN:</label>
          <input type="text" name="taxId" placeholder="write TAX ID/EIN #" class="form-control" >
          <br>

          <label>NY PERMIT #:</label>
          <input type="number" name="nyp" placeholder="write NY PERMIT #" class="form-control" >
          <br>

          <label>NM PERMIT #:</label>
          <input type="number" name="nmp" placeholder="write NM PERMIT #" class="form-control" >
          <br>

          <label>KY PERMIT #:</label>
          <input type="number" name="kyp" placeholder="write KY PERMIT #" class="form-control" >
          <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Crear Cliente</button>
      </div>
        </form>
    </div>
  </div>
</div>

 <?php 
if (isset($_GET['action'])) {
  if ($_GET['action']=="elimCli") {
    echo '
    <script>
      Swal.fire(
      "Nice job!",
      "Successfully Deleted Client!",
      "success"
      )
    </script>
    ';
  }
}

if (isset($_GET['action'])) {
  if ($_GET['action']=="updateDtsCambioServicio") {
    echo '
        <script>
        Swal.fire(
                  "nice job!",
                  "successfully assigned service",
                  "success"
                  )
        </script>
        ';
  }
}
?>

<?php 
$crearPerfil=new ControladorPerfilVehiculo;
$crearPerfil->ctrAsignarServicio();
if (isset($_GET['action'])) {
  if ($_GET['action']=="sAoK") {
    echo '
        <script>

        let timerInterval
        Swal.fire({
          title: "assigning service!",
          html: "In a moment it will be ready <b></b>",
          timer: 2700,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector("b")
          },
          willClose: () => {
            clearInterval(timerInterval)
            history.back()
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer")
          }
        })

        </script>
        ';
  }
}
?>
<?php 

if (isset($_GET['action'])) {
  if ($_GET['action']=="okSubioArchivo") {
    echo '
        <script>
        let timerInterval
        Swal.fire({
          title: "Uploading File!",
          html: "In a moment it will be ready <b></b>",
          timer: 3000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector("b")
          },
          willClose: () => {
            clearInterval(timerInterval)
            history.back()
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer")
          }
        })

        </script>
        ';
  }
}

 ?>