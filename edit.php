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
    <link rel="stylesheet" href="editstyle.css">
    <title>Edit Profile</title>
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
    <div class="edit-form">
            <form action="edit_submit.php" method="post">
                <table>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name" value="<?php echo $result['name']; ?>" required></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" name="email" value="<?php echo $result['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <th>New Password</th>
                        <td><input type="password" name="password" placeholder="Leave blank to keep the current password."></td>
                    </tr>
                    <tr>
                        <th>Activity</th>
                        <td>
                            <select id="activities" name="activities" required>
                                <option value="">Select an activity.</option>
                                <option value="sports" <?php echo ($result['activities'] == 'sports') ? 'selected' : ''; ?>>Sports</option>
                                <option value="movies" <?php echo ($result['activities'] == 'movies') ? 'selected' : ''; ?>>Movies</option>
                                <option value="travel" <?php echo ($result['activities'] == 'travel') ? 'selected' : ''; ?>>Travel</option>
                                <option value="dining" <?php echo ($result['activities'] == 'dining') ? 'selected' : ''; ?>>Dining</option>
                                <option value="gaming" <?php echo ($result['activities'] == 'gaming') ? 'selected' : ''; ?>>Gaming</option>
                                <option value="studying" <?php echo ($result['activities'] == 'studying') ? 'selected' : ''; ?>>Studying</option>
                                <option value="shopping" <?php echo ($result['activities'] == 'shopping') ? 'selected' : ''; ?>>Shopping</option>
                                <option value="hiking" <?php echo ($result['activities'] == 'hiking') ? 'selected' : ''; ?>>Hiking</option>
                                <option value="camping" <?php echo ($result['activities'] == 'camping') ? 'selected' : ''; ?>>Camping</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Birthday</th>
                        <td><input type="date" name="birthday" value="<?php echo $result['birthday']; ?>"></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            <select name="gender">
                                <option value="Male" <?php echo ($result['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($result['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><input type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                    </tr>
                    <tr>
                        <th>About me</th>
                        <td><textarea name="about" rows="4" cols="70"><?php echo $result['about']; ?></textarea></td>
                    </tr>
                </table>
                <div class="save-container">
                    <button type="submit" class="save-button">Save</button>
                </div>
            </form>
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