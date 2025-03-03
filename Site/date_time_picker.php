<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EAP Films and Theatres | Showtimes</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="./assets/css/core/libs.min.css" />
    <link rel="stylesheet" href="./assets/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/streamit.min.css?v=1.0.0" />
    <link rel="stylesheet" href="./assets/css/custom.min.css?v=1.0.0" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            background: #1c1c1c;
            color: #d0d0d0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }
        .date-button {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 6px;
            border: 1px solid #511668;
            border-radius: 8px;
            background: #2c2c2c;
            cursor: pointer;
        }
        .date-button:hover {
            background: #511668;
            color: #fff;
        }
        .date-button span {
            font-size: 1.2rem;
            font-weight: 500;
        }
        .date-button small {
            font-size: 0.8rem;
            font-weight: 400;
        }
        .selected {
            background: #fa9722;
            color: #1c1c1c;
            border-color: #fa9722;
        }
        .movie-card {
            background: #2c2c2c;
            border-radius: 8px;
            padding: 15px;
        }
        .showtime-btn {
            background: #511668;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            color: #fff;
            font-size: 0.9rem;
            margin: 4px;
        }
        .showtime-btn:hover {
            background: #fa9722;
            color: #1c1c1c;
        }
        h2, h4, h5, h6 {
            font-weight: 600;
            color: #fff;
            margin-bottom: 10px;
        }
        p {
            margin: 0;
            color: #a0a0a0;
        }
        .badge-img {
            vertical-align: middle;
            margin-left: 6px;
        }
        .row {
            margin: 0;
        }
    </style>
</head>
<body>
    <?php include 'includes/loader.php'; ?>
    <main class="main-content">
        <?php include 'includes/menu.php'; ?>

        <br>
        <br>

        <div class="container mt-4">
            <h4>Pick a Date</h4>
            <div class="d-flex flex-wrap mb-4">
                <?php
                $today = new DateTime();
                $dates = [];
                for ($i = 0; $i < 10; $i++) {
                    $date = $today->modify('+1 day')->format('Y-m-d');
                    $dates[] = $date;
                    echo "<div class='date-button' onclick=\"selectDate('$date')\">
                            <span>" . date('d', strtotime($date)) . "</span>
                            <small>" . date('M', strtotime($date)) . "</small>
                          </div>";
                }
                ?>
            </div>

            <?php
            $movies = [
                [
                    "title" => "Captain America: Brave New World",
                    "poster" => "captain-america.jpg",
                    "theaters" => [
                        [
                            "name" => "Savoy Wellawaththa - Colpetty",
                            "formats" => [
                                [
                                    "type" => "Digital 3D",
                                    "badge" => "digital-3d.png",
                                    "showtimes" => ["10:00 AM", "12:20 PM", "04:45 PM", "07:00 PM"]
                                ]
                            ]
                        ],
                        [
                            "name" => "Savoy #D Rajagiriya - Rajagiriya",
                            "formats" => [
                                [
                                    "type" => "IMAX 3D",
                                    "badge" => "imax-3d.png",
                                    "showtimes" => ["11:15 AM", "02:00 PM", "04:30 PM", "07:00 PM", "09:30 PM"]
                                ]
                            ]
                        ]
                    ]
                ]
            ];
            ?>

            <?php foreach ($movies as $movie): ?>
                <div class="movie-card mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= $movie['poster'] ?>" class="img-fluid rounded" alt="<?= $movie['title'] ?>">
                        </div>
                        <div class="col-md-9">
                            <h2><?= $movie['title'] ?></h2>
                            <div id="showtimes">
                                <p>Select a date to view showtimes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
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
            showtimesContainer.innerHTML = `<h5>Showtimes for ${new Date(date).toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</h5>`;

            <?php foreach ($movies as $movie): ?>
                <?php foreach ($movie['theaters'] as $theater): ?>
                    showtimesContainer.innerHTML += `
                        <h5 class="mt-3"><i class="fas fa-map-marker-alt me-2"></i> <?= $theater['name'] ?></h5>
                        <?php foreach ($theater['formats'] as $format): ?>
                            <h6 class="mt-2">
                                <?= $format['type'] ?>
                                <img src="<?= $format['badge'] ?>" alt="Format" height="18" class="badge-img">
                            </h6>
                            <div class="mt-1">
                                <?php foreach ($format['showtimes'] as $time): ?>
                                    <button class="showtime-btn"><?= $time ?></button>
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