<?php
// Query to retrieve data from the aboutus table
$con=new mysqli("localhost","root","","project");
$sql = "SELECT * FROM branch_details";
$result = $con->query($sql);

// Check if any rows are returned
if ($row=$result->num_rows > 0) {
    // Loop through each row and display the data
    echo "<table>";
    echo "<tr>
          <th>Branch name</th>
          <th>Branch id</th>
          <th>location</th>
          <th>phone number</th>
          <th>manager</th> 
         </tr>";
    while ($row = $result->fetch_assoc()) {
        // Access the data in each row
        echo "<tr>
              <td>" . $row['Branch_name'] . "</td>
              <td>" . $row['Branch_id'] . "</td>
              <td>" . $row['location']. "</td>
              <td>" .  $row['phone_number']. "</td>
              <td>" . $row['manager'] . "</td>
              </tr>";
    }
   
} else {
    echo "No data found.";
}
?>


//bcdiv<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>About us</title>
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
            <p class="text-blk headingText">
              About Us
            </p>
            <p class="text-blk subHeadingText">
                Welcome to MR.Taxi , your trusted partner for convenient and reliable transportation services.
                 We are a leading online platform that connects passengers with professional drivers, ensuring seamless travel experiences for our valued customers.
                  With a strong commitment to customer satisfaction and a focus on safety, efficiency, and affordability, MR.TAXI is your go-to choice for all your transportation needs.
            </p>
            <p class="text-blk description">
                Our Mission:
                At MR TAXI, our mission is to revolutionize the way people travel by providing a hassle-free and user-friendly taxi booking service.
                 We strive to enhance convenience, reliability, and affordability for our customers while prioritizing safety and professionalism. 
                 Our aim is to create a seamless transportation experience that exceeds expectations and makes every journey memorable.
            
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
$sql = "SELECT * FROM branch_details";
$result = $con->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Start the table
    echo "<table>";
    echo "<tr>
          <th>Branch name</th>
          <th>Branch id</th>
          <th>Location</th>
          <th>Phone Number</th>
          <th>Manager</th> 
         </tr>";

    // Loop through each row and display the data
   
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
            <td>" . htmlspecialchars($row['Branch_name']) . "</td>
            <td>" . htmlspecialchars($row['Branch_id']) . "</td>
            <td>" . (!empty($row['location']) ? htmlspecialchars($row['location']) : 'N/A') . "</td>
            <td>" . (!empty($row['phone_number']) ? htmlspecialchars($row['phone_number']) : 'N/A') . "</td>
            <td>" . (!empty($row['manager']) ? htmlspecialchars($row['manager']) : 'N/A') . "</td>
            </tr>";
  }
  

    // Close the table
    echo "</table>";
} else {
    echo "No data found.";
}

// Close the database connection
$con->close();
?>


      

</body>
</html>
//customer.php_check_syntax<?php
session_start();
if (!isset($_SESSION['Cusername'])) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
  }

if(isset($_POST['sub']))
{
    $name=$_POST['ID'];
    $pickup_location=$_POST['p_location'];
    $drop_location=$_POST['d_location'];
    $pickup_date=$_POST['p_date'];
    $pickup_time=$_POST['p_time'];

    $conn=new mysqli('localhost','root','','project');
    if($conn->connect_error){
        die("error".$conn->connect_error);
    }
    $sql="UPDATE customer SET name = '$name', pickup_place = '$pickup_location', drop_place = ' $drop_location', pickup_time='$pickup_date', drop_time='$pickup_time', booking_status = 'booked' WHERE username = '{$_SESSION['Cusername']}'";
    if($conn->query($sql))
    {
        echo "<script> alert ('successful')</script>";
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
    <link rel="stylesheet" href="style.css">
    <title>customer page</title>
</head>
<body>
<div>
<button onclick="window.location.href='index.php'"> home</button>
<button onclick="window.location.href='seen_page.php'"> show profile</button>

         </div>
    </div> 
    <div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div>
                <label for="name" class="l"><b>Name</b></label>
                <input type="text" name="ID" id="name" class="l" placeholder="s.raja">
            </div>
         

            <div>
                <label for="P_location"><b>Pickup location:</b></label>
                <input type="text" placeholder="Jaffna" name="p_location" id="P_location">
            </div>    
            <div>
                <label for="d_location"><b>Drop location:</b></label>
                <input type="text" placeholder="Colombo" name="d_location" id="d_location">
            </div>
            <div>    
                <label for="date"><b>Pickup:</b></label>
                <input type="datetime-local" name="p_date" id="date">
            </div>
            <div>
                <label for="time"><b>Drop:</b></label>
                <input type="datetime-local" name="p_time" id="time">
            </div>
            <div> 
                <button type="submit" class="button1" name="sub">DONE</button>
                <button type="reset" class="button3">CLEAR ALL</button>
            </div>
            <a href="" alt="">help?</a>
        </form>
 
</body>
</html>

//login.php_check_syntax<?php
session_start();
	if(isset($_POST['sub']))
	{
        if (empty($_POST['username'])) {
            echo "username empty";
           } 
		elseif(empty($_POST['upassword']))
		{
			echo "Password empty";
		}
    
		else
		{
           
            require "con1.php";
		$id=$_POST['username'];
		$psw=($_POST['upassword']);
		
		$selectusr="select username,password from customer where username='$id' AND password='$psw'";
        $selectusr1="select * from driver where driver_id='$id' AND password='$psw'";
		$res=$con->query($selectusr);
        $res1=$con->query($selectusr1);
		if($res->num_rows>0)
        {
			
            echo  "<script>alert('login Successfully')</script>";   
            $_SESSION["Cusername"]= $_POST["username"];
            header("Location:customer.php");
            exit();
        } 
		
		else
		{
            echo "<script>alert('login unSuccessfully')</script>" ;
		} 
          if($res1->num_rows>0)
        {
            echo "login driver Successfully";
             //Valid user, so set the Session
             $_SESSION["DuserName"] = $_POST["username"];
             header("Location:driver_dashboard.php");
             exit();
        }
          
     $con->close();
		}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="stylehari.css">
    <title>login</title>
    <style>
    .phpstyle
    {    
       margin-left:45%;
    
        border-radius:1rem;
        padding:10px;
        width:10%;
        background: #f5f5f5;
         color:black;
    }
    </style>
</head>
<body>

    <section  class="container">
    <img src="images/user.png" class="user">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" class="form">
        <h1>login</h1>
        <div >
                <input type="radio" onclick="window.location.href='login.php'"> clint
                <input type="radio" onclick="window.location.href='admlog.php'">Admin
            </div><br>
        <div class="input-group"> 
        <label for="username">username</label><br>
        <input type="text"id="username" name="username"  placeholder="Enter Username">
</div>
    <div class="input-group">
        <label for="password">password</label><br>
        <input type="password" id="password" name="upassword"placeholder="Enter Password" ><br>
        <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    </div>
    <button type="submit" name="sub">sign in</button>
     
    <br><br>
            <a href="register.php">New user, Register now !?</a>
    </form>
</section>
  
</body>
</html> 

background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('images/a.jpg');

* {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .hero {
    height: 100vh;
    width: 100%;
    background-image: url('https://via.placeholder.com/1920x1080');
    background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('images/b.jpg');
    
    background-size: cover; /* Ensures the image covers the full height and width */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    background-attachment: fixed; /* Makes the background stay fixed while scrolling */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


      
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 10%;
            font-size: 20px;
            width: 100%;
        }

        .logo {
            color: white;
            font-size: 28px;
            margin-left: 10px;
        }

        nav ul {
            display: flex;
        }

        nav ul li {
            list-style: none;
            padding: 10px 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: rgb(255, 183, 2);
            transition: 0.3s;
        }

        .login button {
            border: none;
            background: #ffd400;
            padding: 10px 30px;
            border-radius: 30px;
            color: #000000;
            font-weight: bold;
            font-size: 15px;
            transition: 0.5s;
            cursor: pointer;
        }

        .login button a {
            color: inherit;
            text-decoration: none;
        }

        .login button:hover {
            background-color: #ff9e00;
        }

        .displayname {
            margin-top: 20px;
            color: #ffd400;
            font-size: 20px;
            font-weight: bold;
        }

        #text-box {
            font-size: 3rem;
            text-align: center;
            color: white;
            padding: 100px 30px;
            -webkit-text-stroke: 0.3px black;
            text-transform: uppercase;
            font-weight: bold;
        }

        #text-box button {
            background-color: #ffd400;
            border: none;
            color: black;
            padding: 10px 30px;
            font-size: 18px;
            border-radius: 25px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        #text-box button:hover {
            background-color: #ff9e00;
        }

        .time {
            text-align: center;
            font-size: 20px;
            color: white;
        }

        @media (max-width: 768px) {
            #text-box {
                font-size: 2rem;
                padding: 50px 20px;
            }

            nav {
                flex-direction: column;
                padding: 20px;
            }

            .login button {
                padding: 12px 25px;
            }

            /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
}

/* Navigation bar styles */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(90deg, #FFD400, #FFAA00);
    padding: 20px 50px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

nav .logo {
    font-size: 2rem;
    color: white;
    font-weight: bold;
}

nav ul {
    display: flex;
    list-style-type: none;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 1.2rem;
    font-weight: 500;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #333;
}

/* Button style */
.login button {
    background-color: #333;
    color: white;
    font-size: 1.2rem;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login button:hover {
    background-color: #FFD400;
}

/* Mobile Responsive Styles */
@media (max-width: 768px) {
    nav ul {
        display: none;
        width: 100%;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: #333;
        text-align: center;
        padding: 20px 0;
        flex-direction: column;
        justify-content: flex-start;
    }

    nav ul li {
        margin: 15px 0;
    }

    nav ul li a {
        font-size: 1.5rem;
    }

    .menu-toggle {
        display: block;
        background: none;
        border: none;
        color: white;
        font-size: 2rem;
        cursor: pointer;
    }

    nav.open ul {
        display: flex;
    }
}
//customer

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
