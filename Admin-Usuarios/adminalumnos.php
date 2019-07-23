<?php 

	session_start();

	if (isset($_SESSION['admin'])) {
		$p = $_SESSION['admin'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
		$clave = $_SESSION['curp'];
		$usu = $_SESSION['usu'];
		$clase = $_SESSION['clase'];
	} else {
		header("Location: ../index.php");
	}
	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../CSS/adminUsuarios.css">
 	<title>DOCENTES</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 </head>
 <body>
 	<header>
		<h1>CETIS 112</h1>
	</header>
		<div class="home">
			<div>
			<a href="adminUsuarios.php"><img src="../CSS/agregar.png" class="ho"></a>
			<a href="dminUsuEdit.php"><img src="../CSS/eliminar.png" class="ho"></a>
			</div>
			<a href="../Docente/docente.php"><img src="../CSS/home.svg" class="hi"></a>
		</div>
		<div class="centro">
			<div class="formulario">
				<div class="formi" id="cas">
					<center>
					<h1 class="txt">DATOS PERSONALES</h1>
					</center><br>
					<form id="mi_form" method="POST">
					<label>Matricula:</label><br>
					<input type="text" name="Matricula" class="caja" placeholder="Matricula" id="a1"><br><br>
					<select class="ele" id="hola" name="hola">
						<?php 

							$vaca = mysqli_query($conexion,"SELECT id_grupos,grupo,semestre,especialidad FROM ynagrupos");

							while ($suc= mysqli_fetch_array($vaca)) {

						 ?>
							<option value="<?php echo $suc['id_grupos'] ?>" ><?php  echo $suc['semestre']." ".$suc['grupo']." ".$suc['especialidad']  ?></option>
						<?php } ?>
					</select>
					<input type="submit" name="envio" id="OK" value="Enviar">
					<div class="estado" id="est"></div>
					</form>
				</div>
			</div>
		</div>

	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
	</div>

	<?php 

		if ($_POST) {
			
			if ($_POST['Matricula']!="") {
				
				$Matricula = $_POST['Matricula'];
				$privilegio = $_POST['hola'];

				$toro = mysqli_query($conexion,"SELECT `id_persona` FROM ynapersonas WHERE CURP='".$clave."'");
				$chi = mysqli_fetch_array($toro);

				$idp = $chi['id_persona'];

				
					if ($result = mysqli_query($conexion,
					"INSERT INTO `ynaalumnos` (`id_persona`, `matricula`, `id_grupos`) VALUES ('$idp', '$Matricula','$privilegio')")) {
						if ($casco = mysqli_query($conexion,
					"INSERT INTO `ynausuarios` (`id_persona`, `clase`, `Usuario`,`Pass`) VALUES ('$idp', '$clase','$usu','$clave')")) {
							echo '<script>document.getElementById("est").innerHTML = "ENVIADO"</script>';
							echo '<script>document.getElementById("est").style.background = "green"</script>';
						}
						else{
							echo '<script>document.getElementById("est").innerHTML = "ERROR"</script>';	
						}
					}else{
						echo '<script>document.getElementById("est").innerHTML = "ERROR"</script>';
					}
					

			}else{
				echo '<script>document.getElementById("est").innerHTML = "INCONPLETO"</script>';
			}
		}

	 ?>
</body>
</html>
