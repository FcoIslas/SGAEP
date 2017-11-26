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
			<!--Section to show the subject-->
			<div id="moduleConsultSubject">
				<table id="tableShowSubjectsAJAX">
					<td><th>Crear Examen</th></td>
					<tr>
						<td><label>Materia</label></td>
						<td>
							<select name="formConsultSubjectToCheck" id="formConsultSubjectToCheck" onchange="showSubjectCreateExam(this.value)">
								<option value="">Seleccione Materia</option>
								<?php
									//ACCESS TO DATABASE
									session_start();
									$link = mysql_connect('localhost', 'root', 'dwarfest')
    								or die('No se pudo conectar: ' . mysql_error());
									mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');
									//READ DATABASE
									$results = mysql_query("SELECT * FROM tableSubjects WHERE vcRFC='".$_SESSION["vcRFC"]."'");
									while ($row = mysql_fetch_array($results)) {
										echo "<option value='".$row["vcIdSubject"]."'>".$row["vcSubjectName"]."</option>";
									}
								?>
							</select>
						</td>
					</tr>
				</table><br/>
				<!--AJAX Section, get the values of the Subject-->
				<div id="txtHint" class=""></div>
				<!--AJAX Section, get the values of the Subject-->
			</div>
			<!--Section to show the subject-->

			<!--Section to submit the specs for the creation of the exam-->
			<!--Developing section-->
			<div class="divSpecsForExam" id="divSpecsForExam" style="display: none;" ><!--style="display: none;"-->
				<form class="formSpecsForExam" action="specsExam.php" method="post">
					<input type="text" name="inputCreateExameIdSubject" id='inputCreateExameIdSubject' style="display: none;" readonly>
					<!--<label for="numberQuestions">Número de Preguntas</label>
					<select class="selectNumberQuestions" name="selectNumberQuestions">-->
						<?php
							//for ($i=1; $i < 11 ; $i++) {
								//echo "<option value=".$i.">".$i."</option>";
							//}
							?>
						<!--</select>
						<br />-->
						<label for="selectPartialNumber">Seleccionar Parcial</label>
						<select class="selectPartialNumber" name="selectPartialNumber" id="selectPartialNumber">
							<option value="1">Primer Parcial</option>
							<option value="2">Segundo Parcial</option>
						</select>
						<br>
						<input type="submit" name="submitButtonCreateExam" value="Crear Examen">
					</form>
			</div>
			<!--Developing section-->
			<!--Section to submit the specs for the creation of the exam-->


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
