<?php
require_once("../includes/config.php");
require_once("../includes/dbconnect.php");
require_once("../classes/questionnaire.php");

//header('Content-type: application/json');

header('content-type: application/json; charset=utf-8');
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
  $latitudeArr=implode(",",$latitudeArr);

  $longitudeArr=$_POST['longitude'];
  $longitudeArr=implode(",",$longitudeArr);

  $additional=$_POST['additional'];

  $questionnaire=new Questionnaire($surname,$name,$midname,$iin,$city,$street,$homeNum,$flatNum,$cadastral,$area,$datePublished);
  print_r($questionnaire);
  if($questionnaire->isNotEmpty()){
    $mysqli->query("INSERT INTO people (surname,name,midname,iin,`date`)VALUES('".$surname."','".$name."','".$midname."','".$iin."','".$config['dateUnix']."')");
    $personId=$mysqli->insert_id;
    // echo $personId;
    echo "{'success':'true'}";
    $mysqli->query("INSERT INTO addresses(owner_id,city,street,home_num,flat_num,cadastral,area,latitude,longitude,`date`)VALUES('".$personId."','".$city."','".$street."','".$homeNum."','".$flatNum."','".$cadastral."','".$area."','".$latitudeArr."','".$longitudeArr."','".$config[dateUnix]."')");
    echo "INSERT INTO addresses(owner_id,city,street,home_num,flat_num,cadastral,area,latitude,longitude,`date`)VALUES(".$personId.",'".$city."','".$street."','".$homeNum."',".$flatNum.",'".$cadastral."',".$area.",'".$latitudeArr."','".$longitudeArr."','".$config[dateUnix]."')";
  }else{
    print_r($questionnaire);
    echo "{'success':'false'}";
  }
}
$mysqli->close();

?>
