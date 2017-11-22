<?php
  $con = new mysqli("localhost", "root", "", "yellowfood");
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }else{

  $realuser = $_POST['realuser'];
  $username = strtolower($_POST["username"]); 
  $password = $_POST["password"];
  $email = $_POST["email"];
  $restname = $_POST["restname"];
  $restdesc = $_POST["restdesc"];
  $categoria = $_POST["categoria"];
  $rif = $_POST["rif"]; 
  $rif1 = substr($rif, 2, 11);
  $ubicacion = $_POST["ubicacion"];
  $horario= $_POST["horario"];
  $band = 1;

   $getCATp=mysqli_query($con,"SELECT id FROM Categoria WHERE categoria = '".$categoria."'");
        while($row = mysqli_fetch_assoc($getCATp)){
          $catid = $row['id'];
    }

    $sql=mysqli_query($con,"SELECT id FROM restaurante WHERE usuario = '".$realuser."'");
        while($row = mysqli_fetch_assoc($sql)){
          $restid = $row['id'];
    }
    
    $sql=mysqli_query($con,"
    UPDATE restaurante SET 
    usuario      = '".$username."', 
    password     = '".$password."',
    email        = '".$email."',
    nombre       = '".$restname."',
    descripcion  = '".$restdesc."',
    categoria_id = '".$catid."',
    rif          = '".$rif1."',
    ubicacion    = '".$ubicacion."',
    horario      = '".$horario."' 
    WHERE id     = '".$restid."'");

    if(!mysqli_query($con, $sql)){
      echo 
      '<script type="text/javascript">
        alert("Datos actualizados Exitosamente");
      </script>';
      echo 
      '<script type="text/javascript">
        window.location = "login.php"
      </script>'; 
    }else{
      echo "no actuai";
    }

/*
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
  }*/

  /*if ($band == 1) {
    $get=mysqli_query($con,"SELECT id FROM categoria WHERE categoria = '".$categoria."' ");  
    while($row = mysqli_fetch_assoc($get)){
      $catid = $row['id'];  
    } 

  */
  }
  mysqli_close($con);
?>