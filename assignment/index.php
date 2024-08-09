<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="stylesindex.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header id="header">
        <div class="container">
            <h1>Welcome to My Page!</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <?php
            if (isset($_SESSION['valid'])) {
                include("connection.php");                    
                $result = mysqli_query($mysqli, "SELECT * FROM User");
            ?>  
                <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong>! <a href='logout.php' class="button logout">Logout</a></p>
            <?php   
            } else {
                echo "<p>You must be logged in to view this page.</p>";
                echo "<a href='login.php' class='button'>Login</a> | <a href='register.php' class='button'>Register</a>";
            }
            ?>
        </div>
    </main>

    <footer id="footer">
        <div class="container">
            <p>&copy; 2024 My Website. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
