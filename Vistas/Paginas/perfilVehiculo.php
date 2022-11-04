<section class="content">
  <div class="card d-flex justify-content-evenly">
    <div class="card-body">
<?php $verDts= new ControladorPerfilVehiculo; $verDts->ctrMostrarDatosPerfilVehiculoMod1(); ?>
    </div>
  </div>
</section>

<section>
  <div class="container d-flex justify-content-evenly">
<?php $verDts->ctrAsignarServicio(); $verDts->ctrMostrarDatosPerfilVehiculoMod2(); ?>
  </div><br>
</section>

<section class="content">
  <div class="card">

    <div class="card-body">
      <div class="row">
        <div class="col-sm-10">
          <div class="container-responsive">
<table id="example1" class="table table-dark table-hover table-sm table-borderless text-nowrap">
  <thead>
    <tr>
      <th>SERVICE</th>
      <th>FROM</th>
      <th>UNTIL</th>
      <th>VALUE</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php $verDts->ctrMostrarDatosPerfilVehiculoMod3(); ?>
  </tbody>
  </table>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="content">
  <div class="card">
    <div class="card-body">
      <div class="col d-flex justify-content-evenly">
<?php $verDts->ctrMostrarDatosPerfilVehiculoMod4(); ?>
        </div>
    </div>
  </div>
</section>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
<?php $verDts->ctrPasarIdHidden(); #input tipe=hidden name=idVehiAsigServ  ?>
<select class="form-select" name="serv" aria-label="Default select example" required>
  <option value="">Open this select menu</option>
<?php $verDts->ctrMostrarServiciosEnAddServices();?>
</select><br>
<input type="date" name="fechaIni" class="form-control"><br>
<input type="date" name="fechaFin" class="form-control"><br>
<input type="number" name="valServ" class="form-control" placeholder="Assign a value to the service USD" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Assign Service</button>
      </div>
</form>
    </div>
  </div>
</div>

<?php 
#$mstrDatosFactura=new GeneradorDeFacturasControlador();
#$mstrDatosFactura->ctlrRecibe_Servicio_A_facturar();
#print_r($mstrDatosFactura);
 ?>