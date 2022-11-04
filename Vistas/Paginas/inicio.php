<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Dashboard</h3>

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

        <div class="row d-flex justify-content-start text-center">

          <div class="col-4">
            <a href="index.php?action=clientes">
              <div class="small-box bg-primary">
              <div class="inner"><br><br>
                <h4 class="text-nowrap">Customers</h4><br><br>
              </div>
              <div class="icon">
                 <i class="fa fa-building" aria-hidden="true"></i>
              </div>
            </div>
            </a>
          </div>

          <div class="col-4">
            <a href="index.php?action=servicios">
              <div class="small-box bg-secondary">
              <div class="inner"><br><br>
                <h4 class="text-nowrap">Servicios</h4><br><br>
              </div>
              <div class="icon">
                <i class="fa fa-thin fa-handshake"></i>
              </div>
            </div>
            </a>
          </div>

          <div class="col-4">
            <a href="index.php?action=usuarios">
              <div class="small-box bg-success">
              <div class="inner"><br><br>
                <h4 class="text-nowrap">Users</h4><br><br>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
            </a>
          </div>

          <!--<div class="col-4">
            <a href="index.php?action=alcoholydrogas">
              <div class="small-box bg-danger">
              <div class="inner"><br><br>
                <h4>Alcohol And Drugs</h4><br><br>
              </div>
              <div class="icon">
                <i class="fa fa-thin fa-capsules"></i>
              </div>
            </div>
            </a>
          </div> -->

          <div class="col-4">
            <a href="index.php?action=vehiculos">
              <div class="small-box bg-warning">
              <div class="inner"><br><br>
                <h4 class="text-nowrap">Trucks</h4><br><br>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
            </div>
            </a>
          </div>

          <!--
          <div class="col-4">
            <a href="index.php?action=clientes">
              <div class="small-box bg-danger">
              <div class="inner"><br><br>
                <h4>Add Customer</h4><br><br>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            </div>
            </a>
          </div> -->

          <div class="col-4">
            <a href="index.php">
              <div class="small-box bg-info">
              <div class="inner"><br><br>
                <h4 class="text-nowrap text-center">Sales Report</h4><br><br>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
            </a>
          </div>  

        </div>

</div>

    </div>
  </div>
</section>

 <?php /*
if (isset($_GET['action'])) {
  if ($_GET['action']=="servAsigActuOk") {
    echo '
    <script>
      Swal.fire(
      "Nice job! success upgraded service",
      "check the route clients/DetailsClient/trucks/ShowServices and check the update",
      "success"
      )
    </script>
    ';
  }
}*/

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
if (isset($_GET['action'])) {
  if ($_GET['action']=="servAsigActuOk") {
    echo '
        <script>

        let timerInterval
        Swal.fire({
          title: "assigning service!",
          html: "In a moment it will be ready <b></b>",
          timer: 2500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector("b")
          },
          willClose: () => {
            clearInterval(timerInterval)
            history.back(-2)
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

if (isset($_GET['action'])) {
  if ($_GET['action']=="delServAsigVehiOk") {
    echo '
        <script>

        let timerInterval
        Swal.fire({
          title: "removing assigned service!",
          html: "In a moment it will be ready <b></b>",
          timer: 2500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector("b")
          },
          willClose: () => {
            clearInterval(timerInterval)
            history.back(-2)
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

if (isset($_GET['action'])) {
  if ($_GET['action']=="envioMailsOk") {
    echo '
        <script>

        let timerInterval
        Swal.fire({
          title: "sending mails and inform the administrator!",
          html: "In a moment it will be ready <b></b>",
          timer: 3500,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector("b")
          },
          willClose: () => {
            clearInterval(timerInterval)
            history.back(-2)
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