<?php
    $sname = "localhost";
    $user_name = "root";
    $password ="";
    $db_name = "ad_project";
    $conn = mysqli_connect($sname, $user_name,$password, $db_name);

    if(!$conn){
        echo "connection failed!";
    }
    ?>
<?php 

