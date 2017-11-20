<?php
	$link = mysql_connect('localhost', 'root', 'dwarfest')
    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');

	if(!empty($_POST['checkboxDeleteUser'])){
    	foreach($_POST['checkboxDeleteUser'] as $vcRFC){
    		$sql="DELETE FROM tableUsers WHERE vcRFC='".$vcRFC."'";
    		mysql_query($sql);
    	}
    }
    header("Location: ../php/deleteUsers.php");

?>
