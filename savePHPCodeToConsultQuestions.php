<?php
  //This php is to get all the questions already added to DB
  if(isset($_POST["buttonSubtmit"])){
    $connect = mysql_connect("localhost","root","dwarfest");
    if(!$connect){
      die(mysql_error());
    }
    mysql_select_db("sgaep");
    //Stock this variables to add the info to the database
    $_SESSION["vcSubjectChecked"] = $_POST["formConsultSubjectToCheck"];
    $_SESSION["intSubjectSemesterCheked"] = $_POST["formConsultSubjectSemester"];
    $_SESSION["vcIdSubject"] = $_SESSION["vcRFC"].$_SESSION["vcSubjectChecked"].$_SESSION["intSubjectSemesterCheked"];
    $results = mysql_query("SELECT * FROM tableQuestions WHERE vcRFC='".$_SESSION["vcRFC"]."' AND vcIdSubject='".$_SESSION["vcRFC"].$_POST["formConsultSubjectToCheck"].$_POST["formConsultSubjectSemester"]."'");
    while ($row = mysql_fetch_array($results)) {
?>
<tr>
  <td><?php echo $row["intParcial"]?></td>
  <td><?php echo $row["ltQuestion"]?></td>
  <td>
    <?php
      if($row["bAnswer"]==1){
        echo "Verdadero";
      }else{
        echo "Falso";
      }
    ?>
  </td>
</tr>
<?php
    }
  }
?>
