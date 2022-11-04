    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alcohol And Drugs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Alcohol And Drugs</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">list of alcohol and drug services</h3>
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
            <table id ="example1" class="table table-bordered table-striped text-nowrap">
              <thead>
                <tr>
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
<?php $mstrDtos=new Controlador_Alcohol_Y_Drogas; $mstrDtos->ctrMostrarServiciosFiltradosAD(); ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>