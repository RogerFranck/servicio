<?php 

	session_start();

	if (isset($_SESSION['admin'])) {
		$p = $_SESSION['admin'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
		$v1 = $_GET['mat'];
	} else {
		header("Location: ../index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$select = mysqli_query($conexion,"DELETE FROM ynagrupos WHERE ynagrupos.id_grupos = '".$v1."'");

	header("location: adminGrupoLista.php");

 ?>