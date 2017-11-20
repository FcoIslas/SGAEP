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
			<div id="moduleConsultSubject">
				<form name="formConsultSubject" id="formConsultSubject" class="formConsultSubject" method="post" action="">
					<table>
						<td><th>Datos</th></td>
						<tr>
							<td><label>Materia</label></td>
							<td>
								<select name="formConsultSubjectToCheck" onchange="showUser(this.value)">
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
						<tr>
								<td>
									<!--AJAX Section, get the values of the Subject-->

									<!--AJAX Section, get the values of the Subject-->
								</td>
						</tr>
						<tr hidden="hidden"><td><label>UserType</label></td><td><input type="number" name="formConsultSubjectType" value="1"></td></tr>
					</table><br/>
					<div id="txtHint" class="">

					</div>
				</form><br/>
			</div>
			<div id="moduleConsultSubjectQuestions">
				<table id="tableDeleteUsers">
						<thead>
							<tr>
								<th>Parcial</th>
								<th>Pregunta</th>
								<th>Respuesta</th>
							</tr>
						</thead>
						<tbody>
							<?php
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
									//echo "<h1>Hola ".$_SESSION["vcIdSubject"]."</h1>Hola ";
									//stock this variables to add the info to the database
									//Show the subject that we are modifying
									/*$results2 = mysql_query("SELECT * FROM tableUsers WHERE vcIdSubject='".$_SESSION["vcIdSubject"]."'");
									while($row2 = mysql_fetch_array($results2)){
										echo "Materia: ".$row2["vcSubjectName"]."<br/>";
										echo "Carrera: ".$row2["vcSubjectCareer"]."<br/>";
										if ($row2["intTurn"]=='') {
											echo "Turno: <br/>";
										}elseif ($row2["intTurn"]=='1') {
											echo "Turno: Matutino<br/>";
										}else{
											echo "Turno: Vespertino<br/>";
										}
										echo "Semestre: ".$row2["intSemester"]."<br/>";
										}*/
									//Show the subject that we are modifying
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
								<form name="formUpdateQuestionBank" method="post" action="Actions/actionAddQuestion.php">
									<td>
										<select name="formUpdateQuestionBankPartial" id="formUpdateQuestionBankPartial" >
											<option value="1">1ero</option>
											<option value="2">2do</option>
										</select>
									</td>
									<td><input type="text" name="formUpdateQuestionBankQuestion" id="formUpdateQuestionBankQuestion" required="required"></td> <!--Textbox new answer-->
									<td>
										<select name="formUpdateQuestionBankAnswer" id="formUpdateQuestionBankAnswer" >
											<option>
												<option value="1">Verdadero</option>
												<option value="0">Falso</option>
											</option>
										</select>
									</td>
									<td>
										<input type="submit">
									</td>
								</form>
							</tr>
						</tbody>
					</table><br/>
			</div>
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
