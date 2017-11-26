<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  //Main Section
  #The objective is to create the questions for the Examen
  ##
  #Functions are added below

  //Main Section
  //Variables to start program
  $vcIdSubject = $_POST['inputCreateExameIdSubject'];
  $selectPartialNumber = $_POST['selectPartialNumber'];
  $selectedNumerQuestions = $_POST['selectNumberQuestions'];
  $topNumber = getMaxValueQuestions();
  $specIdMix = 'vcIdQuestion'; //Request get mixed vcIdQuestions for subject
  $examHeader = printExamHeader();
  echo $examHeader;
  printTablesforPDF($vcIdSubject,$selectPartialNumber,$specIdMix,$selectedNumerQuestions);
  //Main section

  //Here start the functions
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

  function printForTableQuestions($vcIdSubject,$topNumber,$selectPartialNumber){
    //Print exam with function for this is the most important function
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

  function printTablesforPDF($vcIdSubject,$selectPartialNumber,$specIdMix,$selectedNumerQuestions){
    //this function was createt to send the content to a var to use it with FPDF
    //due the hard usage of it I deleted FPDF and leave this function
    $mixedArrayVcIdQuestion = array();
    $mixedArrayVcIdQuestion = getMixedArray($vcIdSubject,$selectPartialNumber,$specIdMix);
    $numberRegistered = count($mixedArrayVcIdQuestion);
    echo"<table>";
    echo"<thead>
          <th>Pregunta</th>
          <th></th>
          <th>Respuesta</th>
        </thead>";
    for ($i=0; $i < $selectedNumerQuestions ; $i++) {
      $examQuestionNumber = $i + 1;
      printOpenQuestions($mixedArrayVcIdQuestion[$i],$examQuestionNumber);
      printBooleanQuestions($mixedArrayVcIdQuestion[$i],$examQuestionNumber);
      printMultipleQuestions($mixedArrayVcIdQuestion[$i],$examQuestionNumber);
    }
    echo"</table>";
  }

  function printExamFooter(){
    $examFooter = "<div class='examFooter' name='examFooter' style='border:thin solid black; position: absoluteh; bottom: '0'; text-align: center;>
                    <p>Creado por SGAEP&#174; bajo la licencia GPLv3. SAITEC&#174; 2017</p>
                    </div>";
    return $examFooter;
  }

  function printExamHeader(){
    $examHeader = "<div class='logoUNAM' name='logoUNAM'>
                    <img src='../Images/logo2.png'>
                    <div class='examData' name='examData' style='border:thin solid black'>
                      <table class='dataCareer' name='dataCareer'>
                        <tr>
                          <td>Carrera</td>
                          <td><input type='text' value=''/></td>
                          <td>Asignatura</td>
                          <td width='50%'><input type='text' value=''/ size='50'></td>
                          <td>Parcial</td>
                          <td width='5%'><input type='text' value='' size='9'/></td>
                        </tr>
                      </table>
                      <table>
                        <tr>
                          <td>Nombre</td>
                          <td width='25%'><input type='text' value='' size='30'/></td>
                          <td>No. de Cuenta</td>
                          <td><input type='text' value=''/></td>
                          <td>Grupo</td>
                          <td width='5%'><input type='text' value='' size='10'/></td>
                          <td>Fecha</td>
                          <td width='5%'><input type='text' value='' size='6'/></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  </br></br>";
    return $examHeader;
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

  function printBooleanQuestions($vcIdQuestion,$examQuestionNumber){
    connectSql();
    //GET the boolean questions for the subject
    $result3 = mysql_query("SELECT intParcial,ltQuestion,boolAnswer FROM tableBooleanQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    while ($row2 = mysql_fetch_array($result3)) {
      if($row2 != ''){
        echo "<tr><td>".$examQuestionNumber.".-<input type='text' value='".$row2["ltQuestion"]."' readonly/></td><td></td>";
      }
      if ($row2["boolAnswer"] == 1) {
        echo "<td>
                <input type='radio' value='Verdadero' checked='checked' readonly/>Verdadero
                <input type='radio' value='Falso' readonly/>Falso
              </td></tr>";
      }else {
        echo "<td>
                <input type='radio' value='Verdadero' readonly/>Verdadero
                <input type='radio' value='Falso' checked='checked' readonly/>Falso
              </td></tr><tr><td></br></td></tr>";
      }
    }
  }

  function printOpenQuestions($vcIdQuestion,$examQuestionNumber){
    //GET the Open Questions for selected subject
    $result3 = mysql_query("SELECT intParcial,ltQuestion,ltAnswer FROM tableOpenQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    while ($row2 = mysql_fetch_array($result3)) {
      if($row2 != ''){
        echo "<tr><td>".$examQuestionNumber.".-<input type='text' value='".$row2["ltQuestion"]."' readonly/></td><td></td>";
      }
      //echo "<tr><td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      echo "<td><input type='text' value='".$row2["ltAnswer"]."' readonly/></td></tr></td></tr><tr><td></br></td></tr>";
    }
  }

  function printMultipleQuestions($vcIdQuestion,$examQuestionNumber){
    //Get the Multiple questions for selected subject
    //echo "SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'";
    $result3 = mysql_query("SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    //echo "SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'";
    while ($row2 = mysql_fetch_array($result3)) {
      if($row2 != ''){
        echo "<tr><td>".$examQuestionNumber.".-<input type='text' value='".$row2["ltQuestion"]."' readonly/></td><td></td>";
        //echo "<tr><td>".$examQuestionNumber.".-</td>";
      }
      //echo "<tr><td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      //echo "<td><input type='text' value='".$row2["ltQuestion"]."' readonly/></td></tr>";
      echo "<tr><td>A)<input type='text' value='".$row2["ltAnswerA"]."' readonly/></td>";
      echo "<td>B)<input type='text' value='".$row2["ltAnswerB"]."' readonly/></td></tr>";
      echo "<tr><td>C)<input type='text' value='".$row2["ltAnswerC"]."' readonly/></td>";
      echo "<td>D)<input type='text' value='".$row2["ltAnswerD"]."' readonly/></td>";
      //echo "<td><input type='text' value='".$row2["vcCorrectAnswer"]."' readonly/></td></tr>";
      switch ($row2["vcCorrectAnswer"]) {
        case 'A':
          echo "<td>";
          echo "<input type='radio' value='A' checked='checked' readonly />A";
          echo "<input type='radio' value='B' readonly />B";
          echo "<input type='radio' value='C' readonly />C";
          echo "<input type='radio' value='D' readonly />D";
          echo "</td></tr>";
          echo "<tr><td></br></td></tr>";
          break;
        case 'B':
          echo "<td>";
          echo "<input type='radio' value='A' readonly />A";
          echo "<input type='radio' value='B' checked='checked' readonly />B";
          echo "<input type='radio' value='C' readonly />C";
          echo "<input type='radio' value='D' readonly />D";
          echo "</td></tr>";
          echo "<tr><td></br></td></tr>";
          break;
        case 'C':
          echo "<td>";
          echo "<input type='radio' value='A' readonly />A";
          echo "<input type='radio' value='B' readonly />B";
          echo "<input type='radio' value='C' checked='checked' readonly />C";
          echo "<input type='radio' value='D' readonly />D";
          echo "</td></tr>";
          echo "<tr><td></br></td></tr>";
          break;
        case 'D':
          echo "<td>";
          echo "<input type='radio' value='A' readonly />A";
          echo "<input type='radio' value='B' readonly />B";
          echo "<input type='radio' value='C' readonly />C";
          echo "<input type='radio' value='D' checked='checked' readonly />D";
          echo "</td></tr>";
          echo "<tr><td></br></td></tr>";
          break;
        default:
          echo "Error";
          break;
      }
    }
  }
?>
