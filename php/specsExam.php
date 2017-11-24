<?php
  //Main Section
  #The objective is to create the questions for the Examen
  ##
  #Functions are added below

  //Main Section
  $vcIdSubject = $_POST['inputCreateExameIdSubject'];
  $topNumber = getMaxValueQuestions();
  printTableQuestionsNumbers($vcIdSubject);
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
    $result2 = mysql_query("SELECT bintQuestionIndex  FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."'");
    while ($row = mysql_fetch_array($result2)) {
      $arrQuestionNumbers[] = $row["bintQuestionIndex"];
    }
    $arrLength = count($arrQuestionNumbers);
    while ($arrLength > 0) {
      $randNumber = (array_rand($arrQuestionNumbers,1));
      echo "<br>";
      $questionNumber = $arrQuestionNumbers[$randNumber];
      printTableQuestions($vcIdSubject,$questionNumber);
      $arrLength--;
      unset($arrQuestionNumbers[$randNumber]);
    }
  }

  function printTableQuestions($vcIdSubject,$topNumber){
    //Print all the questions from tableQuestions with the same vcIdSubject
    connectSql();
    $result2 = mysql_query("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' and bintQuestionIndex = '".$topNumber."'");
    while ($row = mysql_fetch_array($result2)) {
      $questionToShow =  $row["vcIdQuestion"];
      echo "<table>";
      echo "<tr>";
      printBooleanQuestions($questionToShow);
      echo "</tr>";
      echo "<tr>";
      printOpenQuestions($questionToShow);
      echo "</tr>";
      echo "<tr>";
      printMultipleQuestions($questionToShow);
      echo "</tr>";
      echo "</table>";
    }
  }

  function printBooleanQuestions($vcIdQuestion){
    connectSql();
    //GET the boolean questions for the subject
    $result3 = mysql_query("SELECT * FROM tableBooleanQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    while ($row2 = mysql_fetch_array($result3)) {
      echo "<td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
      if ($row2["boolAnswer"] == 1) {
        echo "<td><input type='text' value='Verdadero' readonly/></td>";
      }else {
        echo "<td><input type='text' value='Falso' readonly/></td>";
      }
    }
  }

  function printOpenQuestions($vcIdQuestion){
    //GET the Open Questions for selected subject
      $result3 = mysql_query("SELECT * FROM tableOpenQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
      while ($row2 = mysql_fetch_array($result3)) {
        echo "<td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltAnswer"]."' readonly/></td>";
      }
  }

  function printMultipleQuestions($vcIdQuestion){
    //Get the Multiple questions for selected subject
      $result3 = mysql_query("SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
      while ($row2 = mysql_fetch_array($result3)) {
        echo "<td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
        echo "<tr><td><input type='text' value='".$row2["ltAnswerA"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltAnswerB"]."' readonly/></td></tr>";
        echo "<td><input type='text' value='".$row2["ltAnswerC"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltAnswerD"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["vcCorrectAnswer"]."' readonly/></td>";
      }
  }
?>
