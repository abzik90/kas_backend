<?php
require_once("../includes/config.php");
require_once("../includes/dbconnect.php");
require_once("../classes/questionnaire.php");

header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aid=$_POST['aid']; //address id/property id

    $confirmAidQuery=$mysqli->query("SELECT owner_id FROM addresses WHERE id='".$aid."'");
    if($confirmAidQuery->num_rows==true){
      while($confirmAid=$confirmAidQuery->fetch_assoc()){
        $ownerId=$confirmAid['owner_id'];
      }
      $mysqli->query("UPDATE people SET visible='0' WHERE id='".$ownerId."' ");
      $mysqli->query("UPDATE addresses SET visible='0' WHERE id='".$aid."'");

      echo "{'success':'true'}";
    }else{
      echo "{'error':'unable to retrieve,no existing person'}";
    }
}
$mysqli->close();

?>
