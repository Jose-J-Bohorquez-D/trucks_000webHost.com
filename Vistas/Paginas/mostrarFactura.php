
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!--<div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>-->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Trucks
                    <small class="float-right">Date: <?php echo date('d-m-Y'); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Trucks</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    Florida, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: invoices@trucks.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    Name Customer: <strong><?php echo $respuesta['nombre_empresa'] ?></strong><br>
                    Name Client: <?php echo $respuesta['nombre_cliente'] ?><br>
                    Address: <?php echo $respuesta['direccion'] ?><br>
                    Phone: <?php echo $respuesta['tel1'] ?><br>
                    Email: <?php echo $respuesta['email1'] ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice: #  <?php echo $respuesta['id_asignacion'] ?></b><br>
                  <br>
                  <b>Order ID:  <?php echo $respuesta['id_asignacion'] ?></b> <br>
                  <b>Payment Due:</b> <?php echo $dia."-".$mesPlazo."-".$anio ?><br>
                  <b>Account:</b> xxxx xxxx xxxx xxxx
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td><?php echo $respuesta['nombre_servicio'] ?></td>
                      <td><?php echo $respuesta['placa'] ?></td>
                      <td><?php echo $respuesta['vin_numer'] ?></td>
                      <td><?php echo $respuesta['valor_servicio_asignado'] ?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="Vistas/dist/img/credit/visa.png" alt="Visa">
                  <img src="Vistas/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="Vistas/dist/img/credit/american-express.png" alt="American Express">
                  <img src="Vistas/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$<?php echo $respuesta['valor_servicio_asignado'] ?></td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$<?php echo $respuesta['valor_servicio_asignado'] ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button id="btnImprimir" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<script>
  $(document).ready(function(){
    $('#btnImprimir').click(function(){
      window.addEventListener("load", window.print());
    });
  });
</script>