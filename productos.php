<?php include("template/cabecera.php"); ?>
<?php 




include("administrador/config/bd.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos");
$sentenciaSQL->execute();
$listaproductos = $sentenciaSQL->fetchall(PDO::FETCH_ASSOC);

?>
<?php foreach($listaproductos as $productos){ ?>


  <div class="col-md-2">

<div class="card" >
  <img class="card-img-top" src="./img/<?php echo $productos['Imagen'];?> " alt="">
  <div class="card-body">
  <h5 class="card-title"><?php  echo $productos ['nombre']?></h5>
  <a name="" id="" class="btn btn-primary" href="https://www.mercadolibre.com.co" role="button"> ver mas</a>
   
    <p class="card-text"></p>
    
  </div>
</div>
    </div>

  <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <img  width="800" src="img/compra.jpg" class="img-thumbnail rounded mx-auto d-block">
       
      </div>
    </div>
  </div>
 
    </div>
    <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <img  width="800" src="img/pc.jpg" class="img-thumbnail rounded mx-auto d-block">
       
      </div>
    </div>
  </div>
 
    </div>
    <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <img  width="800" src="img/compra.jpg" class="img-thumbnail rounded mx-auto d-block">
       
      </div>
    </div>
  </div>
 
    </div>
  </div>
</div>
  


  
 
 <?php } ?>

<?php include("template/pie.php"); ?>