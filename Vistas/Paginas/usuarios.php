<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <!--<h3 class="card-title">Lista De Usuarios Registrados En Trucks</h3>-->

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
      <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#crearUsuario">
        Create New User
      </button>
  </div>
</div>        
        <table id="example1" class="table table-dark table-hover  table-borderless text-nowrap">
<div class="row d-flex justify-content-center">
  <div class="col col-4">
<?php $crearPerfil=new ControladorUsuarios; 
$crearPerfil->registroUsuarioControlador(); 
if (isset($_GET['action'])) {
  if ($_GET['action']=="ok") {
    echo '
        <script>
        Swal.fire(
                  "Nice job!",
                  "You just created a new profile!",
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
            <th>ACTIONS</th>
            <th>ID</th>
            <th>NAMES</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>ADDRESS</th>
            <th>PROFILE</th>
            <th>STATE</th>
            <th>CREATION</th>
            <th>UPDATE</th>
          </tr>
          </thead>
          <tbody>
<?php 
$usuarios=new ControladorUsuarios; 
$usuarios->ctrMostrarUsuarios(); 
$usuarios->ctrBorarUsuario();
?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="crearUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post">

          <label for="identificacion">Id:</label>
          <input type="number" name="identificacion" placeholder="Write an ID" class="form-control" required>
          <br>

          <label for="nombres">Names and surnames:</label>
          <input type="text" name="nombres" placeholder="Write Names and Surnames" class="form-control" required>
          <br>

          <label for="email">Email:</label>
          <input type="email" name="email" placeholder="Write Valid Email" class="form-control" required>
          <br>

          <label for="newPass">Password:</label>
          <input type="password" name="newPass" placeholder="Type a password" class="form-control" required>
          <br>

          <label for="telefono">Phone:</label>
          <input type="number" name="telefono" placeholder="Write a phone" class="form-control" required>
          <br>

          <label for="direccion">Address:</label>
          <input type="text" name="direccion" placeholder="Write Address/Neighborhood/Loc/City" class="form-control" required>
          <br>
          <label for="direccion">Select A Profile:</label>
          <select class="form-select" aria-label="Default select example" name="perfilUsuario" required>
          <option value="">(Click) To Show Profiles</option>
<?php 
$verPerfiles=new ControladorPerfiles;
$verPerfiles->ctrMostrarPerfilesEnRegUsu(); 
?>
        </select>
        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create Profile</button>
        </form>

      </div>
    </div>
  </div>
</div>




<?php 
if (isset($_GET['action'])) {
  if ($_GET['action']=="cambioUsuario") {
    echo '
        <script>
        Swal.fire(
                  "Nice job!",
                  "You just updated a user!",
                  "success"
                  )
        </script>
        ';
  }
}

if (isset($_GET['action'])) {
  if ($_GET['action']=="okDelUsu") {
    echo '
        <script>
        Swal.fire(
                  "Nice job!",
                  "You just deleted a user!",
                  "success"
                  )
        </script>
        ';
  }
}
?>
