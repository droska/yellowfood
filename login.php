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
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/logvalidation.js"></script>
  <script src="js/init.js"></script>
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
            <li><a href="register.php" class="yellow-text">Registrarse</a></li>
          </ul>
        </div>
      </nav>
    </div>  
    <div class="container cont vista">
      <h1 class="yellow-text center">LOGIN</h1>
      <form action="validator_log.php" method="post" id="login" name="login" >
        <div class="row">
        <div class="input-field col s12 m6">
          <input name="username" id="username" type="text" class="validate">
          <label for="username">Usuario</label>
        </div>
        <div class="input-field col s12 m6">
          <input name="password" id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
        </div> 
        <div class="row center">
        <div class="boton">
          <button class="btn">Iniciar Sesión</button>
        </div>
        </div> 
      </form>
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

