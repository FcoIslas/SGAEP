<?php
	//CONNECT TO DE DATABASE
	session_start();
	$link = mysql_connect('localhost', 'root', 'dwarfest')
    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');

	if(isset($_POST["buttonSubmitOpenQuestion"])){
		$connect = mysql_connect("localhost","root","dwarfest");
		if(!$connect){
			die(mysql_error());
		}
		mysql_select_db("sgaep");
	}
	$sql="INSERT INTO tableQuestions (vcRFC,vcIdSubject,vcIdQuestion) VALUES ('".$_SESSION["vcRFC"]."','".$_POST["textInputSubjectID"]."','".$_POST["textInputQuestionID"]."')";
	mysql_query($sql);
	//RESEND TO THE PAGE
	header("Location: /SGAEP/php/updateBank.php")
?>