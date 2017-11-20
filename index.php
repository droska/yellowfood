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
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/init.js"></script>
</head>

  <body>
  <div class="fondo">
  <div class="fondogradiente">
  <div class="contenido">
    <div class="header">
      <nav>
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo yellow-text">YellowFood</a>
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
  if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
  }else{
  $get=mysqli_query($con,"SELECT nombre, descripcion FROM restaurante"); 
  } 
  ?> 
  <div class="container">
    <h1 class="yellow-text center">Restaurantes</h1>
    <div class="col s12 m8">
      <?php 
      while($row = mysqli_fetch_assoc($get)){	
      ?>
      <div class="container">	
      <?php 
      echo '<div class="card darken-1"><div class="card-content"><a class="card-title" href="profile.php?restaurante='.$row['nombre'].'">'.$row['nombre'].'</a><br>';
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
</body>
</html>