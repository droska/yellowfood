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
</head>

	<?php 
	$band = 0;
	if (@$_GET['user']){
	$band = 1;
	$usuario = $_GET['user'];
	} ?>
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
					echo '<li><a href="/prueba/platos.php?user='.$usuario.'" class="yellow-text">Añadir Platos</a></li>';
					?>
					<li><a href="index.php" class="yellow-text">Cerrar Sesión</a></li>
					<?php }else{
					echo '<li><a href="register.php" class="yellow-text">Registro</a></li>';
					}?>
					</ul>
				</div>
			</nav>
		</div>
		<div class="container cont">
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "yellowfood";
			$con = new mysqli($servername, $username, $password, $dbname);
			if ($con->connect_error) {
				die("Connection failed: " . $con->connect_error);
			}else{
				$nombre = $_GET['restaurante'];
				$get=mysqli_query($con,"SELECT * FROM restaurante WHERE nombre = '".$nombre."' ");  
				while($row = mysqli_fetch_assoc($get)){
					$slogan    = $row['descripcion'];  
					$direccion = $row['ubicacion'];
					$horario = $row['horario'];
				}
			} 
			?> 
			<div class="row">
				<div class="col s12 jumbo">
					<div class="col s6 rest_profile">
						<div class="col s6 datos">
							<h4><?php echo $nombre; ?></h4>
							<p><?php echo $slogan; ?></p>
							<div class="rate">
							<img class="stars" src="img/stars.png" alt="">
							</div>
							<p><?php 
							if ($direccion != "") {
								echo $direccion.'<br><a href="#">ver ubicación</a>';
							}  	
							?></p>
							<p><?php echo $horario." "; ?>
						</div>
					<div class="col s2"></div>
					</div>
				</div>
			</div>

			<div class="container">
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
							echo $rowb['cat_nom'].'<br><br>'; 
							$var_cat = $rowb['cat_nom'];
							$menu = mysqli_query($con,
							"SELECT 
							restaurante.nombre      	     AS 'Restaurante',
							restaurante_plato.nombre       AS 'Plato', 
							restaurante_plato.descripcion  AS 'Descripcion',
							restaurante_plato.precio       AS 'Precio', 
							categoria_plato.nombre         AS 'Categoria'
							FROM  restaurante_plato 
							JOIN  restaurante
							ON    restaurante_plato.restaurante_id = restaurante.id
							JOIN  categoria_plato 
							ON    restaurante_plato.categoria_plato_id = categoria_plato.id
							WHERE restaurante.nombre = '$nombre' AND categoria_plato.nombre = '$var_cat'");
							while ($rowc = mysqli_fetch_assoc($menu)) {
							echo $rowc['Plato'].'<br>'.$rowc['Descripcion'].'<br>'.$rowc['Precio'].'<br><br>';
						}
					}
				?>
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