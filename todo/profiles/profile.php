<?php
include "connect.php";

  session_start();
  $email= $_SESSION['email'];

  $selectquery= "select * from todolist where email='$email'";
  $sql= $conn->query($selectquery);
  $data= $sql->fetch(PDO::FETCH_ASSOC);

try{

    if(isset($_POST['submit'])){

        $category= $_POST['category'];
        $blog= $_POST['blog'];
        $profileId= $data['id'];

        //insert blogs
        $insetquery= "insert into profile(category, blog, profileId)
            values( '$category', '$blog', '$profileId' )";
        $conn->exec($insetquery); 

        ?>
          <script>
              alert('Blog update successful');
          </script>
        <?php

    }
    
}
catch(PDOException $e){
    echo $insetquery . "<br>" . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/profile1.css">
      <title>profile</title>
  </head> 

  <body>
      <div class="container">
          <div class="row">
            <div class="profile-head">
               <h2 class="name">Hello 
                  <?php
                    echo $data['name'];
                  ?>  
               </h2>

               <div class="blog-div">
                  <p>Browse your blogs</p>
                  <a href="blogs.php">
                     <button class="blog">Blogs</button>
                  </a>
               </div>

            </div>

            <form method="post" action="">
                <div class="p-input">
                   <p>Please create your blog category: </p>
                   <input type="text" placeholder="Category" name="category" required>
                </div>

                <div class="p-inputb">
                   <p>Create your blog according to  the category: </p>
                   <textarea name="blog" id="" cols="55"  rows="10" placeholder="Blog content" required></textarea>
                </div>
                <input type="submit" class="submit" name="submit" value="Submit">
            </form>
          </div>
      </div>
  </body>
</html>

