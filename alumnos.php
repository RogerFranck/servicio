<?php 

	session_start();

	if (isset($_SESSION['alumno'])) {
		$p = $_SESSION['alumno'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
		$identi = $_SESSION['grupoperte'];
	} else {
		header("Location: index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$result = mysqli_query($conexion,"SELECT ynaasignatura.materia, ynadocentesasignatura.id_docente FROM ynaasignatura JOIN ynadocentesasignatura ON ynaasignatura.id_asignatura = ynadocentesasignatura.id_asignatura where ynadocentesasignatura.id_grupos = '".$identi."'");

	$areglo = array() ;
	$arreglo = array();
	while ($raw = mysqli_fetch_array($result)){
		
		array_push($areglo, $raw['materia']) ;
		array_push($arreglo, $raw['id_docente']) ;

	}
	for ($i=0;$i<=10;$i++) {

		if (isset($areglo[$i])) {
			$m[$i] = $areglo[$i];
		}
		else{
			$m[$i]="Ninguno";
		}

		if (isset($arreglo[$i])) {
			$a[$i] = $arreglo[$i];
		}
		else{
			$a[$i]="Ninguno";
		}

	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/alumnos.css">
 	<title>DOCENTES</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 </head>
 <body>
 	<header>
		<h1>CETIS 112</h1>
	</header>
	<br>
	<h1 class="tit"><?php echo $identi ?>:</h1>
	<br>
	<div class="menu" id="menu">

	</div>

	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='logout.php'">
	</div>
</body>
<script type="text/javascript">
		var a1 = "<?php echo $m[0]; ?>"
		var a2 = "<?php echo $m[1]; ?>"
		var a3 = "<?php echo $m[2]; ?>"
		var a4 = "<?php echo $m[3]; ?>"
		var a5 = "<?php echo $m[4]; ?>"
		var a6 = "<?php echo $m[5]; ?>"
		var a7 = "<?php echo $m[6]; ?>"
		var a8 = "<?php echo $m[7]; ?>"
		var a9 = "<?php echo $m[8]; ?>"
		var a10 = "<?php echo $m[9]; ?>"


		if (a1 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[0] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[0] ?>&pat=<?php echo $a[0] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a2 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[1] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[1] ?>&pat=<?php echo $a[1] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a3 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[2] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[2] ?>&pat=<?php echo $a[2] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a4 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[3] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[3] ?>&pat=<?php echo $a[3] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a5 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[4] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[4] ?>&pat=<?php echo $a[4] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a6 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[5] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[5] ?>&pat=<?php echo $a[5] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a7 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[6] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[6] ?>&pat=<?php echo $a[6] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a8 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[7] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[7] ?>&pat=<?php echo $a[7] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a9 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[8] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[8] ?>&pat=<?php echo $a[8] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}
		if (a10 != "Ninguno") {
			document.getElementById('menu').innerHTML +="<div class='Bx-mayor'><div class='bx-img'><h2 class='Mt-name'><?php  echo $m[9] ?></h2></div><div class='bx-btn'><center><a href='alumnoConsulta.php?mat=<?php echo $m[9] ?>&pat=<?php echo $a[9] ?>' class='btn-inicio'>INGRESAR</a></center></div></div>";
		}

</script>
</html>
