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
			<div id="moduleConsultSubject">
				<form name="formConsultSubject" id="formConsultSubject" class="formConsultSubject" method="post" action="">
					<table>
						<td><th>Datos</th></td>


						<tr>
							<td><label>Materia</label></td>
							<td>
								<select name="formConsultSubjectToCheck">
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


						<tr><td><label>Carrera</label></td><td><select name="formConsultSubjectCareer"><option value="Informática">Informática</option><option value="ITSE">ITSE</option><option value="IME">IME</option></select></td></tr>
						<tr><td><label>Turno</label></td><td><select name="formConsultSubjectTurn"><option value="1">Matutino</option><option value="2">Vespertino</option><option value="3">Mixto</option></select></td></tr>
						<tr>
							<td><label>Semestre</label></td>
							<td><select name="formConsultSubjectSemester">
									<option value="1">1°</option>
									<option value="2">2°</option>
									<option value="3">3°</option>
									<option value="4">4°</option>
									<option value="5">5°</option>
									<option value="6">6°</option>
									<option value="7">7°</option>
									<option value="8">8°</option>
									<option value="9">9°</option>
									</select>
							</td>
						</tr>
						<tr hidden="hidden"><td><label>UserType</label></td><td><input type="number" name="formConsultSubjectType" value="1"></td></tr>
					</table><br/>
					<input type="submit" value="Consultar Materia" name="buttonSubtmit">
					<input type="reset" value="Limpiar">
				</form>
			</div>
			<div id="moduleConsultSubjectQuestions">
				<table id="tableDeleteUsers">
						<thead>
							<tr>
								<th>No. de Parcial</th>
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
									//$results = "SELECT * FROM tableQuestions WHERE vcRFC='".$_SESSION["vcRFC"]."' AND vcIdSubject='".$_SESSION["vcRFC"].$_POST["formConsultSubjectToCheck"].$_POST["formConsultSubjectSemester"]."'";
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
										}
									?>
								</td>
							</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table><br/>
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
			<p>Última actualización: 11/12/2017</p>
		</footer>
	</body>
</html>

