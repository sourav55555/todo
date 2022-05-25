<?php

include "connect.php";

  session_start();
  $postid= $_SESSION['postId'];
  
  //fetch with session
  $fetchdata= "select * from profile where blog_id='$postid'";
  $sql= $conn->query($fetchdata);
  $data= $sql->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/profile1.css">
      <title>update</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h2>Update form</h2>
        <form method="post" action="">
            <div class="p-input">
              <p>Edit your category: </p>
              <input type="text" placeholder="Category" value=" <?php echo $data['category'] ?> "name="category"  required>
            </div>

            <div class="p-inputb">
              <p>Edit your blog content. </p>
              <textarea name="blog" cols="50"  rows="10" placeholder="Blog content" required><?php echo $data['blog']; ?></textarea>
            </div>

            <input type="submit" class="submit" name="submit" value="Update">

          </form>
      </div>
    </div>
  </body>
</html>

<?php

//update session

try{
  if(isset($_POST['submit'])){
    $category= $_POST['category'];
    $blog= $_POST['blog'];
    
    //update blog
    $updatequery= "update profile set category= '$category', blog= '$blog'  where blog_id='$postid'";
    $sql1= $conn->exec($updatequery);

    ?>
     <script>
       alert("Update Successful");
       location.replace('http://localhost/todo/profiles/blogs.php');
     </script>
    <?php

  }


}
catch(PDOException $e){
  echo $insetquery . "<br>" . $e->getMessage();
}

?>