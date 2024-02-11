<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// rest of your code
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        .centre {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-top: 10px;
        }

        .top {
            background: linear-gradient(to right, #4caf50, #2e7d32);
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard {
            display: flex;
            margin: 20px;
        }

        .left-section {
            flex: 1;
            background: linear-gradient(to right, #4caf50, #2e7d32);
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
            transition: all 0.3s ease;
        }

        .right-section {
            flex: 3;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile {
            width: 130px;
            height: 130px;
            border: 3px solid #4caf50;
            border-radius: 50%;
            overflow: hidden;
            margin: 5rem auto;
        }

        .profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile h4 {
            text-align: center;
            margin-top: 10px;
            color: #333;
        }

        .button a {
            color: white;
            text-decoration: none;
            background-color: #4caf50;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button a:hover {
            background-color: #df3908;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .contain {
            width: 100%;
            border: 4px solid #333;
            overflow: scroll;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 10px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .developer {
            position: absolute;
            left: 20px;
            bottom: 20px;
            color: #777;
        }

        /* Media query for mobile and tablet devices */
        @media only screen and (max-width: 1023px) {
            .left-section {
                display: none;
            }

            .top h1 {
                font-weight: 600;
                margin: auto; /* Center the h1 */
            }

            .right-section {
                width: 95vw;
            }
        }
    </style>
</head>

<body>
    <div class="top button">
        <a class="btn btn-dark btn-sm" href="../index.html">HOME </a>
        <h1 class="centre"> Welcome to the ADMIN Dashboard,
            <?php echo htmlspecialchars($_SESSION['username']); ?>!
         </h1>
            <a class="btn btn-dark btn-sm" href="logout.php">LOGOUT</a>

    </div>

    <div class="dashboard">
        <div class="left-section" id="left-section">
            <div class="profile">
                <img src="../img/logo.png" alt="Profile Image">
            </div>
            <h3 style="text-align: center; margin-top: 2px">TravelKaro</h3>
            <!-- Dashboard content goes here -->
            <div class="developer">
                <span style="color:red;"> Designed By</span> <a class="border-bottom"target="_blank">Sahas Sondkar</a>
            </div>
        </div>
        <div class="contain">
            <div class="right-section">
                <h1>List Of Clients <a class="btn btn-danger btn-lg" href="deleteall.php">Delete all</a></h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color:rgb(255, 166, 0);">ID</th>
                            <th style="color:rgb(255, 166, 0);">Name</th>
                            <th style="color:rgb(255, 166, 0);">Address</th>
                            <th style="color:rgb(255, 166, 0);">Email</th>
                            <th style="color:rgb(255, 166, 0);">Phone</th>
                            <th style="color:rgb(255, 166, 0);">Arrival</th>
                            <th style="color:rgb(255, 166, 0);">Departure</th>
                            <th style="color:rgb(255, 166, 0);">Package-Name</th>
                            <th style="color:rgb(255, 166, 0);">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'connection.php';
                            $sql = "SELECT * FROM clients";
                            $result = $con->query($sql);
                            if (!$result) {
                                die("Invalid query: " . $c->error);
                            }
                            // read data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                <tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['Name'] . '</td>
                                    <td>' . $row['Address'] . '</td>
                                    <td>' . $row['Email'] . '</td>
                                    <td>' . $row['Phone'] . '</td>
                                    <td>' . $row['Arrival'] . '</td>
                                    <td>' . $row['Depature'] . '</td>
                                    <td>' . $row['Package-Name'] . '</td>
                                    <td>
                                    <a class="btn btn-danger btn-sm" href="delete.php?id=' . $row['id'] . '">Delete</a>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
