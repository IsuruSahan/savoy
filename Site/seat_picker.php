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
    <title>Theater Seat Layout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #000;
            margin: 0;
            padding: 20px;
        }
        .theater-section {
            margin-bottom: 40px;
            text-align: center;
        }
        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        .price-info {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .screen {
            background-color: #666;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 18px;
            border-radius: 5px;
        }
        .seats {
            display: flex;
            justify-content: center;
            gap: 5px;
            flex-wrap: wrap;
            max-width: 800px;
            margin: 0 auto;
        }
        .row-label {
            font-weight: bold;
            margin: 5px 10px;
            color: #333;
        }
        .seat {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
            margin: 2px;
        }
        .available {
            background-color: #fff;
            color: #000;
        }
        .selected {
            background-color: #ffa500; /* Orange for selected seats */
            color: #fff;
        }
        .unavailable {
            background-color: #999; /* Gray for unavailable seats */
            color: #fff;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <!-- BALCONY Section -->
    <div class="theater-section">
        <div class="section-title">BALCONY</div>
        <div class="price-info">(F. Rs. 860.00 / H. Rs. 605.00)</div>
        <div class="screen">THEATER SCREEN</div>
        <div class="seats">
            <div class="row-label">F</div>
            <div class="seat available">F21</div><div class="seat available">F20</div><div class="seat available">F19</div>
            <div class="seat selected">F18</div><div class="seat selected">F17</div><div class="seat selected">F16</div>
            <div class="seat available">F15</div><div class="seat available">F14</div><div class="seat available">F13</div>
            <div class="seat unavailable">F12</div><div class="seat unavailable">F11</div><div class="seat unavailable">F10</div>
            <!-- Repeat for other rows (E, D, C, B, A) with similar pattern -->
            <div class="row-label">E</div>
            <div class="seat available">E20</div><div class="seat available">E19</div><div class="seat available">E18</div>
            <div class="seat selected">E17</div><div class="seat selected">E16</div><div class="seat selected">E15</div>
            <div class="seat available">E14</div><div class="seat available">E13</div><div class="seat available">E12</div>
            <div class="seat unavailable">E11</div><div class="seat unavailable">E10</div><div class="seat unavailable">E9</div>
            <!-- Add rows D, C, B, A similarly -->
        </div>
    </div>

    <!-- ODC Section -->
    <div class="theater-section">
        <div class="section-title">ODC</div>
        <div class="price-info">(F. Rs. 750.00 / H. Rs. 485.00)</div>
        <div class="screen">THEATER SCREEN</div>
        <div class="seats">
            <div class="row-label">O</div>
            <div class="seat available">O14</div><div class="seat available">O13</div><div class="seat available">O12</div>
            <div class="seat selected">O11</div><div class="seat selected">O10</div><div class="seat selected">O9</div>
            <div class="seat available">O8</div><div class="seat available">O7</div><div class="seat available">O6</div>
            <div class="seat unavailable">O5</div><div class="seat unavailable">O4</div><div class="seat unavailable">O3</div>
            <!-- Repeat for other rows (N, M, L) with similar pattern -->
            <div class="row-label">N</div>
            <div class="seat available">N18</div><div class="seat available">N17</div><div class="seat available">N16</div>
            <div class="seat selected">N15</div><div class="seat selected">N14</div><div class="seat selected">N13</div>
            <div class="seat available">N12</div><div class="seat available">N11</div><div class="seat available">N10</div>
            <div class="seat unavailable">N9</div><div class="seat unavailable">N8</div><div class="seat unavailable">N7</div>
            <!-- Add rows M, L similarly -->
        </div>
    </div>

    <div class="continue-btn-container">
        <button class="btn btn-primary btn-lg">Continue</button>
    </div>

    <br>

    <script>
        // Optional: Add interactivity to toggle seat selection
        document.querySelectorAll('.seat.available').forEach(seat => {
            seat.addEventListener('click', function() {
                if (this.classList.contains('selected')) {
                    this.classList.remove('selected');
                } else {
                    this.classList.add('selected');
                }
            });
        });
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