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

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$band=1;
}else{
	$band=0;
}
if (isset($_GET['user']) && $_GET['user'] == true) {
	$nombre = $_GET['user'];
}else{
	$band = 0;
}

?>

	<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=125196550938';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div class="fondo">
	<div class="fondogradiente">
	<div class="contenido">
		<div class="header">
			<nav>
				<div class="nav-wrapper">
					<a href="index.php"><img src="img/logo.png" alt="" class="circle logo"></a>
					<a href="#" data-activates="mobile-demo" class="button-collapse yellow-text"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
					<?php if ($band == 1){

					echo '
					<li><a href="editar_perfil.php?user='.$nombre.'" class="yellow-text">Editar Perfil</a></li>
					<li><a href="editar_plato.php?user='.$nombre.'" class="yellow-text">Editar Platos</a></li>
					<li><a href="platos.php?user='.$nombre.'" class="yellow-text">Añadir Platos</a></li>
					<!-- <li><a class="yellow-text">'./*$restaurante.*/'</a></li> -->
					<li><a href="logout.php" class="yellow-text">Cerrar Sesión</a></li>
					<li><img src="img/coca.jpg" alt="" class="circle mini"></li>';
				    ?>
					<?php }else{
					echo '<li><a href="register.php" class="yellow-text">Registrarse</a></li>
						<li><a href="login.php" class="yellow-text">Iniciar Sesion</a></li>';
					}?>
					</ul>
				</div>
			</nav>
		</div>
		<div class="container cont">
			<?php
			$nombre = $_GET['restaurante'];
			$get=mysqli_query($con,"SELECT * FROM restaurante WHERE nombre = '".$nombre."' ");  
			while($row = mysqli_fetch_assoc($get)){
				$slogan     = $row['descripcion'];  
				$direccion  = $row['ubicacion'];
				$horario    = $row['horario'];
				$fotoperfil = $row['profilepic'];
			}
			?> 
			<div class="row center vista">
				<h3 class="yellow-text"><?php echo $nombre; ?></h3>		
				<h5><?php echo $slogan; ?></h5>	
				<?php echo '<img src="'.$fotoperfil.'" alt="" class="profilepic">' ?> 
				<!--<div class="rate">
					<img class="stars" src="img/stars.png" alt="">
				</div> -->
				<h6><?php 
				if ($direccion != "") {
					echo $direccion.'<br>
					<a href="https://www.google.co.ve/maps/place/'.$direccion.' " target="_blank">
						ver ubicación
					</a>';
				}  	
				?></h6>
				<h6><?php echo $horario." "; ?></h6>
				<?php 			
					$getCat=mysqli_query($con,
					"SELECT DISTINCT categoria_plato_id as cat, categoria_plato.nombre as cat_nom 
					FROM restaurante_plato
					JOIN categoria_plato
					ON categoria_plato.id = restaurante_plato.categoria_plato_id
					JOIN restaurante
					ON restaurante.id = restaurante_plato.restaurante_id
					WHERE restaurante.nombre = '".$nombre."' ");
						while($rowb = mysqli_fetch_assoc($getCat)){
							echo '<div class="col s12 vista"><h5 class="center">'.$rowb['cat_nom'].'</h5></div>'; 
							$var_cat = $rowb['cat_nom'];
							$menu = mysqli_query($con,
							"SELECT 
							restaurante.nombre      	   AS 'Restaurante',
							restaurante_plato.nombre       AS 'Plato', 
							restaurante_plato.descripcion  AS 'Descripcion',
							restaurante_plato.precio       AS 'Precio',
							restaurante_plato.foto 		   AS 'foto', 
							categoria_plato.nombre         AS 'Categoria'
							FROM  restaurante_plato 
							JOIN  restaurante
							ON    restaurante_plato.restaurante_id = restaurante.id
							JOIN  categoria_plato 
							ON    restaurante_plato.categoria_plato_id = categoria_plato.id
							WHERE restaurante.nombre = '$nombre' AND categoria_plato.nombre = '$var_cat'");
							$i=0;
							while ($rowc = mysqli_fetch_assoc($menu)) {
							if ($i%2==0){
							    $p=0;
							}else{
							    $p=1;
							}
							echo '<div class="col s12 m6 platosvista'.$p.'">';
							echo $rowc['Plato'].'<br>';
							echo $rowc['Descripcion'].'<br>';
							echo $rowc['Precio'].'<br>';
							echo '<img class="img_plato" src="'.$rowc['foto'].'" alt=""><br><br>';
							echo '</div>';
							$i++;
						}

					}
				?>
			</div>
			<div class="row center">
			<div class="fb-comments vista" data-href="http://localhost/yellowfood/" data-numposts="5"></div>
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
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/init.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</body>
</html>