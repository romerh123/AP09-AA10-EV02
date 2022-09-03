<?php include('template/cabecera.php')

?>


<div class="container">
    <div class="row">


        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-3">Bienvenido <?php echo $nombreUsuario;?></h1>
                <p class="lead">Administracion de Productos del sitio Web Taller Vilaser</p>
                <hr class="my-2">
                <p>Oprima el boton para ingresar</p>
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Ingreso</a>
                </p>
                

            </div>
        </div>

        <?php include('template/pie.php')
        ?>