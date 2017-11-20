<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema Generador Aleatorio de Exámenes Parciales</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<script type="text/javascript" src="../js/script.js"></script>
	</head>
	<body>
		<header>
			<div id="dHeader">
				<img src="../Images/logo.png" alt="unam.png"/>
			</div>
			<nav>
				<div id="dNav">
					<li>
						<ul><a href="createBank.php">Crear Banco</a></ul>
						<ul><a href="updateBank.php">Actualizar Banco</a></ul>
						<ul><a href="consultBank.php">Consultar Banco</a></ul>
						<ul><a href="createExam.php">Crear Exámen</a></ul>
						<ul><a href="teacherConsultManual.php">Consultar Manual</a></ul>
						<ul><a href="teacherFaq.php">FAQ</a></ul>
						<ul><a href="../index.php">Salir</a></ul>
					</li>
				</div>
			</nav>
		</header>
		<section>
			<div id="moduleAddSubject">
				<form name="formAddSubject" id="formAddSubject" class="formAddSubject" method="post" action="../Actions/actionAddSubject.php">
					<table>
						<td><th>Datos</th></td>
						<tr><td><label>Materia</label></td><td><input type="text" id="inputAddSubjectName"  name="formAddSubjectName" onchange="generateSubjectID()" required="required"></td></tr>
						<tr><td><label>Carrera</label></td><td><select name="formAddSubjectCareer"><option value="Informática">Informática</option><option value="ITSE">ITSE</option><option value="IME">IME</option></select></td></tr>
						<tr><td><label>Turno</label></td><td><select name="formAddSubjectTurn"><option value="1">Matutino</option><option value="2">Vespertino</option><option value="3">Mixto</option></select></td></tr>
						<tr><td><label>Semestre</label></td><td><select name="formAddSubjectSemester"><option value="1">1°</option><option value="2">2°</option><option value="3">3°</option><option value="4">4°</option><option value="5">5°</option><option value="6">6°</option><option value="7">7°</option><option value="8">8°</option><option value="9">9°</option></select></td></tr>
						<tr><td><label>Identificador</label></td><td><input id="inputSubjectNameID" name="inputSubjectNameID" type="text" readonly/></td></tr>
						<tr hidden="hidden"><td><label>UserType</label></td><td><input type="number" name="formAddSubjectType" value="1"></td></tr>
					</table><br/>
					<input type="submit" value="Añadir Materia">
					<input type="reset" value="Limpiar">
				</form>
			</div>
		</section>
		<footer>
			<p>Hecho en México, Universidad Nacional Autónoma de México (UNAM), todos los derechos reservados 2017.</p>
			<p>Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica.</p>
			<p>De otra forma, requiere permiso previo por escrito de la institución.</p>
			<div id="dFooter">
				<li>
					<ul class="ulFooter"><a href="#">Créditos</a></ul>
					<ul class="ulFooter"><a href="#">Conoce el portal</a></ul>
				</li>
			</div><br><br>
			<p>Última actualización: 14/11/2017</p>
		</footer>
	</body>
</html>
