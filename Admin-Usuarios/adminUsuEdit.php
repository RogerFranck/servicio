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
	</header>
		<div class="home">
			<div>
			<a href="adminUsuarios.php"><img src="../CSS/agregar.png" class="ho"></a>
			<a href="adminUsuEdit.php"><img src="../CSS/eliminar.png" class="ho"></a>
			</div>
			<a href="../Docente/docente.php"><img src="../CSS/home.svg" class="hi"></a>
		</div><br><br>
		<div class="centro">
			<div class="todoenuno" style="width: 70%;">

				<form method="POST" id="formi">
			<div class="input-group mb-3" style="width: 50%;">
  			<input type="text" class="form-control" placeholder="Buscar usuario" aria-label="Recipient's username" aria-describedby="button-addon2" name="busqueda" autocomplete="off">
 			 <div class="input-group-append" >
  			  <button class="btn btn-outline-secondary" type="submit" form="formi" id="button-addon2">Buscar</button>
  			
  			</div>
				</form>

			</div>
			<table class="table">
  				<thead class="thead-dark">
			    	<tr>
				      <th scope="col">Nombre</th>
				      <th scope="col">Apellido</th>
				      <th scope="col">Apellido 2</th>
				      <th scope="col">CURP</th>
				       <th scope="col">Clase</th>
				       <th scope="col">Editar</th>
			    	</tr>
			  </thead>
 			  <tbody>
  			
  			  	<?php 

  			  	$select = mysqli_query($conexion,"SELECT ynapersonas.id_persona, ynapersonas.Nombres, ynapersonas.Apellido1, ynapersonas.Apellido2,ynapersonas.CURP, ynausuarios.clase FROM ynapersonas INNER JOIN ynausuarios ON ynapersonas.id_persona=ynausuarios.id_persona"); 

  			  	if ($_POST) {

					$porton=$_POST['busqueda'];

					$select = mysqli_query($conexion,"SELECT ynapersonas.id_persona, ynapersonas.Nombres, ynapersonas.Apellido1, ynapersonas.Apellido2,ynapersonas.CURP, ynausuarios.clase FROM ynapersonas INNER JOIN ynausuarios ON ynapersonas.id_persona=ynausuarios.id_persona WHERE ynapersonas.CURP LIKE '%".$porton."%' OR ynapersonas.Nombres LIKE '%".$porton."%' OR ynapersonas.Apellido1 LIKE '%".$porton."%' OR ynapersonas.Apellido2 LIKE '%".$porton."%'"); 
			
				}


  			  	while ($selet= mysqli_fetch_array($select)) {
  			  		?>
  			  	 <tr>
		      	 <td><?php echo $selet['Nombres'] ?></td>
			     <td><?php echo $selet['Apellido1'] ?></td>
			     <td><?php echo $selet['Apellido2'] ?></td>
			     <td><?php echo $selet['CURP'] ?></td>
			     <td><?php 

			     if ($selet['clase']==0) {
			      	echo "Admin";
			      } else if($selet['clase']==1){
			      	echo "Maestro";
			      } else if ($selet['clase']==2) {
			      	echo "Alumno";
			      }



			     ?></td>
			     <td><center><a href="adminUsuCambio.php?mat=<?php echo $selet['id_persona'] ?>"><img src="https://img.icons8.com/windows/26/000000/edit.png"></a></center></td>
			     </tr>
				 <?php } ?>   
 			 </tbody>
			</table>
		</div></div>
		
			<br><br>
	<div class="salir">
		<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
		<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
	</div>

</body>
</html>
