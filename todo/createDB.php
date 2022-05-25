<?php

  $user= 'root';
  $password= '';
  $server= 'localhost';


  try{ 
    $conn= new PDO("mysql:host=$server", $user, $password);

    //create DB
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE todo";
    $conn->exec($sql);
    echo'database created successfully';

  }
  catch(PDOException $e){
    echo "$sql" . "<br>" . $e->getMessage();
  };

  $conn= null;
?>