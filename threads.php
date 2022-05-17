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
    $id = $_REQUEST['catid'];
       $sql = "SELECT * FROM `categories` WHERE categories_id=$id";
       $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_assoc($result)){
        $catname = $row['cotegories_name'];
        $catdesc = $row['cotegories_description'];
       }
    ?>

    <?php
 $showAlert = false;
     $method=$_SERVER["REQUEST_METHOD"];
    // echo  $method;
    if($method=='POST'){
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `thread` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES 
        ( '$th_title', '$th_desc', '$id', '$sno', CURRENT_TIMESTAMP);";
        $result = mysqli_query($conn, $sql);
        $showAlert =true;
        if($showAlert){
            echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Youe thread has been added! Pleasec wait for community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
        }
    }
    
    ?>



    <div class="container my-4">
        <div class="mt-4 p-5 bg-warning text-light rounded">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
            <p><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a perr to perr forunm for sharing knowledge with each other</p>
            <a href="" class="btn btn-success btn-lg">Learn more</a>
        </div>


    </div>
    <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

       echo' <div class="container">
            <h1 class="py-2">Start a Discussions</h1>
            <form action="' . $_SERVER["REQUEST_URI"] . '" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Well never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Ellaborete Your Concern</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        <input type="hidden" name="sno" value="' . $_SESSION["sno"] .'">
    </div>
    <div class="mb-3">
        <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg">Submit</button>
    </div>
    </form>


    </div>';
    }
    else{
    echo'
    <div class="container">
      <h1 class="py-2">start a Discussion</h1>
      <p class="lead">you are not logged in . Please login to be able to start a Discussion</p>
    </div>
    ';
    }
    ?>

    <div class="container">
        <h1>Browse Questions</h1>

        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `thread` WHERE thread_cat_id=$id";
            $result = mysqli_query($conn, $sql);
            $noRessult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noRessult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $comment_time = $row['timestamp'];
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "SELECT firstname FROM `users` WHERE sno=$thread_user_id";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
          


        echo'<div class="media my-3">
            <img src="aa.jpg" alt="John Doe" class="mr-3 rounded-circle" style="width:50px;">
            <div class="media-body">'.
               ' <h5 class="mt-0"> <a class="text-dark" href="threadlist.php?thread_id=' . $id . '">' . $title . '</a></h5>
                <span>' . $desc . '</span>'.'  <h5 class="font-weight-bold my-0">Asked by:' . $row2['firstname'] .' to ' . $comment_time . '</h5>'.'
            </div>
        </div>';

    }

    // echo var_dump($noRessult);
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