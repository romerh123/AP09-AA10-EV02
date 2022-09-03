

<?php
session_start();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>vilaser</title>

    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>

<body>

    <div style="background-color:primary;" class="container">
    <h3>
  Sistema Ingreso Clientes a Bodega Vilaser
  
</h3>
<?php 
if(isset($_SESSION['mensaje'])){
echo $_SESSION['mensaje'];
unset($_SESSION['mensaje']);


}
if(isset($_SESSION['datos'])){
    $doc=$_SESSION['datos']->documento;
    $nombre=$_SESSION['datos']->nombre;
    unset($_SESSION['datos']);
}

?>
<br>
<a name="" id="" class="btn btn-primary" href="productos.php" role="button">Productos</a>
        <form action="guardar.php" method="post">
            <div class="input-group mt-5 ">
                <span class="input-group-text">Documento</span>
                <input value="<?php echo @$doc;?>"name="documento" placeholder="Identificacion cliente" type="text" aria-label="documento" class="form-control">
                <span class="input-group-text">Nombre</span>
                <input value="<?php echo @$doc;?>"name="nombre" placeholder="Ingrese el nombre" type="text" aria-label="nombre" class="form-control">
            </div>
            <div class="input-group mt-3">
                <span class="input-group-text">Email</span>
                <input name="correo" placeholder="Ingrese correo cliente" type="text" aria-label="correo" class="form-control">
                <span class="input-group-text">Observacion</span>
                <input name="descripccion" placeholder="Detalles producto" type="text" aria-label="descripccion" class="form-control">
            </div>
            <div class="input mt-3">
                <button name="accion" value="guardar" type="submit" class="btn btn-primary">Guardar</button>
                <button name="accion" value="consultar "type="submit" class="btn btn-dark">Consultar</button>
                
            </div>

        </form>
        <br><br>
        <h3>Visor de Informacion</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Observacion</th>
                </tr>
            </thead>
            <tbody>
     
            <?php 
            include("../config/bd.php");
            $res=$conexion->query("SELECT * FROM `clientes` WHERE 1");//Realiza la consulta cuantas veces sea necesaria sin romper el ciclo
            while($info=$conexion=$res->fetchObject()){
            ?>
                <tr>
                    <td scope="row"><?php echo $info->documento;?></td>
                     <td><?php echo $info->nombre;?></td>
                    <td><?php echo $info->correo;?></td>
                    <td><?php echo $info->descripccion;?></td>
                    <td>
                   <a name="" id="" class="btn btn-primary" href="eliminar.php?doc=<?php echo $info->documento;?>" role="button">Eliminar</a>
                    </td>
                </tr>
                <?php
                
            }
                
                ?>
                
          
                    
            </tbody>
        </table>
        

    </div>
</body>

</html>