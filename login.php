<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    require_once "db_connect.php";
    require_once "functions.php";

    if(emptyInputLogin($username, $pwd) !== false){
        header("location: index.php?error=emptyinput");
        exit();
      }
//function to login user
    loginUser($conn,$username,$pwd);

}else{
    header("location: index.php");
    exit();
}
