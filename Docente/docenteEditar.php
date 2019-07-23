<?php 


	session_start();

	if (isset($_SESSION['docente'])) {
		$p = $_SESSION['docente'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
		// ID DEL DOCENTE
		$identi = $_SESSION['identificadordocente'];
		$v1 = $_GET['mat'];
		$v2 = $_GET['pat'];
		$v3 = $_GET['cat'];
		// V1 ALMACENA LA MATERIA Y V2 ALMACENA LA ID DEL GRUPO
	} else {
		header("Location: ../index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$sacagrupo = mysqli_query($conexion,"SELECT * FROM `ynagrupos` WHERE `id_grupos` = '".$v2."'");
	$mostrar= mysqli_fetch_array($sacagrupo);

	$result = mysqli_query($conexion,"SELECT  ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres, ynalista.fecha, ynalista.hora, ynalista.asistencia, ynalista.id_lista From ynalista INNER JOIN ynaalumnos ON ynaalumnos.id_alumno=ynalista.id_alumno 
						INNER JOIN ynapersonas ON ynapersonas.id_persona=ynaalumnos.id_persona WHERE ynalista.id_lista='".$v3."'");
	
	$row = mysqli_fetch_array($result); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../CSS/consulta.css">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
	<header>
		<h1>CETIS 112</h1>
	</header>
	<div class="Arranque">
		<div class="inicio">
			<h1 class="Materia"><?php echo $v1 ?> - <?php echo $mostrar['semestre']." ".$mostrar['grupo']." ".$mostrar['especialidad'] ?></h1>
		</div>
		<div class="home">
			<a href="docente.php"><img src="../CSS/home.svg"></a>
		</div>
	</div>
	<div class="padre">
		<div class="familia">
			<div class="cab">
				<h2>EDITAR</h2>
			</div>
			<div class="cont">
				<p class="tla">Alumno</p><p>: <?php echo $row['Nombres']." ".$row['Apellido1']." ".$row['Apellido2'] ?></p>
				<p class="tla">Fecha</p><p>: <?php echo $row['fecha'] ?></p>
				<p class="tla">Hora</p><p>: <?php echo $row['hora'] ?></p>
				<p class="tla">Grupo</p><p>: <?php echo $mostrar['semestre']." ".$mostrar['grupo']." ".$mostrar['especialidad'] ?></p>
				<p class="tla">Materia</p><p>: <?php echo $v1 ?></p>
				<p class="tla">Asistencia actual</p><p>: <?php echo $row['asistencia'] ?></p>
				<form method="POST" id="formi">
				<select class="seli" name="sle">
			 		<option value="S">S-Asistencia</option>
					<option value="N">N-Falta</option>
					<option value="F">F-justificación</option>
				</select>
				</form>
			</div>
			<div class="bot">
				<div id="gua"></div>
				<div>
				<input type="button" id="volver" class="btn-edit" value="Volver" onclick="location.href='docenteConsulta.php?mat=<?php echo $v1 ?>&pat=<?php echo $v2 ?>'">
				<input type="submit" id="guardar" class="btn-edit" value="Guardar" form="formi">
				</div>
			</div>
		</div>
	</div>
	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
	</div>
	<?php 

		if ($_POST) {
			$nueva = $_POST['sle'];
			if ($resalt = mysqli_query($conexion,"UPDATE `ynalista` SET `asistencia`= '".$nueva."' WHERE id_lista='".$v3."'")) {
				echo "<script>document.getElementById('gua').innerHTML = 'GUARDADO'</script>";
			}else{
				echo "<script>document.getElementById('gua').innerHTML = 'ERROR'</script>";
			}
						
		}

	 ?>
</body>	