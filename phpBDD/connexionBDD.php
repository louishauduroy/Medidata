<?php

try{
  $bdd = new PDO('mysql:host=localhost;dbname=salsac;charset=utf8', 'root', 'root');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
  echo $e->getMessage();
}

?>
