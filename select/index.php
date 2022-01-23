<?php
require_once("../includes/config.php");
require_once("../includes/dbconnect.php");
require_once("../classes/questionnaire.php");

//header('Content-type: application/json');
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $j=0;
   $questionnaireArr=array(new Questionnaire("","","","","","","","","","",""));
   $questionnaireQuery=$mysqli->query("SELECT *,addresses.id AS aid FROM people,addresses WHERE people.id=addresses.owner_id AND addresses.visible=1");
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
   $questionnaireQuery=$mysqli->query("SELECT *,addresses.id AS aid FROM people,addresses WHERE (addresses.owner_id=people.id AND addresses.id='".$targetId."') AND addresses.visible=1");
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
