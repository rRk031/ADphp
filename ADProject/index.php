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
                <a href="register.html" style="width: 100%; height: 100%;"><img src="pics/pngwing.com.png" alt="" id="signupImage"/></a>
            </div>

            <div id="main">
                <div id="signupText">
                    <label>Login</label>
                    <?php if(isset($_GET['error'])) { ?>
                             <p><?php echo $_GET['error'] ; ?></p>
                   <?php } ?>
               
                </div>

                <div id="formDiv">
                    <form action="login.php" method="post">
                        <input type="text" name="username" placeholder="Username" style="width: 600px;"><br>
                        <input type="password" name="password" placeholder="Password" style="width: 600px;"><br>
                        <button type="submit" name="signupsubmit" >Login</button>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
