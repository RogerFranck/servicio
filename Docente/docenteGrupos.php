<?php 

	session_start();
	// //COMPRUEBA LA EXITENCIA DE UNA SESION DOCENTE
	if (isset($_SESSION['docente'])) {
		// ALMACENA LOS NOMBRES
		$p = $_SESSION['docente'];
		// ALMACENA EL PRIMER APELLIDO
		$a1 = $_SESSION['apellidodocente'];
		// ALMACENA EL SEGUNDO APELLIDO
		$a2 = $_SESSION['apellidodosdocente'];
		// ALMACENA EL ID DEL DOCENTE
		$identi = $_SESSION['identificadordocente'];
		$v1 = $_GET['mat'];
		// v1 ALMACENA LA MATERIA
	} else {
		header("Location: ../index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$sacaid = mysqli_query($conexion,"SELECT `id_asignatura` FROM `ynaasignatura` WHERE `materia` = '". $v1 ."' ");
	if ($rew = mysqli_fetch_array($sacaid)) {
		// ALAMACENA EL ID DE LA ASGINATURA
		$indanti = $rew['id_asignatura'];
	}
	$sacagrupos = mysqli_query($conexion,"SELECT  ynagrupos.id_grupos, ynagrupos.semestre,ynagrupos.grupo,ynagrupos.especialidad 
										  FROM ynagrupos  
										  JOIN ynadocentesasignatura
									   	  ON ynagrupos.id_grupos = ynadocentesasignatura.id_grupos
										  where ynadocentesasignatura.id_docente = '".$identi."' AND ynadocentesasignatura.id_asignatura = '".$indanti."'");

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../CSS/grupos.css">
 	<title>GRUPOS</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
	<header>
		<h1>CETIS 112</h1>
	</header>
	<div class="inicio" id="in">
		<h1 class="Materia"><?php echo $v1 ?></h1>
		<a href="docente.php"><img src="../CSS/home.svg"></a>
	</div>
	<div class="menu" id="menu">

		<?php 

			while ($mostrara= mysqli_fetch_array($sacagrupos)) {

		 ?>

		<div class='Bx-mayor'>
			<div class='bx-img'><h2 class='Mt-name'><?php echo $mostrara['semestre']." ".$mostrara['grupo']." ".$mostrara['especialidad'] ?></h2></div>
			<div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $mostrara['id_grupos'] ?>' class='btn-inicio'>INGRESAR</a></center></div>
		</div>

		<?php } ?>

	</div>
	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
	</div>
</body>
</html>