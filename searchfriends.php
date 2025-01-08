<?php
session_start();

if (!isset($_SESSION['name'])) {
    echo "<script>alert('Please log in first.')</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_activity = $_POST['activity'];
    $query = "SELECT name, country, about FROM users WHERE activities='$search_activity' AND name != '" . $_SESSION['name'] . "'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('No results found.'); location.replace('searchfriends.php');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="searchstyle.css">
    <title>Search Friends</title>
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
        <h2>Search for Friends</h2>
        <form action="searchfriends.php" method="post" class="search-form">
            <select name="activity">
                <option value="">Select an activity</option>
                <option value="sports">Sports</option>
                <option value="movies">Movies</option>
                <option value="travel">Travel</option>
                <option value="dining">Dining</option>
                <option value="gaming">Gaming</option>
                <option value="studying">Studying</option>
                <option value="shopping">Shopping</option>
                <option value="hiking">Hiking</option>
                <option value="camping">Camping</option>
            </select>
            <button type="submit" class="search-button">Search</button>
        </form>
        
        <?php if (isset($result)): ?>
            <h2>Search Results</h2>
            <table class="results">
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>About</th>
                    <th>Request</th>
                </tr>
                <?php if (mysqli_num_rows($result) != 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td><?php echo $row['about']; ?></td>
                            <td>
                                <form action="send_request.php" method="post">
                                    <input type="hidden" name="receiver_name" value="<?php echo $row['name']; ?>">

                                    <?php
                                    $sender = $_SESSION['name'];
                                    $receiver = $row['name'];
                                    $check_query = "SELECT * FROM friends WHERE (user1 = '$sender' AND user2 = '$receiver') OR (user1 = '$receiver' AND user2 = '$sender')";
                                    $check_result = mysqli_query($db, $check_query);
                                    
                                    if (mysqli_num_rows($check_result) != 0) {
                                        echo "<button type='button' class='disabled-button' disabled>My Friend</button>";
                                    } else {
                                        echo "<button type='submit' class='request-button'>Send Friend Request</button>";
                                    }
                                    ?>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
            </table>
        <?php endif; ?>
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