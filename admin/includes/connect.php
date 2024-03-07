<?php
 $dsn ='mysql:host=localhost;dbname=gestion_restaurant_mini_projet';
 $user='root';
 $pass='';
 // $opption = array(
 //   PDO::MYSQL_ATTR_INIT_COMMAND => ' SET NAMES utf8',
 //  );
 try {
 	$connect =new PDO($dsn,$user,$pass);
 	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
    // $Q="INSERT INTO pro(Name) VALUES('Asmaa')";
    // $connect->exec($Q);
 } catch (Exception $e) {
 	echo "fild" . $e->geMessage();
 }?>
