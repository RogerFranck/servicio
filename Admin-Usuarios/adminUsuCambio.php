<?php 

	session_start();

	if (isset($_SESSION['admin'])) {
		$p = $_SESSION['admin'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
		$v1 = $_GET['mat'];
	} else {
		header("Location: ../index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$fries = mysqli_query($conexion,"SELECT ynapersonas.Nombres, ynapersonas.Apellido1, ynapersonas.Apellido2,ynapersonas.CURP, ynausuarios.clase FROM ynapersonas INNER JOIN ynausuarios ON ynapersonas.id_persona=ynausuarios.id_persona WHERE ynapersonas.id_persona='".$v1."'"); 

	$burger= mysqli_fetch_array($fries);


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/adminUsuarios.css">
 	<title>DOCENTES</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="../CSS/consulta.css">
 	<link rel="stylesheet" type="text/css" href="../CSS/adminUsuarios.css">
 </head>
 <body>
 		<header>
		<h1>CETIS 112</h1>
	</header>
		<div class="home">
			<div>
			<a href="adminUsuarios.php"><img src="../CSS/agregar.png" class="ho"></a>
			<a href="adminUsuEdit.php"><img src="../CSS/eliminar.png" class="ho"></a>
			</div>
			<a href="../Docente/docente.php"><img src="../CSS/home.svg" class="hi"></a>
		</div><br><br>
	<div class="padre">
		<div class="familia">
			<div class="cab">
				<h2>EDITAR</h2>
			</div>
			<div class="cont">
				<p class="tla">Nombre</p><p>: <?php echo $burger['Nombres']. " " .$burger['Apellido1']. " " .$burger['Apellido2']  ?></p>
				<p class="tla">Clase</p><p>: <?php  echo $burger['clase'] ?></p>
				<p class="tla">CURP</p><p>: <?php  echo $burger['CURP'] ?></p>
				<form method="POST" id="formi">
				<select class="seli" name="sle">
			 		<option value="0">Administrador</option>
					<option value="1">Maestro</option>
					<option value="2">Alumno</option>
				</select>
				</form>
			</div>
			<div class="bot">
				<div id="gua"></div>
				<div>
				<input type="button" id="volver" class="btn-edit" value="Volver" onclick="location.href='adminUsuEdit.php'">
				<input type="submit" id="guardar" class="btn-edit" value="Guardar" form="formi">
				</div>
			</div>
		</div>
	</div><br><br>
	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
	</div>

	<?php 

		if ($_POST) {

			$nueva = $_POST['sle'];

			if ($resalt = mysqli_query($conexion,"UPDATE `ynausuarios` SET `clase`= '".$nueva."' WHERE id_persona='".$v1."'")) {
				echo "<script>document.getElementById('gua').innerHTML = 'GUARDADO'</script>";
			}else{
				echo "<script>document.getElementById('gua').innerHTML = 'ERROR'</script>";
			}

		}


	 ?>

</body>
</html>
