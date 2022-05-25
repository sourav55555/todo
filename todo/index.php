<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="profiles/css/style1.css">
        <title>Login</title>
    </head>
    <style>
         .inputs p{
             width: 8.2rem;
            margin-top: 6px;
         }
         .inputs input{
             height: 2.4rem;
             width: 15rem;
         }
    
    </style>
    <body>
        <div class="container">
            <div class="row1">
                <h3>Todo Login.</h3>
                <hr>
                <form action="" method="POST">

                    <div class="inputs">
                        <p>Email:</p>
                        <input type="email" name="email" id="" placeholder="Enter your email" required>
                    </div> 
                        <div class="inputs" >
                             <p>Password:</p>
                             <input type="password" name="password" id="" placeholder="Enter your password" required>
                        </div>

                     <input class="log" type="submit" name="submit" id="" value="Login">
                </form>
                <div class="reg">
                    <p>Don't have an account?</p>
                    <a href="profiles/register.php">
                        <button>Register</button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

<?php

include "profiles/connect.php";

if(isset($_POST['submit'])){

    $email= $_POST['email'];
    $password= $_POST['password'];

    $selectquery= "select * from todolist where email='$email'";
    $sql= $conn->query($selectquery);
    $data= $sql->fetch(PDO::FETCH_ASSOC);

    if( $password == $data['password'] && $data !=="" ){
         header("location:profiles/blogs.php");

         session_start();
         $_SESSION['email']= $email;
         $_SESSION['name']= $data['name'];

    }
    elseif($data== ""){  

        ?>
        <script>
            alert('Email is not registered.');
        </script>
        <?php

    }
    elseif($password !== $data['password']){

        ?>
        <script>
            alert("Incorrect Password");
        </script>
        <?php

    }

}


?>