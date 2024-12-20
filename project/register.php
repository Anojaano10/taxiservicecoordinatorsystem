<?php

	if(isset($_POST['sub']))
	{
		if($_POST['upassword']=="")
		{
			echo "<script>alert('Password empty')</script>";
		}
		else if($_POST['upassword']!=$_POST['cpassword'])
		{
			echo"<script>alert('Password not match')</script>";
		}
		else
		{
            require "con1.php";
		$id=$_POST['username'];
		$psw=($_POST['upassword']);
		$email=$_POST['email'];
        $ph = $_POST['user_ph'];
        $add = $_POST['user_add'];
      
		
		$select="select username from customer where username='$id'";
		$res=$con->query($select);
		if($res->num_rows>0)
		{
			echo "user name already taken";
		}
		else
		{
            $run3 = $con->query("SELECT COUNT(customer_id) AS no3 FROM customer");
            $result3 = $run3->fetch_assoc();
            $count3 = $result3['no3'];
            $insert = "INSERT INTO customer (customer_id, username, password, email,phone_no, address) VALUES ('$count3'+'1', '$id', '$psw','$email', '$ph', '$add')";
			if($con->query($insert))
			{
	           echo"<script>alert('Registered Successfully')</script>";
			}
			else
			{
                echo"<script>alert('Registered UnSuccessfully')</script>";
            }
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
    
    <title>register</title>
    <style>
        body{
    background: linear-gradient(to right,rgb(241, 170, 15),rgb(55, 53, 37));

    margin: 0;
    padding: 0;
   
    background-size: 100% 100% ;
     text-transform: capitalize;
    font-family: sans-serif;
}

.container{
    background:rgb(153, 151, 151);
    color: rgb(17, 14, 79);
    top: 58%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 20px 30px;
}
h1{
    margin: 0;
    padding: 35px 0 20px;
    text-align: center;
    font-size: 22px;
    color: black;
}

label{
    color:rgb(29, 27, 26);
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.input-group{
    width: 100%;
    margin-bottom: 10px;
}

.input-group input
{
    border: none;
    border-bottom: 3px solid #f5f3f3;
    background: transparent;
    outline: none;
    height: 40px;
    color: #673ab7;
    font-size: 16px;
}

.form button
{
    border: none;
    outline: none;
    height: 40px;
    width:100%;
    background:rgb(190, 109, 23);
    color: #fff;
    font-size: 18px;
    border-radius: 20px;

}


.form button:hover
{
    cursor: pointer;
    background:rgb(27, 28, 28);
}
.form button:active{
    background: linear-gradient(90deg,#45f3ff,#d9138a);
    opacity: 0.8;
}

a
{
    text-decoration: none;
    font-size: 16px;
    line-height: 20px;
    color: #069818;
}


a:hover
{
    color: red;
}

.user{
    width: 100px;
    height: 100px;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px)};


</style>








</head>
<body>
    
    <div class="container">
    <img src="images/user.png" class="user">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"  class="form">
            <h1>Register Here</h1>
           
            <br>
            <div class="input-group">
                <label for="username">username</label><br>
                <input type="text" id="username" name="username" placeholder="Enter Username">
               
                
            </div>
            <div class="input-group">
                <label for="email">email</label><br>
                <input type="email" id="email" name="email" placeholder="Enter email id">

              
            </div> 
            <div class="input-group">
                <label for="user_ph">phone number</label><br>
                <input type="text" id="email" name="user_ph" placeholder="Enter phone number">
                
              
            </div> 
            <div class="input-group">
                <label for="user_add">Address</label><br>
                <input type="text"  name="user_add" placeholder="Enter user address">
                
              
            </div> 
            <div class="input-group">
                <label for="password">password</label><br>
                <input type="password" id="password" name="upassword"placeholder="Enter Password">
                
            </div>
        <div class="input-group">
            <label for="cpassword">confrim password</label><br>
            <input type="password" id="cpassword" name="cpassword" placeholder="Re-Enter Password"  ><br>

             
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:skyblue">Terms & Privacy</a>.</p>
        </div>
        
        <button type="submit" name="sub">sign up</button>
        <br><br>
            <a href="login.php">existing user, login !?</a>
        </form>
    </div> 
    

    
</body>
</html>