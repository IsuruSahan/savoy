



<?php
// Start the session at the very top
@session_start();

// Include your config file
include 'home/config.php'; // Adjust the path if necessary

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message variable
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form and sanitize it
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if the email already exists in the database
        $stmt = $conn->prepare("SELECT COUNT(*) FROM newsletter_subscribers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            // Email already exists, set an error message
            $error_message = "This email is already subscribed.<br>";
        } else {
            // Prepare an insert statement
            $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email, subscribed_at) VALUES (?, NOW())");

            // Bind the email parameter
            $stmt->bind_param("s", $email);

            // Execute the statement
            if ($stmt->execute()) {
                // Set a success message
                $_SESSION['success_message'] = "Subscription successful! Welcome aboard, $email.";
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }

            // Close the statement
            $stmt->close();
        }
    } else {
        // Set an error message for invalid email format
        $error_message = "Invalid email format.<br>";
    }
}

// Close the connection at the end of the script
// Note: You may choose to keep the connection open if you need to display more data
?>

<footer class="footer footer-default">
    <div class="container-fluid">
        <div class="footer-top">
            <div class="row">
                <div class="col-xl-3 col-lg-6 mb-5 mb-lg-0">
                    <div class="footer-logo">
                        <!--Logo -->
                        <div class="logo-default">
                            <a class="navbar-brand text-primary" href="./index.html">
                                <img class="img-fluid logo" src="./assets/images/logo.png" loading="lazy" alt="EAP"/>
                            </a>
                        </div>
                    </div>
                    <p class="mb-4 font-size-14">Email us: <span class="text-white">inquiries.eapft@eapmovies.com</span>
                    </p>
                    <p class="text-uppercase letter-spacing-1 font-size-14 mb-1">customer services</p>
                    <p class="mb-0 contact text-white">+94 723 405 405</p>
                </div>
                <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
                    <h4 class="footer-link-title">Quick Links</h4>
                    <ul class="list-unstyled footer-menu">
                        <li class="mb-3">
                            <a href="#" class="ms-3">about us</a>
                        </li>
                        <li class="mb-3">
                            <a href="#" class="ms-3">Blog</a>
                        </li>
                        <li>
                            <a href="#" class="ms-3">FAQ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
                    <h4 class="footer-link-title">Movies to watch</h4>
                    <ul class="list-unstyled footer-menu">
                        <li class="mb-3">
                            <a href="#" class="ms-3">Top trending</a>
                        </li>
                        <li class="mb-3">
                            <a href="#" class="ms-3">Recommended</a>
                        </li>
                        <li>
                            <a href="#" class="ms-3">Popular</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
                    <h4 class="footer-link-title">About company</h4>
                    <ul class="list-unstyled footer-menu">
                        <li class="mb-3">
                            <a href="#" class="ms-3">contact us</a>
                        </li>
                        <li class="mb-3">
                            <a href="#" class="ms-3">privacy policy</a>
                        </li>
                        <li>
                            <a href="#" class="ms-3">Terms of use</a>
                        </li>
                    </ul>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <h4 class="footer-link-title">Subscribe to Newsletter</h4>
                    
                    <!-- Display success message if it exists -->
                    <?php if (isset($_SESSION['success_message'])): ?>
                        <div class="alert alert-success"><?php echo $_SESSION['success_message']; ?></div>
                        <?php unset($_SESSION['success_message']); // Unset after displaying to avoid repetition ?>
                    <?php endif; ?>

                    <!-- Display error message if it exists -->
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mailchimp mailchimp-dark">
                            <div class="input-group mb-3 mt-4">
                                <input type="email" name="email" class="form-control mb-0 font-size-14" placeholder="Email*" aria-describedby="button-addon2" required>
                                <div class="iq-button">
                                    <button type="submit" class="btn btn-sm" id="button-addon2">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center mt-5">
                    <span class="font-size-14 me-2">Follow Us:</span>
                    <ul class="p-0 m-0 list-unstyled widget_social_media">
                        <li class="">
                            <a href="https://www.facebook.com/" class="position-relative">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://twitter.com/" class="position-relative">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://github.com/" class="position-relative">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="https://www.instagram.com/" class="position-relative">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom border-top">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <ul class="menu list-inline p-0 d-flex flex-wrap align-items-center">
                        <li class="menu-item">
                            <a href="#"> Terms Of Use </a>
                        </li>
                        <li id="menu-item-7316" class="menu-item">
                            <a href="#"> Privacy-Policy </a>
                        </li>
                        <li class="menu-item">
                            <a href="#"> FAQ </a>
                        </li>
                        <li class="menu-item">
                            <a href="#"> Watch List </a>
                        </li>
                    </ul>
                    <p class="font-size-14">© <span class="currentYear"></span> <span class="text-primary">EAP Films and Theatres</span>. All Rights Reserved. All videos and shows on this platform are trademarks of, and all related images and content are the property of, EAP FILMS. Duplication and copy of this is strictly prohibited. All rights reserved. </p>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <h6 class="font-size-14 pb-1">Coming Soon On</h6>
                    <div class="d-flex align-items-center">
                        <a class="app-image" href="#">
                            <img src="./assets/images/footer/google-play.webp" loading="lazy" alt="play-store" />
                        </a>
                        <br />
                        <a class="ms-3 app-image" href="#">
                            <img src="./assets/images/footer/apple.webp" loading="lazy" alt="app-store" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
