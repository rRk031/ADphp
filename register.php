<?php
if(isset($_POST["submit"])){
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdConfirm = $_POST["pwdconfirm"];
  $username = $_POST["username"];

  require_once 'db_connect.php';
  require_once 'functions.php';

  if(emptyInputSigunup($fname,$lname,$email,$pwd,$pwdConfirm,$username) !== false){
    header("location: signup.php?error=emptyinput");
    exit();
  }
  if(invalidUid($username) !== false){
    header("location: signup.php?error=invaliduid");
    exit();
  }
  if(invalidEmail($email) !== false){
    header("location: signup.php?error=invalidemail");
    exit();
  }
  if(pwdMatch($pwd,$pwdConfirm) !== false){
    header("location: signup.php?error=pwdMatch");
    exit();
  }

  if(uidExists($conn, $username,$email) !== false){
    header("location: signup.php?error=usernametaken");
  }

  createrUser($conn,$fname,$lname,$email,$pwd,$username);
}else{
    header("location: signup.php");
}
