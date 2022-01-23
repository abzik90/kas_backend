<?php
require_once("../includes/config.php");
require_once("../includes/dbconnect.php");
require_once("../classes/questionnaire.php");

//header('Content-type: application/json');
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $aid=$_POST['aid']; //address id/property id

  $surname=$_POST['surname'];
  $name=$_POST['name'];
  $midname=$_POST['midname'];
  $iin=$_POST['iin'];
  $city=$_POST['city'];
  $street=$_POST['street'];
  $homeNum=$_POST['homeNum'];
  $flatNum=$_POST['flatNum'];
  $cadastral=$_POST['cadastral'];
  $area=$_POST['area'];

  $datePublished = $config['dateUnix'];

  $latitudeArr=$_POST['latitude'];
  $longitudeArr=$_POST['longitude'];

  $additional=$_POST['additional'];

  $questionnaire=new Questionnaire($surname,$name,$midname,$iin,$city,$street,$homeNum,$flatNum,$cadastral,$area,$datePublished);
  if($questionnaire->isNotEmpty()){
    $confirmAidQuery=$mysqli->query("SELECT owner_id FROM addresses WHERE id='".$aid."'");
    if($confirmAidQuery->num_rows==true){
      while($confirmAid=$confirmAidQuery->fetch_assoc()){
        $ownerId=$confirmAid['owner_id'];
      }
      $mysqli->query("UPDATE people SET surname='".$surname."',name='".$name."',midname='".$midname."',`date`='".$config['dateUnix']."' WHERE id='".$ownerId."' ");
      $mysqli->query("UPDATE addresses SET city='".$city."',street'".$street."',home_num='".$homeNum."',flat_num='".$flatNum."',cadastral='".$cadastral."',area='".$area."',`date`='".$config['dateUnix']."',latitude='".$latitudeArr."',longitude='".$longitudeArr."',additional='".$additional."' WHERE id='".$aid."'");

      echo "{'success':'true'}";
    }else{
      echo "{'error':'unable to retrieve,no existing person'}";
    }
  }
}
$mysqli->close();

?>
