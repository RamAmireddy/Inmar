<?php
$db = mysqli_connect("localhost","root","","market");


function getStores(){
    global $db;
    $get_stores="select * from retailer ";
    $run_stores=mysqli_query($db,$get_stores);
    while($row_stores=mysqli_fetch_array($run_stores)){
        $ret_id=$row_stores['ret_id'];
        $ret_name=$row_stores['ret_fname'].' '.$row_stores['ret_lname'];
        $ret_contact=$row_stores['ret_contact'];
        $ret_email=$row_stores['ret_email'];
        $ret_address=$row_stores['ret_address'];
        echo "<div class='col-md-4 col-sm-6 single emp-profile'  >
                <div class='text'>
                <form action='store.php' method='post' style=' display: inline;vertical-align: middle;'>
                <button type='submit' name='store' value='store' class ='btn btn-primary'>$ret_name's store</button>
                <input type='hidden' id='retid' name='retid' value='$ret_id'>
                <b>Email </b>    : $ret_email<br>
                <b>phone no</b>  : $ret_contact<br>
                <b>Address </b>  : $ret_address<br>
                <b>Country </b>  : India<br>
                </form
                </div>
                </div>
        ";

    }

}


?>