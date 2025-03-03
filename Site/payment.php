<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EAP Films and Theatres Private Limited | Movie Showtimes</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="./assets/css/core/libs.min.css" />
    <link rel="stylesheet" href="./assets/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="./assets/vendor/iconly/css/style.css" />
    <link rel="stylesheet" href="./assets/vendor/animate.min.css" />
    <link rel="stylesheet" href="./assets/css/streamit.min.css?v=1.0.0" />
    <link rel="stylesheet" href="./assets/css/custom.min.css?v=1.0.0" />
    <link rel="stylesheet" href="./assets/css/rtl.min.css?v=1.0.0" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        .date-button {
            width: 80px;
            height: 80px;
            display: inline-block;
            text-align: center;
            line-height: 80px;
            margin: 5px;
            border: 1px solid rgb(8, 195, 170);
            border-radius: 5px;
            cursor: pointer;
        }
        .date-button:hover {
            background-color: rgb(8, 195, 148);
            color: white;
        }
        .selected {
            background-color: rgb(57, 4, 126);
            color: white;
        }
    </style>
</head>
<body>
    <?php include 'includes/loader.php'; ?>
    <main class="main-content">
        <?php include 'includes/menu.php'; ?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EA Films & Theatres - Buy Tickets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #000;
            color: #fff;
        }
        .navbar-custom a {
            color: #fff !important;
        }
        .timer-alert {
            background-color: #fa9722;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .booking-details {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
        }
        .amount-payable {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: right;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/150x50?text=EA+Films+&+Theatres" alt="EA Films & Theatres" style="height: 50px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">MOVIES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">THEATRES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">RATES & SHOW TIMES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">NEWS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">OFFERS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">BUY TICKETS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </nav>
<br>
<br>

    <!-- Timer Alert -->
    <div class="timer-alert">
        You have 290 seconds to complete this booking.
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Booking Form -->
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" value="Your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" value="07xxxxxxxx" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="example@email.com" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I agree to Terms & Conditions</label>
                    </div>
                </form>
            </div>

            <!-- Booking Details -->
            <div class="col-md-6">
                <div class="booking-details">
                    <h4>Booking Details</h4>
                    <p><strong>Movie:</strong> VidaaMuyarchi</p>
                    <p><strong>Theatre:</strong> Concorde</p>
                    <p><strong>Seats:</strong> Full: 1 Kids: 0</p>
                    <p><strong>Seat:</strong> BALCONY - F9</p>
                    <p><strong>Date & Time:</strong> 2025-02-27 10:30 AM</p>
                    <p class="text-muted">Note: All sales are final, and there will be NO refunds, cancellations, and/or amendments to the confirmed and realized bookings.</p>
                </div>
                <div class="amount-payable mt-3">
                    <h5>Amount Payable</h5>
                    <h3>$86.00</h3>
                </div>
                <div class="mt-3">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="creditCard" name="paymentMethod" checked>
                        <label class="form-check-label" for="creditCard">Pay by Credit Card, Visa / Master</label>
                        <img src="https://via.placeholder.com/50x20?text=Visa/Master" alt="Visa/Master" style="height: 20px; margin-left: 10px;">
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-danger">Pay Now</button>
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Simple timer for demonstration (290 seconds countdown)
        let timeLeft = 290;
        const timer = setInterval(() => {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(timer);
                alert("Time's up! Booking has expired.");
            }
        }, 1000);
    </script>
</body>
</html>

    </main>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/gototop.php'; ?>

    <!-- JavaScript Libraries -->
    <script src="./assets/js/core/libs.min.js"></script>
    <script src="./assets/vendor/lodash/lodash.min.js"></script>
    <script src="./assets/js/core/external.min.js"></script>
    <script src="./assets/js/plugins/countdown.js"></script>
    <script src="./assets/js/utility.js"></script>
    <script src="./assets/js/setting.js"></script>
    <script src="./assets/js/setting-init.js" defer></script>
    <script src="./assets/js/streamit.js" defer></script>
    <script src="./assets/js/swiper.js" defer></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Script -->
    <script>
        let selectedDate = '';

        function selectDate(date) {
            selectedDate = date;
            document.querySelectorAll('.date-button').forEach(btn => btn.classList.remove('selected'));
            event.target.classList.add('selected');

            const showtimesContainer = document.getElementById('showtimes');
            showtimesContainer.innerHTML = `<h5 class="mt-3">Showtimes for ${new Date(date).toLocaleDateString()}</h5>`;

            <?php foreach ($movies as $movie): ?>
                <?php foreach ($movie['theaters'] as $theater): ?>
                    showtimesContainer.innerHTML += `
                        <h5 class="mt-3"><i class="bi bi-geo-alt"></i> <?= $theater['name'] ?></h5>
                        <?php foreach ($theater['formats'] as $format): ?>
                            <h6>
                                <?= $format['type'] ?>
                                <img src="<?= $format['badge'] ?>" alt="Format" height="20">
                            </h6>
                            <div>   
                                <?php foreach ($format['showtimes'] as $time): ?>
                                    <button class="btn btn-outline-danger m-1"><?= $time ?></button>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    `;
                <?php endforeach; ?>
            <?php endforeach; ?>
        }
    </script>
</body>
</html>