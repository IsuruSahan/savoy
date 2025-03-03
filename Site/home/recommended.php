
<section class="recommended-block">
  <div class="container-fluid">
    <div class="overflow-hidden">
        <div class="d-flex align-items-center justify-content-between px-3 pt-2 my-4">
        <h5 class="main-title text-capitalize mb-0">Movies Recommended For You</h5>
        </div>
      <div class="card-style-slider">
        <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="2" data-mobile="2"
          data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
          <ul class="p-0 swiper-wrapper m-0  list-inline">
           
           
           
           
           
           <?php
include("config.php");

// Select movies where IsComingSoon is 0
$sql = "SELECT m.MovieID, m.ThumbnailURL, m.MovieName, m.duration, m.LanguageID, l.LanguageName 
        FROM movies m 
        INNER JOIN language l ON m.LanguageID = l.ID 
        WHERE m.IsComingSoon = 0";

$result = $conn->query($sql);

// Output data of each row
while ($row = $result->fetch_assoc()) {
    $movieID = $row["MovieID"];
    $thumbnailURL = $prefix."thumbnail/" . $row["ThumbnailURL"];
    $movieName = htmlspecialchars($row["MovieName"]); // Escape special characters
    $languageName = htmlspecialchars($row["LanguageName"]); // Escape special characters
    $duration = $row["duration"];

    $hours = intval($duration); // Extract the integer part before the decimal point
    $minutes = ($duration - $hours) * 100; // Extract the fractional part and convert it to minutes
    $formattedDuration = $hours . " hr " . $minutes . " minute"; // Format the duration

    echo '<li class="swiper-slide">';
    echo '  <div class="iq-card card-hover">';
    echo '    <div class="block-images position-relative w-100">';
    echo '      <div class="img-box w-100">';
    echo '        <a href="movie-detail.php?movieID=' . $movieID . '" class="position-absolute top-0 bottom-0 start-0 end-0"></a>';
    echo '        <img src="' . $thumbnailURL . '" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">';
    echo '      </div>';
    echo '      <div class="card-description with-transition">';
    echo '        <div class="cart-content">';
    echo '          <div class="content-left">';
    echo '            <h5 class="iq-title text-capitalize">';
    echo '              <a href="movie-detail.php?movieID=' . $movieID . '">' . $movieName . '</a>';
    echo '            </h5>';
    echo '            <div class="movie-time d-flex align-items-center my-2">';
    echo '              <span class="movie-time-text font-normal">' . $formattedDuration . '</span>';
    echo '            </div>';
    echo '          </div>';
    echo '          <div class="watchlist">';
    echo '            <a class="watch-list-not" href="playlist.html">';
    echo '              <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-10">';
    echo '                <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>';
    echo '              </svg>';
    echo '              <span class="watchlist-label"> ' . $languageName . ' </span>';
    echo '            </a>';
    echo '          </div>';
    echo '        </div>';
    echo '      </div>';
    echo '      <div class="block-social-info align-items-center">';
    echo '        <div class="iq-button" style="width: 100%;">';
    echo '          <a href="movie-detail.php?movieID=' . $movieID . '" class="btn text-uppercase position-relative" style="width: 100%;">';
    echo '            <span class="button-text">Buy Tickets</span>';
    echo '            <i class="fa-solid fa-play"></i>';
    echo '          </a>';
    echo '        </div>';
    echo '      </div>';
    echo '    </div>';
    echo '  </div>';
    echo '</li>';
}

// Close the connection
$conn->close();
?>

           
            
          </ul>
          <div class="swiper-button swiper-button-next"></div>
          <div class="swiper-button swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </div>
</section>