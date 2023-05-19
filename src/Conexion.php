<?php
//Se registran los parametros de entrada a la base de datos, Estos van a cambiar con respecto a el entorno de base de datos que se esté utilizando y a su configuración interna
$usuario = "root"; 
$password = "";
$servidor = "localhost";
$basededatos = "id20722711_sempiterno";

// creación de la conexión a la base de datos con mysql_connect()
$conexion = new mysqli ($servidor, $usuario, $password, $basededatos);

//Verfica la conexión a la base de datos con mysql;
if ($conexion->connect_errno){
    die("Conexión Fallida");
}else{
    
}


