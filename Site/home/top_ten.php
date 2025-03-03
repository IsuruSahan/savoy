<div class="top-ten-block">
  <div class="container-fluid">
    <section class="overflow-hidden">
      <div class="d-flex align-items-center justify-content-between px-md-3 px-1 mb-4">
      <h5 class="main-title text-capitalize mb-0 mt-3">top movies to watch</h5>
      <a href="all-movie.php" class="text-primary iq-view-all text-decoration-none flex-none">View All</a>
      </div>
      <div class="position-relative swiper swiper-card iq-top-ten-block-slider" data-slide="6" data-laptop="6" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="false" data-navigation="true" data-pagination="true">
        <ul class="p-0 swiper-wrapper mb-5 list-inline">
          
		  
		  
		  
		  <?php
include("config.php");

// Select 10 items from movies
$sql = "SELECT MovieID, ThumbnailURL FROM movies WHERE ten = 1 LIMIT 10";
$result = $conn->query($sql);

// Output data of each row
$itemNumber = 1;
while ($row = $result->fetch_assoc()) {
    $movieID = $row["MovieID"];
    $thumbnailURL = $prefix."thumbnail/" . $row["ThumbnailURL"];

    echo '<li class="swiper-slide">' . "\n";
    echo '    <div class="iq-top-ten-block">' . "\n";
    echo '        <div class="block-image position-relative">' . "\n";
    echo '            <div class="img-box">' . "\n";
    echo '                <a class="overly-images" href="movie-detail.php?movieID=' . $movieID . '">' . "\n";
    echo '                    <img src="' . $thumbnailURL . '" alt="movie-card" class="img-fluid object-cover">' . "\n";
    echo '                </a>' . "\n";
    echo '                <span class="top-ten-numbers texture-text"> ' . $itemNumber . '</span>' . "\n";
    echo '            </div>' . "\n";
    echo '        </div>' . "\n";
    echo '    </div>' . "\n";
    echo '</li>' . "\n";

    $itemNumber++;
}

$conn->close();
?>



        </ul>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-button swiper-button-prev"></div>
      </div>
    </section>
  </div>
</div>