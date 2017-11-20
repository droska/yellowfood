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
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/platovalidation.js"></script>
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
  $usern = $_GET['user'];
  $get=mysqli_query($con,"SELECT nombre FROM categoria_plato");  
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
      <h1 class="yellow-text center">Añadir Plato</h1>
  		<?php echo '<form action="crear_plato.php?user='.$usern.'" method="post" id="plato" name="plato">'; ?>
    		<div class="row">
      		<div class="input-field col s12 m6">
        		<input name="pname" id="pname" type="text" class="validate">
        		<label for="pname">Nombre</label>
      		</div>
          <div class="input-field col s12 m6">
            <input name="precio" id="precio" type="text" class="validate">
            <label for="precio">Precio</label>
          </div>
    		</div>
    		<div class="row">
      		<div class="input-field col s12">
        		<input name="pdesc" id="pdesc" type="text" class="validate">
        		<label for="pdesc">Descripción</label>
      		</div>
    		</div>       
    		<div class="row">
          <div class="file-field input-field">
            <div class="btn">
              <span>Fotografía del plato</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" multiple multiple onchange="ruta()" name="pimg" id="pimg">
            </div>
          </div>
        </div>
      		<div class="input-field col s12">
        		<select name="pcat" id="pcat" required>
        		<option value="">Categoría</option>
          		<?php
          		while($row = mysqli_fetch_assoc($get)){
          		  echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
          		} 
          		?> 
        		</select>
      		</div>
    		</div>
        <br>
    		<div class="row center">
      		<div class="boton">
      		  <button class="btn">Confirmar</button>
      		</div>
    		</div>  
  		</form>              
  		<?php } ?>
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
