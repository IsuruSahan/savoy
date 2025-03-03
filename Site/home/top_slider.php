<div class="iq-banner-thumb-slider">
  <div class="slider">
    <div class="position-relative slider-bg d-flex justify-content-end">
      <div class="position-relative my-auto">
        <div class="horizontal_thumb_slider" data-swiper="slider-thumbs-ott">
          <div class="banner-thumb-slider-nav">
            <div class="swiper-container " data-swiper="slider-thumbs-inner-ott">
              <div class="swiper-wrapper">
			  
			  
                               <?php
include("config.php");

// Select movies from the database
$sql = "SELECT MovieName, duration, PosterURL FROM movies WHERE top = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $firstIteration = true; // Flag to track the first iteration
    while($row = $result->fetch_assoc()) {
        $movieName = $row["MovieName"];
        $duration = $row["duration"];
        
        $hours = intval($duration); // Extract the integer part before the decimal point
        $minutes = ($duration - $hours) * 100; // Extract the fractional part and convert it to minutes
        // Format the duration
        $formattedDuration = $hours . " hr " . $minutes . " minute";
        
        
        $posterURL = $prefix."poster/" . $row["PosterURL"];

        // Generate HTML for each movie
        echo '<div class="swiper-slide swiper-bg">' . "\n";
        echo '    <div class="block-images position-relative ">' . "\n";
        echo '        <div class="img-box">' . "\n";
        echo '            <img src="' . $posterURL . '" class="img-fluid" alt="" loading="lazy">' . "\n";
        if($firstIteration) {
            echo '                <div class="block-description ps-3">' . "\n"; // Add ps-3 only for the first iteration
            $firstIteration = false; // Set to false after first iteration
        } else {
            echo '                <div class="block-description">' . "\n"; // For subsequent iterations, without ps-3
        }
        echo '                    <h6 class="iq-title fw-500 mb-0">' . $movieName . '</h6>' . "\n";
        echo '                    <span class="fs-12">' . $formattedDuration . '</span>' . "\n";
        echo '                </div>'; // Close block-description div
        echo '            </div>'; // Close img-box div
        echo '        </div>'; // Close block-images div
        echo '    </div>'; // Close swiper-slide div
    }
} else {
    //echo "0 results";
}
$conn->close();
?>


				
				
				
              </div>
            </div>
            <div class="slider-prev swiper-button">
              <i class="iconly-Arrow-Left-2 icli"></i>
            </div>
            <div class="slider-next swiper-button">
              <i class="iconly-Arrow-Right-2 icli"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="slider-images" data-swiper="slider-images-ott">
        <div class="swiper-container" data-swiper="slider-images-inner-ott">
          <div class="swiper-wrapper m-0">

            
        
	<?php
include("config.php");

// Select necessary columns from movies table
$sql = "SELECT MovieID,MovieName, duration, PosterURL, Description, ContentRating, GenresID, LanguageID 
        FROM movies 
        WHERE top = 1";

$result = $conn->query($sql);

// Output data of each row
while ($row = $result->fetch_assoc()) {
    $movieName = $row["MovieName"];
    $duration = $row["duration"];
    $posterURL = $prefix."poster/" . $row["PosterURL"];
    $description = $row["Description"];
    $contentRating = $row["ContentRating"];
    $genresID = $row["GenresID"];
    $languageID = $row["LanguageID"];
    
    $movieid = $row["MovieID"]; 
    
    // Fetch genre names based on genre IDs
    $genresNames = array();
    $genresIDArray = explode(",", $genresID);
    foreach ($genresIDArray as $genreID) {
        $genreSql = "SELECT GenresName FROM genres WHERE ID = $genreID";
        $genreResult = $conn->query($genreSql);
        if ($genreResult->num_rows > 0) {
            $genreRow = $genreResult->fetch_assoc();
            $genresNames[] = $genreRow["GenresName"];
        }
    }
    
    // Fetch language name based on language ID
    $languageSql = "SELECT LanguageName FROM language WHERE ID = $languageID";
    $languageResult = $conn->query($languageSql);
    if ($languageResult->num_rows > 0) {
        $languageRow = $languageResult->fetch_assoc();
        $languageName = $languageRow["LanguageName"];
    }
    
    // Generate HTML for each movie
    echo '<div class="swiper-slide p-0">' . "\n";
    echo '    <div class="slider--image block-images">' . "\n";
    echo '        <img src="' . $posterURL . '" loading="lazy" alt="banner" />' . "\n";
    echo '    </div>' . "\n";
    echo '    <div class="description">' . "\n";
    echo '        <div class="row align-items-center h-100">' . "\n";
    echo '            <div class="col-lg-6 col-md-12">' . "\n";
    echo '                <div class="slider-content">' . "\n";
    echo '                    <div class="d-flex align-items-center RightAnimate mb-3">' . "\n";
    echo '                        <span class="badge rounded-0 text-dark text-uppercase px-3 py-2 me-3 bg-white mr-3">' . $contentRating . '</span>' . "\n";
    echo '                        <ul class="p-0 mb-0 list-inline d-flex flex-wrap align-items-center movie-tag">' . "\n";
    
    // Output genre names
    foreach ($genresNames as $genreName) {
        echo '                            <li class="position-relative text-capitalize font-size-14 letter-spacing-1">' . "\n";
        echo '                                <a href="#" class="text-decoration-none">' . $genreName . '</a>' . "\n";
        echo '                            </li>' . "\n";
    }
    
    echo '                        </ul>' . "\n";
    echo '                    </div>' . "\n";
    echo '                    <h1 class="texture-text big-font letter-spacing-1 line-count-1 text-capitalize RightAnimate-two">' . $movieName . '</h1>' . "\n";
    echo '                    <p class="line-count-3 RightAnimate-two">' . $description . '</p>' . "\n";
    echo '                    <div class="d-flex flex-wrap align-items-center gap-3 RightAnimate-three">' . "\n";
    echo '                        <div class="slider-ratting d-flex align-items-center">' . "\n";
    echo '                            <ul class="ratting-start p-0 m-0 list-inline text-warning d-flex align-items-center justify-content-left">' . "\n";
    echo '                                <li>' . "\n";
    echo '                                    <i class="fa fa-star" aria-hidden="true"></i>' . "\n";
    echo '                                </li>' . "\n";
    echo '                            </ul>' . "\n";
    echo '                            <span class="text-white ms-2 font-size-14 fw-500">' . $contentRating . '/10</span>' . "\n";
    echo '                            <span class="ms-2">' . "\n";
    echo '                                <img src="./assets/images/movies/imdb-logo.svg" alt="imdb logo" class="img-fluid">' . "\n";
    echo '                            </span>' . "\n";
    echo '                        </div>' . "\n";
    echo '                        <span class="font-size-14 fw-500">' . $duration . '</span>' . "\n";
    echo '                        <div class="text-primary font-size-14 fw-500 text-capitalize">genres:';
    
    // Output genre names
    foreach ($genresNames as $genreName) {
        echo ' <a href="#" class="text-decoration-none ms-1">' . $genreName . '</a>';
    }
    
    echo '</div>' . "\n";
    echo '                        <div class="text-primary font-size-14 fw-500 text-capitalize">Language: <a href="#" class="text-decoration-none ms-1">' . $languageName . '</a>' . "\n";
    echo '                        </div>' . "\n";
    echo '                    </div>' . "\n";
    echo '                </div>' . "\n";
    echo '                <div class="RightAnimate-four">' . "\n";
    echo '                    <div class="iq-button">' . "\n";
    echo '                        <a href="movie-detail.php?movieID=' . $movieid . '" class="btn text-uppercase position-relative">' . "\n";
    echo '                            <span class="button-text">Buy Tickets</span>' . "\n";
    echo '                            <i class="fa-solid fa-play"></i>' . "\n";
    echo '                        </a>' . "\n";
    echo '                    </div>' . "\n";
    echo '                </div>' . "\n";
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
    </div>
  </div>
</div>