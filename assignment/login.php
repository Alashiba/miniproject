<?php session_start(); ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="styleslogin.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <a href="index.php" class="btn btn-link mb-4">Home</a>
    <div class="form-container">
        <?php
        include("connection.php");

        if(isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($mysqli, $_POST['username']);
            $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

            if($name == "" || $pass == "") {
                echo "<div class='alert alert-danger'>Either username or password field is empty.</div>";
                echo "<a href='login.php' class='btn btn-link back-link'>Go back</a>";
            } else {
                $result = mysqli_query($mysqli, "SELECT * FROM User WHERE Username='$name' AND Password=md5('$pass')")
                            or die("Could not execute the select query.");
                
                $row = mysqli_fetch_assoc($result);
                
                if(is_array($row) && !empty($row)) {
                    $validuser = $row['Username'];
                    $_SESSION['valid'] = $validuser;
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['UserID'] = $row['UserID'];
                } else {
                    echo "<div class='alert alert-danger'>Invalid username or password.</div>";
                    echo "<a href='login.php' class='btn btn-link back-link'>Go back</a>";
                }

                if(isset($_SESSION['valid'])) {
                    header('Location: index.php');
                    exit();
                }
            }
        } else {
        ?>
        <h2 class="text-center mb-4">Login</h2>
        <form name="form1" method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
        <?php
        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
