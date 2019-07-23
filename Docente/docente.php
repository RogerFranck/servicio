<?php 

	session_start();
	//COMPRUEBA LA EXITENCIA DE UNA SESION DOCENTE
	if (isset($_SESSION['docente'])) {
		// ALMACENA LOS NOMBRES
		$p = $_SESSION['docente'];
		// ALMACENA EL PRIMER APELLIDO
		$a1 = $_SESSION['apellidodocente'];
		// ALMACENA EL SEGUNDO APELLIDO
		$a2 = $_SESSION['apellidodosdocente'];
		// ALMACENA EL ID DEL DOCENTE
		$identi = $_SESSION['identificadordocente'];
	} else {
		header("Location: ../index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");
	$result = mysqli_query($conexion,"SELECT DISTINCT ynaasignatura.materia, ynaasignatura.id_asignatura 
										FROM ynaasignatura  
										JOIN ynadocentesasignatura
										ON ynaasignatura.id_asignatura = ynadocentesasignatura.id_asignatura
										where ynadocentesasignatura.id_docente ='". $identi ."' ");
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../CSS/docente.css">
 	<title>DOCENTES</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 </head>
 <body>
 	<header>
		<h1>CETIS 112</h1>
	</header>
	<div id="menu">
	<?php  

		while ($mostrar= mysqli_fetch_array($result)) {

	 ?>
	<div id="ASG1" class="Bx-mayor">
			<div class='bx-img'>
				<h2 class='Mt-name'><?php 	 echo $mostrar['materia'] ?></h2>
			</div>
			<div class='bx-info'>
				<p style="font-family: 'Open Sans', sans-serif;position: relative;margin-left: 5px;font-weight: bold;">Grupos:</p><br>
				<?php  

			$resulta = mysqli_query($conexion,"SELECT ynadocentesasignatura.id_grupos, ynagrupos.semestre,ynagrupos.grupo,ynagrupos.especialidad  FROM `ynadocentesasignatura` INNER JOIN ynagrupos ON ynagrupos.id_grupos=ynadocentesasignatura.id_grupos WHERE `id_asignatura`= '".$mostrar['id_asignatura']."' AND `id_docente` = '".$identi."' LIMIT 3");


				while ($mostrara= mysqli_fetch_array($resulta)) {

			  ?>
			  <p style="font-family: 'Open Sans', sans-serif;position: relative;margin-left: 5px;font-weight: bold;"><?php echo $mostrara['semestre']." ".$mostrara['grupo']." ".$mostrara['especialidad'] ?></p>
			  <?php } ?>
			  </div>
			<div class='bx-btn'>
				<center><a href='docenteGrupos.php?mat=<?php  echo $mostrar['materia'] ?>' class='btn-inicio'>INGRESAR</a></center>
			</div>
	</div>
	<?php } ?>

	<div class="salir">
		<!-- MUESTRA EL NOMBRE COMPLETO DEL USUARIO -->
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
	</div>
 </body>
 </html>
