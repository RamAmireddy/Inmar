<?php

session_start();

include("includes/db.php");

include("includes/functions.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Fruit Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

</head>
<body>

<div class="topnav" style="padding-left:16px">
        <i ><b><a href="index.php" id="navids" style="font-size: 17px;">Friut Market</a></i></b>
        <a class="active" href="index.php">Home</a>
<div style="float:right;">
  <a href="register.php">Register</a>
  <?php
    if(!isset($_SESSION['user']))
    {
        echo '<a href="login.php">Login</a>';
    }
    else
    {
        echo '<a href="logout.php">Logout</a>';
    }
?>
  <a href="#about">contact</a>
  <a href="#about">About</a>

</div>
</div>
<form action="login.php" method="post">
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in this form to loginto your account.</p>
    <hr>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <label for="type"><b>Are you a seller </b></label><br>
    <input type="radio" name="seller" value="yes" > Yes<br>
  <input type="radio" name="seller" value="no" checked> NO<br>
    <div id="mycheckboxdiv" style="display:none">
    This content should appear when the checkbox is checked
     </div>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="login" value="login">Login</button>
  </div>
  </form>

</body>
</html>
<?php
include('includes/footer.php');
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $psw=$_POST['psw'];
    if($_POST['seller']=='no'){
        $cust_log="select * from customers where  customer_email='$email' and customer_password='$psw'";
        $run_log=mysqli_query($con,$cust_log);
        $cust_exist=mysqli_num_rows($run_log);
        if($cust_exist==1){
            $_SESSION['email']=$email;
            echo "<script>alert('You are now logged In as customer')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }
        else
        echo "<script>alert('password or email is wrong')</script>";

    }
    else{
        $retailer_log = "select * from retailer where ret_email='$email' and ret_pass='$psw'";
        $run_log=mysqli_query($con,$retailer_log);
        $ret_exist=mysqli_num_rows($run_log);
        if($ret_exist == 1){
            $_SESSION['email']=$email;
            echo "<script>alert('You are now logged In as seller ')</script>";
            echo "<script>window.open('retailers/seller_account.php','_self')</script>";

        }
        else
        echo "<script>alert('password or email is wrong $psw')</script>";
    
    }
}


?>