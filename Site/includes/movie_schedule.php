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

// Get today's date and the next ten days
$today = new DateTime();
$dates = [];
for ($i = 0; $i < 10; $i++) {
    $dates[] = $today->modify('+1 day')->format('Y-m-d');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Showtimes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .date-button {
            width: 80px;
            height: 80px;
            display: inline-block;
            text-align: center;
            line-height: 80px;
            margin: 5px;
            border: 1px solid #c30811;
            border-radius: 5px;
            cursor: pointer;
        }
        .date-button:hover {
            background-color: #c30811;
            color: white;
        }
        .selected {
            background-color: #c30811;
            color: white;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h4>Select a Date</h4>
    <div class="mb-3">
        <?php foreach ($dates as $date): ?>
            <div class="date-button" onclick="selectDate('<?= $date ?>')">
                <?= date('d M', strtotime($date)) ?>
            </div>
        <?php endforeach; ?>
    </div>
    
    <?php foreach ($movies as $movie): ?>
        <h2 class="mb-4"> <?= $movie['title'] ?> </h2>
        <div class="row">
            <div class="col-md-3">
                <img src="<?= $movie['poster'] ?>" class="img-fluid" alt="<?= $movie['title'] ?>">
            </div>
            <div class="col-md-9" id="showtimes">
                <!-- Showtimes will be populated here based on selected date -->
                <p>Select a date to see showtimes.</p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let selectedDate = '';

    function selectDate(date) {
        selectedDate = date;
        document.querySelectorAll('.date-button').forEach(btn => btn.classList.remove('selected'));
        event.target.classList.add('selected');

        // Populate showtimes for the selected date
        const showtimesContainer = document.getElementById('showtimes');
        showtimesContainer.innerHTML = '';

        const showtimesHTML = `
            <h5 class="mt-3">Showtimes for ${new Date(date).toLocaleDateString()}</h5>
            <?php foreach ($movies as $movie): ?>
                <?php foreach ($movie['theaters'] as $theater): ?>
                    <h5 class="mt-3"> <i class="bi bi-geo-alt"></i> <?= $theater['name'] ?> </h5>
                    <?php foreach ($theater['formats'] as $format): ?>
                        <h6>
                            <?= $format['type'] ?>
                            <img src="<?= $format['badge'] ?>" alt="Format" height="20">
                        </h6>
                        <div>
                            <?php foreach ($format['showtimes'] as $time): ?>
                                <button class="btn btn-outline-danger m-1"> <?= $time ?> </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        `;
        showtimesContainer.innerHTML = showtimesHTML;
    }
</script>
</body>
</html>
