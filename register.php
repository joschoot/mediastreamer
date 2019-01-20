<?php
include("config.php");
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}

// initializing variables
$errors = array();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$submit= $_POST['reg_user'];

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($username) == true){array_push($errors, "Username is required");}
if (empty($email) == true){array_push($errors, "Email is required");}
if (empty($password) == true){array_push($errors, "Password is required");}

//Check if the user clicked and there are some not filled forms
if (count($errors) != 0){
    if (isset($submit)){$errors_msg = 'Fill in the form correctly';}
} else{

    $password = md5($password);//encrypt the password before saving in the database
    $query = "INSERT INTO users (username, email, hash_psswd) 
  			  VALUES('$username', '$email', '$password')";
    $created = 'Account Created';
    mysqli_query($conn, $query);
}
$conn->close()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Media Schroeff</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main">

    <h1>Sign up</h1>
    <div class="container">
        <div class="sign-up-content">

            <form action ="" method="post" class="signup-form">

                <h2 class="form-title">Sign Up</h2>

                <div class="form-textbox">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" />
                </div>

                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>

                <div class="form-textbox">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" />
                </div>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $errors_msg; ?></div>
                <div style = "font-size:11px; color:#006400; margin-top:10px"><?php echo $created; ?></div>
                <div class="form-textbox">
                    <input type="submit" name="reg_user" id="reg_user" class="submit" value="Create Account" />
                </div>
            </form>

            <p class="loginhere">
                Already have an account ?<a href="/login.php" class="loginhere-link"> Log in</a>
            </p>
        </div>
    </div>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>