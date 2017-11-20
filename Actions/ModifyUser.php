<?php
    $link = mysql_connect('localhost', 'root', 'dwarfest')
    or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('sgaep') or die('No se pudo seleccionar la base de datos');
    $sqlDelete="DELETE FROM tableUsers WHERE vcRFC='".$_POST["formModifyUserRFC"]."'";
    echo "<h1>".$sqlDelete."</h1>";
    mysql_query($sqlDelete);
    $sql2="INSERT INTO tableUsers (vcRFC,vcName,vcApellidos,vcPasswd,vcCareer,intTurn,bType) VALUES ('".$_POST["formModifyUserRFC"]."','".$_POST["formModifyUserName"]."','".$_POST["formModifyUserLastName"]."','".$_POST["formModifyUserPasswd"]."','".$_POST["formAddUserCareer"]."',".$_POST["formAddUserTurn"].",1)";
    mysql_query($sql2);
    header("Location: ../php/modifyUser.php")
?>

