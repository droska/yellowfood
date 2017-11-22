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
  $rif1 = substr($rif, 2, 11);
  $ubicacion = $_POST["ubicacion"];
  $horarioa= $_POST["horarioa"];
  $horariob= $_POST["horariob"];
  $horario = $horarioa."-".$horariob;
  $ruta = 'img/perfiles/';
  $profilepic = $_POST['profilepic'];
  $band = 1;
  $fotoperfil = "".$ruta.$profilepic;


  if((strlen($username)< 2) || (strlen($username)>16)){
    $band = 0;
        echo '<script type="text/javascript">
      alert("fallo13");
      </script>';     
  }

  if(!preg_match('`^[A-Za-z0-9\d=!\-@._*]*$`', $password)){
    $band = 0; 
        echo '<script type="text/javascript">
      alert("fallo12");
      </script>';    
  }

  if(!preg_match('`^[A-Za-z0-9\d=!\. ]*$`', $restname)){
    $band = 0; 
        echo '<script type="text/javascript">
      alert("fallo11");
      </script>';    
  }

  if((strlen($password)< 6) || (strlen($password)>16)){
    $band = 0;  
        echo '<script type="text/javascript">
      alert("fallo10");
      </script>';   
  }

  if((strlen($restname)< 2) || (strlen($restname)>32)){
    $band = 0;   
        echo '<script type="text/javascript">
      alert("fallo9");
      </script>';
  }

  if((strlen($restdesc)>= 500)){
    $band = 0;  
        echo '<script type="text/javascript">
      alert("fallo8");
      </script>';
  }

  if(!preg_match('`^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\d=!\.,-º ]*$`', $restdesc)){
    $band = 0;  
        echo '<script type="text/javascript">
      alert("fallo7");
      </script>';
  }

  if((!preg_match('`^[VvJj][-][0-9]*$`', $rif))){
    $band = 0;  
        echo '<script type="text/javascript">
      alert("fallo6");
      </script>';
  }

  if((strlen($ubicacion)>= 100)){
    $band = 0;  
        echo '<script type="text/javascript">
      alert("fallo5");
      </script>';
  }

  if(!preg_match('`^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\d=!\.,-º ]*$`', $ubicacion)){
    $band = 0;
        echo '<script type="text/javascript">
      alert("fallo4");
      </script>';
  }

  if(!preg_match('`^[0-9]*[:][0-9]*[PM,AM]*$`', $horarioa)){
    $band = 0;
        echo '<script type="text/javascript">
      alert("fallo3");
      </script>';
  }

  if(!preg_match('`^[0-9]*[:][0-9]*[PM,AM]*$`', $horariob)){
    $band = 0;
        echo '<script type="text/javascript">
      alert("fallo2");
      </script>';
  }

  if($categoria==''){
    $band = 0;
        echo '<script type="text/javascript">
      alert("fallo1");
      </script>';
  }

  if ($band == 1) {
    $get=mysqli_query($con,"SELECT id FROM categoria WHERE categoria = '".$categoria."' ");  
    while($row = mysqli_fetch_assoc($get)){
      $catid = $row['id'];  
    } 
    $sql = "INSERT INTO restaurante (usuario, password, email, nombre, descripcion, categoria_id, rif, ubicacion, horario, profilepic) 
    VALUES ('$username', '$password', '$email', '$restname', '$restdesc', '$catid', '$rif1','$ubicacion','$horario','$fotoperfil')";
    if(mysqli_query($con, $sql)){
      echo '<script type="text/javascript">
      alert("Usted se ha registrado de manera exitosa.");
      </script>';
      echo '<script type="text/javascript">
      window.location = "index.php"
      </script>';  
    } else{
      echo $username." ".$password." ".$email." ".$restname." ".$restdesc." ".$catid." ".$rif1." ".$ubicacion." ".$horario;
    } 
  }
  mysqli_close($con);
}?>