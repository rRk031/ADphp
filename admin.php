<?php 
include_once 'header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require 'db_connect.php';
        $query = "select * from users";
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
                        <th class="table_th">Update</th>
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
                            <td class="table_td"><a href="update.php"><input type="submit" name="Update" id="updatebuttons" value="Update"></a></td>
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
       
    </body>
</html>

