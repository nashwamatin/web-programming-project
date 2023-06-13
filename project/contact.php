<?php
$confirmationMsg = "";

if (isset($_POST['btn-send'])) {
    $UserName = $_POST['Uname'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Msg = $_POST['msg'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO contact (UserName, Email, Subject, Msg) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $UserName, $Email, $Subject, $Msg);
        $stmt->execute();

        // Check if the data was successfully inserted
        if ($stmt->affected_rows > 0) {
            $confirmationMsg = "Message received. Thank you!";
        } else {
            $confirmationMsg = "Failed to insert data.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="nav container">
        <a href="#" class="logo">PINK<span>BLISS</span></a>
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="category.html">Category</a></li>
                <li><a href="article.html">Articles</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <a href="signup.html" class="login">Sign Up</a>
        </div>
    </header>

    <section class="home" id="home">
        <div class="home-text container">
            <h2 class="home-title">CONTACT US</h2>
            <span class="home-subtitle">NEED HELP?</span>
        </div>
    </section>
<div class="container">
    <form action="" method="POST">
        <h2>GET IN TOUCH</h2>
        <?php if (!empty($confirmationMsg)) { ?>
                <p><?php echo $confirmationMsg; ?></p>
            <?php } ?>
        <input type="text" name="Uname" placeholder="User Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="subject" name="subject" placeholder="Subject" required>
        <textarea name="msg" rows="4" placeholder="How can we help you" required></textarea>
        <button class="submit" name="btn-send">Send</button>
    </form>
</div>
<footer>
        <div class="footer-container">
            <div class="sec aboutus">
                <h2>About Blog</h2>
                <p>We create article for you to read to catch up on the latest sensation! Our job is to help you to navigate through the fashion world</p>
                <ul class="sci">
                    <li><a href="https://www.instagram.com"><i class="bx bxl-instagram"></i></a></li>
                    <li><a href="https://twitter.com"><i class="bx bxl-twitter"></i></a></li>
                </ul>
            </div>
            <div class="sec quicklinks">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                </ul>
            </div>
            <div class="sec contactBx">
                <h2>Contact Info</h2>
                <ul class="info">
                    <li>
                        <span><i class='bx bxs-map'></i></span>
                        <span>Seoul <br>Gangnam 566-118<br> South Korea</span>
                    </li>
                    <li>
                        <span><i class='bx bx-envelope' ></i></span>
                        <p><a href="pinkbliss@gmail.com">pinkbliss@gmail.com</a></p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
</body>
</html>