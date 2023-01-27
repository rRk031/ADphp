<?php
session_start();
include "db_connect.php";

if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$uname = $_POST['username'];
$pass = $_POST['password'];

if(empty($uname)) {
    header("Location: index.php?error = Username is required");
    exit();
}
if(empty($pass)) {
    header("Location: index.php?error = Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    if($row['username'] == $uname && $row ['password'] == $pass){
        echo "Logged In!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_ID'] = $row['user_ID'];
     
        header("Location: home.php");
        exit();
    }else{
        header("error=Incorrect Username or Password");

    }
}else{
    header("Location: index.php");
    exit();
}