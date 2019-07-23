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
	<link rel="stylesheet" type="text/css" href="CSS/adminUsuarios.css">
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
			<a href="docente.php"><img src="CSS/agregar.svg" class="ho"></a>
			<a href="docente.php"><img src="CSS/eliminar.svg" class="ho"></a>
			</div>
			<a href="docente.php"><img src="CSS/home.svg" class="hi"></a>
		</div>
		<div class="centro">
			<div class="formulario">
				<div class="formi" id="cas">
					<center>
					<h1 class="txt">DATOS PERSONALES</h1>
					</center><br>
					<form id="mi_form" method="POST">
					<label>Nombres:</label><br>
					<input type="text" name="nombres" class="caja" placeholder="Nombres" id="a1"><br><br>
					<label>Primer apellido:</label><br>
					<input type="text" name="apellido1" class="caja" placeholder="Primer apellido"><br><br>
					<label>Segundo apellido:</label><br>
					<input type="text" name="apellido2" class="caja" placeholder="Segundo apellido"><br><br>
					<label>CURP:</label><br>
					<input type="text" name="CURP" class="caja" placeholder="CURP"><br>
					<select class="ele" id="hola">
						<option value="2">Alumno</option>
						<option value="1">Maestro</option>
						<option value="0">Administrador</option>
						<option value="3">Tutor</option>
					</select>
					<input type="button" name="envio" id="OK" value="Enviar" onclick="cambio();">
					</form>
				</div>
			</div>
		</div>

	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='logout.php'">
	</div>
	<script type="text/javascript">
		function cambio(){
			var tipo = document.getElementById("hola").value;
			if (tipo == "1") {
				document.getElementById("mi_form").submit();
				alert("SE ENVIO A UN MAESTRO");
			}
			if (tipo == "2") {
				document.getElementById("mi_form").submit();
				alert("SE ENVIO A UN ALUMNO");
			}
			if (tipo == "0") {
				alert("SE ENVIO A UN ADMINISTRADOR");
			}
			if (tipo == "3") {
				alert("SE ENVIO A UN TUTOR");
			}
			
		}
	</script>
</body>
</html>
