<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="container">

            <div id="aside">
                <a href="register.php" style="width: 100%; height: 100%;"><img src="pics/pngwing.com.png" alt="" id="signupImage"/></a>
            </div>

            <div id="main">
                <div id="signupText">
                    <label>Login</label>
                </div>

                <div id="formDiv">
                    <form action="login.php" method="post">
                        <input type="text" name="username" placeholder="Username" style="width: 600px;"><br>
                        <input type="password" name="pwd" placeholder="Password" style="width: 600px;"><br>
                        <button type="submit" name="submit" >Login</button>
                        <?php 
                        // to display errors
                    if(isset($_GET["error"])){
                       if($_GET["error"] == "emptyinput"){
                            echo "<p>Please, fill in all fields. </p>";
                       }else if($_GET["error"] == "wronglogin"){
                            echo "<p>Incorrect login information. </p>";
                        }
                    }
                ?>
                    </form>
                    
                </div>

            </div>
        </div>
    </body>
</html>
