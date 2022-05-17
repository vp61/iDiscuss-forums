<?php
session_start();
echo "logout";

session_destroy();
header("location: index1.php")
?>