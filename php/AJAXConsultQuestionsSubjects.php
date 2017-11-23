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


  //GET the boolean questions for the subject
  echo "<h3>Preguntas Verdadero/Falso</h3>";
  echo "<table>";
  echo "<tr><th>Parcial</th><th>Pregunta</th><th>Respuesta Correcta</th></tr>";
  if (!$con) {
      die(mysql_error());
  }
  mysql_select_db("sgaep");
  //get the data of the subject
  $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$q."'");
  while ($row = mysql_fetch_array($result2)) {
    $result3 = mysql_query("SELECT * FROM tableBooleanQuestions WHERE vcIdQuestion = '".$row['vcIdQuestion']."'");
    while ($row2 = mysql_fetch_array($result3)) {
      echo "<td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
      if ($row2["boolAnswer"] == 1) {
        echo "<td><input type='text' value='Verdadero' readonly/></td>";
      }else {
        echo "<td><input type='text' value='Falso' readonly/></td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
  //GET the booblean questions for selected Subject

  //GET the Open Questions for selected subject
  echo "<br><br>";
  echo "<h3>Preguntas Abiertas</h3>";
  echo "<table>";
  echo "<tr><th>Parcial</th><th>Pregunta</th><th>Respuesta Correcta</th></tr>";
  if (!$con) {
      die(mysql_error());
  }
  mysql_select_db("sgaep");
  //get the data of the subject
  $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$q."'");
  while ($row = mysql_fetch_array($result2)) {
    $result3 = mysql_query("SELECT * FROM tableOpenQuestions WHERE vcIdQuestion = '".$row['vcIdQuestion']."'");
    while ($row2 = mysql_fetch_array($result3)) {
      echo "<td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltAnswer"]."' readonly/></td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  //GET the Open Questions for selected subject

  //Get the Multiple questions for selected subject
  echo "<br><br>";
  echo "<h3>Preguntas Opción Múltiple</h3>";
  echo "<table>";
  echo "<tr>
          <th>Parcial</th>
          <th>Pregunta</th>
          <th>Opción A</th>
          <th>Opción B</th>
          <th>Opción C</th>
          <th>Opción D</th>
          <th>Respuesta Correcta</th>
          </tr>";
  if (!$con) {
      die(mysql_error());
  }
  mysql_select_db("sgaep");
  //get the data of the subject
  $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$q."'");
  while ($row = mysql_fetch_array($result2)) {
    $result3 = mysql_query("SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$row['vcIdQuestion']."'");
    while ($row2 = mysql_fetch_array($result3)) {
      echo "<td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltAnswerA"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltAnswerB"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltAnswerC"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltAnswerD"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["vcCorrectAnswer"]."' readonly/></td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  //Get the Multiple questions for selected subject

  //get the questions of the subject

?>
