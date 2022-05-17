<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'conet.php';
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['password'];
    
    //check whether this exists
    $existSql = "select * from `users` where email = '$email'";
    $result = mysqli_query($conn,$exitsSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = " Email already in use ";
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `firstname`, `lastname`, `email`, `password`, `timestamp`) VALUES 
            ( ' $firstname', '$lastname', '$email', '$hash', CURRENT_TIMESTAMP)";
            $result =  mysqli_query($conn, $sql);
            // echo $result;
            if($result){
                $showAlert = true;
                header("location: index1.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "password do not match";
        }
    }
    header("location: index1.php?signupsuccess=false&error=$showError");
}
?>