<?php
	session_start();
	$link = mysql_connect('localhost', 'root', 'dwarfest')
    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');
	$sql="INSERT INTO tableSubjects (vcIdSubject,vcRFC,vcSubjectName,vcSubjectCareer,intTurn,intSemester) VALUES ('".$_SESSION["vcRFC"].$_POST["inputSubjectNameID"].$_POST["formAddSubjectSemester"]."','".$_SESSION["vcRFC"]."','".$_POST["formAddSubjectName"]."','".$_POST["formAddSubjectCareer"]."','".$_POST["formAddSubjectTurn"]."','".$_POST["formAddSubjectSemester"]."')";
	//echo "<h1>".$sql."</h1>";
	mysql_query($sql);
	header("Location: ../php/createBank.php")
?>
