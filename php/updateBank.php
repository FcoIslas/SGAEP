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
					<td><th>Datos</th></td>
					<tr>
						<td><label>Materia</label></td>
						<td>
							<select name="formConsultSubjectToCheck" id="formConsultSubjectToCheck" onchange="showSubject(this.value)">
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

			<!--Module to add questions to subject-->
			<div class="addQuestionToSubject" id="addQuestionToSubject" style="display: none;">


			<div id="moduleConsultSubjectQuestions">
				<table id="tableDeleteUsers">
						<tr>
							<th>Tipo de Pregunta</th>
						</tr>
						<tr>
							<td>
								<select class="selectQuestionType" name="selectQuestionType" onchange="showQuestionType(this.value)">
									<option value="">Seleccione Opción</option>
									<option value="booleanQuestion">Verdadero o Falso</option>
									<option value="multipleOptions">Opción Múltiple</option>
									<option value="openQuestion">Pregunta Abierta</option>
								</select>
							</td>
							<!--Hidding-->
						</tr>
				</table>
				<!--editing this section-->
				<div class="hideTypeOpen" id="hideTypeOpen" style="display: none;">
					<!--Form to send only open question to DB-->
					<form class="formOpenQuestion" id="formOpenQuestion" action="ajaxSendQuestionDB.php" method="post">
						<table>
							<thead>
								<th>Parcial</th>
								<th>Pregunta</th>
								<th>Respuesta</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<select name="formUpdateQuestionBankPartial" id="formUpdateQuestionBankPartial" >
											<option value="1">1er</option>
											<option value="2">2do</option>
										</select>
									</td>
									<td>
										<input type="text" name="formUpdateQuestionBankQuestion" id="formUpdateQuestionBankQuestion" required="required">
									</td>
									<td>
										<input type="text" name="textInputAnswerOpen" id="textInputAnswerOpen" />
									</td>
									<td>
										<input type="submit" value="Enviar Pregunta" id="buttonSubmitOpenQuestion" ><!--onclick="submitOpenQuestion()"-->
									</td>
									<td>
										<input type="text" name="textInputQuestionID" id="textInputQuestionID" style="display: none;"/>
										<input type="text" name="textInputSubjectID" id="textInputSubjectID" style="display: none;"/>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
					<!--Form to send only open question to DB-->
				</div>
				<div class="hideTypeBoolean" id="hideTypeBoolean" style="display: none;">
					<table class="tableBooleanQuestion" id="tableBooleanQuestion">
						<thead>
							<th>Parcial</th>
							<th>Pregunta</th>
							<th>Respuesta</th>
						</thead>
						<tbody>
							<tr>
								<td>
									<select name="formUpdateQuestionBankPartial" id="formUpdateQuestionBankPartial" >
										<option value="1">1er</option>
										<option value="2">2do</option>
									</select>
								</td>
								<td>
									<input type="text" name="formUpdateQuestionBankQuestion" id="formUpdateQuestionBankQuestion" required="required">
								</td>
								<td>
									<select name="formUpdateQuestionBankAnswer" id="formUpdateQuestionBankAnswer" >
										<option value="1">Verdadero</option>
										<option value="0">Falso</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--Section for multiple questions-->
				<div class="hydeTypeMultiple" id="hydeTypeMultiple" style="display: none;">
					<form class="" action="index.html" method="post">
						<table>
							<thead>
								<tr>
									<th>Parcial</th>
									<th>Pregunta</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<select name="formUpdateQuestionBankPartial" id="formUpdateQuestionBankPartial" >
											<option value="1">1er</option>
											<option value="2">2do</option>
										</select>
									</td>
									<td>
										<input type="text" name="formUpdateQuestionBankQuestion" id="formUpdateQuestionBankQuestion" required="required">
									</td>
								</tr>
							</tbody>
						</table>
						<table>
							<thead>
								<th>Agregar Respuestas</th>
							</thead>
							<tbody>
								<tr>
									<td>A<input type="text"/></td>
									<td>B<input type="text"/></td>
									<td>Respuesta Correcta</td>
								</tr>
								<tr>
									<td>C<input type="text"/></td>
									<td>D<input type="text"/></td>
									<td>
										A<input type="radio" name="radioCorrectAnswer" value="A"/>
										B<input type="radio" name="radioCorrectAnswer" value="B"/>
										C<input type="radio" name="radioCorrectAnswer" value="C"/>
										D<input type="radio" name="radioCorrectAnswer" value="D"/>
									</td>
									<td><input type="button" value="Enviar Pregunta"/></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
				<!--Section for multiple questions-->
				<!--editing this section-->
			</div>
			</div>
			<!--Module to add questions to subject-->

		</section>

		<footer>
			<p>Hecho en México, Universidad Nacional Autónoma de México (UNAM), todos los derechos reservados 2015.</p>
			<p>Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica.</p>
			<p>De otra forma, requiere permiso previo por escrito de la institución.</p>
			<div id="dFooter">
				<li>
					<ul class="ulFooter"><a href="#">Créditos</a></ul>
					<ul class="ulFooter"><a href="#">Conoce el portal</a></ul>
				</li>
			</div><br><br>
			<p>Última actualización: 11/12/2015</p>
		</footer>
	</body>
</html>
