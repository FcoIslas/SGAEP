<?php
	//CONNECT TO DE DATABASE
	session_start();
	$link = mysql_connect('localhost', 'root', 'dwarfest')
    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');

	//counter
	echo $index;
	if(isset($_POST["buttonSubtmit"])){
		$connect = mysql_connect("localhost","root","dwarfest");
		if(!$connect){
			die(mysql_error());
		}	
		mysql_select_db("sgaep");
		$results = mysql_query("SELECT * FROM tableQuestions");
		while ($row = mysql_fetch_array($results)) {
			$index = $row["bintQuestionIndex"];
		}
	}
	$index++;
	$sql="INSERT INTO tableQuestions (bintQuestionIndex,vcRFC,vcIdSubject,vcIdQuestion,ltQuestion,bAnswer,intParcial) VALUES (".$index.",'".$_SESSION["vcRFC"]."','".$_SESSION["vcIdSubject"]."','".$_SESSION["vcIdSubject"].$index."','".$_POST["formUpdateQuestionBankQuestion"]."',".$_POST["formUpdateQuestionBankAnswer"].",".$_POST["formUpdateQuestionBankPartial"].")";
	mysql_query($sql);
	//RESEND TO THE PAGE
	header("Location: /SGAEP/updateBank.php")
?>
