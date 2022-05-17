<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php include 'conet.php' ?>
    <?php require 'hedar.php' ?>
   

    <?php
    $id = $_GET['thread_id'];
       $sql = "SELECT * FROM `thread` WHERE thread_id=$id";
       $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
        //Query the users table to find out the name of OP
        $sql2 = "SELECT firstname FROM `users` WHERE sno=$thread_user_id";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $posted_by = $row2['firstname'];
       }
    ?>
    <?php
        $showAlert = false;
        $method=$_SERVER["REQUEST_METHOD"];
        // echo  $method;
        if($method=='POST'){
        $comment = $_POST['comment'];
        $sno = $_POST['sno'];
        $sql = " INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES 
        ( '$comment', '$id', CURRENT_TIMESTAMP, '$sno') ";
        $result = mysqli_query($conn, $sql);
        $showAlert =true;
        if($showAlert){
            echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Youe comment has been added! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
        }
    }
    
    ?>

    <div class="container my-4">
        <div class="mt-4 p-5 bg-secondary text-light rounded">
            <h1 class="display-4"> <?php echo $title; ?></h1>
            <p><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a perr to perr forunm for sharing knowledge with each other</p>
            <p> Posted by:<b><?php echo $posted_by;?></b></p>
        </div>


    </div>

    <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

       echo'  <div class="container">
       <h1 class="py-2">Post a Comment</h1>
       <form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
           <div class="mb-3">
               <label for="exampleFormControlTextarea1" class="form-label">Type your comment</label>
               <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
               <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
           </div>
           <div class="mb-3">
               <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg">Post comment</button>
           </div>
       </form>
   </div>';
    }
    else{
    echo'
    <div class="container">
      <h1 class="py-2">Post a Comment</h1>
      <p class="lead">you are not logged in . Please login to be able to Post a Comment</p>
    </div>
    ';
    }
    ?>

    <div class="container">
        <h1>Discussions</h1>

        <?php
            $id = $_GET['thread_id'];
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
            $result = mysqli_query($conn, $sql);
            $noRessult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noRessult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                $thread_user_id = $row['comment_by'];
                $sql2 = "SELECT firstname FROM `users` WHERE sno=$thread_user_id";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
          


        echo'<div class="media my-3">
            <img src="aa.jpg" alt="John Doe" class="mr-3 rounded-circle" style="width:50px;">
            <div class="media-body">
               <h5 class="font-weight-bold my-0">' . $row2['firstname'] . ' at ' . $comment_time . '</h5>
               ' . $content . '
            </div>
        </div>';

    }
    if($noRessult){
        echo ' <div class="mt-4 p-5 bg-secondary text-light rounded">
        <p class="display-5">No threads Found</h1>
        <p><b>Be the first person to ask a question</b></p>
      </div>';
    }
    ?>






    </div>


    <?php require 'footer.php' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>