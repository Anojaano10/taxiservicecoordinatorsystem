<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>About Us</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }
        tr:hover {background-color: #D6EEEE;}
    </style>
</head>
<body>
    <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container bottomContainer">
            <div class="ultimateImg">
                <img class="mainImg" src="images/drive3.jpg">
                <div class="purpleBox">
                    <p class="purpleText">
                        I had a positive experience with the taxi booking service. It was convenient, reliable, and the drivers were professional. 
                        The only areas for improvement are pricing transparency and customer support. Overall, I would recommend this service.
                    </p>
                    <img class="stars" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/mp5.svg">
                </div>
            </div>
            <div class="allText bottomText">
                <p class="text-blk headingText">About Us</p>
                <p class="text-blk subHeadingText">
                    Welcome to MR.Taxi, your trusted partner for convenient and reliable transportation services. We are a leading online platform
                    that connects passengers with professional drivers, ensuring seamless travel experiences for our valued customers. With a strong
                    commitment to customer satisfaction and a focus on safety, efficiency, and affordability, MR.TAXI is your go-to choice for all your transportation needs.
                </p>
                <p class="text-blk description">
                    Our Mission: At MR.TAXI, our mission is to revolutionize the way people travel by providing a hassle-free and user-friendly taxi
                    booking service. We strive to enhance convenience, reliability, and affordability for our customers while prioritizing safety
                    and professionalism. Our aim is to create a seamless transportation experience that exceeds expectations and makes every journey memorable.
                </p>
            </div>
        </div>
    </div>

    <?php
    // Connect to the database
    $con = new mysqli("localhost", "root", "", "project");

    // Check the database connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Query to retrieve data from the branch_details table
    $sql = "SELECT Branch_name, Branch_id, location, phone_number, manager FROM branch_details";
    $result = $con->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
              <th>Branch Name</th>
              <th>Branch ID</th>
              <th>Location</th>
              <th>Phone Number</th>
              <th>Manager</th>
              </tr>";

        // Loop through each row and display the data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>" . htmlspecialchars($row['Branch_name']) . "</td>
                  <td>" . htmlspecialchars($row['Branch_id']) . "</td>
                  <td>" . htmlspecialchars($row['location']) . "</td>
                  <td>" . htmlspecialchars($row['phone_number']) . "</td>
                  <td>" . htmlspecialchars($row['manager']) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data found in the branch details table.</p>";
    }

    // Close the database connection
    $con->close();
    ?>
</body>
</html>
