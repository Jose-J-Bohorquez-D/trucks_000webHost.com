<?php 
class Controlador_Alcohol_Y_Drogas{
	public function ctrMostrarServiciosFiltradosAD(){
		$respuesta=Modelo_Alcohol_Y_Drogas::mdlMostrarServiciosFiltradosAD("servicios_asignados_vehiculos");
		#var_dump($respuesta);
		foreach ($respuesta as $key => $value) {
		echo '
		<tr>
			<td><a href="index.php?action=clienteDetalles&ecuu='.$value["id_asignacion"].'" class="btn btn-info btn-sm">send mail</a></td>
			<td>'.$value["nombre_empresa"].'</td>
			<td>'.$value["nombre_cliente"].'</td>
			<td>'.$value["email1"].'</td>
			<td>'.$value["placa"].'</td>
			<td>'.$value["nombre_servicio"].'</td>
			<td>'.$value["fecha_inicio_serv"].'</td>
			<td>'.$value["fecha_fin_serv"].'</td>
			<td>'.$value["valor_servicio_asignado"].'</td>
    	</tr>
		';
		}
	}

	public function ctrEnviarMail25x100to(){#inicio ctrEnviarMail25x100to
		if (isset($_GET['ect'])) { 			#echo $_SERVER['HTTP_HOST']; #echo "<br>"; #echo $_SERVER["HTTP_REFERER"]; #echo "<br>"; #var_dump($_SERVER["REQUEST_URI"]) ; #echo "<br>";
		$respuesta=Modelo_Alcohol_Y_Drogas::mdlMostrarServiciosFiltradosAD("servicios_asignados_vehiculos"); #print_r($respuesta[0]);echo "<br>";
		$totalRegistros=count($respuesta); #$totalRegistros=5;
		$porcentaje="0.25";
		$subTotal=round($totalRegistros*$porcentaje);
		$total=$subTotal;  #echo "el 25%  de los: &nbsp;" . $totalRegistros . "&nbsp; registros obtenidos es: &nbsp;" . $total; #echo "&nbsp; y el valor final es :  &nbsp;" . round($total) . "&nbsp; por que php con su funcion round redondea hacia arriba y en enteros"; #echo "<br>"; #echo "EL NUMERO ALEATORIO ES : " .$randomizer=rand(0,$totalRegistros);
		$na;#para usar en el for anidado
		$listado_random=array(); #var_dump($listado_random);
		for ($i=0; $i < $total ; ++$i) { 				#echo "<br>";
				$na=rand(0,$totalRegistros-1);  #echo "los numeros aleatorios son : " . $na; #echo " el correo se le enviara a :  ". $respuesta[$na][3];
				$guardar_en_array=array_push($listado_random,$respuesta[$na][3]);

		}#echo "<br>";echo "<br>"; 
		$correos_listos_para_enviar=$listado_random;
		$conteo_mails=count($listado_random); #var_dump($correos_listos_para_enviar);
		$titulo="service status reminder TRUCKS";
		$mensaje_mail="your service is currently active, but is about to expire, renew your subscription and avoid mishaps";
		$cabeceras = 'From: info@trucks.com' . "\r\n" .
    				 'Reply-To: info@trucks.com' . "\r\n" .
    				 'X-Mailer: PHP/' . phpversion();

	    $i;
	    #echo "<br>";
	    #var_dump($i);
	    #echo "<br>";
	    #var_dump($conteo_mails);
		for ($i=0; $i < $conteo_mails ; ++$i) {  #echo "<br>"; #echo "el mail a enviar es: " . " " . $correos_listos_para_enviar[$i];
		mail($correos_listos_para_enviar[$i],$titulo,$mensaje_mail);	
			/*if (mail($correos_listos_para_enviar[$i],$titulo,$mensaje_mail) == true) { #echo "email enviado: " . " " . $correos_listos_para_enviar[$i];
    			echo '<script>
						Swal.fire({
							icon: "success",
							title: "ok...",
							text: "mails enviados con exito!"
							})
					  </script>  ';			
			}else{
				echo "error al intentar enviar Mail a : " . " " . $correos_listos_para_enviar[$i];
				echo '<script>
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: " error al enviar mails!"
							})
					  </script>	';
			}*/
		}
		if ($i===$conteo_mails) {
			echo "el email del admin es:".$_SESSION['email']; 
			echo "<br>";
			$email_BD="bd567358546@gmail.com";
			$titulo_mail_admin="Informe Envio mails randomizer";
			$mails_conertidos_a_string=implode($correos_listos_para_enviar,",");
			var_dump($mails_conertidos_a_string);
			$mensaje_mail_admin="recordatorio enviado a : " . " " . $mails_conertidos_a_string;
			$mensaje_final = wordwrap($mensaje_mail_admin, 70, "\r\n");
			$cabeceras = 'From: info@trucks.com' . "\r\n" . 'Reply-To: info@trucks.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
			if (mail($email_BD, $titulo_mail_admin, $mensaje_final,$cabeceras) != false) {
			    	echo '<script type="text/javascript">
							window.location.href = "index.php?action=envioMailsOk";
						  </script>';
			}else{
				echo '<script>
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: " error al enviar mails!"
							})
					  </script>	';
			}  	
		}
	 }
	}#fin ctrEnviarMail25x100to
}



 ?>
