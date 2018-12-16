<?php

session_start();

include("../includes/db.php");

include("../includes/functions.php");
if(!isset($_SESSION['email'])){

    echo "<script>window.open('../login.php','_self')</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Fruit Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../styles/bootstrap.min.css" rel="stylesheet">

    <link href="../styles/style.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <style>
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background-color: white;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}
.box {
    background: #fff;
    margin: 0 0 30px;
    border: solid 1px #e6e6e6;
    box-sizing: border-box;
    padding:20px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    
    
    }
    
    #advantages {
    text-align:center;
    }
    
    #advantages .box .icon {
    position: absolute;
    font-size: 120px;
    width:100%;
    text-align:center;
    top: -20px;
    left:0;
    height:100%;
    float:left;
    color:#eeeeee;
    transition: all 0.2s ease-out;
    z-index:1;
    box-sizing: border-box;
    
    }
    
    #advantages .box h3 {
    position:relative;
    margin: 0 0 20px;
    font-weight: 300;
    text-transform: uppercase;
    z-index:2;
    
    }
    
    #advantages .box h3 a:hover {
    text-decoration:none;
    }
    
    #advantages .box p{
    position:relative;
    color:#555555;
    z-index:2;
    
    }
</style>
</head>
<body style="background-color:#f0f0f0" >

<div class="topnav" style="padding-left:16px">
        <i ><b><a href="index.php" id="navids" style="font-size: 17px;">Friut Market</a></i></b>
        <a class="active" href="../index.php">Home</a>
<div style="float:right;">
  <a href="../register.php">Register</a>
  <?php
    if(!isset($_SESSION['email']))
    {
        echo '<a href="../login.php">Login</a>';
    }
    else
    {
        echo '<a href="../logout.php">Logout</a>';
    }
?>
  <a href="#about">contact</a>
  <a href="#about">About</a>

</div>
</div>
<div style="padding-left:16px" align="center" style="width:60%; height:0px; background-color: lightblue" class="panel panel-default panel-body emp-profile"><br>
<p style="font-size:35px;" align="center">Fruit Market retailer page</p>
</div>

<div class="col-md-3 "><!-- col-md-3 Starts -->
<div class="box">
<strong><h3 align="center" style="font-family:verdana;">My Details</h3></strong><br><br>
    <?php
    $email=$_SESSION['email'];
    $info="select * from retailer where ret_email='$email'";
    $run_info=mysqli_query($con,$info);
    $run_ret=mysqli_fetch_array($run_info);
    $fname=$run_ret['ret_fname'] ;
    $lname=$run_ret['ret_lname'];
    $email=$run_ret['ret_email'];
    $contact=$run_ret['ret_contact'];
    $address=$run_ret['ret_address'];
    echo " 
<b>Name </b>     : $fname $lname<br>
<b>Email </b>    : $email<br>
<b>phone no</b>  : $contact<br>
<b>Address </b>  : $address<br>
<b>Country </b>  : India<br>"
    

    ?>
</div>
</div>
<div class="col-md-9" ><!--- col-md-9 Starts -->

<div class="box" ><!-- box Starts -->

<?php
echo" <strong><h3 style='font-family:verdana;'>Products in store</h3></strong><br>
<table width='700' border='2' bgcolor='pink' align='center' >
    <tr align=center>
    <th><b> Name:</b></th> 
    <th><b> price :</b></th> 
    <th><b> Delete </b></th> 
    <th><b> Edit price:</b></th> 
    </tr>

" ;

$ret_id=$run_ret['ret_id'];
$ret_prod="select * from products where ret_id='$ret_id'";
$prod_run=mysqli_query($con,$ret_prod);
while($prod=mysqli_fetch_array($prod_run)){
    $pname=$prod['product_name'];
    $pprice=$prod['product_price'];
    $product_id=$prod['product_id'];
    echo "
    <tr align=center>
    <td>$pname</td>
    <td>$pprice</td>
    <td><a href='seller_account.php?del=$product_id'>DELETE</a></td>
    <td><a href='seller_account.php?edit=$product_id'>EDIT</a></td>
    </tr>
    ";
}
echo"</table>";
echo " <br>
<h3><b>want to add product to your store<b></h3><div >
<form action='' method='post' enctype='multupart/form-date'>
<label for='name'>Name of the fruit</label><br>
<input type='text' name='nname' placeholder ='fruit' required><br> <br>
<input type='text' name='nprice' placeholder =0 required ><br> <br>
<button type='submit' class='btn btn-success' name='add'>Add new product</button>
</form>";
if(isset($_POST['add'])){
    $nname=$_POST['nname'];
    $nprice=$_POST['nprice'];
    $fruit_ins="INSERT INTO products (product_id,product_name, product_price, ret_id, date) VALUES (NULL, '$nname', '$nprice', '$ret_id', CURDATE()); ";
    $run_nfruit=mysqli_query($con,$fruit_ins);
    if($run_nfruit){
        echo "<script>alert('product sucessfully added')</script>";
        echo "<script>window.open('seller_account.php' ,'_self')</script>";
    }
    else
    echo "<script>alert('product is not added')</script>";


}

if(isset($_GET['del'])){
    $del_id=$_GET['del'];
    $delete_user="delete from products where product_id='$del_id'";
    $run_delete=mysqli_query($con,$delete_user);
    if($run_delete){
        echo "<script>alert('A user has been deleted')</script>";
        echo "<script>window.open('seller_account.php?view','_self')</script>";
    }
    }
    if(isset($_GET['edit'])){
        $edit_id=$_GET['edit'];
        $get_user="select * from products where product_id='$edit_id' and date < CURDATE() ";
        $run_edit=mysqli_query($con,$get_user);
        if(mysqli_num_rows($run_edit)==1){
        $row_user=mysqli_fetch_array($run_edit);
       /* $prod_last_date=strtotime($row_user['date']);
        $pdate=date('Y-m-d',$prod_last_date);
        $today=date('Y-m-d');
        $date_diff=date_diff($pdate,$today);*/
        
        $prod_id=$row_user['product_id']; 
        $prod_name=$row_user['product_name'];
        $product_price=$row_user['product_price'];
        echo  "<div class='box'>
            <h2>Editing $prod_name</h2>
            <form action='' method='post' enctype='multupart/form-date'>
                <b> New price :</b> <input type='text' name='price' value='$product_price'><br> <br>
                
            <input type='submit' name='update' value='update'>
            </form>
            </div>
        ";
        }
        else
        echo "<script>alert('You cannot edit more than once a day')</script>";
    }


    if(isset($_POST['update'])){
        $update_id=$prod_id;
        $prod_price=$_POST['price'];
        $update_user="update products set product_price='$prod_price' , date = NOW() where product_id='$update_id'";
        $run_update=mysqli_query($con,$update_user);
        if($run_update){
            echo "<script> alert ('A user has been updated')</script>";
            echo "<script>window.open('seller_account.php?view','_self')</script>";
        }
    }

?>
</div>
</div>


</body>
</html>
<?php
include('../includes/footer.php');
?>