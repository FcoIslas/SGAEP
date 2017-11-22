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
	$sql="INSERT INTO tableQuestions (vcRFC,vcIdSubject,vcIdQuestion) VALUES ('".$_SESSION["vcRFC"]."','".$_POST["textMultipleInputSubjectID"]."','".$_POST["textMultipleInputQuestionID"]."')";
	$sql2="INSERT INTO tableMultipleQuestions (vcIdQuestion,intParcial,ltQuestion) VALUES ('".$_POST["textMultipleInputQuestionID"]."','".$_POST["formUpdateMultipleQuestionBankPartial"]."','".$_POST['formUpdateMultipleQuestionBankQuestion']."')";
	$sql3="UPDATE tableMultipleQuestions SET ltAnswerA = '".$_POST["inputTextMultipleOptionA"]."', ltAnswerB = '".$_POST["inputTextMultipleOptionB"]."', ltAnswerC = '".$_POST["inputTextMultipleOptionC"]."', ltAnswerD = '".$_POST["inputTextMultipleOptionD"]."', vcCorrectAnswer = '".$_POST["radioCorrectAnswer"]."' WHERE vcIdQuestion = '".$_POST[textMultipleInputQuestionID]."'";
	mysql_query($sql);
	mysql_query($sql2);
	mysql_query($sql3);
	//RESEND TO THE PAGE
	header("Location: /SGAEP/php/updateBank.php")
?>
