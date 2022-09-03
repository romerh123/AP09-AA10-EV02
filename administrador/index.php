<?php
session_start();
if ($_POST) {
    if(($_POST['usuario']=="vilaser")&&($_POST['contrasenia']=="sistema")){
    
    $_SESSION['usuario']="ok";
    $_SESSION['nombreUsuario']="vilaser";
    header('LOCATION:inicio.php');
    
    }else{
     $mensaje="Error: Usuario o contraseña invalidos";
    }
  
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Raul</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <br /> <br />
    <div class="container">
        <div class="row">

            <div class="col-md-4">

            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">
                        LOGIN
                    </div>
                    <div class="card-body">
                <?php  if(isset($mensaje)) {?>
                    <div class="alert alert-danger" role="alert">
                       <?php echo $mensaje;?>
                    </div>
                    <?php }?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input type="text" class="form-control" name="usuario" placeholder="Ingrese Su usuario">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="contrasenia" placeholder="Ingrese Su Contraseña">
                            </div>
                            <br />
                            <button type="submit" class="btn btn-primary">Ingreso</button>
                            <a class="text-center" href="#">Olvido su contraseña</a>
                        </form>


                        <?php include('template/pie.php')
        ?>