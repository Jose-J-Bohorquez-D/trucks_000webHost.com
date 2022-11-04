<?php

class ConexionBD{

  static public function conectarbd(){

    $link=new PDO("mysql:host=localhost;dbname=id19246047_trucks2023","id19246047_sup_admin_bd","30uSYi22ovh{1Q7R");

    #var_dump($link); #testeo conexion

    return $link;

  }

}
/*
$testConexion=new ConexionBD;
$testConexion->conectarbd();
*/
