<?php
//Functions to validate form inputs

//checks if signup form is empty
function emptyInputSigunup($fname,$lname,$email,$pwd,$pwdConfirm,$username){
    $result;
    if(empty($fname) || empty($lname) || empty($email) ||empty($pwd) || empty($pwdConfirm) || empty($username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//validates username
function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//validates email
function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//confirms password
function pwdMatch($pwd,$pwdConfirm){
    $result;
    if($pwd !== $pwdConfirm){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//checks if username already exists
function uidExists($conn, $username,$email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
//registers user data into database server
function createrUser($conn,$fname,$lname,$email,$pwd,$username){
    $sql = "INSERT INTO users (username, email, userPwd, firstName, lastName) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssss",$username,$email,$hashedPwd,$fname,$lname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: signup.php?error=none");
    exit();
}
//checks if login form is empty
function emptyInputLogin($pwd,$username){
    $result;
    if(empty($pwd) || empty($username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
//Logs user in
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn,$username,$username);
    
    if($uidExists === false){
        header("location: index.php?eror=wrongLogin");
        exit();
    }
    $pwdHashed = $uidExists["userPwd"]; 
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if($checkPwd === false){
        header("location:index.php?error=wronglogin");
        exit();
    }else if($checkPwd === true){
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["username"];
        header("location:home.php");
        exit();
    }
}