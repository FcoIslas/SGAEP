<?php
  //error_reporting(E_ALL);
  //ini_set('display_errors', 1);
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
  //Create PDF 
  $examToPrint = printTablesforPDF($vcIdSubject,$selectPartialNumber,$specIdMix,$selectedNumerQuestions);
 
  //Delete answers ont $examToPrint  
  $examNoAnswers = str_replace("checked='checked'","",$examToPrint);
  //Code by https://stackoverflow.com/users/79126/mrfidge
  $examNoAnswers2 = preg_replace('#(<td style=.*?>).*?(</td>)#', '$1$2', $examNoAnswers);
  //Delete answers ont $examToPrint  

  $examHeader = printExamHeader();
  $pagebreakStart = "<page>";
  $pagebreakEnd = "</page>";
  $examPDFContent = $pagebreakStart . $examHeader . $examToPrint . $pagebreakEnd . $pagebreakStart . $examHeader . $examNoAnswers2 .$pagebreakEnd;
  //echo $examPDFContent;
  require __DIR__.'/vendor/autoload.php';
  use Spipu\Html2Pdf\Html2Pdf;
  $html2pdf = new Html2Pdf();
  $html2pdf->writeHTML($examPDFContent);
  $html2pdf->output('answers.pdf');
  //Create PDF


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

  function printTablesforPDF($vcIdSubject,$selectPartialNumber,$specIdMix,$selectedNumerQuestions){
    //This is the real	here I'm developing
    $mixedArrayVcIdQuestion = array();
    $mixedArrayVcIdQuestion = getMixedArray($vcIdSubject,$selectPartialNumber,$specIdMix);
    $numberRegistered = count($mixedArrayVcIdQuestion);
    $xinputStart = "<table><thead><tr><th>Pregunta</th><th></th><th>Respuesta</th></tr></thead>";
    for ($i=0; $i < $selectedNumerQuestions ; $i++) {
      $examQuestionNumber = $i + 1;
      $xinputOpenQuestions = printOpenQuestions($mixedArrayVcIdQuestion[$i],$examQuestionNumber);
      $xinputBooleanQuestions = printBooleanQuestions($mixedArrayVcIdQuestion[$i],$examQuestionNumber);
      $xinputMultipleQuestions = printMultipleQuestions($mixedArrayVcIdQuestion[$i],$examQuestionNumber);
      $xinputContent .= $xinputOpenQuestions . $xinputBooleanQuestions . $xinputMultipleQuestions; 
    }
    $xinputEnd = "</table>";
    $xinput = $xinputStart . $xinputContent . $xinputEnd;
    return $xinput;
  }


  function printExamHeader(){

    $examHeader = "<div class='logoUNAM' name='logoUNAM'>
                  <img src='../Images/logo2.png'>
                 </div>
                 <div class='examData' name='examData'>
                   <table class='dataCareer' name='dataCareer'>
                     <tr>
                       <th>Carrera:______________________________ </th>
                       <th>Asignatura:_________________________ </th>
                       <th>Parcial:_____</th>
                     </tr>
                     <tr>
                       <th>Nombre:______________________________ </th>
                       <th>No. Cuenta:_________________ </th>
                       <th>Fecha:____________ </th>
                     </tr>
                   </table>
                 </div>
                 <br /><br />";

    return $examHeader;
  }

  function printBooleanQuestions($vcIdQuestion,$examQuestionNumber){
    connectSql();
    //GET the boolean questions for the subject
    $result3 = mysql_query("SELECT intParcial,ltQuestion,boolAnswer FROM tableBooleanQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    while ($row2 = mysql_fetch_array($result3)) {
      if($row2 != ''){
        $xinput1 = "<tr><td>".$examQuestionNumber.".".$row2["ltQuestion"]."'</td><td></td>";
     
        if ($row2["boolAnswer"] == 1) {
          $xinput2 = "<td>
                        <input type='radio' value='Verdadero' checked='checked' readonly/>Verdadero
                        <input type='radio' value='Falso' readonly/>Falso
                      </td></tr>";
        }else {
          $xinput2 = "<td>
                  <input type='radio' value='Verdadero' readonly/>Verdadero
                  <input type='radio' value='Falso' checked='checked' readonly/>Falso
                  </td></tr><tr><td><br /></td></tr>";
	}
      }
      $xinput .= $xinput1 . $xinput2;
    }
    return $xinput;
  }

  function printOpenQuestions($vcIdQuestion,$examQuestionNumber){
    //GET the Open Questions for selected subject
    $result3 = mysql_query("SELECT intParcial,ltQuestion,ltAnswer FROM tableOpenQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    while ($row2 = mysql_fetch_array($result3)) {
      if($row2 != ''){
        $xinput1 =  "<tr><td>".$examQuestionNumber." ".$row2["ltQuestion"]."</td><td></td>";
        $xinput2 = "<td style='display: block;'>".$row2["ltAnswer"]."</td></tr><tr><td><br /></td></tr>";
      }
      //echo "<tr><td><input type='text' value='".$row2["intParcial"]."' readonly/></td>";
      //$xinput2 = "<td><input type='text' value='".$row2["ltAnswer"]."' readonly/></td></tr></td></tr><tr><td></br></td></tr>";
      $xinput .= $xinput1 . $xinput2;
    }
    return $xinput;
  }

  function printMultipleQuestions($vcIdQuestion,$examQuestionNumber){
    //Get the Multiple questions for selected subject
    //echo "SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'";
    $result3 = mysql_query("SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."'");
    //echo "SELECT * FROM tableMultipleQuestions WHERE vcIdQuestion = '".$vcIdQuestion."' AND intParcial = '".$selectPartialNumber."'";
    while ($row2 = mysql_fetch_array($result3)) {
      if($row2 != ''){
        $xinput1 = "<tr><td>".$examQuestionNumber.".-".$row2["ltQuestion"]."</td><td></td></tr>";
      }
      $xinput2 = "<tr><td>A)".$row2["ltAnswerA"]."</td>";
      $xinput3 = "<td>B)".$row2["ltAnswerB"]."</td></tr>";
      $xinput4 = "<tr><td>C)".$row2["ltAnswerC"]."</td>";
      $xinput5 = "<td>D)".$row2["ltAnswerD"]."</td>";
      switch ($row2["vcCorrectAnswer"]) {
        case 'A':
          $xinput6 = "<td>
          <input type='radio' value='A' checked='checked' readonly />A
          <input type='radio' value='B' readonly />B
          <input type='radio' value='C' readonly />C
          <input type='radio' value='D' readonly />D
          </td></tr>
          <tr><td><br /></td></tr>";
          break;
        case 'B':
          $xinput6 = "<td>
          <input type='radio' value='A' readonly />A
          <input type='radio' value='B' checked='checked' readonly />B
          <input type='radio' value='C' readonly />C
          <input type='radio' value='D' readonly />D
          </td></tr>
          <tr><td><br /></td></tr>";
          break;
        case 'C':
          $xinput6 = "<td>
          <input type='radio' value='A' readonly />A
          <input type='radio' value='B' readonly />B
          <input type='radio' value='C' checked='checked' readonly />C
          <input type='radio' value='D' readonly />D
          </td></tr>
          <tr><td><br /></td></tr>";
          break;
        case 'D':
          $xinput6 = "<td>
          <input type='radio' value='A' readonly />A
          <input type='radio' value='B' readonly />B
          <input type='radio' value='C' readonly />C
          <input type='radio' value='D' checked='checked' readonly />D
          </td></tr>
          <tr><td><br /></td></tr>";
          break;
        default:
          echo "Error in printing multiple questions";
          break;
      }
      $xinput .= $xinput1 . $xinput2 . $xinput3 . $xinput4 . $xinput5 . $xinput6;
    }
    return $xinput;
  }
?>
