<html><?php 
include_once 'header.php';
?>
    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
    </head>
    <body>
        <form class="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <label class="label">Username</label><br> <input type="text" name="username" class="input"><br>
            <label class="label">Password</label><br> <input type="text" name="password" class="input"><br>
            <label class="label">Email</label><br> <input type="text" name="email" class="input"><br>
            <label class="label">Firstname</label><br> <input type="text" name="firstname" class="input"><br>
            <label class="label">Lastname</label><br> <input type="text" name="lastname" class="input"><br>



            <input type="submit" name="submit" id="button">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (empty($_POST['username'])) {
                echo 'please enter the username';
            } else if (empty($_POST['password'])) {
                echo 'please enter the password';
            } else if (empty($_POST['email'])) {
                echo 'please enter the email';
            } else if (empty($_POST['firstname'])) {
                echo 'please enter the firstname';
            } else if (empty($_POST['lastname'])) {
                echo 'please choose the lastname';
            } else {
                require "db_connect.php";
                
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $pwd = mysqli_real_escape_string($conn, $_POST['password']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
                $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
                
                require 'db_connect.php';
                $sql = "INSERT INTO users (username, email, userPwd, firstName, lastName) VALUES (?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: insert.php?error=stmtfailed");
                    exit();
                }
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt,"sssss",$username,$email,$hashedPwd,$fname,$lname);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                echo '<script>
                      alert("The data has been Inserted");
                    </script>';
            }
        }
        
        ?>
    </body>
</html>
