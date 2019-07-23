<?php 

	session_start();

	if (isset($_SESSION['alumno'])) {
		$p = $_SESSION['alumno'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
		$identi = $_SESSION['grupoperte'];
		$idelalumn = $_SESSION['unialumn'];
		$v1 = $_GET['mat'];
		$v2 = $_GET['pat'];
	} else {
		header("Location: index.php");
	}
	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");
	$result = mysqli_query($conexion,"SELECT ynaasignatura.id_asignatura FROM ynaasignatura WHERE ynaasignatura.materia = '".$v1."'");
	$raw = mysqli_fetch_array($result);
	$idmateria = $raw['id_asignatura'];

	$resalt = mysqli_query($conexion,"SELECT ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres FROM ynapersonas INNER JOIN ynadocentes ON ynadocentes.id_persona=ynapersonas.id_persona WHERE ynadocentes.id_docente = '".$v2."'");
	$rem = mysqli_fetch_array($resalt);
	$nombredemaestro = $rem['Nombres']." ".$rem['Apellido1'];


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CONSULTA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/alumnosConsulta.css">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
	<header>
		<h1>CETIS 112</h1>
	</header>
	<div class="Arranque">
		<div class="inicio">
			<h1 class="Materia"><?php echo $v1 ?> - <?php echo $nombredemaestro ?></h1>
		</div>
		<div class="home">
			<a href="docente.php"><img src="CSS/home.svg"></a>
		</div>
	</div>
	<div class="centro">
		<div class="Tb-mayor">
			
			<div class="Fecha">
				<h3>Fecha</h3>
			</div>
			<div class="Hora">
				<h3>Hora</h3>
			</div>
			<div class="Asistencia">
				<h3>Asistencia</h3>
			</div>
			<table class="egt">
				<?php 

					$sq = "SELECT  ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres, ynalista.fecha, ynalista.hora, ynalista.asistencia From ynalista INNER JOIN ynaalumnos ON ynaalumnos.id_alumno=ynalista.id_alumno 
						INNER JOIN ynapersonas ON ynapersonas.id_persona=ynaalumnos.id_persona
						WHERE ynalista.id_docente = '".$v2."' AND ynalista.id_grupos = '".$identi."' AND ynalista.id_asignatura = '".$idmateria."'
						AND ynalista.id_alumno = '".$idelalumn."' ";

					if ($_POST) {

						$filtro = $_POST['seli'];

						if ($filtro=="na") {
							$sq = "SELECT  ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres, ynalista.fecha, ynalista.hora, ynalista.asistencia From ynalista INNER JOIN ynaalumnos ON ynaalumnos.id_alumno=ynalista.id_alumno 
						INNER JOIN ynapersonas ON ynapersonas.id_persona=ynaalumnos.id_persona
						WHERE ynalista.id_docente = '".$v2."' AND ynalista.id_grupos = '".$identi."' AND ynalista.id_asignatura = '".$idmateria."' AND ynalista.id_alumno = '".$idelalumn."'";
						}

						if (strlen($filtro)>=8 and $filtro !="na") {
							$sq = "SELECT  ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres, ynalista.fecha, ynalista.hora, ynalista.asistencia From ynalista INNER JOIN ynaalumnos ON ynaalumnos.id_alumno=ynalista.id_alumno 
							INNER JOIN ynapersonas ON ynapersonas.id_persona=ynaalumnos.id_persona
							WHERE ynalista.id_docente = '".$v2."' AND ynalista.id_grupos = '".$identi."' AND ynalista.id_asignatura = '".$idmateria."'
							AND ynalista.fecha = '".$filtro."' AND ynalista.id_alumno = '".$idelalumn."'";
						}	

					}

					$query = mysqli_query($conexion,$sq);

					while ($mostrar= mysqli_fetch_array($query)) {

				 ?>
				<tr>
   			 		<td class="fe"><center><?php echo $mostrar['fecha']  ?></center></td>
   			 		<td class="ho"><center><?php echo $mostrar['hora']  ?></center></td>
    				<td class="ch"><center><?php echo $mostrar['asistencia']  ?></center></td>
 				</tr> 
 				<?php } ?>
			</table>
		</div>
	</div>
	<div class="salida">
		<div class="nada">
			<form method="POST">
				<select class="filtrado" name="seli">
				   <option selected value="na">Completo</option>
				       <optgroup label="Fecha"> 
						<?php  

						$select = mysqli_query($conexion,"SELECT DISTINCT `fecha` FROM `ynalista` 
						WHERE id_grupos = '".$identi."' AND id_docente = '".$v2."'
						AND id_asignatura = '".$idmateria."'");

						while ($selet= mysqli_fetch_array($select)) {


						 ?>
				       <option><?php echo $selet['fecha'] ?></option> 
	 					<?php 
	 						}
	 					 ?>
				   </optgroup>  
				</select>
				<input type="submit" name="valor" value="OK" id="en">
				</form>
		</div>
		<div class="salir">
			<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
			<input type="button" value="SALIR" class="out" onclick="location.href='logout.php'">
		</div>
		</div>
</body>
</html>
