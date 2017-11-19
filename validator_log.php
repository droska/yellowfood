<?php 
	$userin = $_POST['username'];
	$passin = $_POST['password'];
	$restname;
	$band = 0;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yellowfood";
	$con = new mysqli($servername, $username, $password, $dbname);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}else{
		$get=mysqli_query($con,"SELECT * FROM restaurante WHERE usuario = '".$userin."'");  
		while($row = mysqli_fetch_assoc($get)){
			$userdb   = strtolower($row['usuario']);  
			$passdb   = $row['password'];
			$restname = $row['nombre'];
		} 

		if($userdb != null) {
			if ($userdb == $userin) {
				if($passdb != null){
					if ($passdb == $passin) {
						$band = 1;
					}
				}
			}
		}else{
			echo '<script type="text/javascript">
			alert("Usuario o contraseña invalido");
			</script>';
			echo '<script type="text/javascript">
			window.location = "login.php"
			</script>';
		}
		if($band == 1){
			header("Location: profile.php?restaurante=$restname&user=$userin");
		}
	}
?>