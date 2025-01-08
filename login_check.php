<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));

$username = $_POST['name'];
$userpass = $_POST['password'];

$query = "SELECT * FROM users WHERE name = '$username'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($row != null && password_verify($userpass, $row['password'])) {
    $_SESSION['name'] = $row['name'];
    echo "<script>location.replace('mainpage.php');</script>";
    exit;
}

if ($row == null || !password_verify($userpass, $row['password'])) {
    echo "<script>alert('Invalid username or password!')</script>";
    echo "<script>location.replace('login.php');</script>";
    exit();
}

mysqli_close($db);
?>

