<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));


$sender_name = $_POST['sender_name'];
$action = $_POST['action'];
$username = $_SESSION['name'];

if ($action == 'accept') {
    $query = "UPDATE friend_request SET status='accepted' WHERE sender='$sender_name' AND receiver='$username'";
    if (mysqli_query($db, $query)) {
        $query = "INSERT INTO friends (user1, user2) VALUES ('$sender_name', '$username')";
        mysqli_query($db, $query);

        echo "<script>alert('Friend request accepted!'); location.replace('myfriends.php');</script>";
    } else {
        echo "<script>alert('Error. Please try again.'); location.replace('myfriends.php');</script>";
    }
} else {
    $query = "UPDATE friend_request SET status='declined' WHERE sender='$sender_name' AND receiver='$username'";
    if (mysqli_query($db, $query)) {
        echo "<script>alert('Friend request declined.'); location.replace('myfriends.php');</script>";
    } else {
        echo "<script>alert('Error. Please try again.'); location.replace('myfriends.php');</script>";
    }
}

mysqli_close($db);
?>