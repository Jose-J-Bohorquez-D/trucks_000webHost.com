    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoices</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Invoices</li>
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
          <h3 class="card-title">general table of invoices</h3>

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
            <th>ID</th>
            <th>CONSECUTIVE</th>
            <th>INVOICE #</th>
            <th>BROADCAST DATE</th>
            <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><span>Error</span></td>
                <td><span>Error</span></td>
                <td><span>Error</span></td>
                <td><span>Error</span></td>
                <td><button>
                  <i class="fa-solid fa-file-invoice-dollar">
                  </button>
                </td>
              </tr>
            </tbody>
            <tfoot>
            <tr>
            <th>ID</th>
            <th>CONSECUTIVE</th>
            <th>INVOICE #</th>
            <th>BROADCAST DATE</th>
            <th>ACTIONS</th>
            </tr>
            </tfoot>
            </table>
          </div>

        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->