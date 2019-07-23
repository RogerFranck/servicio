<?php 

	session_start();

	if (isset($_SESSION['docente'])) {
		$p = $_SESSION['docente'];
		$a1 = $_SESSION['apellidodocente'];
		$a2 = $_SESSION['apellidodosdocente'];
		$identi = $_SESSION['identificadordocente'];
		// ALMACENA LA MATERIA
		$v1 = $_GET['mat'];
		// ALMACENA EL ID DEL GRUPO
		$v2 = $_GET['pat'];

	} else {
		header("Location: ../index.php");
	}

	$conexion = mysqli_connect("localhost","root","","yna") or die ("problemas con la conexion");

	$sacagrupo = mysqli_query($conexion,"SELECT * FROM `ynagrupos` WHERE `id_grupos` = '".$v2."'");
	$mostrar= mysqli_fetch_array($sacagrupo);


	//SACAR ALUMNOS
	$sacalumnos = mysqli_query($conexion,"SELECT ynapersonas.Apellido1, ynapersonas.Apellido2, ynapersonas.Nombres, ynaalumnos.id_alumno  FROM ynapersonas
										  INNER JOIN ynausuarios ON ynausuarios.id_persona=ynapersonas.id_persona 
										  INNER JOIN ynaalumnos ON ynaalumnos.id_persona=ynapersonas.id_persona 
										  WHERE ynaalumnos.id_grupos = '". $v2 ."' ");

	$result = mysqli_query($conexion,"SELECT ynaasignatura.id_asignatura FROM ynaasignatura WHERE ynaasignatura.materia = '".$v1."'");
	$raw = mysqli_fetch_array($result);

	$idmateria = $raw['id_asignatura'];

	$areglo = array() ;
	$arregloid  = array();
	$m = array();
	while ($row = mysqli_fetch_array($sacalumnos)) {

		$estudiantes = $row['Nombres'].' '.$row['Apellido1'].' '.$row['Apellido2'];
		array_push($areglo, $estudiantes) ;
		array_push($arregloid, $row['id_alumno']);


	}
	// CONTAR CANTIDAD DE ALUMNOS EN EL GRUPO
	$con = count($arregloid);
	//Verifica existencia
	for ($i=0;$i<=50;$i++) {

		if (isset($areglo[$i])) {
			$m[$i] = $areglo[$i];
		}
		else{
			$m[$i]="Ninguno";
		}

	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LISTA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../CSS/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../CSS/Lista.css">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 	<!-- JQUERY -->
 	<script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
 	<!-- CHART libreria -->
 	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
</head>
<body>
	<header>
		<h1>CETIS 112</h1>
	</header>
	<div class="Arranque">
		<div class="inicio">
			<h1 class="Materia"><?php echo $v1 ?> - <?php echo $mostrar['semestre']." ".$mostrar['grupo']." ".$mostrar['especialidad'] ?></h1>
		</div>
		<div class="home">
			<a href="docente.php"><img src="../CSS/home.svg"></a>
		</div>
	</div>

	<div class="centro">
		<div class="Tb-mayor">
			<div class="Nombre">
				<h3>Alumnos</h3>
			</div>
			<div class="Asistencia">
				<h3>Asistencia</h3>
			</div>
			<table class="egt">
				<form method="POST" id="formi">
  				<tr id="al1">
   			 		<td class="na" id="alm1"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox1" id="cbox1" value="S"></center></td>
 				</tr>
 				<tr id="al2">
   			 		<td class="na" id="alm2"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox2" id="cbox2" value="S"></center></td>
 				</tr>
 				<tr id="al3">
   			 		<td class="na" id="alm3"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox3" id="cbox3" value="S"></center></td>
 				</tr>
 				<tr id="al4">
   			 		<td class="na" id="alm4"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox4" id="cbox4" value="S"></center></td>
 				</tr>
 				<tr id="al5">
   			 		<td class="na" id="alm5"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox5" id="cbox5" value="S"></center></td>
 				</tr>
 				<tr id="al6">
   			 		<td class="na" id="alm6"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox6" id="cbox6" value="S"></center></td>
 				</tr>
 				<tr id="al7">
   			 		<td class="na" id="alm7"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox7" id="cbox7" value="S"></center></td>
 				</tr>
 				<tr id="al8">
   			 		<td class="na" id="alm8"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox8" id="cbox8" value="S"></center></td>
 				</tr>
 				<tr id="al9">
   			 		<td class="na" id="alm9"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox9" id="cbox9" value="S"></center></td>
 				</tr>
 				<tr id="al10">
   			 		<td class="na" id="alm10"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox10" id="cbox10" value="S"></center></td>
 				</tr>
 				<tr id="al11">
   			 		<td class="na" id="alm11"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox11" id="cbox11" value="S"></center></td>
 				</tr>
 				<tr id="al12">
   			 		<td class="na" id="alm12"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox12" id="cbox12" value="S"></center></td>
 				</tr>
 				<tr id="al13">
   			 		<td class="na" id="alm13"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox13" id="cbox13" value="S"></center></td>
 				</tr>
 				<tr id="al14">
   			 		<td class="na" id="alm14"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox14" id="cbox14" value="S"></center></td>
 				</tr>
 				<tr id="al15">
   			 		<td class="na" id="alm15"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox15" id="cbox15" value="S"></center></td>
 				</tr>
 				<tr id="al16">
   			 		<td class="na" id="alm16"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox16" id="cbox16" value="S"></center></td>
 				</tr>
 				<tr id="al17">
   			 		<td class="na" id="alm17"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox17" id="cbox17" value="S"></center></td>
 				</tr>
 				<tr id="al18">
   			 		<td class="na" id="alm18"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox18" id="cbox18" value="S"></center></td>
 				</tr>
 				<tr id="al19">
   			 		<td class="na" id="alm19"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox19" id="cbox19" value="S"></center></td>
 				</tr>
 				<tr id="al20">
   			 		<td class="na" id="alm20"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox20" id="cbox20" value="S"></center></td>
 				</tr>
 				<tr id="al21">
   			 		<td class="na" id="alm21"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox21" id="cbox21" value="S"></center></td>
 				</tr>
 				<tr id="al22">
   			 		<td class="na" id="alm22"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox22" id="cbox22" value="S"></center></td>
 				</tr>
 				<tr id="al23">
   			 		<td class="na" id="alm23"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox23" id="cbox23" value="S"></center></td>
 				</tr>
 				<tr id="al24">
   			 		<td class="na" id="alm24"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox24" id="cbox24" value="S"></center></td>
 				</tr>
 				<tr id="al25">
   			 		<td class="na" id="alm25"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox25" id="cbox25" value="S"></center></td>
 				</tr>
 				<tr id="al26">
   			 		<td class="na" id="alm26"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox26" id="cbox26" value="S"></center></td>
 				</tr>
 				<tr id="al27">
   			 		<td class="na" id="alm27"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox27" id="cbox27" value="S"></center></td>
 				</tr>
 				<tr id="al28">
   			 		<td class="na" id="alm28"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox28" id="cbox28" value="S"></center></td>
 				</tr>
 				<tr id="al29">
   			 		<td class="na" id="alm29"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox29" id="cbox29" value="S"></center></td>
 				</tr>
 				<tr id="al30">
   			 		<td class="na" id="alm30"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox30" id="cbox30" value="S"></center></td>
 				</tr>
 				<tr id="al31">
   			 		<td class="na" id="alm31"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox31" id="cbox31" value="S"></center></td>
 				</tr>
 				<tr id="al32">
   			 		<td class="na" id="alm32"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox32" id="cbox32" value="S"></center></td>
 				</tr>
 				<tr id="al33">
   			 		<td class="na" id="alm33"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox33" id="cbox33" value="S"></center></td>
 				</tr>
 				<tr id="al34">
   			 		<td class="na" id="alm34"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox34" id="cbox34" value="S"></center></td>
 				</tr>
 				<tr id="al35">
   			 		<td class="na" id="alm35"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox35" id="cbox35" value="S"></center></td>
 				</tr>
 				<tr id="al36">
   			 		<td class="na" id="alm36"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox36" id="cbox36" value="S"></center></td>
 				</tr>
 				<tr id="al37">
   			 		<td class="na" id="alm37"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox37" id="cbox37" value="S"></center></td>
 				</tr>
 				<tr id="al38">
   			 		<td class="na" id="alm38"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox38" id="cbox38" value="S"></center></td>
 				</tr>
 				<tr id="al39">
   			 		<td class="na" id="alm39"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox39" id="cbox39" value="S"></center></td>
 				</tr>
 				<tr id="al40">
   			 		<td class="na" id="alm40"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox40" id="cbox40" value="S"></center></td>
 				</tr>
 				<tr id="al41">
   			 		<td class="na" id="alm41"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox41" id="cbox41" value="S"></center></td>
 				</tr>
 				<tr id="al42">
   			 		<td class="na" id="alm42"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox42" id="cbox42" value="S"></center></td>
 				</tr>
 				<tr id="al43">
   			 		<td class="na" id="alm43"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox43" id="cbox43" value="S"></center></td>
 				</tr>
 				<tr id="al44">
   			 		<td class="na" id="alm44"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox44" id="cbox44" value="S"></center></td>
 				</tr>
 				<tr id="al45">
   			 		<td class="na" id="alm45"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox45" id="cbox45" value="S"></center></td>
 				</tr>
 				<tr id="al46">
   			 		<td class="na" id="alm46"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox46" id="cbox46" value="S"></center></td>
 				</tr>
 				<tr id="al47">
   			 		<td class="na" id="alm47"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox47" id="cbox47" value="S"></center></td>
 				</tr>
 				<tr id="al48">
   			 		<td class="na" id="alm48"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox48" id="cbox48" value="S"></center></td>
 				</tr>
 				<tr id="al49">
   			 		<td class="na" id="alm49"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox49" id="cbox49" value="S"></center></td>
 				</tr>
 				<tr id="al50">
   			 		<td class="na" id="alm50"></td>
    				<td class="ch"><center><input type="checkbox" name="cbox50" id="cbox50" value="S"></center></td>
 				</tr>

				<input type="hidden" name="fecha" id="fecha">
				<input type="hidden" name="hora" id="hora">

 				</form>
			</table>
		</div>
	</div>
	<!--CONTENEDOR PARA GRAFICAS-->
	<center>
	<div id="canvas-container">
		
	</div>
	</center>
	<!--FIN DE CONTENEDOR PARA GRAFICAS-->
	<div class="salir">
		<div class="salida">
			<p class="perfil" id="p"><?php echo $p. " " .$a1. " " .$a2 ?></p>
			<p id="fec"></p>
			<p id="hor"></p>
		</div>
		<div class="botones">
			<div id="confirmar">
			<input type="button" form="formi" value="GUARDAR" class="out2"  onclick="GUARDAR()">
			</div>
			<input type="button" value="CONSULTAR" class="out3" onclick="location.href='docenteConsulta.php?mat=<?php echo $v1 ?>&pat=<?php echo $v2 ?>'">
			<input type="button" value="SALIR" class="out" onclick="location.href='../logout.php'">
		</div>
	</div>
</body>
<script>
	
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var f=new Date();
	var fecha = f.getDate() + "/" + meses[f.getMonth()] + "/" + f.getFullYear();
	document.getElementById('fec').innerHTML = fecha;
	document.getElementById('fecha').value = fecha;

	var h=new Date();
	var hora =h.getHours()+":"+h.getMinutes(); 
	document.getElementById('hor').innerHTML = hora;
	document.getElementById('hora').value = hora;

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
	var a11 = "<?php echo $m[10]; ?>"
	var a12 = "<?php echo $m[11]; ?>"
	var a13 = "<?php echo $m[12]; ?>"
	var a14 = "<?php echo $m[13]; ?>"
	var a15 = "<?php echo $m[14]; ?>"
	var a16 = "<?php echo $m[15]; ?>"
	var a17 = "<?php echo $m[16]; ?>"
	var a18 = "<?php echo $m[17]; ?>"
	var a19 = "<?php echo $m[18]; ?>"
	var a20 = "<?php echo $m[19]; ?>"
	var a21 = "<?php echo $m[20]; ?>"
	var a22 = "<?php echo $m[21]; ?>"
	var a23 = "<?php echo $m[22]; ?>"
	var a24 = "<?php echo $m[23]; ?>"
	var a25 = "<?php echo $m[24]; ?>"
	var a26 = "<?php echo $m[25]; ?>"
	var a27 = "<?php echo $m[26]; ?>"
	var a28 = "<?php echo $m[27]; ?>"
	var a29 = "<?php echo $m[28]; ?>"
	var a30 = "<?php echo $m[29]; ?>"
	var a31 = "<?php echo $m[30]; ?>"
	var a32 = "<?php echo $m[31]; ?>"
	var a33 = "<?php echo $m[32]; ?>"
	var a34 = "<?php echo $m[33]; ?>"
	var a35 = "<?php echo $m[34]; ?>"
	var a36 = "<?php echo $m[35]; ?>"
	var a37 = "<?php echo $m[36]; ?>"
	var a38 = "<?php echo $m[37]; ?>"
	var a39 = "<?php echo $m[38]; ?>"
	var a40 = "<?php echo $m[39]; ?>"
	var a41 = "<?php echo $m[40]; ?>"
	var a42 = "<?php echo $m[41]; ?>"
	var a43 = "<?php echo $m[42]; ?>"
	var a44 = "<?php echo $m[43]; ?>"
	var a45 = "<?php echo $m[44]; ?>"
	var a46 = "<?php echo $m[45]; ?>"
	var a47 = "<?php echo $m[46]; ?>"
	var a48 = "<?php echo $m[47]; ?>"
	var a49 = "<?php echo $m[48]; ?>"
	var a50 = "<?php echo $m[49]; ?>"

	if (a1 == "Ninguno") {
		document.getElementById("al1").style.display="none";
	}else{
		document.getElementById('alm1').innerHTML = "<p><?php 	 echo $m[0] ?></p>"; 
	}
	if (a2 == "Ninguno") {
		document.getElementById("al2").style.display="none";
	}else{
		document.getElementById('alm2').innerHTML = "<p><?php 	 echo $m[1] ?></p>"; 
	}
	if (a3 == "Ninguno") {
		document.getElementById("al3").style.display="none";
	}else{
		document.getElementById('alm3').innerHTML = "<p><?php 	 echo $m[2] ?></p>"; 
	}
	if (a4 == "Ninguno") {
		document.getElementById("al4").style.display="none";
	}else{
		document.getElementById('alm4').innerHTML = "<p><?php 	 echo $m[3] ?></p>"; 
	}
	if (a5 == "Ninguno") {
		document.getElementById("al5").style.display="none";
	}else{
		document.getElementById('alm5').innerHTML = "<p><?php 	 echo $m[4] ?></p>"; 
	}
	if (a6 == "Ninguno") {
		document.getElementById("al6").style.display="none";
	}else{
		document.getElementById('alm6').innerHTML = "<p><?php 	 echo $m[5] ?></p>"; 
	}
	if (a7 == "Ninguno") {
		document.getElementById("al7").style.display="none";
	}else{
		document.getElementById('alm7').innerHTML = "<p><?php 	 echo $m[6] ?></p>"; 
	}
	if (a8 == "Ninguno") {
		document.getElementById("al8").style.display="none";
	}else{
		document.getElementById('alm8').innerHTML = "<p><?php 	 echo $m[7] ?></p>"; 
	}
	if (a9 == "Ninguno") {
		document.getElementById("al9").style.display="none";
	}else{
		document.getElementById('alm9').innerHTML = "<p><?php 	 echo $m[8] ?></p>"; 
	}
	if (a10 == "Ninguno") {
		document.getElementById("al10").style.display="none";
	}else{
		document.getElementById('alm10').innerHTML = "<p><?php 	 echo $m[9] ?></p>"; 
	}
	if (a11 == "Ninguno") {
		document.getElementById("al11").style.display="none";
	}else{
		document.getElementById('alm11').innerHTML = "<p><?php 	 echo $m[10] ?></p>"; 
	}
	if (a12 == "Ninguno") {
		document.getElementById("al12").style.display="none";
	}else{
		document.getElementById('alm12').innerHTML = "<p><?php 	 echo $m[11] ?></p>"; 
	}
	if (a13 == "Ninguno") {
		document.getElementById("al13").style.display="none";
	}else{
		document.getElementById('alm13').innerHTML = "<p><?php 	 echo $m[12] ?></p>"; 
	}
	if (a14 == "Ninguno") {
		document.getElementById("al14").style.display="none";
	}else{
		document.getElementById('alm14').innerHTML = "<p><?php 	 echo $m[13] ?></p>"; 
	}
	if (a15 == "Ninguno") {
		document.getElementById("al15").style.display="none";
	}else{
		document.getElementById('alm15').innerHTML = "<p><?php 	 echo $m[14] ?></p>"; 
	}
	if (a16 == "Ninguno") {
		document.getElementById("al16").style.display="none";
	}else{
		document.getElementById('alm16').innerHTML = "<p><?php 	 echo $m[15] ?></p>"; 
	}
	if (a17 == "Ninguno") {
		document.getElementById("al17").style.display="none";
	}else{
		document.getElementById('alm17').innerHTML = "<p><?php 	 echo $m[16] ?></p>"; 
	}
	if (a18 == "Ninguno") {
		document.getElementById("al18").style.display="none";
	}else{
		document.getElementById('alm18').innerHTML = "<p><?php 	 echo $m[17] ?></p>"; 
	}
	if (a19 == "Ninguno") {
		document.getElementById("al19").style.display="none";
	}else{
		document.getElementById('alm19').innerHTML = "<p><?php 	 echo $m[18] ?></p>"; 
	}
	if (a20 == "Ninguno") {
		document.getElementById("al20").style.display="none";
	}else{
		document.getElementById('alm20').innerHTML = "<p><?php 	 echo $m[19] ?></p>"; 
	}
	if (a21 == "Ninguno") {
		document.getElementById("al21").style.display="none";
	}else{
		document.getElementById('alm21').innerHTML = "<p><?php 	 echo $m[20] ?></p>"; 
	}
	if (a22 == "Ninguno") {
		document.getElementById("al22").style.display="none";
	}else{
		document.getElementById('alm22').innerHTML = "<p><?php 	 echo $m[21] ?></p>"; 
	}
	if (a23 == "Ninguno") {
		document.getElementById("al23").style.display="none";
	}else{
		document.getElementById('alm23').innerHTML = "<p><?php 	 echo $m[22] ?></p>"; 
	}
	if (a24 == "Ninguno") {
		document.getElementById("al24").style.display="none";
	}else{
		document.getElementById('alm24').innerHTML = "<p><?php 	 echo $m[23] ?></p>"; 
	}
	if (a25 == "Ninguno") {
		document.getElementById("al25").style.display="none";
	}else{
		document.getElementById('alm25').innerHTML = "<p><?php 	 echo $m[24] ?></p>"; 
	}
	if (a26 == "Ninguno") {
		document.getElementById("al26").style.display="none";
	}else{
		document.getElementById('alm26').innerHTML = "<p><?php 	 echo $m[25] ?></p>"; 
	}
	if (a27 == "Ninguno") {
		document.getElementById("al27").style.display="none";
	}else{
		document.getElementById('alm27').innerHTML = "<p><?php 	 echo $m[26] ?></p>"; 
	}
	if (a28 == "Ninguno") {
		document.getElementById("al28").style.display="none";
	}else{
		document.getElementById('alm28').innerHTML = "<p><?php 	 echo $m[27] ?></p>"; 
	}
	if (a29 == "Ninguno") {
		document.getElementById("al29").style.display="none";
	}else{
		document.getElementById('alm29').innerHTML = "<p><?php 	 echo $m[28] ?></p>"; 
	}
	if (a30 == "Ninguno") {
		document.getElementById("al30").style.display="none";
	}else{
		document.getElementById('alm30').innerHTML = "<p><?php 	 echo $m[29] ?></p>"; 
	}
	if (a31 == "Ninguno") {
		document.getElementById("al31").style.display="none";
	}else{
		document.getElementById('alm31').innerHTML = "<p><?php 	 echo $m[30] ?></p>"; 
	}
	if (a32 == "Ninguno") {
		document.getElementById("al32").style.display="none";
	}else{
		document.getElementById('alm32').innerHTML = "<p><?php 	 echo $m[31] ?></p>"; 
	}
	if (a33 == "Ninguno") {
		document.getElementById("al33").style.display="none";
	}else{
		document.getElementById('alm33').innerHTML = "<p><?php 	 echo $m[32] ?></p>"; 
	}
	if (a34 == "Ninguno") {
		document.getElementById("al34").style.display="none";
	}else{
		document.getElementById('alm34').innerHTML = "<p><?php 	 echo $m[33] ?></p>"; 
	}
	if (a35 == "Ninguno") {
		document.getElementById("al35").style.display="none";
	}else{
		document.getElementById('alm35').innerHTML = "<p><?php 	 echo $m[34] ?></p>"; 
	}
	if (a36 == "Ninguno") {
		document.getElementById("al36").style.display="none";
	}else{
		document.getElementById('alm36').innerHTML = "<p><?php 	 echo $m[35] ?></p>"; 
	}
	if (a37 == "Ninguno") {
		document.getElementById("al37").style.display="none";
	}else{
		document.getElementById('alm37').innerHTML = "<p><?php 	 echo $m[36] ?></p>"; 
	}
	if (a38 == "Ninguno") {
		document.getElementById("al38").style.display="none";
	}else{
		document.getElementById('alm38').innerHTML = "<p><?php 	 echo $m[37] ?></p>"; 
	}
	if (a39 == "Ninguno") {
		document.getElementById("al39").style.display="none";
	}else{
		document.getElementById('alm39').innerHTML = "<p><?php 	 echo $m[38] ?></p>"; 
	}
	if (a40 == "Ninguno") {
		document.getElementById("al40").style.display="none";
	}else{
		document.getElementById('alm40').innerHTML = "<p><?php 	 echo $m[39] ?></p>"; 
	}
	if (a41 == "Ninguno") {
		document.getElementById("al41").style.display="none";
	}else{
		document.getElementById('alm41').innerHTML = "<p><?php 	 echo $m[40] ?></p>"; 
	}
	if (a42 == "Ninguno") {
		document.getElementById("al42").style.display="none";
	}else{
		document.getElementById('alm42').innerHTML = "<p><?php 	 echo $m[41] ?></p>"; 
	}
	if (a43 == "Ninguno") {
		document.getElementById("al43").style.display="none";
	}else{
		document.getElementById('alm43').innerHTML = "<p><?php 	 echo $m[42] ?></p>"; 
	}
	if (a44 == "Ninguno") {
		document.getElementById("al44").style.display="none";
	}else{
		document.getElementById('alm44').innerHTML = "<p><?php 	 echo $m[43] ?></p>"; 
	}
	if (a45 == "Ninguno") {
		document.getElementById("al45").style.display="none";
	}else{
		document.getElementById('alm45').innerHTML = "<p><?php 	 echo $m[44] ?></p>"; 
	}
	if (a46 == "Ninguno") {
		document.getElementById("al46").style.display="none";
	}else{
		document.getElementById('alm46').innerHTML = "<p><?php 	 echo $m[45] ?></p>"; 
	}
	if (a47 == "Ninguno") {
		document.getElementById("al47").style.display="none";
	}else{
		document.getElementById('alm47').innerHTML = "<p><?php 	 echo $m[46] ?></p>"; 
	}
	if (a48 == "Ninguno") {
		document.getElementById("al48").style.display="none";
	}else{
		document.getElementById('alm48').innerHTML = "<p><?php 	 echo $m[47] ?></p>"; 
	}
	if (a49 == "Ninguno") {
		document.getElementById("al49").style.display="none";
	}else{
		document.getElementById('alm49').innerHTML = "<p><?php 	 echo $m[48] ?></p>"; 
	}
	if (a50 == "Ninguno") {
		document.getElementById("al50").style.display="none";
	}else{
		document.getElementById('alm50').innerHTML = "<p><?php 	 echo $m[49] ?></p>"; 
	}

	function GUARDAR(){

		const grafica = document.createElement('canvas');
		grafica.setAttribute('id','chart');
		document.getElementById('canvas-container').appendChild(grafica);

		$(document).ready(function(){
		var canti = "<?php echo $con ?>"

		var contar = 0;
		var cont = [];
		cont[0] = document.getElementById('cbox1').checked;
		cont[1] = document.getElementById('cbox2').checked;
		cont[2] = document.getElementById('cbox3').checked;
		cont[3] = document.getElementById('cbox4').checked;
		cont[4] = document.getElementById('cbox5').checked;
		cont[5] = document.getElementById('cbox6').checked;
		cont[6] = document.getElementById('cbox7').checked;
		cont[7] = document.getElementById('cbox8').checked;
		cont[8] = document.getElementById('cbox9').checked;
		cont[9] = document.getElementById('cbox10').checked;
		cont[10] = document.getElementById('cbox11').checked;
		cont[11] = document.getElementById('cbox12').checked;
		cont[12] = document.getElementById('cbox13').checked;
		cont[13] = document.getElementById('cbox14').checked;
		cont[14] = document.getElementById('cbox15').checked;
		cont[15] = document.getElementById('cbox16').checked;
		cont[16] = document.getElementById('cbox17').checked;
		cont[17] = document.getElementById('cbox18').checked;
		cont[18] = document.getElementById('cbox19').checked;
		cont[19] = document.getElementById('cbox20').checked;
		cont[20] = document.getElementById('cbox21').checked;
		cont[21] = document.getElementById('cbox22').checked;
		cont[22] = document.getElementById('cbox23').checked;
		cont[23] = document.getElementById('cbox24').checked;
		cont[24] = document.getElementById('cbox25').checked;
		cont[25] = document.getElementById('cbox26').checked;
		cont[26] = document.getElementById('cbox27').checked;
		cont[27] = document.getElementById('cbox28').checked;
		cont[28] = document.getElementById('cbox29').checked;
		cont[29] = document.getElementById('cbox30').checked;
		cont[30] = document.getElementById('cbox31').checked;
		cont[31] = document.getElementById('cbox32').checked;
		cont[32] = document.getElementById('cbox33').checked;
		cont[33] = document.getElementById('cbox34').checked;
		cont[34] = document.getElementById('cbox35').checked;
		cont[35] = document.getElementById('cbox36').checked;
		cont[36] = document.getElementById('cbox37').checked;
		cont[37] = document.getElementById('cbox38').checked;
		cont[38] = document.getElementById('cbox39').checked;
		cont[39] = document.getElementById('cbox40').checked;
		cont[40] = document.getElementById('cbox41').checked;
		cont[41] = document.getElementById('cbox42').checked;
		cont[42] = document.getElementById('cbox43').checked;
		cont[43] = document.getElementById('cbox44').checked;
		cont[44] = document.getElementById('cbox45').checked;
		cont[45] = document.getElementById('cbox46').checked;
		cont[46] = document.getElementById('cbox47').checked;
		cont[47] = document.getElementById('cbox48').checked;
		cont[48] = document.getElementById('cbox49').checked;
		cont[49] = document.getElementById('cbox50').checked;

		var i;
		for (i = 0; i < 49; i++) {
			if (cont[i] == true) {
				contar = contar+1;
			}
		}

		var patata = canti - contar;

		// papata guarda la cantidad de alumnos que faltaron
		// contar guarda la cantidad de alumnos con asistencia
		// canti guarda el total de alumnos

		var datos = {
			type: "pie",
			data : {
				datasets :[{
					data : [
						contar,
						patata,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
					],
				}],
				labels : [
					"Asistencias",
					"Faltas",
				]
			},
			options : {
				responsive : true,
			}
		};

		var canvas = document.getElementById('chart').getContext('2d');
		window.pie = new Chart(canvas, datos);


	});

	document.getElementById('confirmar').innerHTML = "<input type='submit' form='formi' value='GUARDAR' class='out2'>";	

	}

</script>
<?php 
		
if ($_POST) {

		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		
		
		//M[0] ALAMACENA EL PRIMER ALUMNO
		if ($m[0] != "Ninguno" ) {
			// CBOX1 ALMACENA EL VALOR DEL PRIMER CHECK
			if(isset($_POST['cbox1'])){
				// ALMACENA EL  ID DEL PRIMER ALUMNO
				$Est1 = $m[0];
				// ALMACENA EL VALOR DEL CHECK
				$box1 = $_POST['cbox1'];

			}else{

				$Est1 = $m[0];
				$box1 = 'N';

			}

		}

		if ($m[1] != "Ninguno" ) {

			if(isset($_POST['cbox2'])){

				$Est2 = $m[1];
				$box2 = $_POST['cbox2'];

			}else{

				$Est2 = $m[1];
				$box2 = 'N';

			}

		}

		if ($m[2] != "Ninguno" ) {

			if(isset($_POST['cbox3'])){

				$Est3 = $m[2];
				$box3 = $_POST['cbox3'];

			}else{

				$Est3 = $m[2];
				$box3 = 'N';

			}

		}

		if ($m[3] != "Ninguno" ) {

			if(isset($_POST['cbox4'])){

				$Est4 = $m[3];
				$box4 = $_POST['cbox4'];

			}else{

				$Est4 = $m[3];
				$box4 = 'N';

			}

		}

		if ($m[4] != "Ninguno" ) {

			if(isset($_POST['cbox5'])){

				$Est5 = $m[4];
				$box5 = $_POST['cbox5'];

			}else{

				$Est5 = $m[4];
				$box5 = 'N';

			}

		}

		if ($m[5] != "Ninguno" ) {

			if(isset($_POST['cbox6'])){

				$Est6 = $m[5];
				$box6 = $_POST['cbox6'];

			}else{

				$Est6 = $m[5];
				$box6 = 'N';

			}

		}

		if ($m[6] != "Ninguno" ) {

			if(isset($_POST['cbox7'])){

				$Est7 = $m[6];
				$box7 = $_POST['cbox7'];

			}else{

				$Est7 = $m[6];
				$box7 = 'N';

			}

		}

		if ($m[7] != "Ninguno" ) {

			if(isset($_POST['cbox8'])){

				$Est8 = $m[7];
				$box8 = $_POST['cbox8'];

			}else{

				$Est8 = $m[7];
				$box8 = 'N';

			}

		}
		if ($m[8] != "Ninguno" ) {

			if(isset($_POST['cbox9'])){

				$Est9 = $m[8];
				$box9 = $_POST['cbox9'];

			}else{

				$Est9 = $m[8];
				$box9 = 'N';

			}
		}
		

		if ($m[9] != "Ninguno" ) {

			if(isset($_POST['cbox10'])){

				$Est10 = $m[9];
				$box10 = $_POST['cbox10'];

			}else{

				$Est10 = $m[9];
				$box10 = 'N';

			}
		}
		

		if ($m[10] != "Ninguno" ) {

			if(isset($_POST['cbox11'])){

				$Est11 = $m[10];
				$box11 = $_POST['cbox11'];

			}else{

				$Est11 = $m[10];
				$box11 = 'N';

			}

		}

		if ($m[11] != "Ninguno" ) {

			if(isset($_POST['cbox12'])){

				$Est12 = $m[11];
				$box12 = $_POST['cbox12'];

			}else{

				$Est12 = $m[11];
				$box12 = 'N';

			}

		}
		if ($m[12] != "Ninguno" ) {

			if(isset($_POST['cbox13'])){

				$Est13 = $m[12];
				$box13 = $_POST['cbox13'];

			}else{

				$Est13 = $m[12];
				$box13 = 'N';

			}

		
		}
		if ($m[13] != "Ninguno" ) {

			if(isset($_POST['cbox14'])){

				$Est14 = $m[13];
				$box14 = $_POST['cbox14'];

			}else{

				$Est14 = $m[13];
				$box14 = 'N';

			}

		}

		if ($m[14] != "Ninguno" ) {

			if(isset($_POST['cbox15'])){

				$Est15 = $m[14];
				$box15 = $_POST['cbox15'];

			}else{

				$Est15 = $m[14];
				$box15 = 'N';

			}

		}

		if ($m[15] != "Ninguno" ) {

			if(isset($_POST['cbox16'])){

				$Est16 = $m[15];
				$box16 = $_POST['cbox16'];

			}else{

				$Est16 = $m[15];
				$box16 = 'N';

			}

		}

		if ($m[16] != "Ninguno" ) {

			if(isset($_POST['cbox17'])){

				$Est17 = $m[16];
				$box17 = $_POST['cbox17'];

			}else{

				$Est17 = $m[16];
				$box17 = 'N';

			}

		}

		if ($m[17] != "Ninguno" ) {

			if(isset($_POST['cbox18'])){

				$Est18 = $m[17];
				$box18 = $_POST['cbox18'];

			}else{

				$Est18 = $m[17];
				$box18 = 'N';

			}

		}

		if ($m[18] != "Ninguno" ) {

			if(isset($_POST['cbox19'])){

				$Est19 = $m[18];
				$box19 = $_POST['cbox19'];

			}else{
				$Est19 = $m[18];
				$box19 = 'N';

			}

		}

		if ($m[19] != "Ninguno" ) {

			if(isset($_POST['cbox20'])){

				$Est20 = $m[19];
				$box20 = $_POST['cbox20'];

			}else{

				$Est20 = $m[19];
				$box20 = 'N';

			}

		}

		if ($m[20] != "Ninguno" ) {

			if(isset($_POST['cbox21'])){

				$Est21 = $m[20];
				$box21 = $_POST['cbox21'];

			}else{

				$Est21 = $m[20];
				$box21 = 'N';

			}

		}

		if ($m[21] != "Ninguno" ) {

			if(isset($_POST['cbox22'])){

				$Est22 = $m[21];
				$box22 = $_POST['cbox22'];

			}else{

				$Est22 = $m[21];
				$box22 = 'N';

			}

		}

		if ($m[22] != "Ninguno" ) {

			if(isset($_POST['cbox23'])){

				$Est23 = $m[22];
				$box23 = $_POST['cbox23'];

			}else{

				$Est23 = $m[22];
				$box23 = 'N';

			}

		}
		if ($m[23] != "Ninguno" ) {

			if(isset($_POST['cbox24'])){

				$Est24 = $m[23];
				$box24 = $_POST['cbox24'];

			}else{

				$Est24 = $m[23];
				$box24 = 'N';

			}

		}
		if ($m[24] != "Ninguno" ) {

			if(isset($_POST['cbox25'])){

				$Est25 = $m[24];
				$box25 = $_POST['cbox25'];

			}else{

				$Est25 = $m[24];
				$box25 = 'N';

			}

		}
		if ($m[25] != "Ninguno" ) {

			if(isset($_POST['cbox26'])){

				$Est26 = $m[25];
				$box26 = $_POST['cbox26'];

			}else{

				$Est26 = $m[25];
				$box26 = 'N';

			}

		}
		if ($m[26] != "Ninguno" ) {

			if(isset($_POST['cbox27'])){

				$Est27 = $m[26];
				$box27 = $_POST['cbox27'];

			}else{

				$Est27 = $m[26];
				$box27 = 'N';

			}

		}
		if ($m[27] != "Ninguno" ) {

			if(isset($_POST['cbox28'])){

				$Est28 = $m[27];
				$box28 = $_POST['cbox28'];

			}else{

				$Est28 = $m[27];
				$box28 = 'N';

			}

		}
		if ($m[28] != "Ninguno" ) {

			if(isset($_POST['cbox29'])){

				$Est29 = $m[28];
				$box29 = $_POST['cbox29'];

			}else{

				$Est29 = $m[28];
				$box29 = 'N';

			}

		}
		if ($m[29] != "Ninguno" ) {

			if(isset($_POST['cbox30'])){

				$Est30 = $m[29];
				$box30 = $_POST['cbox30'];

			}else{

				$Est30 = $m[29];
				$box30 = 'N';

			}

		}
		if ($m[30] != "Ninguno" ) {

			if(isset($_POST['cbox31'])){

				$Est31 = $m[30];
				$box31 = $_POST['cbox31'];

			}else{

				$Est31 = $m[30];
				$box31 = 'N';

			}

		}
		if ($m[31] != "Ninguno" ) {

			if(isset($_POST['cbox32'])){

				$Est32 = $m[31];
				$box32 = $_POST['cbox32'];

			}else{

				$Est32 = $m[31];
				$box32 = 'N';

			}

		}
		if ($m[32] != "Ninguno" ) {

			if(isset($_POST['cbox33'])){

				$Est33 = $m[32];
				$box33 = $_POST['cbox33'];

			}else{

				$Est33 = $m[32];
				$box33 = 'N';

			}

		}
		if ($m[33] != "Ninguno" ) {

			if(isset($_POST['cbox34'])){

				$Est34 = $m[33];
				$box34 = $_POST['cbox34'];

			}else{

				$Est34 = $m[33];
				$box34 = 'N';

			}

		}
		if ($m[34] != "Ninguno" ) {

			if(isset($_POST['cbox35'])){

				$Est35 = $m[34];
				$box35 = $_POST['cbox35'];

			}else{

				$Est35 = $m[34];
				$box35 = 'N';

			}

		}
		if ($m[35] != "Ninguno" ) {

			if(isset($_POST['cbox36'])){

				$Est36 = $m[35];
				$box36 = $_POST['cbox36'];

			}else{

				$Est36 = $m[35];
				$box36 = 'N';

			}

		}
		if ($m[36] != "Ninguno" ) {

			if(isset($_POST['cbox37'])){

				$Est37 = $m[36];
				$box37 = $_POST['cbox37'];

			}else{

				$Est37 = $m[36];
				$box37 = 'N';

			}

		}
		if ($m[37] != "Ninguno" ) {

			if(isset($_POST['cbox38'])){

				$Est38 = $m[37];
				$box38 = $_POST['cbox38'];

			}else{

				$Est38 = $m[37];
				$box38 = 'N';

			}

		}
		if ($m[38] != "Ninguno" ) {

			if(isset($_POST['cbox39'])){

				$Est39 = $m[38];
				$box39 = $_POST['cbox39'];

			}else{

				$Est39 = $m[38];
				$box39 = 'N';

			}

		}
		if ($m[39] != "Ninguno" ) {

			if(isset($_POST['cbox40'])){

				$Est40 = $m[39];
				$box40 = $_POST['cbox40'];

			}else{

				$Est40 = $m[39];
				$box40 = 'N';

			}

		}
		if ($m[40] != "Ninguno" ) {

			if(isset($_POST['cbox41'])){

				$Est41 = $m[40];
				$box41 = $_POST['cbox41'];

			}else{

				$Est41 = $m[40];
				$box41 = 'N';

			}

		}
		if ($m[41] != "Ninguno" ) {

			if(isset($_POST['cbox42'])){

				$Est42 = $m[41];
				$box42 = $_POST['cbox42'];

			}else{

				$Est42 = $m[41];
				$box42 = 'N';

			}

		}
		if ($m[42] != "Ninguno" ) {

			if(isset($_POST['cbox43'])){

				$Est43 = $m[42];
				$box43 = $_POST['cbox43'];

			}else{

				$Est43 = $m[42];
				$box43 = 'N';

			}

		}
		if ($m[43] != "Ninguno" ) {

			if(isset($_POST['cbox44'])){

				$Est44 = $m[43];
				$box44 = $_POST['cbox44'];

			}else{

				$Est44 = $m[43];
				$box44 = 'N';

			}

		}
		if ($m[44] != "Ninguno" ) {

			if(isset($_POST['cbox45'])){

				$Est45 = $m[44];
				$box45 = $_POST['cbox45'];

			}else{

				$Est45 = $m[44];
				$box45 = 'N';

			}

		}
		if ($m[45] != "Ninguno" ) {

			if(isset($_POST['cbox46'])){

				$Est46 = $m[45];
				$box46 = $_POST['cbox46'];

			}else{

				$Est46 = $m[45];
				$box46 = 'N';

			}

		}
		if ($m[46] != "Ninguno" ) {

			if(isset($_POST['cbox47'])){

				$Est47 = $m[46];
				$box47 = $_POST['cbox47'];

			}else{

				$Est47 = $m[46];
				$box47 = 'N';

			}

		}
		if ($m[47] != "Ninguno" ) {

			if(isset($_POST['cbox48'])){

				$Est48 = $m[47];
				$box48 = $_POST['cbox48'];

			}else{

				$Est48 = $m[47];
				$box48 = 'N';

			}

		}
		if ($m[48] != "Ninguno" ) {

			if(isset($_POST['cbox49'])){

				$Est49 = $m[48];
				$box49 = $_POST['cbox49'];

			}else{

				$Est49 = $m[48];
				$box49 = 'N';

			}

		}
		if ($m[49] != "Ninguno" ) {

			if(isset($_POST['cbox50'])){

				$Est50 = $m[49];
				$box50 = $_POST['cbox50'];

			}else{

				$Est50 = $m[49];
				$box50 = 'N';

			}

		}
		
		if (isset($Est1)) {
		$insertar1 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[0]."','".$box1."','".$fecha."','".$hora."')");
		}
		if (isset($Est2)) {
		$insertar2 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[1]."','".$box2."','".$fecha."','".$hora."')");	
		}
		if (isset($Est3)) {
		$insertar3 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[2]."','".$box3."','".$fecha."','".$hora."')");	
		}
		if (isset($Est4)) {
		$insertar4 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[3]."','".$box4."','".$fecha."','".$hora."')");	
		}
		if (isset($Est5)) {
		$insertar5 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[4]."','".$box5."','".$fecha."','".$hora."')");	
		}
		if (isset($Est6)) {
		$insertar6 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[5]."','".$box6."','".$fecha."','".$hora."')");	
		}
		if (isset($Est7)) {
		$insertar7 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[6]."','".$box7."','".$fecha."','".$hora."')");	
		}
		if (isset($Est8)) {
		$insertar8 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[7]."','".$box8."','".$fecha."','".$hora."')");	
		}
		if (isset($Est9)) {
		$insertar9 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[8]."','".$box9."','".$fecha."','".$hora."')");	
		}
		if (isset($Est10)) {
		$insertar10 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[9]."','".$box10."','".$fecha."','".$hora."')");	
		}
		if (isset($Est11)) {
		$insertar11 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[10]."','".$box11."','".$fecha."','".$hora."')");	
		}
		if (isset($Est12)) {
		$insertar12 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[11]."','".$box12."','".$fecha."','".$hora."')");	
		}
		if (isset($Est13)) {
		$insertar13 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[12]."','".$box13."','".$fecha."','".$hora."')");	
		}
		if (isset($Est14)) {
		$insertar14 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[13]."','".$box14."','".$fecha."','".$hora."')");	
		}
		if (isset($Est15)) {
		$insertar15 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[14]."','".$box15."','".$fecha."','".$hora."')");	
		}
		if (isset($Est16)) {
		$insertar16 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[15]."','".$box16."','".$fecha."','".$hora."')");	
		}
		if (isset($Est17)) {
		$insertar17 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[16]."','".$box17."','".$fecha."','".$hora."')");	
		}
		if (isset($Est18)) {
		$insertar18 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[17]."','".$box18."','".$fecha."','".$hora."')");	
		}
		if (isset($Est19)) {
		$insertar19 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[18]."','".$box19."','".$fecha."','".$hora."')");	
		}
		if (isset($Est20)) {
		$insertar20 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[19]."','".$box20."','".$fecha."','".$hora."')");	
		}
		if (isset($Est21)) {
		$insertar21 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[20]."','".$box21."','".$fecha."','".$hora."')");	
		}
		if (isset($Est22)) {
		$insertar22 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[21]."','".$box22."','".$fecha."','".$hora."')");	
		}
		if (isset($Est23)) {
		$insertar23 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[22]."','".$box23."','".$fecha."','".$hora."')");	
		}
		if (isset($Est24)) {
		$insertar24 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[23]."','".$box24."','".$fecha."','".$hora."')");	
		}
		if (isset($Est25)) {
		$insertar25 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[24]."','".$box25."','".$fecha."','".$hora."')");	
		}
		if (isset($Est26)) {
		$insertar26 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[25]."','".$box26."','".$fecha."','".$hora."')");	
		}
		if (isset($Est27)) {
		$insertar27 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[26]."','".$box27."','".$fecha."','".$hora."')");	
		}
		if (isset($Est28)) {
		$insertar28 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[27]."','".$box28."','".$fecha."','".$hora."')");	
		}
		if (isset($Est29)) {
		$insertar29 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[28]."','".$box29."','".$fecha."','".$hora."')");	
		}
		if (isset($Est30)) {
		$insertar30 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[29]."','".$box30."','".$fecha."','".$hora."')");	
		}
		if (isset($Est31)) {
		$insertar31 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[30]."','".$box31."','".$fecha."','".$hora."')");	
		}
		if (isset($Est32)) {
		$insertar32 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[31]."','".$box32."','".$fecha."','".$hora."')");	
		}
		if (isset($Est33)) {
		$insertar33 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[32]."','".$box33."','".$fecha."','".$hora."')");	
		}
		if (isset($Est34)) {
		$insertar34 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[33]."','".$box34."','".$fecha."','".$hora."')");	
		}
		if (isset($Est35)) {
		$insertar35 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[34]."','".$box35."','".$fecha."','".$hora."')");	
		}
		if (isset($Est36)) {
		$insertar36 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[35]."','".$box36."','".$fecha."','".$hora."')");	
		}
		if (isset($Est37)) {
		$insertar37 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[36]."','".$box37."','".$fecha."','".$hora."')");	
		}
		if (isset($Est38)) {
		$insertar38 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[37]."','".$box38."','".$fecha."','".$hora."')");	
		}
		if (isset($Est39)) {
		$insertar39 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[38]."','".$box39."','".$fecha."','".$hora."')");	
		}
		if (isset($Est40)) {
		$insertar40 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[39]."','".$box40."','".$fecha."','".$hora."')");	
		}
		if (isset($Est41)) {
		$insertar41 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[40]."','".$box41."','".$fecha."','".$hora."')");	
		}
		if (isset($Est42)) {
		$insertar42 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[41]."','".$box42."','".$fecha."','".$hora."')");	
		}
		if (isset($Est43)) {
		$insertar43 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[42]."','".$box43."','".$fecha."','".$hora."')");	
		}
		if (isset($Est44)) {
		$insertar44 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[43]."','".$box44."','".$fecha."','".$hora."')");	
		}
		if (isset($Est45)) {
		$insertar45 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[44]."','".$box45."','".$fecha."','".$hora."')");	
		}
		if (isset($Est46)) {
		$insertar46 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[45]."','".$box46."','".$fecha."','".$hora."')");	
		}
		if (isset($Est47)) {
		$insertar47 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[46]."','".$box47."','".$fecha."','".$hora."')");	
		}
		if (isset($Est48)) {
		$insertar48 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[47]."','".$box48."','".$fecha."','".$hora."')");	
		}
		if (isset($Est49)) {
		$insertar49 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[48]."','".$box49."','".$fecha."','".$hora."')");	
		}
		if (isset($Est50)) {
		$insertar50 = mysqli_query($conexion,"INSERT INTO `ynalista`(`id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) 
									 VALUES ('".$v2."','".$idmateria."','".$identi."','".$arregloid[49]."','".$box50."','".$fecha."','".$hora."')");	
		}

		echo "<center>SE GUARDO CON EXITO</center>";
}
	
 ?>
</html>