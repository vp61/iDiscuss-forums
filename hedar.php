<?php 
session_start();

echo ' <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index1.php">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index1.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="abouts.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql = "SELECT cotegories_name, categories_id FROM `categories`";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){

          echo'<li><a class="dropdown-item" href="threads.php?catid=' . $row['categories_id'] . '">' . $row['cotegories_name'] . '</a></li>';
         
      
        }
        echo'  </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php">Contact</a>
      </li>
    </ul>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
        echo' <form class="d-flex mx-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn-success  me-2" type="submit">Search</button>
      <P class="text-light ">  ' . $_SESSION['useremail'] . ' </p> 
      <a href="logout.php" class="btn btn-outline-success ml-2 ">Logout</a>   
      </form>';
    }
    else{

    
   echo' <form class="d-flex mx-2">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class=" btn-success  me-2" type="submit">Search</button>
     
    </form>
    <button class="btn btn-outline-success ml-2 " data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>
    <button class="btn btn-outline-success mx-2"  data-bs-toggle="modal" data-bs-target="#signupModal">Singnup</button>';

    }
  echo'</div>
</div>
</nav> ';

include 'login.php';
include 'signup.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success! </strong> You con now login using .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>