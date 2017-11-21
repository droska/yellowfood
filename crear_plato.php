<?php 
  $con = new mysqli("localhost", "root", "", "yellowfood");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }else{
  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user = $_SESSION['username'];
  }
  $pnombre = $_POST['pname'];
  $pdesc = $_POST['pdesc'];
  $precio = $_POST['precio'];
  $pcat = $_POST['pcat'];
  $band = 1;
  $imagenplato = $_POST['pimg'];
  $rutai = 'img/';
  $ruta = "".$rutai.$imagenplato;

  //echo '<img src="'.$ruta.'" alt="">';

  if(!preg_match('`^[A-Za-z0-9 ]*$`', $pnombre)){
    $band = 0;     
  }
  if((strlen($pnombre)< 2) || (strlen($pnombre)>16)){
    $band = 0;     
  }
  if((strlen($pdesc)> 100)){
    $band = 0;  
  } 
  if(!preg_match('`^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ,-º ]*$`', $pdesc)){
    $band = 0;  
  }
  if(!preg_match('`^[0-9., ]*$`', $precio)){
    $band = 0;  
  }
  if($pcat == ''){
    $band = 0;
  }

  if($band == 1){
    $get=mysqli_query($con,"SELECT id FROM categoria_plato WHERE nombre = '".$pcat."' ");  
    while($row = mysqli_fetch_assoc($get)){
      $rowcat = $row['id'];  
    }
    $get=mysqli_query($con,"SELECT id FROM restaurante WHERE usuario = '".$user."' ");  
    while($row = mysqli_fetch_assoc($get)){
      $rowuser = $row['id'];  
    }
    $sql = "INSERT INTO restaurante_plato (nombre, descripcion, precio, foto, restaurante_id, categoria_plato_id) 
    VALUES ('$pnombre', '$pdesc', '$precio', '$ruta', '$rowuser', '$rowcat')";
    if(mysqli_query($con, $sql)){
      echo 
      '<script type="text/javascript">
        window.location = "platos.php?user='.$user.'"
      </script>';
    }else{
      echo $pnombre." ".$pdesc." ".$precio." ".$ruta." ".$user." ".$rowcat;
    }
  }
  mysqli_close($con);
} ?>