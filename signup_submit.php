<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$activities = $_POST['activities'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$city = $_POST['city'];
$about = addslashes($_POST['about']);

$query = "INSERT INTO users (name, email, password, activities, birthday, gender, country, city, about) 
          VALUES ('$name', '$email', '$password', '$activities', '$birthday', '$gender', '$country', '$city', '$about')";
          
$result = mysqli_query($db, $query);

if ($result) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mainstyle.css">
        <title>Registration Successful</title>
        <link rel="stylesheet" href="signup_submit.css"
    </head>
    <body>
        <div class="success-message-container">
            <div class="success-message">
                <img src="mainlogo.png" alt="Logo">
                <h1>Registration Successful!</h1>
                <a href="login.php" class="button">Login</a>
            </div>
        </div>
    </body>
    </html>';
} else {
    echo "Error!" . mysqli_error($db);
}

mysqli_close($db);
?>
