 
 <?php
include("config.php");

// Get movieID from query string
if (isset($_GET['movieID'])) {
    $id = $_GET['movieID'];

    // Prepare the SQL statement
    $sql = "SELECT m.MovieID, m.PosterURL, m.MovieName, m.duration, m.LanguageID, l.LanguageName, 
                   m.GenresID, m.Keywords, m.ReleaseDate, m.ContentRating ,m.TrailerURL 
            FROM movies m 
            INNER JOIN language l ON m.LanguageID = l.ID 
            WHERE m.MovieID = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the movieID parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the movie details
        if ($row = $result->fetch_assoc()) {
          //  echo "Movie ID: " . $row['MovieID'] . "<br>";
         //   echo "Thumbnail URL: " . $prefix .'poster/'. $row['PosterURL'] . "<br>";
          //  echo "Movie Name: " . $row['MovieName'] . "<br>";
         //   echo "Duration: " . $row['duration'] . "<br>";
         //   echo "Language ID: " . $row['LanguageID'] . "<br>";
          //  echo "Language Name: " . $row['LanguageName'] . "<br>";
         //   echo "Keywords: " . $row['Keywords'] . "<br>";
          //  echo "Release Date: " . $row['ReleaseDate'] . "<br>";
         //   echo "Content Rating: " . $row['ContentRating'] . "<br>";
            
            // Get the GenresID
            $genresID = $row['GenresID'];
            $genresNames = array();
            $genresIDArray = explode(",", $genresID);

            foreach ($genresIDArray as $genreID) {
                $genreSql = "SELECT GenresName FROM genres WHERE ID = ?";
                if ($genreStmt = $conn->prepare($genreSql)) {
                    $genreStmt->bind_param("i", $genreID);
                    $genreStmt->execute();
                    $genreResult = $genreStmt->get_result();
                    if ($genreResult->num_rows > 0) {
                        $genreRow = $genreResult->fetch_assoc();
                        $genresNames[] = $genreRow["GenresName"];
                    }
                    $genreStmt->close();
                }
            }

          //  echo "Genres: " . implode(", ", $genresNames) . "<br>";

        } else {
            echo "No movie found with the given ID.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "No movieID provided in the query string.";
}

// Close the connection
$conn->close();
?>


<!-- Movie Description Start-->

                <div class="cdcontainer ">
                <div class="trending-info mt-4 pt-0 pb-4 px-5 ">
                  <div class="row">
                    <div class="col-md-8 col-10 mb-auto">
                      <div class="d-block d-lg-flex align-items-center">
                        <h2 class="trending-text fw-bold texture-text text-uppercase my-0 fadeInLeft animated d-inline-block"
                          data-animation-in="fadeInLeft" data-delay-in="0.6" style="opacity: 1; animation-delay: 0.6s">
                          <?php echo $row['MovieName'];?>
                        </h2>
                        <div class="slider-ratting d-flex align-items-center ms-lg-3 ms-0">
                          <ul class="ratting-start p-0 m-0 list-inline text-warning d-flex align-items-center justify-content-left">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-half" aria-hidden="true"></i></li>
                          </ul>
                          <span class="text-white ms-2"><?php echo $row['ContentRating'];?> (imdb)</span>
                        </div>
                      </div>
                      <?php 
                         echo '<ul class="p-0 mt-2 list-inline d-flex flex-wrap movie-tag">';
            foreach ($genresNames as $genreName) {
                echo '<li class="trending-list"><a class="text-primary" href="#">' . htmlspecialchars($genreName) . '</a></li>';
            }
            echo '</ul>';
                      ?>
                      <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                        <span class="badge bg-secondary">Duration :</span>
                        <span class="ms-3 font-Weight-500 genres-info"><?php
                        
                        
                        $duration = $row["duration"];
        
        $hours = intval($duration); // Extract the integer part before the decimal point
        $minutes = ($duration - $hours) * 100; // Extract the fractional part and convert it to minutes
        // Format the duration
        $formattedDuration = $hours . " hr " . $minutes . " minute";
                        
                        echo $formattedDuration;?> </span>
                        <span class="trending-year trending-year-list font-Weight-500 genres-info m-2"> | 
                          <?php echo $row['ReleaseDate'];?>
                        </span>
                      </div>
                      <?php
                      
                            $keywords = explode(",", $row['Keywords']);
            echo '<ul class="iq-blogtag list-unstyled d-flex flex-wrap align-items-center gap-3 p-0">';
            echo '<li class="iq-tag-title text-primary mb-0"><i class="fa fa-tags" aria-hidden="true"></i> Tags:</li>';
            foreach ($keywords as $index => $keyword) {
                $keyword = htmlspecialchars(trim($keyword));
                if ($index == count($keywords) - 1) {
                    echo '<li><a class="title" href="#">' . $keyword . '</a></li>';
                } else {
                    echo '<li><a class="title" href="#">' . $keyword . '</a><span class="text-secondary">,</span></li>';
                }
            }
            echo '</ul>';
                      
                      ?>
                      
                      
                    </div>


<div class="trailor-video col-md-4 col-12 mt-lg-0 mt-4 mb-md-0 mb-1 text-lg-right">
  <a data-fslightbox="html5-video" href="<?php echo $row['TrailerURL'];?>" target="_blank" class="video-open playbtn block-images position-relative">
    <img src="<?php echo $prefix . 'poster/' . $row['PosterURL'];?>" alt="" loading="lazy" />
    <span class="playbtn_thumbnail">
      <i class="fa fa-play text-white"></i>
    </span>
  </a>
</div>


                  </div>
                </div>

                </div>

                <!-- Movie Description End -->  