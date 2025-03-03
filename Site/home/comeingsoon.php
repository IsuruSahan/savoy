<div class="popular-movies-block">
    <div class="container-fluid">
        <section class="overflow-hidden">
            <div class="d-flex align-items-center justify-content-between px-md-3 px-1 my-4">
                <h5 class="main-title text-capitalize mb-0">Coming Soon</h5>
                <a href="view-all-movie.html" class="text-primary iq-view-all text-decoration-none flex-none">View All</a>
            </div>
            <div class="card-style-slider">
                <div class="position-relative swiper swiper-card" data-slide="6" data-laptop="6" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
                     <ul class="p-0 swiper-wrapper m-0 list-inline">
					

						<?php
include("config.php");

// Select movies where IsComingSoon is 0
$sql = "SELECT m.MovieID, m.ThumbnailURL, m.MovieName,m.duration, m.LanguageID, l.LanguageName 
        FROM movies m 
        INNER JOIN language l ON m.LanguageID = l.ID 
        WHERE m.IsComingSoon = 1";

$result = $conn->query($sql);

// Output data of each row
while ($row = $result->fetch_assoc()) {
    $movieID = $row["MovieID"];
    $thumbnailURL = $prefix."thumbnail/" . $row["ThumbnailURL"];
    $movieName = $row["MovieName"];
    $languageName = $row["LanguageName"];
	$duration = $row["duration"];
        
        $hours = intval($duration); // Extract the integer part before the decimal point
        $minutes = ($duration - $hours) * 100; // Extract the fractional part and convert it to minutes
        // Format the duration
        $formattedDuration = $hours . " hr " . $minutes . " minute";

    echo '<li class="swiper-slide">' . "\n";
    echo '    <div class="iq-card card-hover">' . "\n";
    echo '        <div class="block-images position-relative w-100">' . "\n";
    echo '            <div class="img-box w-100">' . "\n";
    echo '                <a href="#" class="position-absolute top-0 bottom-0 start-0 end-0"></a>' . "\n";
    echo '                <img src="' . $thumbnailURL . '" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0" />' . "\n";
    echo '            </div>' . "\n";
    echo '            <div class="card-description with-transition">' . "\n";
    echo '                <div class="cart-content">' . "\n";
    echo '                    <div class="content-left">' . "\n";
    echo '                        <h5 class="iq-title text-capitalize">' . "\n";
    echo '                            <a href="#">' . $movieName . '</a>' . "\n";
    echo '                        </h5>' . "\n";
    echo '                        <div class="movie-time d-flex align-items-center my-2">' . "\n";
    // Output language name
    echo '                            <span class="movie-time-text font-normal">' . $formattedDuration . '</span>' . "\n";
    echo '                        </div>' . "\n";
    echo '                    </div>' . "\n";
    echo '                    <div class="watchlist">' . "\n";
    echo '                        <a class="watch-list-not" href="#">' . "\n";
    echo '                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-10">' . "\n";
    echo '                                <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>' . "\n";
    echo '                            </svg>' . "\n";
    echo '                            <span class="watchlist-label">' . $languageName . '</span>' . "\n";
    echo '                        </a>' . "\n";
    echo '                    </div>' . "\n";
    echo '                </div>' . "\n";
    echo '            </div>' . "\n";
    echo '            <div class="block-social-info align-items-center">' . "\n";
    echo '                <div class="iq-button" style="width: 100%;">' . "\n";
    echo '                    <a href="#" class="btn text-uppercase position-relative" style="width: 100%;">' . "\n";
    echo '                        <span class="button-text">Coming Soon</span>' . "\n";
   // echo '                        <i class="fa-solid fa-play"></i>' . "\n";
    echo '                    </a>' . "\n";
    echo '                </div>' . "\n";
    echo '            </div>' . "\n";
    echo '        </div>' . "\n";
    echo '    </div>' . "\n";
    echo '</li>' . "\n";
}

$conn->close();
?>

						
						
                        
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </section>
    </div>
</div>

