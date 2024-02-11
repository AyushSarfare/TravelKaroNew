<?php
require_once 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signup.html");
}

// Fetch user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM customers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TravelKaro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description"
        content="TravelKaro - Embracing INDIA. Explore the best tour packages, affordable rates, and adventure with the top-rated tour and travels company.">
    <meta name="keywords"
        content="Fuel your wanderlust with our streamlined travel booking system. Seamlessly plan your next adventure, from flights to accommodations, with user-friendly features. Elevate your travel experience with convenience at your fingertips.">
        
    <link rel="icon" src="img/logo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .navbar {
            background-color: orange;
            margin: 10px auto;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .navbar-nav .nav-link {
            color: #343a40;
            font-weight: 600;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3;
        }

        .container {
            margin-top: 2rem;
        }

        .welcome-message {
            justify-content: center;
            text-align: center;
            margin-top: 10rem;
        }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Adjust as needed */
        }

        .book-now-btn, .logout-btn {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-weight: 600;
            text-decoration: none;
            transition-duration: 0.4s;
            cursor: pointer;
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .logout-btn {
            background-color: #dc3545;
            margin-top: 10px;
        }

        .book-now-btn:hover {
            background-color: green;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Your existing navbar code -->
    </nav>

    <div class="center-container">
        <div class="container">
            <div class="welcome-message text-center">
                <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
                <a href="index.html#package" class="btn btn-primary">Book Now</a>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>

    <!-- Your existing JavaScript libraries and scripts -->
</body>
</html>

   