<?php
include_once "header.php"
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="Main">
            <form method="POST" class="form">
                <input type="text" name="username" class="input" placeholder="Please enter username"><br>
                <input type="submit" name="submit" class="button">
            </form>
            <?php
            require 'db_connect.php';
            $user_ID = $_POST['user_ID'];
            $query = "select * from users where username = '$user_ID'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                ?>
               <div class>
                        <div class = "row mt=5">
                            <div class = "col">
                            <div class ="card mt=5">
                   <div class = "card-body">         
                <table id="table table-bordered text-center">
                    <tr class="bg-dark text-white">
                        <th class="table_th">User ID</th>
                        <th class="table_th">Username</th>
                        <th class="table_th">Password</th>
                        <th class="table_th">Email</th>
                        <th class="table_th">First Name</th>
                        <th class="table_th">Last Name</th>
                        <th class="table_th">Delete</th>
                        
                    </tr>
                    <a href="Insert.php"><input type="submit" name="Insert" id="deletebuttons" value="Insert"></a>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td class="table_td"><?php echo $row['usersId'] ?></td>
                            <td class="table_td"><?php echo $row['username'] ?></td>
                            <td class="table_td"><?php echo $row['userPwd'] ?></td>
                            <td class="table_td"><?php echo $row['email'] ?> </td>
                            <td class="table_td"><?php echo $row['firstName'] ?></td>
                            <td class="table_td"><?php echo $row['lastName'] ?></td>
                            <td class="table_td"><a href="delete.php"><input type="submit" name="delete" id="deletebuttons" value="Delete"></a></td>
                                    <?php
                                }
                                ?>
                    </tr>
                </table>
                <?php
                mysqli_error($conn);
            }
            ?>                  </div>
                            </div>
                        </div>
                    </div>     
                </div>
                <?php
            ?>
            <form class="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <label class="label" style = "color: white">userId</label><br> <input type="text" name="user_ID" class="input"><br>
                <label class="label" style = "color: white">Username</label><br> <input type="text" name="username" class="input"><br>
                <label class="label" style = "color: white">Password</label><br> <input type="text" name="password" class="input"><br>
                <label class="label" style = "color: white">Email</label><br> <input type="text" name="email" class="input"><br>
                <label class="label" style = "color: white">Firstname</label><br> <input type="text" name="firstname" class="input"><br>
                <label class="label" style = "color: white">Lastname</label><br> <input type="text" name="lastname" class="input"><br>



                <input type="submit" name="submit" id="button">
            </form>
            <?php
            if (isset($_POST['submit'])) {
                if(empty($_POST['username']) ||empty($_POST['password']) ||empty($_POST['email'])|| empty($_POST['firstname']) || empty($_POST['lastname'])) {
                    echo 'Please fill all the fields.';
                } else {
                    require 'db_connect.php';
                    $user_ID = mysqli_real_escape_string($conn, $_POST['user_ID']);
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
                    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                    $query = "UPDATE users SET `usersId`='$user_ID', `username`='$username', `userPwd`='$password', `email`='$email', `firstName`='$firstname', `lastName`='$lastname' WHERE usersId = '$user_ID'";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo '<script>
                      alert("The data has been Updated");
                    </script>';
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            }
            ?>
        </div>
    </body>
</html>