<!-- Content Header (Page header) -->
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
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Detailed Profile</h3>
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

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary card-outline">
<div class="card-body box-profile">
<?php 
$mstrDatos1=new ControladorDetallesCliente;
$mstrDatos1->ctrMostrarDatos1NameEmpNameCli();
 ?>
</div>
        </div>
      </div>
      <div class="col col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link " href="#profile" data-toggle="tab">Profile</a></li>
              <li class="nav-item"><a class="nav-link" href="#trucks" data-toggle="tab">Trucks</a></li>
              <li class="nav-item"><a class="nav-link " href="#files" data-toggle="tab">Files</a></li>
              <li class="nav-item"><a class="nav-link" href="#pdf" data-toggle="tab">PDF</a></li>
              <li class="nav-item"><a class="nav-link active" href="#ayd" data-toggle="tab">Alcohol And Drugs</a></li>
            </ul>
          </div>
          <div class="card-body">

<div class="tab-content">


<div class="tab-pane" id="profile">
<?php 
$mstrDatos2= new ControladorDetallesCliente;
$mstrDatos2->ctrMostrarDatos2DemasDts();
 ?>
</div>



<div class="tab-pane" id="trucks">

  <div class="table-responsive">
    <div class="row d-flex justify-content-center">
      <div class="col col-2">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#crearVehiculo">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16"> <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/> </svg>
  Crear Vehiculo
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16"> <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/> </svg>
</button>

      </div>
    </div>
        <table id="example1" class="table table-dark table-hover  table-borderless text-nowrap">
          <?php $mstrVehiculos=new ControladorDetallesCliente; $mstrVehiculos->ctrMostrarVehiculosFiltrados(); ?>
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
          
          </tbody>
  </table>
</div>

</div>



<div class="tab-pane " id="files">

<div class="container-fluid">
  <div class="row">
    <div class="col-2">

<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">view files</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">upload new file</button>
  </div>

</div>

    </div>

    <div class="col-10">
        <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
          
<div class="row">
  <div class="table-responsive">
  <table id="example1" class="table table-sm table-dark table-hover  table-borderless text-nowrap">
<?php $mstrVehiculos=new ControladorDetallesCliente; $mstrVehiculos->mostrarDatosTablaArchivos(); ?>
      <thead>
        <tr>
          <th>ACTION</th>
          <th>NAME ARCH</th>
          <th>FECHA CREATE</th>
        </tr>
      </thead>
      <tbody>
          
    </tbody>
  </table>
  </div>
</div>

        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
          <div class="row">
            <div class="col-10">
              <form method="post" enctype="multipart/form-data">
                <input type="file" name="arch" class="form-control"><br>
                <label>rename the file</label>
                <input type="text" name="renombre" class="form-control" placeholder="rename the file"><br><br>
                <button type="submit" class="btn btn-primary">Upload File</button><br>
              </form>
              <?php $subirArchivos=new ControladorDetallesCliente(); $subirArchivos->subirArchivos(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>



              <div class="tab-pane " id="pdf">
<div class="table-responsive-sm">
  <table class="table table-borderless table-sm table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">File Name</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>

<tr>
  <th>Trucker Lease agreement</th>
  <th><a href="Vistas/pdfs/1-Trucker-Lease-agreement.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Vehicle Identification</th>
  <th><a href="Vistas/pdfs/2-VEHICLE-IDENTIFICATION.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Small Corporation</th>
  <th><a href="Vistas/pdfs/3-small-corporation.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>W-9</th>
  <th><a href="Vistas/pdfs/4-W-9.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Fuel Taxes</th>
  <th><a href="Vistas/pdfs/5-FUEL-TAXES.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Dot Reinstatement</th>
  <th><a href="Vistas/pdfs/6-DOT-REINSTATEMENT.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>General Affidavit</th>
  <th><a href="Vistas/pdfs/7-GENERAL-AFFIDAVIT.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Dot Change And Plate Change</th>
  <th><a href="Vistas/pdfs/8-DOT-CHANGE-AND-PLATE-CHANGE.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Ifta Remplace Decals</th>
  <th><a href="Vistas/pdfs/9-IFTA-REMPLACE-DECALS.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Ifta Carrier Services Contact</th>
  <th><a href="Vistas/pdfs/10-IFTA-Carrier-Services-Contact.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Ifta Aplication</th>
  <th><a href="Vistas/pdfs/11-IFTA-APPLICATION.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Most Lost</th>
  <th><a href="Vistas/pdfs/12-MOTOR-LOST.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>New or Renewal Tag Local</th>
  <th><a href="Vistas/pdfs/13-New-or-Renewal-Tag-Local.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Non Use Affidavit</th>
  <th><a href="Vistas/pdfs/14-NON-USE-AFFIDAVIT.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Ny Permit</th>
  <th><a href="Vistas/pdfs/15-NY-PERMIT.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Poa Affidavit</th>
  <th><a href="Vistas/pdfs/16-POA-AFFIDAVIT.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Poa Florida</th>
  <th><a href="Vistas/pdfs/17-POA-FLORIDA.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Small Corporation</th>
  <th><a href="Vistas/pdfs/18-small-corporation.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Trucker Lease Agreement</th>
  <th><a href="Vistas/pdfs/19-Trucker-Lease-agreement.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>Vehicle Identification</th>
  <th><a href="Vistas/pdfs/20-VEHICLE-IDENTIFICATION.pdf" target="_bank">To Download</a></th>
</tr>

<tr>
  <th>W 9</th>
  <th><a href="Vistas/pdfs/21-W-9.pdf" target="_bank">To Download</a></th>
</tr>

  </tbody>
</table>
</div>
              </div>

              <div class="tab-pane active" id="ayd">
                <div class="table-responsive">
                  <table id ="example1" class="table table-sm table-bordered table-striped text-nowrap">
                    <thead>
                      <tr>
                        <th><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>&ect=sendAll" class="btn btn-warning btn-sm" type="submit">send to all</a></th>
                        <th>COMPANY NAME</th>
                        <th>CLIENT NAME</th>
                        <th>EMAIL</th>
                        <th>PLATE</th>
                        <th>SERVICIO</th>
                        <th>SERVICE START DATE</th>
                        <th>SERVICE END DATE</th>
                        <th>VALUE</th>
                      </tr>
                    </thead>
                  <tbody>
      <?php $mstrDtos=new Controlador_Alcohol_Y_Drogas; $mstrDtos->ctrMostrarServiciosFiltradosAD(); 
            $mstrDtos->ctrEnviarMail25x100to();?>
                  </tbody>
                  </table>
                </div>
              </div>




            </div>
                  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>
  </div>
</section>


<h6 class="text-center">
  <?php 
  $crearVehiculoEmp=new ControladorVehiculos;
  $crearVehiculoEmp->ctrCrearVehiculo();
   ?>
</h6>


<!--start Modal -->
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
          <input type="text" name="placa" placeholder="Escriba Una Placa" class="form-control" required><br>

          <label>Model: </label>
          <input type="text" name="modelo" placeholder="Escriba El Modelo" class="form-control" required><br>

          <label>Year: </label>
          <input type="text" name="year" placeholder="Escriba El Año" class="form-control" required><br>

          <label>VIN #: </label>
          <input type="text" name="vin" placeholder="Escriba El VIN#" class="form-control" required><br>

          <label>Value-Cost: </label>
          <input type="text" name="valor" placeholder="Escriba El Valor" class="form-control" required><br>

          <label>DOT #: </label>
          <input type="text" name="dot" placeholder="Escriba El DOT#" class="form-control" required><br>

          <label>Slope 1: </label>
          <input type="text" name="pend1" placeholder="Escriba info 1" class="form-control" required><br>
          
          <label>Slope 2: </label>
          <input type="text" name="pend2" placeholder="Escriba info 2" class="form-control" required><br>
          
          <label>Slope 3: </label>
          <input type="text" name="pend3" placeholder="Escriba info 3" class="form-control" required><br>

          <label>Assigned To: </label>
          <select name="asignado" class="form-select" aria-label="Default select example" required>
            <option value="">(Click) To See Clients</option>
<?php $mostrarCliente=new ControladorVehiculos; $mostrarCliente->ctrMostrarClientes(); ?>
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create New Vehicle</button>
        </form>
      </div>
    </div>
  </div>
</div> <!--end Modal -->