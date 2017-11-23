<?php
  $q = $_GET['q'];
  $con = mysql_connect("localhost","root","dwarfest");
  if (!$con) {
      die(mysql_error());
  }
  mysql_select_db("sgaep");
  $result = mysql_query("SELECT * FROM tableSubjects WHERE vcIdSubject = '".$q."'");
  while ($row = mysql_fetch_array($result)) {
    switch ($row['intTurn']) {
      case 1:
        $row['intTurn'] = "Matutino";
        break;
      case 2:
        $row['intTurn'] = "Vespertino";
        break;
      case 3:
          $row['intTurn'] = "Mixto";
          break;

      default:
        $row['intTurn'] = "ERROR Turno";
        break;
    }
    echo "<table>";
    echo "<tr><td>Carrera</td><td><input type='text' value=".$row['vcSubjectCareer']." readonly/></td></tr>";
    echo "<tr><td>Turno</td><td><input type='text' value=".$row['intTurn']." readonly/></td></tr>";
    echo "<tr><td>Semestre</td><td><input type='text' value=".$row['intSemester']." readonly/></td></tr>";
    echo "</table>";
  }
?>
