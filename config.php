<?php

try{
    $db=new PDO("mysql:host=localhost;dbname=starcash",'root','4145124azer');
    $db->exec("set names utf8"); }

catch (PDOExpception $e) { echo $e->getMessage ();
}


 ?>
