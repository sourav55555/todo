<?php

include "connect.php";

try{
    $sql= "CREATE TABLE profile(
        blog_id INT(9) AUTO_INCREMENT primary key,
        category VARCHAR(30) NOT NULL,
        blog TEXT NOT NULL,
        profileId INT(9) NOT NULL,
        FOREIGN KEY(profileId) REFERENCES todolist(id)
    )";

    $conn->exec($sql);
    echo'profile table created';
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
 }
