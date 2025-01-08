<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));

$username = $_SESSION['name'];

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$activities = $_POST['activities'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$city = $_POST['city'];
$about = addslashes($_POST['about']);

if (empty($name) || empty($email) || empty($birthday) || empty($country) || empty($city) || empty($about)) {
    echo "<script>alert('All fields except password must be filled out!')</script>";
    echo "<script>location.replace('edit.php');</script>";
    exit();
}
if(!empty($password)) {
    $newpassword = password_hash($password, PASSWORD_DEFAULT);
    $password_query = ", password='$newpassword'";
} else {
    $password_query = "";
}

$query = "UPDATE users SET name='$name', email='$email', activities='$activities', birthday='$birthday', 
          gender='$gender', country='$country', city='$city', about='$about' $password_query WHERE name='$username'";
$result = mysqli_query($db, $query);

if($result) {
    echo "<script>alert('Your profile has been updated successfully.')</script>";
    echo "<script>location.replace('mypage.php')</script>";
} else {
    echo "<script>alert('There was an error updating your profile. Please try again.')</script>";
    echo "<script>location.replace('edit.php');</script>";
}

?>