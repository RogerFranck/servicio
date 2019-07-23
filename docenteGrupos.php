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
		header("Location: index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$sacaid = mysqli_query($conexion,"SELECT `id_asignatura` FROM `ynaasignatura` WHERE `materia` = '". $v1 ."' ");
	if ($rew = mysqli_fetch_array($sacaid)) {
		// ALAMACENA EL ID DE LA ASGINATURA
		$indanti = $rew['id_asignatura'];
	}
	$sacagrupos = mysqli_query($conexion,"SELECT  ynagrupos.id_grupos 
										  FROM ynagrupos  
										  JOIN ynadocentesasignatura
									   	  ON ynagrupos.id_grupos = ynadocentesasignatura.id_grupos
										  where ynadocentesasignatura.id_docente = '".$identi."' AND ynadocentesasignatura.id_asignatura = '".$indanti."'");
	
	// ARRAY PARA ALMACENAR LOS ID DE GRUPOS EXITENTES
	$areglo = array() ;
	while ($raw = mysqli_fetch_array($sacagrupos)){
		
		array_push($areglo, $raw['id_grupos']) ;

	}
	for ($i=0; $i <count($areglo) ; $i++) { 

		if (isset($areglo[0])) {
			if ($i == 0) {
			$m1 = $areglo[0];
			}
		}else{$m1="Ninguno";}
		if (isset($areglo[1])) {
			if ($i == 1) {
			$m2 = $areglo[1];
			}	
		}else{$m2="Ninguno";}

		if (isset($areglo[2])) {
			if ($i == 2) {
			$m3 = $areglo[2];
			}
		}else{$m3="Ninguno";}

		if (isset($areglo[3])) {
			if ($i == 3) {
			$m4 = $areglo[3];
			}
		}else{$m4="Ninguno";}

		if (isset($areglo[4])) {
			if ($i == 4) {
			$m5 = $areglo[4];
			}
		}else{$m5="Ninguno";}

		if (isset($areglo[5])) {
			if ($i == 5) {
			$m6 = $areglo[5];
			}
		}else{$m6="Ninguno";}

		if (isset($areglo[6])) {
			if ($i == 6) {
			$m7 = $areglo[6];
			}
		}else{$m7="Ninguno";}

		if (isset($areglo[7])) {
			if ($i == 7) {
			$m8 = $areglo[7];
			}
		}else{$m8="Ninguno";}

		if (isset($areglo[8])) {
			if ($i == 8) {
			$m9 = $areglo[8];
			}
		}else{$m9="Ninguno";}

		if (isset($areglo[9])) {
			if ($i == 9) {
			$m10 = $areglo[9];
			}
		}else{$m10="Ninguno";}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/grupos.css">
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
		<a href="docente.php"><img src="CSS/home.svg"></a>
	</div>
	<div class="menu" id="menu">

	</div>
	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='logout.php'">
	</div>
	<script type="text/javascript">
	
		var a1 = "<?php echo $m1; ?>"
		var a2 = "<?php echo $m2; ?>"
		var a3 = "<?php echo $m3; ?>"
		var a4 = "<?php echo $m4; ?>"
		var a5 = "<?php echo $m5; ?>"
		var a6 = "<?php echo $m6; ?>"
		var a7 = "<?php echo $m7; ?>"
		var a8 = "<?php echo $m8; ?>"
		var a9 = "<?php echo $m9; ?>"
		var a10 = "<?php echo $m10; ?>"

		if (a1 == "Ninguno") {
		
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m1 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m1 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a2 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m2 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m2 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a3 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m3 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m3 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a4 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m4 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m4 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a5 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m5 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m5 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a6 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m6 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m6 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a7 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m7 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m7 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a8 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m8 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m8 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a9 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m9 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m9 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a10 == "Ninguno") {
			
		}else{
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m10 ?></h2></div><div class='bx-btn'><center><a href='docenteLista.php?mat=<?php echo $v1 ?>&pat=<?php echo $m10 ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		
	</script>
</body>
</html>