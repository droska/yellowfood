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
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $band=1;
  $user = $_SESSION['username'];
} /*else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='login.php'>Login</a>";
   echo "<br><br><a href='register.php'>Registrarme</a>";
exit;
}
$now = time();
if($now > $_SESSION['expire']) {
session_destroy();
//echo "Su sesión ha terminado";
exit;
}*/
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
            <?php if ($band == 1){
            echo '
            <li>
              <a href="profile.php?restaurante='.$usern.'&user='.$user.'" class="yellow-text">
                '.$user.'
              </a>
            </li>
            <li>
              <img src="img/coca.jpg" alt="" class="circle mini">
            </li>';
            }?>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container cont">
      <h1 class="yellow-text center">Actualizar Precios</h1>
  		<?php echo '<form action="actualizar_plato.php?user='.$usern.'" method="post" id="plato" name="plato">'; ?>
    		
        <?php 

        $sql=mysqli_query($con,"SELECT id FROM restaurante WHERE usuario = '".$usern."'");
          while($row = mysqli_fetch_assoc($sql)){
          $resid = $row['id'];
        } 

        $sql=mysqli_query($con,"
          SELECT * FROM restaurante_plato 
          WHERE restaurante_id = '".$resid."'ORDER BY 2 ASC");

          while($row = mysqli_fetch_assoc($sql)){
          $nombre = $row['Nombre'];
          $precio = $row['Precio'];

          echo '
            <div class="row">
              <div class="col s6">
                <h5>'.$nombre.'</h5>
              </div>
              <div class="col s4">
                <input name="precio" id="precio" class="validate" type="text" value="'.$precio.'">
              </div>
              <div class="col s2">
                <a href="" class="btn">Editar</a>
              </div>
            </div>';
        } 
        ?>

  		</form>              
  		<?php } ?>
  	</div>
  </div>     
  <br><br> 
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