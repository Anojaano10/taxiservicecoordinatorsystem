<?php
session_start();
if (isset($_POST['sub'])) {
    if (empty($_POST['username'])) {
        echo "Username is empty";
    } elseif (empty($_POST['upassword'])) {
        echo "Password is empty";
    } else {
        require "con1.php";
        $id = $_POST['username'];
        $psw = ($_POST['upassword']);

        $selectusr = "SELECT username, password FROM customer WHERE username='$id' AND password='$psw'";
        $selectusr1 = "SELECT * FROM driver WHERE driver_id='$id' AND password='$psw'";
        $res = $con->query($selectusr);
        $res1 = $con->query($selectusr1);

        if ($res->num_rows > 0) {
            echo "<script>alert('Login Successful')</script>";
            $_SESSION["Cusername"] = $_POST["username"];
            header("Location: customer.php");
            exit();
        } else {
            echo "<script>alert('Login Unsuccessful')</script>";
        }

        if ($res1->num_rows > 0) {
            echo "Login Driver Successful";
            $_SESSION["DuserName"] = $_POST["username"];
            header("Location: driver_dashboard.php");
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
    
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            
            background: rgba(95, 95, 94, 0.8); /* Semi-transparent background */
            
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color:gray;
            
        }

        .container {
            background: rgba(237, 230, 230, 0.8); /* Semi-transparent background */
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .container h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
            width: 100%;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #ffb300;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 179, 0, 0.6);
        }

        .input-group label {
            font-size: 1.1rem;
            color: #555;
        }

        .remember {
            text-align: left;
            margin-bottom: 20px;
        }

        .remember input {
            margin-right: 8px;
        }

        button {
            background: linear-gradient(to right,rgb(241, 170, 15),rgb(55, 53, 37));
            color: white;
            padding: 15px 0;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s;
        }

        button:hover {
            background: linear-gradient(to right,rgb(96, 51, 20),rgb(89, 76, 25));
            transform: scale(1.02);
        }

        a {
            color: #333;
            font-size: 1rem;
            text-decoration: none;
            margin-top: 15px;
            display: inline-block;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #ffb300;
        }

        .radio-group {
            display: flex;
            justify-content:center;
            margin-bottom: 20px;
        }

        
        @media (max-width: 500px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            .container h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <section class="container">
        <img src="images/user.png" class="user">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1>Login</h1>
            <div class="radio-group">
                <input type="radio" onclick="window.location.href='login.php'" name="role">Client
                <input type="radio" onclick="window.location.href='admlog.php'" name="role">Admin
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="upassword" placeholder="Enter Password">
            </div>
            <div class="remember">
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" name="sub">Sign In</button>
            <a href="register.php">New user? Register now!</a>
        </form>
    </section>
</body>

</html>
