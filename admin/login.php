<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            height: auto;
        }

        .cards {
            width: 70%;
            height: 100%;
            margin: 4rem auto;
            padding: 40px;
            background-color: #343a40; /* Updated background color */
            border-radius: 10px;
            color: white;
        }

        .profile {
            width: 130px;
            height: 130px;
            border: 2px solid white;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
        }

        .profile img {
            width: 100%;
            height: 100%;
            min-height: 30%;
            min-width: 30%;
            object-fit: cover;
        }

        label {
            color: white;
            font-weight: bolder;
        }

        input {
            background-color: #343a40;
            color: white;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 8px;
        }

        .submit-btn {
            background-color: #007bff;
            transition-duration: 0.4s;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cards">
            <div class="profile">
                <img src="../img/logo.png" alt="Profile Image">
            </div>
            <h2 style="text-align: center; margin-top:20px; color: white;">TravelKaro</h2>

            <form action="welcome.php" method="POST" class="form login">
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password :</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3" name="password">
                    </div>
                </div>
                <div class="align-items-center text-center">
                    <button type="submit" class="submit-btn" name="submit">Log In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
