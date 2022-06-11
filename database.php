<?php
//connect to MySQL database
$con = mysqli_connect('localhost','root','','message-box');

//Test Connection (!con)
if(mysqli_connect_error()){
    //conection failed
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
    // die('Failed to connect to MySQL: ' . mysqli_connect_error())//to stop the script on error
}else{
    //connection succeed
     //Create Select Query
    $query="SELECT * FROM shouts ORDER BY id DESC";
    $shouts=mysqli_query($con,$query);
}