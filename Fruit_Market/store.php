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
<?php
if(isset($_POST['store'])){
    $store_id=$_POST['retid'];
    $prod_ret="select * from products where ret_id='$store_id'";
    $run_prod=mysqli_query($con,$prod_ret);
    echo " <strong><h3 style='font-family:verdana;'>Products in store</h3></strong><br>
    <table width='700' border='0' bgcolor='pink' align='left' style='padding:50px'>
        <tr align=center>
        <th><b> Name </b></th> 
        <th><b> price (in $) </b></th> 
        <th><b> quantity </b></th> 
        <th><b> add to cart </b></th> 
        </tr>
    
    " ;
    while($row_prods=mysqli_fetch_array($run_prod)){
        $f_name=$row_prods['product_name'];
        $f_price=$row_prods['product_price'];
        $product_id=$row_prods['product_id'];

        echo "
            <td>$f_name</td>
            <td>$f_price</td>
            <td><input type='number' name='prod_quantity' value='0' 
            style='margin-left:auto; margin-right:auto;'>
            <input type='hidden' name='produt_id' value='$product_id'></td>
            <input type='hidden' name='f_price' value='$f_price'></td>
            <td><button class='btn btn-primary'><a href='store.php?add='$product_id'>add to cart</a></td></button>
            </tr> 
            ";

    }
    echo "</table>";

    ?>
    <h3 ></h3>

    <?php
}

if(isset($_GET['add'])){
    $prod_id=$_GET['add'];
    $cust_email= $_SESSION['email'];
    $retrive_price="select * from products where product_id='$prod_id'";
    $run_price= mysqli_query($con,$retrive_price);
    $row_price=mysqli_fetch_array($run_price);
    $price=$row_price['product_price'];
    $id_retrive="select * from customers where cust_email='$cust_email'";
    $id_ret=mysqli_query($con,$id_retrive);
    $cust_id=$id_ret['customer_email'];
    //$total_price=$price * $prod_quant;
   /* if($prod_quant==0){
        $del_query="delete from cart where product_id='$prod_id'";
        $del_run=mysqli_query($con,$del_query);
    }
    else{
        $check="select * from cart where cust_id='$cust_id' and product_id='$prod_id' ";
        $check_run=mysqli_query($con,$check);
        $rows_check=mysqli_num_rows($check_run);
        if($rows_check==1){
            $update_prod="update cart set quantity='$prod_quant' total_price='$total_price' where cust_id='$cust_id' and product_id='$prod_id'";
            $prod_run=mysqli_query($con,$update_prod);
            echo "<script>window.open('store.php',_'self')</script>";
        }
        else{*/

            $insert="INSERT INTO cart (cart_id, cust_id, product_id, quantity, total_price) VALUES(NULL,'$cust_id' ,'$prod_id', '1','$price')";
            $run_insert=mysqli_query($con,$insert);
        



}


?>


</div>


</body>
</html>
<?php
include('includes/footer.php');
?>