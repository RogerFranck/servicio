<?php 

	session_start();

	if (isset($_SESSION['admin'])) {
		$p = $_SESSION['admin'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
	</header><br>
		<div class="home">
			<div>
			<a href="adminGrupo.php"><img src="https://image.flaticon.com/icons/svg/14/14695.svg" class="ho"></a>
			<a href="adminGrupoLista.php"><img src="https://image.flaticon.com/icons/svg/1001/1001371.svg" class="ho"></a>
			</div>
			<a href="../Docente/docente.php"><img src="../CSS/home.svg" class="hi"></a>
		</div>
	<br><br>
			<div class="container" style="width: 25em;">
				<div class="card">
  					<div class="card-header text-white bg-dark">
    				Nueva Grupo
 				 </div>
				  <div class="card-body">
				    <form method="POST" id="formi">
				    	<input type="text" name="Espeialidad" placeholder="Espeialidad" class="form-control" required autocomplete="off"><br>
				    	<select class="form-control" name="semestre">
						  <option value="1">1° Semestre</option>
						  <option value="2">2° Semestre</option>
						  <option value="3">3° Semestre</option>
						  <option value="4">4° Semestre</option>
						  <option value="5">5° Semestre</option>
						  <option value="6">6° Semestre</option>
						</select><br>
						<select class="form-control" name="grupo">
						  <option value="A">A</option>
						  <option value="B">B</option>
						  <option value="C">C</option>
						  <option value="D">D</option>
						  <option value="E">E</option>
						  <option value="F">F</option>
						  <option value="G">G</option>
						  <option value="H">H</option>
						  <option value="I">I</option>
						  <option value="J">J</option>
						  <option value="K">K</option>
						</select><br>
						<select class="form-control" name="turno">
						  <option value="Matutino">Matutino</option>
						  <option value="Vespertino">Vespertino</option>
						</select><br>
				    <div class="papas">
				    <input type="submit" name="envio" value="Crear" class="btn btn-dark" style="width: 40%;">
				    <p id="aqui"></p>
				    </div>
				    </form>
				  </div>
				</div>
			</div><br><br>

	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
	</div>
	<?php 

		if ($_POST) {

			$E = $_POST['Espeialidad'];
			$S = $_POST['semestre'];
			$G = $_POST['grupo'];
			$T = $_POST['turno'];


			if ($result = mysqli_query($conexion,"INSERT INTO `ynagrupos` (`semestre`, `grupo`, `especialidad`, `turno`) VALUES ('".$S."', '".$G."', '".$E."', '".$T."')")) {
				echo '<script>document.getElementById("aqui").innerHTML = "GUARDADO"</script>';
			}else{
				echo '<script>document.getElementById("aqui").innerHTML = "ERROR"</script>';
			}
		
	}

	 ?>
</body>
</html>
