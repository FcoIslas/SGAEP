<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema Generador Aleatorio de Exámenes Parciales</title>
		<link rel="stylesheet" type="text/css" href="style2.css"/>
	</head>
	<body>
		<header>
			<div id="dHeader">
				<img src="Images/logo2.png" alt="unam.png"/>
			</div>
			<nav>
				<div id="dnav">
					<label>Nombre:_______________________________________________________________________</label>
					<label>Grupo:____________   Fecha:_____________ </label>
				</div>
			</nav>
		</header>
		<section>
			<div>
					<form id="formInsertQuestions">
						<table>
							<tr>
								<th>Pregunta</th>
								<th>Respuesta</th>
							</tr>
						<?php
							//ACCESS TO DATABASE
							$_SESSION["vcIdSubject"] = $_SESSION["vcRFC"].$_POST["formCreateExamSubject"].$_POST["formCreateExamSemester"];
							//echo $_SESSION["vcIdSubject"];
							$link = mysql_connect('localhost', 'root', 'dwarfest')
    						or die('No se pudo conectar: ' . mysql_error());
							mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');
							//READ DATABASE

							$results = mysql_query("SELECT * FROM tableQuestions WHERE vcRFC='".$_SESSION["vcRFC"]."' AND vcIdSubject='".$_SESSION["vcIdSubject"]."'");

							//echo "SELECT * FROM tableSubjects WHERE vcRFC='".$_SESSION["vcRFC"]."' AND vcIdSubject='".$_SESSION["vcIdSubject"]."'";
							
							while ($row = mysql_fetch_array($results)) {
						?>
							<tr>
								<td>
									<?php echo $row["ltQuestion"]?>
								</td>
								<td>
									<?php 
										echo "<input type='radio' name=''><label>Verdadero</label>";
										echo "<input type='radio' name=''><label>Falso</label>";
									?>
								</td>
							</tr>
						<?php		
							}
						?>
						</table>
					</form>
			</div>
		</section>
	</body>
</html>

