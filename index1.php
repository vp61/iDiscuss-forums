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
    <style>
      
    </style>
</head>

<body>
<?php include 'conet.php' ?>
    <?php require 'hedar.php' ?>
   

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1500x1000/?html" class="d-block " alt="..." style="height: 400px; width: 1350px;">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1500x1000/?css" class="d-block" alt="..." style="height: 400px; width: 1350px;">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1500x1000/?coding" class="d-block" alt="..." style="height: 400px; width: 1350px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>






    <div class="container my-3">
        <h1 class="text-center">iDiscuss - Categories</h1>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              // echo $row['categories_id'];
              // echo $row['cotegories_name'];
              $id = $row['categories_id'];
              $cat = $row['cotegories_name'];
              $desc = $row['cotegories_description'];
              echo' 

              <div class="col-md-4 my-3">
                  <div class="card" style="width: 18rem;">
                      <img src=" https://source.unsplash.com/500x400/?coding,python" class="card-img-top" alt="..." ' . $cat . '>
                      <div class="card-body">
                          <h5 class="card-title"><a href="threads.php?catid=' . $id . '"> ' . $cat . '</a></h5>
                          <p class="card-text">'. substr( $desc, 0, 90) . '......</p>
                          <a href="threads.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                      </div>
                  </div>
              </div> ';
            }
          ?>


        </div>







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