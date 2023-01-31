
<html>
    <head>
        <title>Sign up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="container">
            
            <div id="aside">
                <a href="index.php" style="width: 100%; height: 100%;">    <img src="pics/create-user-icon.png" alt="" id="signupImage"/></a>
            </div>
            
            <div id="main">
                <div id="signupText">
                    <label>Sign up</label>
                </div>
                
                <div id="formDiv">
                    <form method = "post" action="register.php">
                        <input type="text" name="fname" placeholder="First Name" style="width: 298px;">
                        <input type="text" name="lname" placeholder="Last Name" style="width: 298px;"><br>
                        <input type="text" name="username" placeholder="Username" style="width: 600px;"><br>
                        <input type="email" name="email" placeholder="Email" style="width: 600px;"><br>
                        <input type="password" name="pwd" placeholder="Password" style="width: 600px;"><br>
                        <input type="password" name="pwdconfirm" placeholder="Confirm Password" style="width: 600px;"><br>
                        <button type="submit" name="submit" value="submit">Sign Up</button>
                        <?php 
                        // to display errors
                    if(isset($_GET["error"])){
                       if($_GET["error"] == "emptyinput"){
                            echo "<p>Please, fill in all fields. </p>";
                       }else if($_GET["error"] == "invaliduid"){
                            echo "<p>Choose a proper username. </p>";
                        }else if($_GET["error"] == "invalidemail"){
                            echo "<p>Choose a proper email</p>";
                        }else if($_GET["error"] == "pwdmatch"){
                            echo "<p>Passwords don't match. </p>";
                        }else if($_GET["error"] == "stmtfailed"){
                            echo "<p>ERROR</p>";
                        }else if($_GET["error"] == "usernametaken"){
                            echo "<p>Sorry, username already taken.</p>";
                        }else if($_GET["error"] == "none"){
                            echo "<p>Signup Completed.</p>";
                        }
                    }
                ?>
                    </form>
                </div>
               
            </div>
        </div>
    </body>
</html>