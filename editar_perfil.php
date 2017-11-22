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
  $nombre = $_GET['user'];

  $con = new mysqli($servername, $username, $password, $dbname);
  if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
  }  
  ?>  
  <div class="fondo">
  <div class="fondogradiente">
  <div class="contenido">
    <div class="header">
      <nav>
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo yellow-text">YellowFood</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse yellow-text"><i class="material-icons">menu</i></a>
        </div>
      </nav>
    </div>
    <?php $get=mysqli_query($con,"SELECT * FROM restaurante WHERE usuario = '".$nombre."' ");  
			while($row = mysqli_fetch_assoc($get)){
				$email = $row['email'];
				$contraseña = $row['password'];
				$contraseña2 = $contraseña;
				$rif = $row['rif'];
				$restname = $row['nombre'];
				$slogan    = $row['descripcion'];  
				$direccion = $row['ubicacion'];
				$horario = $row['horario'];
				$id_cat = $row['categoria_id'];
        $profilepic = $row['profilepic'];
			}
			 $getCATp=mysqli_query($con,"SELECT categoria FROM Categoria WHERE id = '".$id_cat."'");
			  while($row = mysqli_fetch_assoc($getCATp)){
			  	$catp = $row['categoria'];
			  }
			 $getCAT=mysqli_query($con,"SELECT categoria FROM Categoria"); ?>


    <div class="container cont">
      <h1 class="yellow-text center">EDITAR PERFIL</h1>
      <form action="actualizar_perfil.php" method="post" id="registro" name="registro">
        <div class="row">
          
          <?php echo '<input name="realuser" id="realuser" type="hidden" value="'.$nombre.'">';?>
          <div class="input-field col s12 m6">
          <label for="username">Usuario</label>
          <?php echo '<input name="username" id="username" class="validate" type="text" value="'.$nombre.'">';?>
          </div>
         
          <div class="input-field col s12 m6">
          <label for="email">Email</label>
          <?php echo '<input name="email" id="email" class="validate" type="text" value="'.$email.'">';?>
          </div>
        </div>

        <div class="row">
          
          <div class="input-field col s12 m6">
          <label for="password">Contraseña</label>
          <?php echo '<input name="password" id="password" class="validate" type="text" value="'.$contraseña.'">';?>
          </div>
          
          <div class="input-field col s12 m6">
          <label for="password">Repita la Contraseña</label>
          <?php echo '<input name="password2" id="password2" class="validate" type="text" value="'.$contraseña2.'">';?>
          </div>
        </div>
        
        <div class="row">

          <div class="input-field col s12 m6">
          <label for="password">rif</label>
          <?php echo '<input name="rif" id="rif" class="validate" type="text" value="'.$rif.'">';?>
          </div>

          <div class="input-field col s12 m6">
          <label for="password">Nombre del Restaurante</label>
          <?php echo '<input class="black_border" name="restname" id="restname"  type="text" value="'.$restname.'">';?>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12 m12">
          <label for="ubicacion">Ubicación</label>
          <?php echo '<input name="ubicacion" id="ubicacion" class="validate" type="text" value="'.$direccion.'">';?>
          </div>  
        </div>

        <div class="row">
         
          <div class="input-field col s12 m4">
            <label for="horariob">Horario</label>
            <?php echo '<input class="black_border" name="horario" type="text" value="'.$horario.'">';?>
          </div>
         
          <div class="input-field col s12 m4">
          <select name="categoria" id="categoria">
            <?php echo '<option value="">'.$catp.'</option>';?>
            <?php 
              while($row = mysqli_fetch_assoc($getCAT)){
                echo '<option value="'.$row['categoria'].'">'.$row['categoria'].'</option>';  
              } 
            ?> 
          </select>
          </div>
        </div>
        <div class="row">
          
          <div class="input-field col s12 m6">
          <label for="restdesc">Descripción</label>
          <?php echo '<input name="restdesc" id="restdesc" class="validate" type="text" value="'.$slogan.'">';?>
          </div>

          <div class="file-field input-field col s12 m6">
            <div class="btn">
              <span>Foto de Perfil</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <?php echo '
              <input class="file-path validate" type="text" multiple multiple onchange="ruta()" name="profilepic" id="profilepic" value="'.$profilepic.'">'; ?>
            </div>
          </div>

        </div>
        <div class="row center">
          <div class="boton">
          <button class="btn">Editar</button>
          </div>
        </div>  
      </form>
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

  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF2-ozzHTCK6Snz8KqJ-RSPhmdInZdLjI&libraries=places&callback=initAutocomplete" async defer></script>
  <script src="js/maps.js"></script>
  <script src="js/init.js"></script>
</body>
</html>