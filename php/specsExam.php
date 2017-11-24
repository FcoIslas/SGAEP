<?php
  //Main Section
  #The objective is to create the questions for the Examen
  ##
  #Functions are added below

  $vcIdSubject = $_POST['inputCreateExameIdSubject'];
  echo $vcIdSubject."<br>";
  $topNumber = getMaxValueQuestions();
  printTableQuestionsNumbers($vcIdSubject);
  /*for ($binQuestionNumber=0; $binQuestionNumber <= 9 ; $binQuestionNumber++) {
    echo "<br>";
    $questionToShow = (rand(1,$topNumber));
    printTableQuestions($vcIdSubject,$questionToShow);
  }
  echo $topNumber;
  printBooleanQuestions($vcIdSubject);
  printOpenQuestions($vcIdSubject);
  printMultipleQuestions($vcIdSubject);*/

  //Main section

  function connectSql(){
    //Objective: Connect one to the database sgaep
    $con = mysql_connect("localhost","root","dwarfest");
    if (!$con) {
        die(mysql_error());
    }
    mysql_select_db("sgaep");
  }

  function getMaxValueQuestions(){
    //Objective: Get the max value in the bintQuestionIndex in tableQuestions
    connectSql();
    $result = mysql_query("SELECT MAX(bintQuestionIndex) FROM tableQuestions");
    $row = mysql_fetch_row($result);
    $highest_id = $row[0];
    return $highest_id;
  }

  function printTableQuestionsNumbers($vcIdSubject){
    //Print all the questions from tableQuestions with the same vcIdSubject
    connectSql();
    $arrQuestionNumbers = array();
    echo "SELECT bintQuestionIndex FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."'";
    $result2 = mysql_query("SELECT bintQuestionIndex  FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."'");
    while ($row = mysql_fetch_array($result2)) {
      echo "<br>";
      $arrQuestionNumbers[] = $row["bintQuestionIndex"];
    }
    $arrLength = count($arrQuestionNumbers);
    while ($arrLength > 0) {
      $randNumber = (array_rand($arrQuestionNumbers,1));
      echo "<br>";
      echo $arrQuestionNumbers[$randNumber];
      $arrLength--;
      unset($arrQuestionNumbers[$randNumber]);
    }
  }

  function printTableQuestions($vcIdSubject,$topNumber){
    //Print all the questions from tableQuestions with the same vcIdSubject
    connectSql();
    echo "<h3>Tabla Preguntas</h3>";
    echo "<table>";
    echo "<tr>
            <th>Parcial</th>
            <th>Pregunta</th>
            <th>Respuesta Correcta</th>
          </tr>";
    echo "SELECT * FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' and bintQuestionIndex = '".$topNumber."'";
    $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' and bintQuestionIndex = '".$topNumber."'");
    while ($row = mysql_fetch_array($result2)) {
      echo "<tr><td><input type='text' value='".$row["bintQuestionIndex"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row["vcRFC"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row["vcIdSubject"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row["vcIdQuestion"]."' readonly/></td></tr>";
    }
    echo "</table>";
  }

  function printBooleanQuestions($vcIdSubject){
    connectSql();
    //GET the boolean questions for the subject
    echo "<h3>Preguntas Verdadero/Falso</h3>";
    echo "<table>";
    echo "<tr><th>Parcial</th><th>Pregunta</th><th>Respuesta Correcta</th></tr>";
    $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."'");
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
  }

  function printOpenQuestions($vcIdSubject){
    //GET the Open Questions for selected subject
    echo "<br><br>";
    echo "<h3>Preguntas Abiertas</h3>";
    echo "<table>";
    echo "<tr><th>Parcial</th><th>Pregunta</th><th>Respuesta Correcta</th></tr>";
    $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."'");
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
  }

  function printMultipleQuestions($vcIdSubject){
    //Get the Multiple questions for selected subject
    connectSql();
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
    $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."'");
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
  }
?>
