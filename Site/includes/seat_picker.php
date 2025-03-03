<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Seat Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            text-align: center;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            border: none;
        }
        .seat.booked {
            background-color: #dc3545;
            cursor: not-allowed;
        }
        .seat.selected {
            background-color: #ffc107;
        }
    </style>
</head>
<body class="p-5">

    <h3 class="mb-4 text-center">Select Your Seats</h3>

    <div class="text-center">
        <div id="seatLayout" class="d-flex flex-wrap justify-content-center" style="width: 300px;">
            <!-- Seats will be dynamically generated here -->
        </div>

        <button class="btn btn-primary btn-sm mt-3" onclick="bookSeats()">Book Now</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let seats = 30; // Total seats
            let bookedSeats = [5, 10, 15]; // Example booked seats (fetch from database in PHP)
            let seatLayout = document.getElementById("seatLayout");

            for (let i = 1; i <= seats; i++) {
                let seat = document.createElement("button");
                seat.classList.add("seat");
                seat.textContent = i;
                seat.dataset.seatNumber = i;

                if (bookedSeats.includes(i)) {
                    seat.classList.add("booked");
                    seat.disabled = true;
                }

                seat.addEventListener("click", function () {
                    if (!seat.classList.contains("booked")) {
                        seat.classList.toggle("selected");
                    }
                });

                seatLayout.appendChild(seat);
            }
        });

        function bookSeats() {
            let selectedSeats = Array.from(document.querySelectorAll(".seat.selected"))
                                    .map(seat => seat.dataset.seatNumber);
            if (selectedSeats.length > 0) {
                alert("Seats Booked: " + selectedSeats.join(", "));
                // Here you would send selectedSeats to PHP via AJAX or form submission
            } else {
                alert("No seats selected!");
            }
        }
    </script>
</body>
</html>
