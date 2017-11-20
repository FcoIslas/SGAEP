<?php
	$link = mysql_connect('localhost', 'root', 'dwarfest')
    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');
	$sql="INSERT INTO tableUsers (vcRFC,vcName,vcApellidos,vcPasswd,vcCareer,intTurn,bType) VALUES ('".$_POST["formAddUserRFC"]."','".$_POST["formAddUserName"]."','".$_POST["formAddUserLastName"]."','".$_POST["formAddUserPasswd"]."','".$_POST["formAddUserCareer"]."','".$_POST["formAddUserTurn"]."','".$_POST["formAddUserType"]."')";
	echo "<h1>".$sql."</h1>";
	mysql_query($sql);
	header("Location: ../php/addUser.php")
?>
