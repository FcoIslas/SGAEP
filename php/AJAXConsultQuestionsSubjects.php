<?php
  $q = $_GET['q'];
  $con = mysql_connect("localhost","root","dwarfest");
  if (!$con) {
      die(mysql_error());
  }
  mysql_select_db("sgaep");
  //get the data of the subject
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
  //get the data of the subject
  echo "<h3>Preguntas Verdadero/Falso</h3>";
  echo "<table>";
  echo "<tr><th>intParcial</th><th>ltQuestion</th><th>boolAnswer</th></tr>";
  if (!$con) {
      die(mysql_error());
  }
  mysql_select_db("sgaep");
  //get the data of the subject
  echo "SELECT intParcial,ltQuestion,boolAnswer FROM tableBooleanQuestions JOIN tableQuestions ON tableQuestions.vcIdQuestion = tableBooleanQuestions.vcIdQuestion WHERE tableQuestions.vcIdQuestion = '".$q."'";
  $result2 = mysql_query("SELECT intParcial,ltQuestion,boolAnswer FROM tableBooleanQuestions JOIN tableQuestions ON tableQuestions.vcIdQuestion = tableBooleanQuestions.vcIdQuestion WHERE tableQuestions.vcIdQuestion = '".$q."'");
  while ($row = mysql_fetch_array($result2)) {
    echo "<tr><td><input type='text' value='".$row['intParcial']."' readonly/></td>";
    echo "<td><input type='text' value='".$row['ltQuestion']."' readonly/></td>";
    if ($row['boolAnser'] == 1){
      $booleanAnswer = 'Verdad';
    }else{
      $booleanAnswer = 'Falso';
    }
    echo "<td><input type='text' value='".$booleanAnswer."' readonly/></td></tr>";

  }
  echo "</table>";
  //get the questions of the subject
  //get the questions of the subject

?>
