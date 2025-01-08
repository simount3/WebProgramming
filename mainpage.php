<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="homestyle.css">
    <title>Friend Match</title>
</head>
<body>
    <header>
        <div class="logo-container">
            <div class="logo">
                <img src="mainlogo.png" alt="Friend Match logo" width=90>
            </div>
            <h1>Friend<span class="highlight">Match</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="searchfriends.php">Search Friends</a></li>
                <?php if (isset($_SESSION['name'])) {echo '<li><a href="myfriends.php">My Friends</a></li>';} ?>
                <li><a href="contact.php">Contact</a></li>
                <?php 
                if (isset($_SESSION['name'])) {echo '<li><a href="mypage.php">My Page</a></li>';} 
                else {echo '<li><a href="login.php">Login</a></li>';}
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <section class="section1">
        <?php 
            if (isset($_SESSION['name'])) {
                echo '<div class="welcome-message">';
                echo '<h2>Welcome, ' . $_SESSION['name'] . '!</h2>';
                echo '<p>Explore the site to find new friends and engage in exciting activities!</p></div>';
            } else {
                echo '<h2>A place to meet friends</h2>';
                echo '<p>With FriendMatch, you can make friends from nearby or from around the world.<br/>Sign up to connect with people.</p>';
                echo '<div class="signup-container">';
                echo '<a href="signup.php" class="signup-button">Sign Up</a></div>';
            }
            ?>
        </section>
        <section class="section2">
            <div class="section2-1">
                <p>Why are People Using FriendMatch?</p>
            </div>
            <div class="section2-2">
                <p>Busy lives and changing circumstances can make meeting new people a challenge. 
                    FriendMatch provides a simple solution: an online platform dedicated to forming genuine friendships.
                </p>
            </div>
        </section>
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