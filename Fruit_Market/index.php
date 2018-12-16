<?php

session_start();

include("includes/db.php");

include("includes/functions.php");

?>
<?php

if(!isset($_SESSION['email'])){

echo "<script>window.open('login.php','_self')</script>";

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Fruit Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <style>
    .emp-profile{
        padding: 3%;
        padding-left: 3%;
        padding-top: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background-color: white;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}
</style>

</head>
<body>

<div class="topnav" style="padding-left:16px">
        <i ><b><a href="index.php" id="navids" style="font-size: 17px;">Friut Market</a></i></b>
        <a class="active" href="index.php">Home</a>
<div style="float:right;">
  <a href="register.php">Register</a>
  <?php
    if(!isset($_SESSION['email']))
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
<div style="padding-left:16px">
<h2 color=black>
<p > <b> Different stores available in the fruit market </b></p></h2>
<?php
getstores();

?>


</div>


</body>
</html>
<?php
include('includes/footer.php');
?>