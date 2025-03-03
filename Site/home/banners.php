<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Banner Slider</title>
    <style>
        .carousel-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            position: relative;
        }

        .carousel-inner {
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 400px;
        }

        .carousel-item {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            visibility: hidden;
        }

        .carousel-item.active {
            opacity: 1;
            visibility: visible;
            position: relative;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            max-height: 400px;
            object-fit: cover;
            display: block;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            cursor: pointer;
            color: white;
            font-size: 24px;
            line-height: 40px;
            text-align: center;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 15px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin: 0;
            padding: 0;
            z-index: 10;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            padding: 0;
            transition: background-color 0.3s;
        }

        .carousel-indicators button.active {
            background: white;
        }

        @media (max-width: 768px) {
            .carousel-inner {
                height: 250px;
            }
            .carousel-item img {
                max-height: 250px;
            }
        }

        @media (max-width: 576px) {
            .carousel-inner {
                height: 150px;
            }
            .carousel-item img {
                max-height: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="carousel-container">
        <?php
        // Include your config file
        include 'config.php'; // Adjust path if needed

        // Query to fetch active banners
        $query = "SELECT image_url FROM banners WHERE status = 1 ORDER BY id ASC";
        $result = $conn->query($query);

        $banners = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $banners[] = $prefix . $row['image_url']; // Prepend URL prefix to filename
            }
        } else {
            // Fallback banners if database is empty
            $banners = [
                'https://via.placeholder.com/1200x400?text=No+Banners+Available'
            ];
        }
        ?>

        <!-- Carousel -->
        <div id="bannerCarousel" class="carousel">
            <!-- Slides -->
            <div class="carousel-inner">
                <?php foreach($banners as $index => $banner): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo $banner; ?>" alt="Banner <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Indicators -->
            <div class="carousel-indicators">
                <?php for($i = 0; $i < count($banners); $i++): ?>
                    <button data-slide-to="<?php echo $i; ?>" 
                            class="<?php echo $i === 0 ? 'active' : ''; ?>"></button>
                <?php endfor; ?>
            </div>

            <!-- Controls -->
            <button class="carousel-control carousel-control-prev" aria-label="Previous">‹</button>
            <button class="carousel-control carousel-control-next" aria-label="Next">›</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('#bannerCarousel');
            const items = carousel.querySelectorAll('.carousel-item');
            const indicators = carousel.querySelectorAll('.carousel-indicators button');
            const prevBtn = carousel.querySelector('.carousel-control-prev');
            const nextBtn = carousel.querySelector('.carousel-control-next');
            let currentIndex = 0;
            const intervalTime = 3000;
            let interval;

            function showSlide(index) {
                items[currentIndex].classList.remove('active');
                indicators[currentIndex].classList.remove('active');
                
                currentIndex = (index + items.length) % items.length;
                
                items[currentIndex].classList.add('active');
                indicators[currentIndex].classList.add('active');
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            function startInterval() {
                interval = setInterval(nextSlide, intervalTime);
            }

            function stopInterval() {
                clearInterval(interval);
            }

            nextBtn.addEventListener('click', () => {
                stopInterval();
                nextSlide();
                startInterval();
            });

            prevBtn.addEventListener('click', () => {
                stopInterval();
                prevSlide();
                startInterval();
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    stopInterval();
                    showSlide(index);
                    startInterval();
                });
            });

            let touchStartX = 0;
            let touchEndX = 0;

            carousel.addEventListener('touchstart', e => {
                touchStartX = e.touches[0].clientX;
                stopInterval();
            });

            carousel.addEventListener('touchmove', e => {
                touchEndX = e.touches[0].clientX;
            });

            carousel.addEventListener('touchend', () => {
                if (touchStartX - touchEndX > 50) {
                    nextSlide();
                } else if (touchEndX - touchStartX > 50) {
                    prevSlide();
                }
                startInterval();
            });

            carousel.addEventListener('mouseenter', stopInterval);
            carousel.addEventListener('mouseleave', startInterval);

            startInterval();
        });
    </script>
</body>
</html>