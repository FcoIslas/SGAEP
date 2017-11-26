<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  //Main Section
  #The objective is to create the questions for the Examen
  ##
  #Functions are added below

  //Main Section
  $secondArray = array();
  $mixedArrayVcIdQuestion = array();
  $vcIdSubject = $_POST['inputCreateExameIdSubject'];
  $selectPartialNumber = $_POST['selectPartialNumber'];
  $topNumber = getMaxValueQuestions();
  $specIdMix = 'vcIdQuestion'; //Request get mixed vcIdQuestions for subject
  $mixedArrayVcIdQuestion = getMixedArray($vcIdSubject,$selectPartialNumber,$specIdMix);
  $numberRegistered = count($mixedArrayVcIdQuestion);
  echo"<table>";
  echo"<thead>
        <th>Pregunta</th>
        <th>Respuesta</th>
      </thead>";
  for ($i=0; $i < 10 ; $i++) {
    //echo "<br>".$mixedArrayVcIdQuestion[$i];
    printOpenQuestions($mixedArrayVcIdQuestion[$i]);
    printBooleanQuestions($mixedArrayVcIdQuestion[$i]);
    printMultipleQuestions($mixedArrayVcIdQuestion[$i]);
  }
  echo"</table>";
  //$varPrueba = printTableQuestionsNumbers($vcIdSubject,$selectPartialNumber);
  //printTableQuestionsRandomId($varPrueba);
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
  function getMixedArray($vcIdSubject,$selectPartialNumber,$specIdMix){
    //get question number or id mixed from DB
    connectSql();
    $arrIdMixed = array();
    $arrDataToMix = array();
    $result2 = mysql_query("SELECT ".$specIdMix."  FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' AND intParcial = '".$selectPartialNumber."'");
    while ($row = mysql_fetch_array($result2)) {
      $arrDataToMix[] = $row[$specIdMix];
    }
    $arrLength = count($arrDataToMix);
    //echo "<h1>".$arrLength."</h1>";
    while ($arrLength > 0) {
      $randId= (array_rand($arrDataToMix,1));
      $questionId = $arrDataToMix[$randId];
      //echo "<br />".(string)$questionId;
      $arrIdMixed[] = $questionId;
      $arrLength--;
      unset($arrDataToMix[$randId]);
    }
    return ($arrIdMixed);
  }
  /*function printTableQuestionsNumbers($vcIdSubject,$selectPartialNumber){
    //Print all the questions from tableQuestions with the same vcIdSubject & Parcial
    //Im thinking on delete this function
    connectSql();
    $arrQuestionNumbers = array();
    //$arrMixedQuestionIds = array();
    $result2 = mysql_query("SELECT bintQuestionIndex, vcIdQuestion  FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' LIMIT 10");
    echo ("SELECT bintQuestionIndex, vcIdQuestion  FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' LIMIT 10");
    while ($row = mysql_fetch_array($result2)) {
      $arrQuestionNumbers[] = $row["bintQuestionIndex"];
      //$arrMixedQuestionIds[] = $row["vcIdQuestion"];
    }
    //echo count($arrMixedQuestionIds);
    $arrLength = count($arrQuestionNumbers);
    while ($arrLength > 0) {
      $randNumber = (array_rand($arrQuestionNumbers,1));
      $questionNumber = $arrQuestionNumbers[$randNumber];
      //editing this code
      //printTableQuestions($vcIdSubject,$questionNumber,$selectPartialNumber);
      //printForTableQuestions($vcIdSubject,$questionNumber,$selectPartialNumber);
      //editing this code
      echo "<br>".$questionNumber;
      $arrLength--;
      unset($arrQuestionNumbers[$randNumber]);
    }
    //return $arrMixedQuestionIds;
  }*/
  function printTableQuestionsRandomId($arrQuestionNumbers){
    $arrQuestionIDs = array();
    $registersNumber = count($arrQuestionIDs);
    echo "<h1> Aquí ".$registersNumber." ando</h1>";
    //Print all the questions from tableQuestions with the same vcIdSubject
    //connectSql();
    /*$arrQuestionNumbers = array();
    $arrMixedQuestionIds = array();
    $result2 = mysql_query("SELECT bintQuestionIndex  FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' LIMIT 10");
    while ($row = mysql_fetch_array($result2)) {
      $arrQuestionNumbers[] = $row["bintQuestionIndex"];
      //$arrMixedQuestionIds[] = $row["vcIdQuestion"];
    }
    //echo count($arrMixedQuestionIds);
    $arrLength = count($arrQuestionNumbers);
    while ($arrLength > 0) {
      $randNumber = (array_rand($arrQuestionNumbers,1));
      echo "<br>";
      $questionNumber = $arrQuestionNumbers[$randNumber];
      //editing this code
      //printTableQuestions($vcIdSubject,$questionNumber,$selectPartialNumber);
      //printForTableQuestions($vcIdSubject,$questionNumber,$selectPartialNumber);
      //editing this code
      $arrLength--;
      unset($arrQuestionNumbers[$randNumber]);
    }*/
  }
  function printForTableQuestions($vcIdSubject,$topNumber,$selectPartialNumber){
    //Print exam with function for
    $arrQuestionIDs = array();
    $result2 = mysql_query("SELECT vcIdQuestion  FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' AND intParcial = '".$selectPartialNumber."' LIMIT 10");
    while ($row = mysql_fetch_array($result2)) {
      $arrQuestionIDs[] = $row["vcIdQuestion"];
    }
    $counterArray = count($arrQuestionIDs);
    for ($i=0; $i < $counterArray ; $i++) {
      $questionToShow = $arrQuestionIDs[$i];
      echo "<table>";
      echo "<tr>";
      printBooleanQuestions($questionToShow,$selectPartialNumber);
      echo "</tr>";
      echo "<tr>";
      printOpenQuestions($questionToShow,$selectPartialNumber);
      echo "</tr>";
      echo "<tr>";
      printMultipleQuestions($questionToShow,$selectPartialNumber);
      echo "</tr>";
      echo "</table>";
      echo "<br />";
    }
  }
  function printTableQuestions($vcIdSubject,$topNumber,$selectPartialNumber){
    //Print all the questions from tableQuestions with the same vcIdSubject
    connectSql();
    $result2 = mysql_query("SELECT vcIdQuestion FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' and bintQuestionIndex = '".$topNumber."'");
    //echo ("SELECT * FROM tableQuestions WHERE vcIdSubject = '".$vcIdSubject."' and bintQuestionIndex = '".$topNumber."'");
    while ($row = mysql_fetch_array($result2)) {
      $questionToShow = $row["vcIdQuestion"];
      echo "<table>";
      echo "<tr>";
      printBooleanQuestions($questionToShow,$selectPartialNumber);
      echo "</tr>";
      echo "<tr>";
      printOpenQuestions($questionToShow,$selectPartialNumber);
      echo "</tr>";
      echo "<tr>";
      printMultipleQuestions($questionToShow,$selectPartialNumber);
      echo "</tr>";
      echo "</table>";
    }
  }
  function printBooleanQuestions($vcIdQuestion){
    connectSql();
    //GET the boolean questions for the subject
    //echo("SELECT * FROM tableBooleanQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'");
    $result3 = mysql_query("SELECT intParcial,ltQuestion,boolAnswer FROM tableBooleanQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    //echo ("SELECT * FROM tableBooleanQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'");
    while ($row2 = mysql_fetch_array($result3)) {
      //echo "<tr><td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
      if ($row2["boolAnswer"] == 1) {
        echo "<td>
                <input type='radio' value='Verdadero' checked='checked' readonly/>Verdadero
                <input type='radio' value='Falso' readonly/>Falso
              </td></tr>";
      }else {
        echo "<td>
                <input type='radio' value='Verdadero' readonly/>Verdadero
                <input type='radio' value='Falso' checked='checked' readonly/>Falso
              </td></tr>";
      }
    }
  }
  function printOpenQuestions($vcIdQuestion){
    //GET the Open Questions for selected subject
      $result3 = mysql_query("SELECT intParcial,ltQuestion,ltAnswer FROM tableOpenQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
      while ($row2 = mysql_fetch_array($result3)) {
        //echo "<tr><td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltAnswer"]."' readonly/></td></tr>";
      }
  }
  function printMultipleQuestions($vcIdQuestion){
    //Get the Multiple questions for selected subject
      //echo "SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'";
      $result3 = mysql_query("SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
      //echo "SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'";
      while ($row2 = mysql_fetch_array($result3)) {
        //echo "<tr><td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td></tr>";
        echo "<tr><td>A)<input type='text' value='".$row2["ltAnswerA"]."' readonly/></td>";
        echo "<td>B)<input type='text' value='".$row2["ltAnswerB"]."' readonly/></td></tr>";
        echo "<tr><td>C)<input type='text' value='".$row2["ltAnswerC"]."' readonly/></td>";
        echo "<td>D)<input type='text' value='".$row2["ltAnswerD"]."' readonly/></td>";
        echo "<td><input type='text' value='".$row2["vcCorrectAnswer"]."' readonly/></td></tr>";
      }
  }
?>
