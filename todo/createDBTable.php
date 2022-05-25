<?php
 
 $user='root';
 $password="";
 $server='localhost';

 try{

     $conn= new PDO("mysql:host=$server; dbname=todo", $user, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    //sql table
     $sql= " CREATE TABLE todolist(
         id INT(9) AUTO_INCREMENT PRIMARY KEY,
         name TEXT NOT NULL,
         email VARCHAR(255) NOT NULL,
         gender VARCHAR(255) NOT NULL,
         password VARCHAR(255) NOT NULL
     )";

     $conn->exec($sql);
     echo "todolist table created successfully";
 }
 catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
 }