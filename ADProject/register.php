<?php
session_start();
include "db_connect.php";

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    if ($password != $confirmpassword) {
      echo "passwords do not match";
      exit;
    }
    //Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // Create a prepared statement
    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
    // Bind the parameters to the placeholders
    mysqli_stmt_bind_param($stmt, 'sssss', $username, $password, $email, $firstname, $lastname);
    // Execute the statement
    mysqli_stmt_execute($stmt);
    // Close the statement
    mysqli_stmt_close($stmt);
  
    // Redirect to the login page
    header('location: login.php');
  }
?>
