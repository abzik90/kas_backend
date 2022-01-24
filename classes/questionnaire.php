<?php
// error_reporting(E_ALL); ini_set('display_errors', '1');
class Questionnaire{
public $surname="";
public $name="";
public $midname="";
public $iin="";

public $city="";
public $street="";
public $homeNum="";
public $flatNum="";

public $cadastral="";
public $area="";
public $datePublished="";

public $additional="";
public $aid="";

public $latitudeArr="";
public $longitudeArr="";


public function __construct($surname,$name,$midname,$iin,$city,$street,$homeNum,$flatNum,$cadastral,$area,$datePublished,$latitudeArr="",$longitudeArr="",$additional="",$aid="") {
    $this->surname=$surname;
    $this->name=$name;
    $this->midname=$midname;
    $this->iin=$iin;
    $this->city=$city;
    $this->street=$street;
    $this->homeNum=$homeNum;
    $this->flatNum=$flatNum;
    $this->cadastral=$cadastral;
    $this->area=$area;
    $this->datePublished=$datePublished;

    $this->latitudeArr=$latitudeArr;
    $this->longitudeArr=$longitudeArr;
    $this->additional=$additional;
    $this->aid=$aid;
}
public function isNotEmpty(){
  if(!(empty($this->surname)&&empty($this->name)&&empty($this->iin)&&empty($this->city)&&empty($this->street)&&empty($this->homeNum)&&empty($this->cadastral)&&empty($this->area))){
    return true;
  }
  return false;
}

// public function printAll() {
//   return json_encode($this);
// }
}

?>
