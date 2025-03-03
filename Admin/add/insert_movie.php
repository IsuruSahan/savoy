<?php
include("../includes/config.php");

// Function to generate a unique filename
function generateUniqueFilename($file) {
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . '_' . time() . '.' . $extension;
    return $filename;
}

// Get form data
$movieName = $_POST['movieName'];
$description = $_POST['description'];
$genres = implode(",", $_POST['genres']); // Assuming genres are stored as comma-separated values in the database
$language = $_POST['language'];
$comingSoon = isset($_POST['comingSoon']) ? 1 : 0;
$contentRating = $_POST['contentRating'];
$releaseDate = $_POST['releaseDate'];
$keywords = $_POST['keywords'];
$duration = $_POST['duration'];

// File upload paths and unique filenames for ThumbnailURL and PosterURL
$thumbnailFilename = generateUniqueFilename($_FILES['thumbnail']);
$thumbnailPath = '../uploads/thumbnail/' . $thumbnailFilename;

$posterFilename = generateUniqueFilename($_FILES['poster']);
$posterPath = '../uploads/poster/' . $posterFilename;

// Move uploaded files to destination
if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath) && move_uploaded_file($_FILES['poster']['tmp_name'], $posterPath)) {
    // Insert into database with UniqueFilename for ThumbnailURL and PosterURL
    $sql = "INSERT INTO movies (MovieName, Description, GenresID, LanguageID, IsComingSoon, ContentRating, ReleaseDate, Keywords, ThumbnailURL, PosterURL, TrailerURL, duration) VALUES ('$movieName', '$description', '$genres', '$language', '$comingSoon', '$contentRating', '$releaseDate', '$keywords', '$thumbnailFilename', '$posterFilename', '{$_POST['trailerURL']}', '$duration')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading files.";
}

$conn->close();
?>
