<?php
	session_start();
	$_SESSION["vcRFC"] = $_POST["userLogin"];
	$_SESSION["vcPasswd"] = $_POST["passwdLogin"];
	$link = mysql_connect('localhost', 'root', 'dwarfest')
    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');
	$sql="SELECT * FROM tableUsers WHERE vcRFC='".$_SESSION["vcRFC"]."' and vcPasswd='".$_SESSION["vcPasswd"]."'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count==1){
		$resultado = mysql_query("SELECT * FROM tableUsers WHERE vcRFC='".$_SESSION["vcRFC"]."'");
		$fila = mysql_fetch_row($resultado);
		echo $fila[1];
		$_SESSION["vcName"] = $fila[1];
		$_SESSION["vcApellidos"] = $fila[2];
		$_SESSION["vcCareer"] = $fila[4];
		$_SESSION["intTurn"] = $fila[5];
		$_SESSION["bType"] = $fila[6];
		echo $_SESSION["bType"];
		if($_SESSION["bType"] == 0){
			session_start();
			header("Location: admin.php");
		}else{
			session_start();
			header("Location: home.php");
			}
	}else{
		header("Location:../index.php");
	}


?>
