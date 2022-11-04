    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Table Of Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?action=inicio">Home</a></li>
              <li class="breadcrumb-item active">General Table Of Services</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">General List Of Assigned Services</h3>
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
          <div class="container-responsive">
            <table id ="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>CLIENT NAME</th>
                  <th>COMPANI NAME</th>
                  <th>PHONE</th>
                  <th>EMAIL</th>
                  <th>SERVICE</th>
                  <th>SERVICE START DATE</th>
                  <th>SERVICE END DATE</th>
                </tr>
              </thead>
              <tbody>
<?php $mstrDS=new ControladorTablaGeneralServicios; $mstrDS->ctrMostrarServiciosEnTablaGeneral(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>