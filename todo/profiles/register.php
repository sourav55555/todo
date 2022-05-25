<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style1.css">
        <title>Registration</title>
    </head>
    <body>
        <div class="container">
           <div class="row">
                <h3>Todo Registration Form</h3>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="col">
                       <div class="col-1">
                            <div class="inputs">
                                 <p>Full Name:</p>
                                 <input type="text" class="name" name="name" placeholder="Enter your full name"  required>
                            </div>   
       
                            <div class="inputs">
                               <p>Email:</p>
                                  <input type="email" name="email" id="" placeholder="Enter your email" required>
                            </div>
                             <div class="inputs">
                                 <p>Gender:</p>
                                 <label for="male">Male</label>
                                 <input class="gender" type="radio" name="gender" value="male" id="male">
                                 <label for="female">Female</label>
                                 <input class="gender" type="radio" name="gender" id="female" value="female">
                             </div>
                        </div>
                        <div class="col-1">    
       
                              <div class="inputs">
                                  <p>Password:</p>
                                  <input type="password" name="password" id="" placeholder="Create password" required>
                              </div>

                              <div class="inputs">
                                  <p>Confirm password:</p>
                                  <input type="password" name="cpassword" id="" placeholder="Confirm password">
                              </div>
                        </div>
                    </div> 

                    <input class="submit" type="submit" name="submit" id="" value="Submit">

                 </form>

                 <div class="login">
                       <p>Already have an account?</p>
                       <a class="login" href="../index.php">Login here</a>
                 </div>

           </div>
        </div>
    </body>
</html>

<?php 

include "connect.php";

if(isset($_POST['submit'])){

    $name= $_POST['name'];
    $email= $_POST['email'];
    $gender= $_POST['gender'];
    $password= $_POST['password'];
    $cpassword=$_POST['cpassword'];

    //insert data
     if($password==$cpassword && strlen($password)>4){

        $insertquery="insert into todolist(name, email, gender, password)
            values( '$name', '$email', '$gender', '$password')";
        
        $conn->exec( $insertquery );

        session_start();
        $_SESSION['email']= $email;
        $_SESSION['name']= $name;

        ?>
            <script>
               alert('Registration successful');
              location.replace("http://localhost/todo/profiles/profile.php");
            </script>
        <?php

     }
     elseif($password !== $cpassword){ 

        ?>
        <script>
            alert('Confirm password not matched');
        </script>
        <?php

    }
    else{

        ?>
        <script>
            alert('Password length minimum 5 character');
        </script>
        <?php

    }
 
}

?>