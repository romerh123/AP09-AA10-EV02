<?php include("../template/cabecera.php"); ?>

<?php
$txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../config/bd.php");

switch ($accion) {

  case "Agregar":
    $sentenciaSQL = $conexion->prepare("INSERT INTO productos(nombre, imagen) VALUES (:nombre,:imagen);");
    $sentenciaSQL->bindParam(':nombre', $txtNombre);

    $fecha = new DateTime();
    $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES[" txtImagen"]["name"] : "imagen.jpg";
   /*$tmpImagen = $_FILES["txtImagen"]["tmp_name"];

    if ($tmpImagen != null) {
      move_uploaded_file($txtImagen, "../../img/" . $nombreArchivo);
    }*/
    $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
    $sentenciaSQL->execute();

    break;
  case "Modificar":
    $sentenciaSQL = $conexion->prepare("UPDATE Productos  SET nombre=:nombre WHERE id=:id");
    $sentenciaSQL->bindParam(':nombre', $txtNombre);
    $sentenciaSQL->bindParam(':id', $txtId);
    $sentenciaSQL->execute();
    if ($txtImagen != "") {
    $sentenciaSQL = $conexion->prepare("UPDATE Productos  SET imagen=:imagen WHERE id=:id");
    $sentenciaSQL->bindParam(':imagen', $txtImagen);
    $sentenciaSQL->bindParam(':id', $txtId);
    $sentenciaSQL->execute();
    }

    break;
  case "Cancelar":
    header("Location:productos.php");
    break;
  case "Seleccionar":

    $sentenciaSQL = $conexion->prepare("SELECT * FROM Productos WHERE id=:id");
    $sentenciaSQL->bindParam(':id', $txtId);
    $sentenciaSQL->execute();
    $productos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    $txtNombre = $productos['nombre'];
    $txtImagen = $productos['imagen'];
    break;
  case "Borrar":
    $sentenciaSQL = $conexion->prepare("DELETE FROM Productos WHERE id=:id");
    $sentenciaSQL->bindParam(':id', $txtId);
    $sentenciaSQL->execute();

    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos");
$sentenciaSQL->execute();
$listaproductos = $sentenciaSQL->fetchall(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">

  <div class="card">
    <div class="card-header">
      Productos
    </div>
    <div class="card-body">

      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="txtId">ID</label>
          <input type="text" required readonly class="form-control" value="<?php echo $txtId; ?> " name="txtId" id="txtId" placeholder="Id">
        </div>


        <div class="form-group">
          <label for="txtNombre">Nombre</label>
          <input type="text"  required class="form-control" value="<?php echo $txtNombre; ?> " name="txtNombre" id="txtNombre" aria-describedby="emailHelp" placeholder="Nombre">
        </div>


        <div class="form-group">
          <label for="txtNombre">Imagen</label>
          <?php echo $txtImagen; ?>
          <input type="file" class="form-control" name="txtNombre" id="txtImagen" aria-describedby="emailHelp" placeholder="Imagen Seleccionada">

        </div>

        <div class="btn-group" role="group" aria-label="">
          <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
          <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
          <button type="submit" name="accion" value="Cancelar" class="btn btn-dark">Cancelar</button>
          <a class="btn btn-primary btn-lg" href="clientes.php" role="button">Clientes</a>
        </div>


      </form>



    </div>

  </div>


</div>


<div class="col-md-7">
  <table class="table table-sm table-dark">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listaproductos as $productos) { ?>
        <tr>
          <td><?php echo $productos['id']; ?></td>
          <td><?php echo $productos['nombre']; ?></td>
          <td><?php echo $productos['imagen']; ?></td>
          <td>

            <form method="post">
              <input type="hidden" name="txtId" id="txtId" value="<?php echo $productos['id']; ?>" />
              <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
              <input type="submit" name="accion" value="Borrar" class="btn btn-success" />
            </form>

          </td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
</div>

   

<!--Incluimos el pie-->
