<?php
session_start();
if (!isset($_SESSION['Cusername'])) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}

if (isset($_POST['sub'])) {
    $name = $_POST['ID'];
    $pickup_location = $_POST['p_location'];
    $drop_location = $_POST['d_location'];
    $pickup_date = $_POST['p_date'];
    $pickup_time = $_POST['p_time'];

    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }

    $sql = "UPDATE customer 
            SET name = '$name', 
                pickup_place = '$pickup_location', 
                drop_place = '$drop_location', 
                pickup_time = '$pickup_date', 
                drop_time = '$pickup_time', 
                booking_status = 'booked' 
            WHERE username = '{$_SESSION['Cusername']}'";

    if ($conn->query($sql)) {
        echo "<script>alert('Booking successful!');</script>";
        header('Location: seen_page.php');
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <title>Customer Page</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #333; /* Dark gray background */
            color: white;
            padding: 10px 20px;
        }

        .header button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background: #FFD400; /* Golden Yellow Color */
            color: #333; /* Dark text color for contrast */
            cursor: pointer;
            font-weight: bold;
        }

        .header button:hover {
            background: #e6c200;
        }

        .form-container {
            width: 60%;
            margin: 30px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD400; /* Golden Yellow Color */
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 500;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container input:focus {
            border-color: #FFD400; /* Golden Yellow Color */
            outline: none;
        }

        .form-container button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .button1 {
            background: #FFD400; /* Golden Yellow Color */
            color: white;
        }

        .button1:hover {
            background: #e6c200;
        }

        .button3 {
            background: #f44336;
            color: white;
        }

        .button3:hover {
            background: #e53935;
        }

        .help-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #FFD400; /* Golden Yellow Color */
        }

        .help-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="window.location.href='index.php'">Home</button>
        <button onclick="window.location.href='seen_page.php'">Show Profile</button>
    </div>

    <div class="form-container">
        <h2>Book Your Ride</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name"><b>Name</b></label>
            <input type="text" name="ID" id="name" placeholder="Enter your name" required>

            <label for="P_location"><b>Pickup Location</b></label>
            <input type="text" name="p_location" id="P_location" placeholder="Enter pickup location" required>

            <label for="d_location"><b>Drop Location</b></label>
            <input type="text" name="d_location" id="d_location" placeholder="Enter drop location" required>

            <label for="date"><b>Pickup Date & Time</b></label>
            <input type="datetime-local" name="p_date" id="date" required>

            <label for="time"><b>Drop Date & Time</b></label>
            <input type="datetime-local" name="p_time" id="time" required>

            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="button1" name="sub">Book Now</button>
                <button type="reset" class="button3">Clear All</button>
            </div>
            <a href="#" class="help-link">Need Help?</a>
        </form>
    </div>
</body>
</html>


