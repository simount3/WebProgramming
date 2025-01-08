<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="signupstyle.css">
    <title>Registration</title>
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
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="signup-container">
            <h2>Create Your Account</h2>
            <form action="signup_submit.php" method="POST">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Type your name." required>

                <label for="email">Email Address</label>
                <input type="email" name="email" placeholder="Type your email." required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="⦁⦁⦁⦁⦁⦁" required>

                <label for="activities">What kind of activity would you like to do with your new friends?</label>
                <select name="activities" required>
                    <option value="">Select an activity.</option>
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

                <label for="birthday">Date of Birth</label>
                <input type="date" name="birthday" required>

                <label for="gender">Gender</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="male" required> Male</label>
                    <label><input type="radio" name="gender" value="female" required> Female</label>
                </div>

                <label for="country">Country</label>
                <input type="text" name="country" required>

                <label for="city">City</label>
                <input type="text" name="city" required>

                <label for="about">About Me</label>
                <textarea name="about" rows="4" required></textarea>

                <button type="submit" class="signup-button">Sign Up</button>
            </form>
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
