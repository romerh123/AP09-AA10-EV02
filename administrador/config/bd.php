<?php
$host="localhost";
$bd="sitio";
$usuario="root";
$contrasenia="";
$port=3306;

try {
        $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
        if($conexion){ echo "";}
} catch ( Exception $ex){
  echo $ex->getMessage();

}
?>