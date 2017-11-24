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
	$sql="INSERT INTO tableQuestions (vcRFC,vcIdSubject,vcIdQuestion,intParcial) VALUES ('".$_SESSION["vcRFC"]."','".$_POST["textBooleanInputSubjectID"]."','".$_POST["textBooleanInputQuestionID"]."','".$_POST["formUpdateQuestionBankPartial"]."')";
	$sql2="INSERT INTO tableBooleanQuestions (vcIdQuestion,intParcial,ltQuestion,boolAnswer) VALUES ('".$_POST["textBooleanInputQuestionID"]."','".$_POST["formUpdateQuestionBankPartial"]."','".$_POST['formUpdateBooleanQuestionBankQuestion']."','".$_POST['formUpdateBooleanQuestionBankAnswer']."')";
	//echo($sql2);
	//echo($sql);
	mysql_query($sql);
	mysql_query($sql2);
	//RESEND TO THE PAGE
	header("Location: /SGAEP/php/updateBank.php")
?>
