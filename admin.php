<?php 

	session_start();

	if (isset($_SESSION['admin'])) {
		$p = $_SESSION['admin'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
	} else {
		header("Location: index.php");
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/admin.css">
 	<title>DOCENTES</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 </head>
 <body>
 	<header>
		<h1>CETIS 112</h1>
	</header>
	<div class="menu">
		
		<div class="usuarios">
			<center>
				<img src="CSS/hombre.svg" class="usuimg">
			</center>
				<a href="adminUsuarios.php" class="usutxt">USUARIOS</a>
		</div>
		<div class="propiedades">
			<center>
				<img src="CSS/calendario.svg" class="primg">
			</center>
			<a href="#" class="prtxt">PROPIEDADES</a>
		</div>
		<div class="grupos">
			<center>
				<img src="CSS/equipo.svg" class="gpimg">
			</center>
			<a href="#" class="gptxt">GRUPOS</a>
		</div>
		<div class="materias">
			<center>
				<img src="CSS/profesor.svg" class="gpimg">
			</center>
			<a href="#" class="matxt">MATERIAS</a>
		</div>

	</div>

	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='logout.php'">
	</div>
</body>
</html>