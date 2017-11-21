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
							<select name="formConsultSubjectToCheck" onchange="showUser(this.value)">
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
			<div id="moduleConsultSubjectQuestions">
				<table id="tableDeleteUsers">
					<thead>
						<tr>
							<th>Parcial</th>
							<th>Pregunta</th>
							<th>Tipo de Pregunta</th>
							<th id="thQuestionTypeBoolean" style="display: none;">Respuesta</th>
							<th id="thQuestionTypeOpen" style="display: none;">Respuesta</th>
						</tr>
					</thead>
					<!--LA COMIDA VA AQUÍ-->
					<form name="formUpdateQuestionBank" method="post" action="Actions/actionAddQuestion.php">
					</form>
					<!--LA COMIDA VA AQUÍ-->
					<tbody>
						<?php
							//This php is to get all the questions already added to DB
							if(isset($_POST["buttonSubtmit"])){
								$connect = mysql_connect("localhost","root","dwarfest");
								if(!$connect){
									die(mysql_error());
								}
								mysql_select_db("sgaep");
								//Stock this variables to add the info to the database
								$_SESSION["vcSubjectChecked"] = $_POST["formConsultSubjectToCheck"];
								$_SESSION["intSubjectSemesterCheked"] = $_POST["formConsultSubjectSemester"];
								$_SESSION["vcIdSubject"] = $_SESSION["vcRFC"].$_SESSION["vcSubjectChecked"].$_SESSION["intSubjectSemesterCheked"];
								$results = mysql_query("SELECT * FROM tableQuestions WHERE vcRFC='".$_SESSION["vcRFC"]."' AND vcIdSubject='".$_SESSION["vcRFC"].$_POST["formConsultSubjectToCheck"].$_POST["formConsultSubjectSemester"]."'");
								while ($row = mysql_fetch_array($results)) {
						?>
						<tr>
							<td><?php echo $row["intParcial"]?></td>
							<td><?php echo $row["ltQuestion"]?></td>
							<td>
								<?php
									if($row["bAnswer"]==1){
										echo "Verdadero";
									}else{
										echo "Falso";
									}
								?>
							</td>
						</tr>
						<?php
								}
							}
						?>
						<tr>
							<td>
								<select name="formUpdateQuestionBankPartial" id="formUpdateQuestionBankPartial" >
									<option value="1">1er</option>
									<option value="2">2do</option>
								</select>
							</td>
							<td><input type="text" name="formUpdateQuestionBankQuestion" id="formUpdateQuestionBankQuestion" required="required"></td> <!--Textbox new answer-->
							<td>
								<select class="selectQuestionType" name="selectQuestionType" onchange="showQuestionType(this.value)">
									<option value="test">test</option>
									<option value="">Seleccione Opción</option>
									<option value="booleanQuestion">Verdadero o Falso</option>
									<option value="multipleOptions">Opción Múltiple</option>
									<option value="openQuestion">Pregunta Abierta</option>
								</select>
							</td>
							<!--Hidding-->
							<td>
								<!--Hidden Inputs for Answers-->
								<div class="hideTypeBoolean" id="hideTypeBoolean" style="display: none;">
									<select name="formUpdateQuestionBankAnswer" id="formUpdateQuestionBankAnswer" >
										<option value="1">Verdadero</option>
										<option value="0">Falso</option>
									</select>
								</div>
								<div class="hideTypeOpen" id="hideTypeOpen" style="display: none;">
									<input type="text" name="textInputOpen">
								</div>
								<!--Hidden Inputs for Answers-->
							</td>
							<td>
								<!--Hidden Buttons for Answers-->
								<div class="hideTypeBooleanButton" id="hideTypeBooleanButton" style="display: none;">
									<input type="submit" value="Enviar Pregunta">
								</div>
								<div class="hideTypeOpenButton" id="hideTypeOpenButton" style="display: none;">
									<input type="submit" value="Enviar Pregunta">
								</div>
								<!--Hidden Buttons for Answers-->
							</td>
						</tr>
					</tbody>
				</table><br/>
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
