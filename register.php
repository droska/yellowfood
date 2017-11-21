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
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "yellowfood";

  $con = new mysqli($servername, $username, $password, $dbname);
  if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
  }else{
    $get=mysqli_query($con,"SELECT categoria FROM Categoria");  
  ?>  
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
    <div class="container cont">
      <h1 class="yellow-text center">REGISTRO</h1>
      <form action="insert.php" method="post" id="registro" name="registro">
        <div class="row">
          <div class="input-field col s12 m6">
          <input name="username" id="username" type="text" class="validate">
          <label for="username">Usuario</label>
          </div>
          <div class="input-field col s12 m6">
          <input name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
          <input name="password" id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
          </div>
          <div class="input-field col s12 m6">
          <input name="password2" id="password2" type="password" class="validate">
          <label for="password">Repita la Contraseña</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6">
          <input name="rif" id="rif" type="text" class="validate">
          <label for="rif">RIF</label>
          </div>
          <div class="input-field col s12 m6">
          <input name="restname" id="restname" type="text" class="validate">
          <label for="restname">Nombre de Restaurante</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
          <input name="ubicacion" id="ubicacion" type="text" class="validate" onFocus="geolocate()">
          <label for="ubicacion">Ubicación</label>
          </div>  
        </div>
        <div class="row">
          <div class="input-field col s12 m4">
              <input name="horarioa" id="horarioa" type="text" class="validate timepicker"> 
              <label for="horarioa">Horario Desde</label>
          </div>
          <div class="input-field col s12 m4">
            <input name="horariob" id="horariob" type="text" class="validate timepicker"> 
            <label for="horariob">Horario Hasta</label>
          </div>
          <div class="input-field col s12 m4">
          <select name="categoria" id="categoria">
            <option value="">Categoria</option>
            <?php 
              while($row = mysqli_fetch_assoc($get)){
                echo '<option value="'.$row['categoria'].'">'.$row['categoria'].'</option>';  
              } 
            ?> 
          </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
          <input name="restdesc" id="restdesc" type="text" class="validate">
          <label for="restdesc">Descripción</label>
          </div>
        </div>
        <div class="row center">
          <div class="boton">
          <button class="btn">Confirmar</button>
          </div>
        </div>  
      </form>
    </div>                
    <?php } ?>
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
  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF2-ozzHTCK6Snz8KqJ-RSPhmdInZdLjI&libraries=places&callback=initAutocomplete" async defer></script>
  <script src="js/maps.js"></script>
  <script src="js/init.js"></script>
</body>
</html>
