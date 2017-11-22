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
        alert("Datos actualizados exitosamente, inicie sesión nuevamente para continuar");
      </script>';
      echo 
      '<script type="text/javascript">
        window.location = "login.php"
      </script>'; 
    }else{
      echo "no actuai";
    }
  }
  mysqli_close($con);
?>