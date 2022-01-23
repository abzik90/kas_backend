<?php
require_once("../includes/config.php");
require_once("../includes/dbconnect.php");
require_once("../classes/questionnaire.php");

header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $j=0;
   $questionnaireArr=array(new Questionnaire("","","","","","","","","","",""));
   $questionnaireQuery=$mysqli->query("SELECT *,addresses.id AS aid FROM people,addresses WHERE people.id=addresses.owner_id");
   if($questionnaireQuery->num_rows==true){

     while($questionnaireRow=$questionnaireQuery->fetch_assoc()){
       //$surname="",$name="",$midname="",$iin="",$city="",$street="",$homeNum="",$flatNum="",$cadastral="",$area="",$additional=""
       $questionnaireArr[$j]=new Questionnaire($questionnaireRow['surname'],$questionnaireRow['name'],$questionnaireRow['midname'],$questionnaireRow['iin'],$questionnaireRow['city'],$questionnaireRow['street'],$questionnaireRow['home_num'],$questionnaireRow['flat_num'],$questionnaireRow['cadastral'],$questionnaireRow['area'],$questionnaireRow['date'],$questionnaireRow['additional'],$questionnaireRow['aid']);
       $j++;
     }
     echo json_encode($questionnaireArr);
   }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $j=0;
   $targetId=$_POST['target_id'];
   $questionnaireQuery=$mysqli->query("SELECT *,addresses.id AS aid FROM people,addresses WHERE addresses.owner_id=people.id AND addresses.id='".$targetId."'");
   //потому что возможно что у одного человека несколько имуществ
   if($questionnaireQuery->num_rows==true){
     while($questionnaireRow=$questionnaireQuery->fetch_assoc()){
       //$surname="",$name="",$midname="",$iin="",$city="",$street="",$homeNum="",$flatNum="",$cadastral="",$area="",$additional=""
       $questionnaire=new Questionnaire($questionnaireRow['surname'],$questionnaireRow['name'],$questionnaireRow['midname'],$questionnaireRow['iin'],$questionnaireRow['city'],$questionnaireRow['street'],$questionnaireRow['home_num'],$questionnaireRow['flat_num'],$questionnaireRow['cadastral'],$questionnaireRow['area'],$questionnaireRow['date'],$questionnaireRow['additional'],$questionnaireRow['aid']);
     }
     echo json_encode($questionnaire);
   }
}
$mysqli->close();
?>
