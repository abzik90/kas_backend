<?php
$date=new DateTime();
$date=$date->getTimestamp();
$config=array(
    'db'=> array(
      'ip' => 'localhost',
      'dbname' => "kas",
      'dbuser' => "root",
      'dbpassword' =>"root"
    ),
    'url'=>"http://ch76146.tmweb.ru/",
    'dateUnix'=>$date
);
?>
