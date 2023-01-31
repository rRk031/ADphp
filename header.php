
<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="background_styles.css">
      <link rel="stylesheet" href="css/navbar.css">
      <script src="js/navbar.js" defer></script>
      <title>Welcome</title>
    </head>
    <body>
      <nav class="navbar">
        <?php
        echo "<div class='user-name'></div>";
        echo "<a href='#'class='toggle-button'>";
        echo "<span class='bar'></span>";
        echo "<span class='bar'></span>";
        echo "<span class='bar'></span>";
        echo "</a>";
        ?>
        <div class="navbar-links">
          <ul>
            <li><a href='home.php'>My tasks</a></li>
            <li><a href='calendar.php'>Calendar</a></li>
            <li><a href='admin.php'>Admin</a></li>
            <li><a href='logout.php'>Logout</a></li>
          </ul>
        </div>
        
      </nav>
    </body>
</html>