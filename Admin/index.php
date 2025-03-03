<?php
session_start();
include("includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id FROM users2 WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;
        header("location: home.php");
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: black; /* Set the background color of the body to black */
            color: white; /* Set the text color of the body to white */
        }

        .container {
            text-align: center;
            background-color: gray; /* Set the background color of the container to gray */
            padding: 20px;
            border-radius: 10px;
        }

        .logo {
            margin-bottom: 20px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
        }
    </style>
    <title>EFT Movie Management System - Login</title>
</head>
<body>

    
    <div class="container mt-5">
      
        <div class="logo">
            <img src="img/logoeapadmin.png" alt="Logo">
        </div>
          <h1>  Movie Management System </h1>
          <br/><br/>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>