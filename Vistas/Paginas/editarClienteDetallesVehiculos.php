    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1>Blank Page</h1>-->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Pagina Editar Vehiculo</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edicion De Vehiculo / Asignacion De Servicio</h3>
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

    <div class="container-fluid">
    <form method="post" class="row d-flex justify-content-center">

<?php 
$mostrarForm=new ControladorDetallesCliente;
$mostrarForm->ctrEditarDetalleClientesVehiculoServicioDtsV();
$mostrarForm->ctrEditarDetalleClientesVehiculoServicioDtsServicioAsig();
$mostrarForm->ctrEditarDetalleClientesVehiculoServicioDtsSelectServicios();
?>
</select><br>

<label>Fecha Inicio: </label>
<input type="date" name="fechaIni" class="form-control"><br>
<label>fecha Fin: </label>
<input type="date" name="fechaFin" class="form-control"><br><br>
<div class="d-flex justify-content-evenly">
  <button type="submit" class="btn btn-success btn-lg">Actualizar Datos</button></form>
</div>
</div>



    </form>
    </div>



        </div>
      </div>
    </section>
    <?php 
$updateS=new ControladorDetallesCliente;
$updateS->ctrActualizarDatosVehiculoConServicios();
     ?>
