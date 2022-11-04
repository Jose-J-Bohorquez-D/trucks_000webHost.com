    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit service assigned</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=inicio">Home</a></li>
              <li class="breadcrumb-item active">Edit service assigned</li>
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
          <h3 class="card-title"></h3>

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
          <?php $verDtsEdt=new ControladorPerfilVehiculo;
          $verDtsEdt->ctrActualizarServicioAsignado(); ?>
          Are you sure you want to modify the service? 
          <button type="button" 
          class="btn btn-info" 
          onclick="history.back()" 
          >no, go back </button>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Yes</button>
        </div>
      </div>
      <!-- /.card -->
    </section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post">
<?php 
$verDtsEdt= new ControladorPerfilVehiculo;
$verDtsEdt->ctrPasarIdHiddenEdit(); #input tipe=hidden name=idVehiAsigServ  ?>
<select class="form-select" name="edtServAsig" aria-label="Default select example" required>
<?php $verDtsEdt->ctrMostrarServiciosEditar(); $verDtsEdt->ctrMostrarServiciosEnEditarServicio(); ?>
</select><br>
<?php $verDtsEdt->ctrMostrarFechasEditarServicio(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Service</button>
      </div>
</form>
    </div>
  </div>
</div>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

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
          was redirected to this page after an edit?
          <button type="button" 
          class="btn btn-info" 
          onclick="history.back()" 
          >review changes </button>
        </div>
      </div>
      <!-- /.card -->

    </section>