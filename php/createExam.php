<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema Generador Aleatorio de Exámenes Parciales</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
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
			<div id="moduleCreateExam">
				<form name="formCreateExam" id="formCreateExam" class="formCreateExam" method="post" action="../Actions/actionCreateExam.php" target="_blank" target="_blank2">
					<table>
						<td>
							<th>Datos</th>
						</td>
						<tr>
							<td>
								<label>Materia</label>
							</td>
							<td>
								<select type="text" name="formCreateExamSubject" required="required">
									<?php
										//ACCESS TO DATABASE
										session_start();
										$link = mysql_connect('localhost', 'root', 'dwarfest')
    									or die('No se pudo conectar: ' . mysql_error());
										mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');

										//READ DATABASE
										$results = mysql_query("SELECT * FROM tableSubjects WHERE vcRFC='".$_SESSION["vcRFC"]."'");
										while ($row = mysql_fetch_array($results)) {
											echo "<option value='".$row["vcSubjectName"]."'>".$row["vcSubjectName"]."</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Carrera</label>
							</td>
							<td>
								<select name="formCreateExamCareer">
									<option value="Informática">Informática</option>
									<option value="ITSE">ITSE</option>
									<option value="IME">IME</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Parcial</label>
							</td>
							<td>
								<select name="formCreateExamPartial">
									<option value="1">1ero</option>
									<option value="2">2do</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Semestre</label>
							</td>
							<td>
								<select name="formCreateExamSemester">
									<?php
										for ($i=1; $i < 10; $i++) {
											echo "<option value=".$i.">".$i."°</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Número de Reactivos</label>
							</td>
							<td>
								<select name="formCreateExamNumberQuestions">
									<?php
										for ($i=1; $i < 6; $i++) {
											echo "<option value=".$i.">".$i."</option>";
										}
									?>
								</select>
							</td>
						</tr>
					</table><br/>
					<input type="submit" value="Generar Examen">
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

