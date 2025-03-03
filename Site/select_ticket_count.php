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

        <?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #511668;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .ticket-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #000;
            border-radius: 5px;
        }
        .form-label {
            color: #fff;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .form-control {
            background-color: #fff;
            color: #000;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        .total-tickets {
            background-color: #d3d3d3;
            color: #000;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-continue {
            background-color: #511668;
            color: #fff;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            border: none;
        }
        .note {
            color: #fff;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <div class="container ticket-container">
        <h1 class="text-center mb-4">HOW MANY TICKETS ?</h1>
        
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fullTickets" class="form-label">No. of Full Tickets</label>
                    <select class="form-control" id="fullTickets" name="fullTickets">
                        <option value="0">0</option>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="kidsTickets" class="form-label">No. of Kids Tickets</label>
                    <select class="form-control" id="kidsTickets" name="kidsTickets">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>

            <div class="total-tickets">
                Total Tickets: <span id="total">1</span>
            </div>

            <button type="button" class="btn-continue">CONTINUE</button>
            
            <p class="note">(NOTE: One Box can accommodate two persons)</p>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to update total tickets
        document.addEventListener('DOMContentLoaded', function() {
            const fullTickets = document.getElementById('fullTickets');
            const kidsTickets = document.getElementById('kidsTickets');
            const totalSpan = document.getElementById('total');

            function updateTotal() {
                const full = parseInt(fullTickets.value) || 0;
                const kids = parseInt(kidsTickets.value) || 0;
                totalSpan.textContent = full + kids;
            }

            fullTickets.addEventListener('change', updateTotal);
            kidsTickets.addEventListener('change', updateTotal);
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