<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));

$receiver_name = $_POST['receiver_name'];
$sender_name = $_SESSION['name'];

$check_query = "SELECT * FROM friend_request WHERE sender='$sender_name' AND receiver='$receiver_name'";
$check_result = mysqli_query($db, $check_query);

if (mysqli_num_rows($check_result) != 0) {
    echo "<script>alert('You have already sent a friend request to this user.'); location.replace('searchfriends.php');</script>";
} else {
    $query = "INSERT INTO friend_request (sender, receiver) VALUES ('$sender_name', '$receiver_name')";
    if (mysqli_query($db, $query)) {
        echo "<script>alert('Friend request sent successfully!'); location.replace('searchfriends.php');</script>";
    } else {
        echo "<script>alert('Error. Please try again.'); location.replace('searchfriends.php');</script>";
    }
}

mysqli_close($db);
?>