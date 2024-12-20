
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Trebuchet MS', Arial, sans-serif;
}

.hero {
    height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('images/saa.jpg'); /* Update with your image */
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
}

nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    font-size: 30px;
    position: absolute;
    top: 20px;
    
}

.logo {
    color: white;
    font-size: 28px;
    font-weight: bold;
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    padding: 10px 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

nav ul li a:hover {
    color: #ffb700;
    transition: 0.3s;
}

button {
    border: none;
    background: #ffd400;
    padding: 12px 35px;
    border-radius: 30px;
    color: #000;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background: #ff9f00;
}

#text-box {
    text-align: center;
    font-size: 5rem;
    font-weight: bolder;
    -webkit-text-stroke: 1px black;
    color: #fff;
    padding: 150px 30px 50px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

#text-box h3 {
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
}

.displayname {
    position: absolute;
    top: 120px;
    right: 30px;
    font-size: 18px;
    color: #ffd400;
    font-weight: bold;
}

.displayname span {
    font-size: 20px;
    color: #ffb400;
}

.time {
    color: #f4f4f4;
    font-size: 18px;
    text-align: center;
    padding: 40px;
    background: rgba(0, 0, 0, 0.6);
}

button a {
    text-decoration: none;
    color: inherit;
}

button a:hover {
    color: #e70000;
}

h2 {
    color: #ffd400;
}

/* Responsive Design for smaller screens */
@media (max-width: 768px) {
    #text-box {
        font-size: 3.5rem;
        padding: 100px 20px 40px;
    }

    .hero {
        background-position: top;
    }
}
</style>
  
</head>
<body>

    <div class="time">

    </div>
    <div class="hero">
        <nav>
            
            <h2 class="logo">MR.TAXI</h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="customer.php">customer</a></li>
                <li><a href="driver_dashboard.php">Driver</a></li>
                <li><a href="service.html">services</a></li>
            </ul>
            <div class="login">
                <button type="button"><a href="login.php">LOG IN</a></button>
            </div>
            
            
        </nav>

        <div class="displayname">
        <?php
        session_start();
                    if(isset($_SESSION['Cusername']))  {
                        $con = new mysqli("localhost", "root", "", "project");
                        $get = "select * from customer where username='{$_SESSION['Cusername']}'";
                        $save = $con->query($get);
                        $details = $save->fetch_assoc();
                        echo " <span id='intro' >Hi " . $details['username'] . "  &#128525;</span>";
                    }
?>
        </div>
        <div id="text-box">
            <h3 data-text="book">The company with <bR>The right fare</h3>
                <button type="button" onclick="window.location.href='customer.php'">Book Now</button>
            

                <div class="time">
                    <h1 style="text-align: center;">Result</h1>
                    <script src="time.js"></script>
                </div>

         
        </div>

       
        
    
</body>
</html>
