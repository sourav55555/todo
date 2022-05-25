<?php
 
 $user='root';
 $password="";
 $server='localhost';

 $conn= new PDO("mysql:host=$server;dbname=todo",$user,$password);

if(!$conn){
    ?>

     <script>
         alert('DataBase connection failed');
     </script>
     
    <?php
}