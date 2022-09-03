<?php



if(isset($_POST['accion'])){
    $accion=$_POST['accion'];
    if($accion=="guardar"){

$cedula=$_POST['cedula'];
$nombre=$_POST['Nombre'];
$apellido=$_POST['apellidos'];
$tel=$_POST['telefono'];


require 'conexion.php';

$res=$con->query("INSERT INTO `empleados`(`cedula`, `nombre`, `apellido`, `telefono`) 
VALUES ('$cedula','$nombre','$apellido','$tel')");
    echo "guardo";
    }
}else{
echo"no se ha echo clic";

}
?>
