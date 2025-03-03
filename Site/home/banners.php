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
            height: 400px; /* Reduced default height */
        }

        .carousel-item {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 100%; /* Start off-screen to the right */
    transition: left 0.5s ease-in-out;
}

.carousel-item.active {
    left: 0; /* Slide to visible position */
    position: relative;
}

        .carousel-item img {
            width: 100%;
            height: 100%;
            max-height: 400px; /* Match container height */
            object-fit: cover;
            display: block;
        }

        /* Controls */
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

        /* Indicators */
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .carousel-inner {
                height: 250px; /* Reduced for tablets */
            }
            .carousel-item img {
                max-height: 250px;
            }
        }

        @media (max-width: 576px) {
            .carousel-inner {
                height: 150px; /* Reduced for mobile */
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
        // Array of banner images
        $banners = [
            'assets\images\banners\banner_3.svg',
            'assets\images\banners\banner_2.svg',
            'assets\images\banners\banner_one.svg'
        ];
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
            const intervalTime = 5000;
            let interval;

            function showSlide(index) {
                // Remove active class from current slide
                items[currentIndex].classList.remove('active');
                indicators[currentIndex].classList.remove('active');
                
                // Update index with wrapping
                currentIndex = (index + items.length) % items.length;
                
                // Add active class to new slide
                items[currentIndex].classList.add('active');
                indicators[currentIndex].classList.add('active');
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            // Auto slide
            function startInterval() {
                interval = setInterval(nextSlide, intervalTime);
            }

            function stopInterval() {
                clearInterval(interval);
            }

            // Event listeners
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

            // Touch support
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

            // Pause on hover
            carousel.addEventListener('mouseenter', stopInterval);
            carousel.addEventListener('mouseleave', startInterval);

            // Start the carousel
            startInterval();
        });
    </script>
</body>
</html>