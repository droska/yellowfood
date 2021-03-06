<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>YellowFood</title>
  <link href="css/materialize.min.css" rel="stylesheet" media="screen,projection">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

  <body>
  <div class="fondo">
  <div class="fondogradiente">
  <div class="contenido">
    <div class="header">
      <nav>
        <div class="nav-wrapper">
          <a href="index.php"><img src="img/logo.png" alt="" class="circle logo"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse yellow-text"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="register.php" class="yellow-text">Registro</a></li>
            <li><a href="login.php" class="yellow-text">Iniciar Sesion</a></li>
          </ul>
        </div>
      </nav>
    </div>

  <?php
  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yellowfood";
    $con = new mysqli($servername, $username, $password, $dbname);
    $categoria = $_GET['categoria'];

    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }else{
     
      $getcat=mysqli_query($con,"SELECT categoria FROM Categoria");  
      $getCATp=mysqli_query($con,"SELECT id FROM Categoria WHERE categoria = '".$categoria."'");
        while($row = mysqli_fetch_assoc($getCATp)){
          $catid = $row['id'];
        }
      $get=mysqli_query($con,"SELECT nombre, descripcion 
                              FROM restaurante 
                              WHERE categoria_id ='.$catid.'");    
      }
  ?>

  <div class="container">
    <h1 class="yellow-text center">Restaurantes</h1>

  <div class="container">
    
  <form action="search.php">
    <div class="row busca">  
      <div class="col s12 buscar-cat">
        <div class="input-field col s8">
          <select name="categoria" id="categoria">
            <option value="">Categoria</option>
           <?php 
              while($row = mysqli_fetch_assoc($getcat)){
                echo '<option value="'.$row['categoria'].'">'.$row['categoria'].'</option>';  
              }
            ?>
          </select>
        </div>
        <div class="col s4">
          <button class="btn boton-busca">Buscar</button>
        </div>
      </div>
    </div>
  </form>  
   
  </div>

    <div class="col s12 m8">
      <?php 
      while($row = mysqli_fetch_assoc($get)){	
      ?>
      <div class="container">	
      <?php 
      echo '
      <div class="card darken-1"><div class="card-content"><a class="card-title" href="profile.php?restaurante='.$row['nombre'].'">'.$row['nombre'].'</a><br>';
      echo $row['descripcion'].'<p><p></div></div>';
      ?>
    </div>
    <?php } ?>
    </div>
  </div>
  </div>
  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col s12 m4">
          <h5 class="yellow-text">© 2017 YellowFood</h5>
          <h6>Todos los derechos reservados.</h6>
          <p class="yellow-text text-lighten-5"></p>
        </div>
        <div class="col s12 m4">
          <h5 class="yellow-text"></h5>
          <ul>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
        </ul>
        </div>
        <div class="col s12 m4">
          <h5 class="yellow-text"></h5>
          <ul>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
          <li><a class="yellow-text text-lighten-5" href="#!"></a></li>
        </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright"></div>
  </footer>
  </div>
  </div>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
  <script src="js/maps.js"></script>
  <script src="js/init.js"></script>

</body>
</html>