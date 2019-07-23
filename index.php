<?php 

	session_start();
	//COMPRUEBA LA EXITENCIA Y EL TIPO DE USUARIO
	if (isset($_SESSION['docente'])) {
		header("Location: Docente/docente.php");
	} 
	if (isset($_SESSION['alumno'])) {
		header("Location: Alumno/alumnos.php");
	} 
	if (isset($_SESSION['admin'])) {
		header("Location: admin.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>INICIO</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/principal.css">
	<link rel="stylesheet" type="text/css" href="CSS/diseño.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
	<header>
		<h1>CETIS 112</h1>
	</header>
	<div class="todo">
		<div class="maestros">
			<div class="img-maestros">
				<img src="CSS/read.jpg" class="img">
				<h2>INICIO DE SESION</h2>
			</div>
			<div class="btn-maestros">
					
				<form method="POST" action="index.php">
			
					<div class="formulario-alto">
						<br><center><p id="control"></p></center><br>
						<label for="USUARIO" class="info">NOMBRE</label>
						<center>
						<input type="text" class="BOX" placeholder="INGRESA NOMBRE" name="nombre" id="N1">
						<br></center>
						<label for="CONTRASEÑA" class="info">CONTRASEÑA</label>
						<center>
						<input type="password" class="BOX" placeholder="INGRESA CONTRASEÑA" name="contraseña" id="N2">
						<br></center>

					</div>

						<div class="formulario-bajo">

			
						<a href="#" class="olvido" onclick="contacto()">¿Olvidaste tu contraseña?</a>
						<input type="submit" value="ACEPTAR" id="OK">
						

					</div>
					</center>

				</form>	

			</div>
		</div>
	</div>
	<script type="text/javascript">
		function contacto(){
			alert("Contacta con el administrador");
		}
	</script>
</body>
</html>
<?php
if ($_POST) {
	
	//USUARIO
	$user = $_POST['nombre'];
	//CONTRASEÑA
	$pass = $_POST['contraseña'];

	if(empty($user) || empty($pass)) {
	 	echo '<script>document.getElementById("control").innerHTML = "UN CAMPO ESTA VACIO"</script>';

	}else{

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$query = mysqli_query($conexion,"SELECT ynausuarios.clase, ynausuarios.Usuario, ynausuarios.Pass,
						   ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres, ynapersonas.CURP
						   FROM ynausuarios 
						   INNER JOIN ynapersonas ON ynausuarios.id_persona=ynapersonas.id_persona  
						   WHERE Usuario ='". $user ."' ");

	if ($row = mysqli_fetch_array($query)) {
		if ($row['Pass'] == $pass) {
			session_start();
			//ADMINISTRADORES
			if ($row['clase']==0) {
				//ALMACENA LOS NOMBRES
				$_SESSION['admin'] = $row['Nombres'];
				//ALMACENA EL PRIMER APELLIDO
				$_SESSION['apellidodocente'] = $row['Apellido1'];
				//ALMACENA EL SEGUNDO APELLIDO
				$_SESSION['apellidodosdocente'] = $row['Apellido2'];
				header("location: admin.php");
			}
			//DOCENTES
			if ($row['clase']==1) {
				//ALMACENA LOS NOMBRES
				$_SESSION['docente'] = $row['Nombres'];
				//ALMACENA EL PRIMER APELLIDO
				$_SESSION['apellidodocente'] = $row['Apellido1'];
				//ALMACENA EL SEGUNDO APELLIDO
				$_SESSION['apellidodosdocente'] = $row['Apellido2'];
				$quera = mysqli_query($conexion,"SELECT ynausuarios.clase, ynausuarios.Usuario, ynausuarios.Pass,
						   ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres, ynapersonas.CURP, 
						   ynadocentes.id_docente
						   FROM ynausuarios 
						   INNER JOIN ynapersonas ON ynausuarios.id_persona=ynapersonas.id_persona 
						   INNER JOIN ynadocentes ON ynapersonas.id_persona=ynadocentes.id_persona 
						   WHERE Usuario ='". $user ."' ");
				$raw = mysqli_fetch_array($quera);
				//ALMACENA EL ID DEL DOCENTE
				$_SESSION['identificadordocente'] = $raw['id_docente'];
				header("location: Docente/docente.php");
			}
			//ALUMNOS
			if ($row['clase']==2) {
				//ALMACENA LOS NOMBRES
				$_SESSION['alumno'] = $row['Nombres'];
				//ALMACENA EL PRIMER APELLIDO
				$_SESSION['apellidodocente'] = $row['Apellido1'];
				//ALMACENA EL SEGUNDO APELLIDO
				$_SESSION['apellidodosdocente'] = $row['Apellido2'];
				$quere = mysqli_query($conexion,"SELECT ynaalumnos.id_grupos, ynaalumnos.id_alumno FROM ynausuarios INNER JOIN ynapersonas ON ynausuarios.id_persona=ynapersonas.id_persona INNER JOIN ynaalumnos ON ynapersonas.id_persona=ynaalumnos.id_persona WHERE Usuario = '".$user."'");
				$ruw = mysqli_fetch_array($quere);
				//ALMACENA EL ID DE GRUPO
				$_SESSION['grupoperte'] = $ruw['id_grupos'];
				//ALMACENA EL ID DEL ALUMNO
				$_SESSION['unialumn'] = $ruw['id_alumno'];
				header("location: Alumno/alumnos.php");
			}
		}else{
			echo '<script>document.getElementById("control").innerHTML = "LA CONTRASEÑA ES INCORRECTA"</script>';
		}	
  	}else{
  		echo '<script>document.getElementById("control").innerHTML = "UN CAMPO ES ERRONEO"</script>';
	}
	}	
}
?>