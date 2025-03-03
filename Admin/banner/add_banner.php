<?php
// Include the config file (from C:\xampp\htdocs\EFTF\Admin\banner\ to C:\xampp\htdocs\EFTF\Site\home\)

include '../../../Site/home/config.php'; // Points to C:\xampp\htdocs\EFTF\Site\home\config.php

$upload_dir = "C:/xampp/htdocs/EFTF/Admin/uploads/"; // Absolute path to uploads folder

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['banner'])) {
    $file_name = basename($_FILES["banner"]["name"]);
    $target_file = $upload_dir . $file_name;
    
    // Check if file already exists (optional)
    if (file_exists($target_file)) {
        $file_name = time() . "_" . $file_name; // Add timestamp to avoid overwriting
        $target_file = $upload_dir . $file_name;
    }

    if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
        $image_url = $file_name; // Store just the filename in DB
        $stmt = $conn->prepare("INSERT INTO banners (image_url) VALUES (?)");
        $stmt->bind_param("s", $image_url);
        $stmt->execute();
        $stmt->close();
        echo "Banner uploaded successfully!";
    } else {
        echo "Error uploading file. Check directory permissions.";
    }
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    // Fetch the image URL before deleting the record
    $stmt = $conn->prepare("SELECT image_url FROM banners WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_url = $row['image_url'];
        
        // Delete the file from the uploads folder
        $file_path = str_replace("/", "\\", $upload_dir . $image_url);
        if (file_exists($file_path)) {
            unlink($file_path); // Remove the file
        }
        
        // Delete the record from the database
        $delete_stmt = $conn->prepare("DELETE FROM banners WHERE id = ?");
        $delete_stmt->bind_param("i", $id);
        $delete_stmt->execute();
        $delete_stmt->close();
    }
    
    $stmt->close();
    header("Location: add_banner.php"); // Redirect to avoid resubmission
    exit;
}

// Fetch all banners
$result = $conn->query("SELECT * FROM banners ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Banners</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .table-img {
            max-width: 100px;
            height: auto;
        }
        .alert-success {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container banner-container">
        <?php if (isset($_POST['banner']) && !empty($_FILES['banner']['name'])): ?>
            <div class="alert alert-success" role="alert">
                Banner uploaded successfully!
            </div>
        <?php endif; ?>

        <h1 class="mb-4">Manage Banners</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Add New Banner</h2>
                <form method="post" enctype="multipart/form-data" class="mb-3">
                    <div class="mb-3">
                        <label for="banner" class="form-label">Choose Banner Image</label>
                        <input type="file" name="banner" id="banner" accept="image/*" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Current Banners</h2>
                <?php if ($result && $result->num_rows > 0): ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td>
                                        <?php
                                        if (!empty($prefix)) { // Check if $prefix is defined
                                            $image_path = $prefix . $row['image_url'];
                                            $local_path = str_replace("/", "\\", $upload_dir . $row['image_url']);
                                            if (file_exists($local_path)) {
                                                echo "<img src='$image_path' class='table-img' alt='Banner'>";
                                            } else {
                                                echo "<span class='text-danger'>Image not found: " . htmlspecialchars($image_path) . "</span>";
                                            }
                                        } else {
                                            echo "<span class='text-danger'>Prefix not defined</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="?delete=<?php echo $row['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Are you sure you want to delete this banner?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-muted">No banners found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>