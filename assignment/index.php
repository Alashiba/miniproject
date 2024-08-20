<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="stylesindex.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header id="header">
    <div class="header-overlay"></div>
    <div class="header-content">
        <h1>Welcome to My Page!</h1>
    </div>
</header>


    <main>
        <div class="container mt-5">
            <?php
            if (isset($_SESSION['valid'])) {
                include("connection.php");                    
                $result = mysqli_query($mysqli, "SELECT * FROM User");

                if ($result) {
            ?>  
                <div class="alert alert-success">
                    Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! 
                    <a href='logout.php' class="btn btn-danger btn-sm logout">Logout</a>
                </div>
            <?php
                } else {
                    echo "<div class='alert alert-danger'>Error fetching user data.</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>You must be logged in to view this page.</div>";
                echo "<a href='login.php' class='btn btn-primary button'>Login</a>";
                echo "<a href='register.php' class='btn btn-secondary button'>Register</a>";
            }
            ?>
        </div>
    </main>

    <footer id="footer">
        <div class="container">
            <p>&copy; 2024 My Website. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
