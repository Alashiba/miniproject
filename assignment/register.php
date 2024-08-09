<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	
	$email = $_POST['email'];  
	$user = $_POST['username'];  
	$pass = $_POST['password'];  

	if(empty($email) || empty($user) || empty($pass)) {  
		echo "<div class='alert'>All fields should be filled. Either one or many fields are empty.</div>";
		echo "<br/>";
		echo "<a href='register.php' class='back-link'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO User(Username, Email, Password) VALUES('$user', '$email', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "<div class='success'>Registration successful!</div>";
		echo "<br/>";
		echo "<a href='login.php' class='login-link'>Login</a>";
	}
} else {
?>
    <div class="container">
        <div class="left-side">
            <h1>Welcome!</h1>
            <p>Join the #1 Recipe Sharing Platform</p>
            <form name="form1" method="post" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Register">
                </div>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
        <div class="right-side">
            <div class="image-overlay">
                <img src="images/food1.jpeg" alt="Delicious Food" class="background-image">
                <div class="overlay-text">
                    <h2>Your Culinary Journey Starts Here</h2>
                    <p>Cook, Share, Inspire</p>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
</body>
</html>
