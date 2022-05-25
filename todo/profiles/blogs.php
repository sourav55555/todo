<?php

include "connect.php";

    session_start();
    $email= $_SESSION['email'];

    //select & fetch from todolist
    $selectquery= "select * from todolist where email='$email'";
    $sql= $conn->query($selectquery);
    $data= $sql->fetch(PDO::FETCH_ASSOC);
    $profileId= $data['id'];

    //fetch from profile
    $blogselect= "select * from profile where profileId='$profileId'";
    $blogsql= $conn->query($blogselect);
    $blogdata= $blogsql->fetchAll(PDO::FETCH_ASSOC);
    
    $category_list= array();
    for ($col = 0; $col < sizeof($blogdata); $col++) {
        array_push($category_list, $blogdata[$col]['category']) ;
      }
     $unique= array_unique($category_list);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/blogs.css"> 
        <title>Blogs</title> 
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="profile sticky top">
                    <p>Your Blogs</p>

                    <div class="profile1">
                        <h3> <?php echo $_SESSION['name']; ?> </h3>
                        <a href="../index.php">
                            <button>Log Out</button>
                        </a>
                    </div>

                </div>

                <div class="create-blog">
                    <p>Create new blogs:</p>
                    <a class="create-blog-btn" href="profile.php">
                        <button>Create Blog</button>
                    </a>
                </div>

                <form action="" method="POST">
                    <p>Select blogs by category.</p>

                    <select name="blogt" id=""> 
                        <option value="">Category</option>  

                        <?php 
                          foreach($unique as $value){
                            echo "<option value= '$value'> $value</ option>" ;
                        }
                        ?>

                    </select>

                    <input type="submit" name="submit" id=""    value="Select">

                    <div class="hr-line"></div>
                    
                    <ul>
                        <?php  

                    
                         if(isset($_POST['submit'])){
                        
                            $submit= $_POST['blogt'];
                        
                            for( $x=0; $x< sizeof($blogdata); $x++){
                            
                                if($blogdata[$x]['category'] == $submit){
                                
                                    $blog_id=$blogdata[$x]['blog_id'];
                                    
                                    //blog list
                                    echo "<li>";

                                    echo "<p>Category: ".$blogdata[$x]  ['category']."</p>";
                                    echo $blogdata[$x]['blog'];

                                    // update/ delete
                                    echo "<div class='btn'>";
                                    echo"<button type='submit'  name='delete-submit' value='$blog_id'> Delete </button>";
                                    echo"<button type='submit'  name='update' value='$blog_id' > Edit </button>";
                                    echo"</div>";

                                    echo "</li>";
                                }
                            }
                        } else{
                            for( $x=0; $x< sizeof($blogdata); $x++){
                            
                                $blog_id=$blogdata[$x]['blog_id'];

                                //all blogs list
                                echo "<li>";
                                echo "<p>Category: ".$blogdata[$x]  ['category']."</p>";
                                echo $blogdata[$x]['blog'];

                                 // update/ delete
                                echo "<div class='btn'>";
                                echo"<button type='submit'  name='delete-submit' value='$blog_id' >  Delete </button>";
                                echo"<button type='submit' name='update'    value='$blog_id' > Edit </button>";
                                echo"</div>";

                                echo "</li>";
                            
                            }
                          }
                      
                        ?>
                    </ul>                     
                </form>
            </div>   
        </div>  
              
              
    </body>
</html>

<?php
  
if(isset($_POST['delete-submit'])){
      $user_id= $_POST['delete-submit'];

    //delete blog
      $deletequery= "delete from profile where blog_id= '$user_id'";
      $sql= $conn->exec($deletequery);
      header("location:blogs.php");
}

if(isset($_POST['update'])){

    //edit blog
    $id1=$_POST['update'];
    $_SESSION['postId']=$id1;
    header("location:update.php");
    
}

?>