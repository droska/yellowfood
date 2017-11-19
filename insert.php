<?php
  $con = new mysqli("localhost", "root", "", "yellowfood");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }else{
  $username = strtolower($_POST["username"]); 
  $password = $_POST["password"];
  $email = $_POST["email"];
  $restname = $_POST["restname"];
  $restdesc = $_POST["restdesc"];
  $categoria = $_POST["categoria"];
  $rif = $_POST["rif"];
  $ubicacion = $_POST["ubicacion"];
  $horario = $_POST["horario"];
  $band = 1;

  if((strlen($username)< 2) || (strlen($username)>16)){
    $band = 0;     
  }

  if(!preg_match('`^[A-Za-z0-9\d=!\-@._*]*$`', $password)){
    $band = 0;     
  }

  if(!preg_match('`^[A-Za-z0-9\d=!\. ]*$`', $restname)){
    $band = 0;     
  }

  if((strlen($password)< 6) || (strlen($password)>16)){
    $band = 0;     
  }

  if((strlen($restname)< 2) || (strlen($restname)>32)){
    $band = 0;   
  }

  if((strlen($restdesc)>= 500)){
    $band = 0;  
  }

  if(preg_match('`^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\d=!\.,-º ]*$`', $restdesc)){
    $band = 0;  
  }

  if((!preg_match('`^[VvJj][-][0-9]*$`', $rif))){
    $band = 0;  
  }

  if((strlen($ubicacion)>= 100)){
    $band = 0;  
  }

  if(!preg_match('`^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\d=!\.,-º ]*$`', $ubicacion)){
    $band = 0;
  }

  if($categoria==''){
    $band = 0;
  }

  if ($band == 1) {
    $get=mysqli_query($con,"SELECT id FROM categoria WHERE categoria = '".$categoria."' ");  
    while($row = mysqli_fetch_assoc($get)){
      $catid = $row['id'];  
    } 
    $sql = "INSERT INTO restaurante (usuario, password, email, nombre, descripcion, categoria_id, rif, ubicacion, horario) 
    VALUES ('$username', '$password', '$email', '$restname', '$restdesc', '$catid', '$rif','$ubicacion','$horario')";
    if(mysqli_query($con, $sql)){
      echo '<script type="text/javascript">
      alert("Usted se ha registrado de manera exitosa.");
      </script>';
      echo '<script type="text/javascript">
      window.location = "index.php"
      </script>';  
    } else{
      echo '<script type="text/javascript">
      window.location = "register.php"
      </script>';
    } 
  }
  mysqli_close($con);
}?>