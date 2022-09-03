<?php
session_start();
 if(isset($_POST['accion'])){//verificar que se da click en un boton
  $accion=$_POST['accion'];
  if($accion=="guardar"){
$doc=$_POST['documento'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$obser=$_POST['descripccion'];

include("../config/bd.php");

$res=$conexion->query("SELECT * FROM `clientes`  WHERE documento=´$doc'");
if($res->num_rows>0){
    $_SESSION['mensaje'] ='<div class="alert alert-danger" role="alert">
  Ya existe un cliente con est  información
  </div>';

}else{
    $res=$conexion->query("INSERT INTO `clientes`(`documento`, `nombre`, `correo`, `descripccion`) 
    VALUES ('$doc','$nombre','$correo','$obser')");
       $_SESSION['mensaje'] ='<div class="alert alert-danger" role="alert">
    Informacion Ingresada correctamente
       </div>'; 

}
header("location:clientes.php");

}else if($accion=="consultar"){





}else{
  include("../config/bd.php");

  $res=$conexion->query("SELECT * FROM `clientes`  WHERE documento=´$doc'");
  if($res->num_rows>0){
    $_SESSION['datos']=$res->fetchObject();
      $_SESSION['mensaje'] ='<div class="alert alert-danger" role="alert">
    Se encontro el cliente seleccionado
    </div>';
  
  }else{
      $res=$conexion->query("INSERT INTO `clientes`(`documento`, `nombre`, `correo`, `descripccion`) 
      VALUES ('$doc','$nombre','$correo','$obser')");
         $_SESSION['mensaje'] ='<div class="alert alert-danger" role="alert">
     Cliente no existe
         </div>'; 
  
  }
  header("location:clientes.php");
}
}