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
		header("Location: index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");
	$result = mysqli_query($conexion,"SELECT DISTINCT ynaasignatura.materia 
										FROM ynaasignatura  
										JOIN ynadocentesasignatura
										ON ynaasignatura.id_asignatura = ynadocentesasignatura.id_asignatura
										where ynadocentesasignatura.id_docente ='". $identi ."' ");
	// ARRAY PARA ALMACENAR LAS MATERIAS	
	$areglo = array() ;
	while ($raw = mysqli_fetch_array($result)){
		
		array_push($areglo, $raw['materia']) ;

	}
	// CICLO PARA COMPROBAR CUALES POSICIONES DEL ARRAY EXISTEN
	for ($i=0;$i<count($areglo);$i++) {

		if (isset($areglo[0])) {
			if ($i == 0) {
			// m1 ALMACENA LA PRIMERA ASIGNATURA EN CASO DE TENER UNA DE LO CONTRARIO VALE: NINGUNO 
			$m1 = $areglo[0];
			}
		}else{$m1="Ninguno";}

		if (isset($areglo[1])) {
			if ($i == 1) {
			// m1 ALMACENA LA SEGUNDA ASIGNATURA EN CASO DE TENER UNA DE LO CONTRARIO VALE: NINGUNO 	
			$m2 = $areglo[1];
			}	
		}else{$m2="Ninguno";}

		if (isset($areglo[2])) {
			if ($i == 2) {
			// ...
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
	<link rel="stylesheet" type="text/css" href="CSS/docente.css">
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
		<div id="ASG1" class="Bx-mayor"></div>
		<div id="ASG2" class="Bx-mayor"></div>
		<div id="ASG3" class="Bx-mayor"></div>
		<div id="ASG4" class="Bx-mayor"></div>
		<div id="ASG5" class="Bx-mayor"></div>
		<div id="ASG6" class="Bx-mayor"></div>
		<div id="ASG7" class="Bx-mayor"></div>
		<div id="ASG8" class="Bx-mayor"></div>
		<div id="ASG9" class="Bx-mayor"></div>
		<div id="ASG10" class="Bx-mayor"></div>
	</div>
	<div class="salir">
		<!-- MUESTRA EL NOMBRE COMPLETO DEL USUARIO -->
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='logout.php'">
	</div>
 </body>
 <script type="text/javascript">
 		
 		// ALMACENA LAS VARIABLES PHP EN JS
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
			document.getElementById("ASG1").style.display="none";
		}else{
			document.getElementById('ASG1').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m1 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m1 ?>'' onclick='cambio1()' class='btn-inicio'>INGRESAR</a></center></div>"; 
		}
		if (a2 == "Ninguno") {
			document.getElementById("ASG2").style.display="none";
		}else{
			document.getElementById('ASG2').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m2 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m2 ?>'' onclick='cambio2()' class='btn-inicio'>INGRESAR</a></center></div>";
		}
		if (a3 == "Ninguno") {
			document.getElementById("ASG3").style.display="none";
		}else{
			document.getElementById('ASG3').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m3 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m3 ?>'' onclick='cambio3()' class='btn-inicio'>INGRESAR</a></center></div>";
		}
		if (a4 == "Ninguno") {
			document.getElementById("ASG4").style.display="none";
		}else{
			document.getElementById('ASG4').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m4 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m4 ?>'' onclick='cambio4()' class='btn-inicio'>INGRESAR</a></center></div>";
		}
		if (a5 == "Ninguno") {
			document.getElementById("ASG5").style.display="none";
		}else{
			document.getElementById('ASG5').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m5 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m5 ?>'' onclick='cambio5()' class='btn-inicio'>INGRESAR</a></center></div>";
		}
		if (a6 == "Ninguno") {
			document.getElementById("ASG6").style.display="none";
		}else{
			document.getElementById('ASG6').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m6 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m6 ?>'' onclick='cambio6()' class='btn-inicio'>INGRESAR</a></center></div>";
		}
		if (a7 == "Ninguno") {
			document.getElementById("ASG7").style.display="none";
		}else{
			document.getElementById('ASG7').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m7 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m7 ?>'' onclick='cambio7()' class='btn-inicio'>INGRESAR</a></center></div>";
		}
		if (a8 == "Ninguno") {
			document.getElementById("ASG8").style.display="none";
		}else{
			document.getElementById('ASG8').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m8 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m8 ?>'' onclick='cambio1()' class='btn-inicio'>INGRESAR</a></center></div>"; 
		}
		if (a9 == "Ninguno") {
			document.getElementById("ASG9").style.display="none";
		}else{
			document.getElementById('ASG9').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m9 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m9 ?>'' onclick='cambio1()' class='btn-inicio'>INGRESAR</a></center></div>"; 
		}
		if (a10 == "Ninguno") {
			document.getElementById("ASG10").style.display="none";
		}else{
			document.getElementById('ASG10').innerHTML = "<div class='bx-img'><h2 class='Mt-name'><?php 	 echo $m10 ?></h2></div><div class='bx-info'></div><div class='bx-btn'><center><a href='docenteGrupos.php?mat=<?php 	 echo $m10 ?>'' onclick='cambio1()' class='btn-inicio'>INICIAR</a></center></div>"; 
		}

 	</script>
 </html>
