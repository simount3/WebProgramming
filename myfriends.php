<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'friendmatch') or die(mysqli_error($db));

$username = $_SESSION['name'];

$requests_query = "SELECT sender, country, about FROM friend_request JOIN users ON friend_request.sender = users.name WHERE receiver='$username' AND status='pending'";
$requests_result = mysqli_query($db, $requests_query);
$friend_requests = mysqli_fetch_all($requests_result, MYSQLI_ASSOC);

$friends_query = "SELECT users.name, users.email, users.activities, users.birthday, users.gender, users.country, users.city 
                  FROM friends JOIN users ON (friends.user1 = users.name OR friends.user2 = users.name) 
                  WHERE (user1='$username' OR user2='$username') AND users.name != '$username'";
$friends_result = mysqli_query($db, $friends_query);
$friends_list = mysqli_fetch_all($friends_result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="myfriendstyle.css">
    <title>My Friends</title>
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
        <div class="friend-requests">
            <h2>Friend Requests</h2>
            <?php if (!empty($friend_requests)): ?>
                <table class="request-results">
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>About</th>
                        <th>Accept / Decline</th>
                    </tr>
                    <?php foreach ($friend_requests as $request): ?>
                        <tr>
                            <td><?php echo $request['sender']; ?></td>
                            <td><?php echo $request['country']; ?></td>
                            <td><?php echo $request['about']; ?></td>
                            <td>
                                <div class="action-buttons">
                                    <form action="manage_request.php" method="post">
                                        <input type="hidden" name="sender_name" value="<?php echo $request['sender']; ?>">
                                        <input type="hidden" name="action" value="accept">
                                        <button type="submit" class="accept-button">Accept</button>
                                    </form>
                                    <form action="manage_request.php" method="post">
                                        <input type="hidden" name="sender_name" value="<?php echo $request['sender']; ?>">
                                        <input type="hidden" name="action" value="decline">
                                        <button type="submit" class="decline-button">Decline</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No friend requests sent.</p>
            <?php endif; ?>
        </div>

        <div class="friends-list">
            <h2>My Friends</h2>
            <?php if (!empty($friends_list)): ?>
                <div class="notice">
                    <p>Feel free to send an email to your friends below!</p>
                </div>
                <table class="list-results">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Activities</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>City</th>
                    </tr>
                    <?php foreach ($friends_list as $friend): ?>
                        <tr>
                            <td><?php echo $friend['name']; ?></td>
                            <td><?php echo $friend['email']; ?></td>
                            <td><?php echo $friend['activities']; ?></td>
                            <td><?php echo $friend['birthday']; ?></td>
                            <td><?php echo $friend['gender']; ?></td>
                            <td><?php echo $friend['country']; ?></td>
                            <td><?php echo $friend['city']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>You have no friends yet. Feel free to send friend request.</p>
            <?php endif; ?>
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