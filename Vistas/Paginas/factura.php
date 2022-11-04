<?php
#$mstrDatosFactura= new GeneradorFacturasControlador;
#$mstrDatosFactura->ctlrRecibe_Servicio_A_facturar();
ob_clean();
ob_end_clean();

class PDF extends FPDF
{

// Cabecera de página
function Header()
{
    #$this->Image('logo.png',10,8,33);// Logo
    $this->SetFont('Arial','',15);// Arial bold 15
    $this->Cell(145);// Movernos a la derecha
    $this->Cell(44,7,'Factura De Venta',1,0,'C');
    $this->Ln(10);//salto de linea
    $this->Cell(145);// Movernos a la derecha
    $this->SetFont('Arial','',10);
    $this->Cell(45,8,utf8_decode('Factura N°: 1111111111'),0,0,'C');
    $this->Ln(5);//salto de linea
    $this->Cell(145);// Movernos a la derecha
    $this->SetFont('Arial','',10);//se cambia la tipografia a tamaño 10
    $this->Cell(45,8,utf8_decode('Fecha: 25/07/2022'),0,0,'C');//fecha de la factura
    
    $this->Ln(-16);//salto de linea
    $this->SetFont('Arial','',14);//cambiamos tamaño tipografia a 13
    $this->Cell(72.5);// Movernos a la derecha
    $this->Cell(50,7,'TRUCKS S.A.S',0,0,'C');//nombre de la empresa
    $this->Ln(4);//salto de linea
    $this->SetFont('Arial','',8);//cambiamos tamaño tipografia a 1
    $this->Cell(72.5);// Movernos a la derecha
    $this->Cell(52,6,'NIT: 111111111-1',0,0,'C');//nit
    $this->Ln(8);//salto de linea
    $this->SetFont('Arial','',10);//cambiamos tamaño tipografia a 10
    $this->Cell(72.5);// Movernos a la derecha
    $this->Cell(50,7,'City: sprimfield',0,0,'C');//estado provincia localidad etc
    $this->Ln(4);//salto de linea
    $this->Cell(72.5);// Movernos a la derecha
    $this->Cell(50,7,'Address: Av 100pre viva 742',0,0,'C');//direccion empresa
    $this->Ln(4);//salto de linea
    $this->Cell(72.5);// Movernos a la derecha
    $this->Cell(50,7,'Fax:+57 6215010',0,0,'C');//fax
    $this->Ln(-19);//salto de linea

    $this->Cell(50,20,'LOGO',1,10,'C');//nombre de la empresa
   
}

// Pie de página
function Footer()
{
    $this->Ln(150);//salto de linea
    $this->SetFont('Arial','',10);
    $this->Cell(55,8,utf8_decode('Proveedor de facturacion The Jungle Media'),0,0,'C');
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

    $mysqli = new mysqli("localhost","root","","trucks2023"); 
    $consulta="SELECT sav.id_asignacion,sav.id_vehiculo,sav.id_servicio,sav.fecha_inicio_serv,sav.fecha_fin_serv,
            sav.valor_servicio_asignado,v.id_vehiculo,v.placa,v.asignado_empresa,s.nombre_servicio,
            c.id_cliente,c.nombre_empresa,c.nombre_cliente,c.direccion,c.tel1,c.email1 
            FROM servicios_asignados_vehiculos sav
            JOIN vehiculos v ON sav.id_asignacion = v.id_vehiculo
            JOIN servicios s ON sav.id_servicio = s.id_servicio
            JOIN clientes c ON v.asignado_empresa = c.nombre_empresa";
    $resultado=$mysqli->query($consulta);
    #var_dump($resultado);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $row=$resultado->fetch_assoc();
    $pdf->Ln(10);//salto de linea
    #$pdf->SetFont('Arial','B',13);
    #$pdf->Cell(40,10,'Cliente:');
    $pdf->Ln(4);//salto de linea
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(40,10,'Cliente: '.$row['nombre_empresa']);
    #$pdf->Ln(4);//salto de linea
    #$pdf->Cell(40,10,$row['nombre_empresa']);
    $pdf->Ln(4);//salto de linea
    $pdf->Cell(40,10,'Direccion: '.$row['direccion']);
    $pdf->Ln(4);//salto de linea
    $pdf->Cell(40,10,'Email: '.utf8_decode($row['email1']));
    $pdf->Ln(4);//salto de linea
    $pdf->Cell(40,10,'Telefono: '.$row['tel1']);
    $pdf->Ln(4);//salto de linea
    $pdf->Ln(4);//salto de linea
    $pdf->Ln(-22);//salto de linea

    $pdf->Cell(100);
    $pdf->Cell(40,10,'Tipo Negociacion: Contado');
    $pdf->Ln(4);//salto de linea
    $pdf->Cell(100);
    $pdf->Cell(40,10,'Medio De Pago: Efectivo');
    $pdf->Ln(4);//salto de linea
    $pdf->Cell(100);
    $pdf->Cell(40,10,'Moneda: USD');
    $pdf->Ln(4);//salto de linea
    $pdf->Cell(100);
    $pdf->Cell(40,10,'Fecha y Hora Emicion: '.date('d-m-Y h:i:s a', time()),0,1);
    $pdf->Ln(4);//salto de linea



    #$pdf->Cell(20);
    $pdf->Cell(6,7,'#',1,0,"C",0);
    $pdf->Cell(14,7,'Codigo',1,0,"C",0);
    $pdf->Cell(10,7,'Cant',1,0,"C",0);
    $pdf->Cell(70,7,'Descripcion',1,0,"C",0);
    $pdf->Cell(27,7,'Asigando Placa',1,0,"C",0);
    $pdf->Cell(27,7,'Unidad Medida',1,0,"C",0);
    $pdf->Cell(20,7,'Valor Unit',1,0,"C",0);
    $pdf->Cell(20,7,'Total',1,0,"C",0);
    $pdf->Ln(8);//salto de linea

while ($row = $resultado->fetch_assoc()) {
    #$pdf->Cell(20);
    $pdf->Cell(6,7,$row['id_asignacion'],0,0,"C",0);
    $pdf->Cell(14,7,$row['id_servicio'],0,0,"C",0);
    $pdf->Cell(10,7,'1',0,0,"C",0);
    #$pdf->Ln(4);//salto de linea
    $pdf->Cell(70,7,$row['nombre_servicio'],0,0,"C",0);
    #$pdf->Ln(4);//salto de linea
    $pdf->Cell(27,7,$row['placa'],0,0,"C",0);
    $pdf->Cell(27,7,'WSD(estandar)',0,0,"C",0);
    $pdf->Cell(20,7,$row['valor_servicio_asignado'],0,0,"C",0);
    $pdf->Cell(20,7,$row['valor_servicio_asignado'],0,1,"C",0);
    #$pdf->Ln(4);//salto de linea
}
    $pdf->Ln(8);//salto de linea
    $pdf->Cell(130);
    $pdf->Cell(20,7,'IVA:',1,0,"C",0);
    $pdf->Cell(40,7,'19%',1,1,"C",0);
    $pdf->Cell(130);
    $pdf->Cell(20,7,'Subtotal:',1,0,"C",0);
    $pdf->Cell(40,7,'$'.$row['valor_servicio_asignado'],1,1,"C",0);
    $pdf->Cell(130);
    $pdf->Cell(20,7,'Total:',1,0,"C",0);
    $pdf->Cell(40,7,'$'.$row['valor_servicio_asignado'],1,0,"C",0);

$pdf->Output();
?>