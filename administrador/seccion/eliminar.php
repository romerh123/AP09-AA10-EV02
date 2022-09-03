<?php 
session_start();
if(isset($_POST['doc'])){
$doc=$_POST['doc'];
$accion=$_POST['accion'];
if($accion=="eliminar"){
$doc=$_POST['documento'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$obser=$_POST['descripccion'];

    include("../config/bd.php");

    $res=$conexion->query("SELECT * FROM `clientes`  WHERE 1 documento=´$doc'");
    if($res->num_rows==0){
        $_SESSION['mensaje'] ='<div class="alert alert-danger" role="alert">
      No existe un cliente con est  información
      </div>';

}else{
    $res=$conexion->query("DELETE FROM `clientes` WHERE 1 documento=´$doc'");
    $_SESSION['mensaje'] ='<div class="alert alert-success" role="alert">
   Cliente eliminado
    </div>';

}
header("location:clientes.php");
}
}else{
 echo  "No se ha echo click";
}