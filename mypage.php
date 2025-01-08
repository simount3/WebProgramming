<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));

$username = $_SESSION['name'];
$query = "SELECT * FROM users WHERE name='$username'";
$result = mysqli_fetch_array(mysqli_query($db, $query));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="mypagestyle.css">
    <title>My Page</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <div class="logo">
                <img src="mainlogo.png" alt="mainlogo" width=90>
            </div>
            <h1>Friend<span class="highlight">Match</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="searchfriends.php">Search Friends</a></li>
                <li><a href="myfriends.php">My Friends</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="mypage.php">My Page</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="myprofile">
            <table>
                <tr>
                    <th>Name</th>
                    <td><?php echo $result['name']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $result['email']; ?></td>
                </tr>
                <tr>
                    <th>Activity</th>
                    <td><?php echo $result['activities']; ?></td>
                </tr>
                <tr>
                    <th>Birthday</th>
                    <td><?php echo $result['birthday']; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo $result['gender']; ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td><?php echo $result['country']; ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?php echo $result['city']; ?></td>
                </tr>
                <tr>
                    <th>About me</th>
                    <td><?php echo $result['about']; ?></td>
                </tr>
            </table>
            <div class="edit-container">
                <a href="edit.php" class="edit-button">Edit</a>
            </div>
        </div>
        <div class="logout-container">
            <a href="logout.php" class="logout-button">logout</a>
        </div>
    </main>

    <footer>
        <section class="footer-container">
            <div class="footer-contact">
                <a href="contact.php">contact us</a>
            </div>
            <div class="rights">
                <p>&copy; 2024 Copyright: FriendMatch.com</p>
            </div>
        </section>
    </footer>
</body>
</html>