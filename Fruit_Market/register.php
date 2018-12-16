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
    <script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("mycheckboxdiv");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

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
<form action="register.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="contact"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="fname" required>
    <label for="contact"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="lname" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="contact"><b>contact no</b></label>
    <input type="text" placeholder="contact no" name="contact" required>
    <label for="contact"><b>Address </b></label>
    <input type="text" placeholder="contact no" name="address" required>
    <label for="type">Are you a seller?</label><br>
    <input type="radio" name="seller" value="yes" > Yes<br>
  <input type="radio" name="seller" value="no" checked> NO<br>
    <div id="mycheckboxdiv" style="display:none">
    This content should appear when the checkbox is checked
     </div>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="register" value="register">Register</button>
  </div>
  </form>
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
  
</body>
</html>

<?php
    include("includes/footer.php");
    if(isset($_POST['register'])){
        $cust_fname=$_POST['fname'];
        $cust_lname=$_POST['lname'];
        $cust_email=$_POST['email'];
        $cust_pass=$_POST['psw'];
        $cust_contact=$_POST['contact'];
        $cust_add=$_POST['address'];
        if($_POST['seller']=='no'){
            $cust_insert="insert into customers (customer_name, customer_email, customer_password, customer_address, customer_contact, customer_lastname) values ('$cust_fname','$cust_email','$cust_pass','$cust_add','$cust_contact','$cust_lname' )";
            $run_query=mysqli_query($con,$cust_insert);
            if($run_query){
                echo " <script>alert('you have sucessfully registered as customer please login')</script>";
                echo "<script>window.open('login.php','_self')</script>";
            }
            else
            echo " <script>alert('email id already exist')</script>";
        }
        else
        {
            $ret_insert="INSERT INTO retailer ( ret_fname, ret_lname, ret_email,ret_pass, ret_contact, ret_address) VALUES ('$cust_fname','$cust_lname','$cust_email','$cust_pass','$cust_contact','$cust_add' )";
            $ret_query=mysqli_query($con,$ret_insert);
            if($ret_query){
                echo " <script>alert('you have sucessfully registered as seller please login')</script>";
                echo "<script>window.open('login.php','_self')</script>";
            }
           
        }
        
    }

  ?>