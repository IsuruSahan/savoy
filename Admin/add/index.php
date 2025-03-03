<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: black;
      color: white;
    }
    input[type="text"],
    input[type="date"],
    textarea,
    select {
      background-color: black;
      color: white;
      border-color: white;
    }
    select[multiple] {
      height: 100px; /* adjust height for multiple select */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Movie Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-3">
  <h2>Add New Movie</h2>
  <form action="insert_movie.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="movieName">Movie Name:</label>
      <input type="text" class="form-control" id="movieName" name="movieName" required>
    </div>
    <div class="form-group">
      <label for="description">Movie Description:</label>
      <textarea class="form-control" id="description" name="description" rows="5"></textarea>
    </div>
    <div class="form-group">
      <label for="genres">Movie Genres:</label>
      <select multiple class="form-control" id="genres" name="genres[]" required>
        <?php
           include '../includes/config.php';

          $sql = "SELECT * FROM genres";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['ID'] . "'>" . $row['GenresName'] . "</option>";
              }
          }
          $conn->close();
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="language">Movie Language:</label>
      <select class="form-control" id="language" name="language" required>
        <?php
          // Include database connection file
         include '../includes/config.php';




          // SQL query to fetch languages
          $sql = "SELECT * FROM language";
          $result = $conn->query($sql);

          // Check if there are any results
          if ($result->num_rows > 0) {
              // Loop through each row to generate options
              while($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['ID'] . "'>" . $row['LanguageName'] . "</option>";
              }
          } else {
              // If no languages found
              echo "<option value=''>No languages found</option>";
          }

          // Close database connection
          $conn->close();
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="comingSoon">Is it Coming Soon:</label>
      <input type="checkbox" id="comingSoon" name="comingSoon" value="1">
    </div>
    <div class="form-group">
      <label for="contentRating">Content Rating:</label>
      <input type="text" class="form-control" id="contentRating" name="contentRating">
    </div>
    <div class="form-group">
      <label for="releaseDate">Release Date:</label>
      <input type="date" class="form-control" id="releaseDate" name="releaseDate" required>
    </div>
    <div class="form-group">
      <label for="keywords">Keywords:</label>
      <input type="text" class="form-control" id="keywords" name="keywords">
    </div>
    <div class="form-group">
      <label for="thumbnail">Upload Thumbnail:</label>
      <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*" required>
    </div>
    <div class="form-group">
      <label for="poster">Upload Poster:</label>
      <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*" required>
    </div>
    <div class="form-group">
      <label for="trailerURL">Movie Trailer URL:</label>
      <input type="text" class="form-control" id="trailerURL" name="trailerURL">
    </div>
    
    <div class="form-group">
      <label for="trailerURL">Duration:</label>
      <input type="text" class="form-control" id="duration" name="duration">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
