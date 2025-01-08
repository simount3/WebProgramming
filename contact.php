<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="contactstyle.css">
    <title>Contact FriendMatch</title>
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
                <?php
                if (isset($_SESSION['name'])) {
                    echo '<li><a href="myfriends.php">My Friends</a></li>';
                }
                ?>
                <li><a href="contact.php">Contact</a></li>
                <?php 
                if (isset($_SESSION['name'])) {
                    echo '<li><a href="mypage.php">My Page</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <section class="contact-container">
            <div class="contactimage-container">
                <img src="contactimg.avif" alt="image of freinds" width=500>
            </div>
            <div class="contact">
                <h2>Get in touch with us</h2>
                <p>If you have any questions or need further information, please contact us using the information below.</p>
                <div class="contact-info">
                    <p>Email: info@friendmatch.com</p>
                    <p>Instagram: @friendmatch</p>
                    <p>Twitter: @friendmatch</p>
                    <p>Phone: +1 234 567 890</p>
                </div>
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
