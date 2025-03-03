<div class="verticle-slider section-padding-bottom">
    <div class="slider">
        <div class="slider-flex position-relative">
            <div class="slider--col position-relative">
                <div class="vertical-slider-prev swiper-button"><i class="iconly-Arrow-Up-2 icli"></i></div>
                <div class="slider-thumbs" data-swiper="slider-thumbs">
                    <div class="swiper-container" data-swiper="slider-thumbs-inner">
                        <div class="swiper-wrapper top-ten-slider-nav">
                           

						   <div class="swiper-slide swiper-bg">
                                <div class="block-images position-relative">
                                    <div class="img-box slider--image">
                                        <img src="./assets/images/top-10/01.webp" class="img-fluid" alt="" loading="lazy" />
                                    </div>
                                    <div class="block-description">
                                        <h6 class="iq-title"><a href="tv-show-detail.html">lostti n sacee</a></h6>
                                        <div class="movie-time d-flex align-items-center my-2">
                                            <span class="text-body">2 hr 30 minute</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
							<?php
include("config.php");

// Select movies where hits is equal to 0
$sql = "SELECT MovieID, ThumbnailURL, MovieName, duration FROM movies WHERE hits = 0";
$result = $conn->query($sql);

// Output data of each row
while ($row = $result->fetch_assoc()) {
    $movieID = $row["MovieID"];
     $thumbnailURL = $prefix."thumbnail/" . $row["ThumbnailURL"];
    $movieName = $row["MovieName"];
    $duration = $row["duration"];
	 $hours = intval($duration); // Extract the integer part before the decimal point
        $minutes = ($duration - $hours) * 100; // Extract the fractional part and convert it to minutes
        // Format the duration
        $formattedDuration = $hours . " hr " . $minutes . " minute";

    echo '<div class="swiper-slide swiper-bg">' . "\n";
    echo '    <div class="block-images position-relative">' . "\n";
    echo '        <div class="img-box slider--image">' . "\n";
    echo '            <img src="' . $thumbnailURL . '" class="img-fluid" alt="" loading="lazy" />' . "\n";
    echo '        </div>' . "\n";
    echo '        <div class="block-description">' . "\n";
    echo '            <h6 class="iq-title"><a href="movie-detail.php?movieID=' . $movieID . '">' . $movieName . '</a></h6>' . "\n";
    echo '            <div class="movie-time d-flex align-items-center my-2">' . "\n";
    echo '                <span class="text-body">' . $formattedDuration . '</span>' . "\n";
    echo '            </div>' . "\n";
    echo '        </div>' . "\n";
    echo '    </div>' . "\n";
    echo '</div>' . "\n";
}

$conn->close();
?>
                         
                        
                        </div>
                    </div>
                </div>
                <div class="vertical-slider-next swiper-button"><i class="iconly-Arrow-Down-2 icli"></i></div>
            </div>
            <div class="slider-images" data-swiper="slider-images">
                <div class="swiper-container" data-swiper="slider-images-inner">
                    <div class="swiper-wrapper">
                       
                 
                        <div class="swiper-slide">
                            <div class="slider--image block-images"><img src="./assets/images/top-10/05.webp" loading="lazy" alt="" /></div>
                            <div class="description">
                                <div class="block-description">
                                    <ul class="ps-0 mb-0 mb-1 pb-1 list-inline d-flex flex-wrap align-items-center movie-tag">
                                        <li class="position-relative text-capitalize font-size-14 letter-spacing-1">
                                            <a href="view-all-movie.html" class="text-white text-decoration-none">Comedy</a>
                                        </li>
                                        <li class="position-relative text-capitalize font-size-14 letter-spacing-1">
                                            <a href="view-all-movie.html" class="text-white text-decoration-none">Romance</a>
                                        </li>
                                        <li class="position-relative text-capitalize font-size-14 letter-spacing-1">
                                            <a href="view-all-movie.html" class="text-white text-decoration-none">Action</a>
                                        </li>
                                    </ul>
                                    <h2 class="iq-title mb-3"><a href="./tv-show-detail.html">Black Queen</a></h2>
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="slider-ratting d-flex align-items-center">
                                            <ul class="ratting-start p-0 m-0 list-inline text-warning d-flex align-items-center justify-content-left">
                                                <li>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </li>
                                            </ul>
                                            <span class="text-white ms-2 font-size-14 fw-500">4.3/5</span>
                                        </div>
                                        <span class="text-body">1hr : 45mins</span>
                                    </div>
                                    <p class="mt-0 mb-3 line-count-2">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.</p>
                                    <div class="iq-button">
                                        <a href="video-detail.html" class="btn text-uppercase position-relative">
                                            <span class="button-text">Buy Tickets</span>
                                            <i class="fa-solid fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
