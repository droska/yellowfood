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
    }
  ?>
 <div class="container cont">
    <div class="row center">
      <h3 class="yellow-text">Páginas Amarillas de Comida en San Cristóbal</h3>
           <div class="col s12 m6 center cuadro">
                <h4 class="black-text">¿Eres Restaurante y quieres darte a conocer?</h4>
                <a href="register.php" class="waves-effect waves-light btn">Regístrate</a>
                <a href="login.php" class="waves-effect waves-light btn">Inicia Sesión</a>
           </div>
           <div class="col s12 m6 center cuadro2">
                <h4 class="black-text">¿Eres Cliente? Observa los restaurantes de tu preferencia!</h4>
                <a href="home.php"  class="waves-effect waves-light btn">Ver Restaurantes</a>
           </div>
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
  <script src="js/init.js"></script>
</body>
</html>