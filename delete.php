<?php
//query to delete a message
include('database.php');

if(isset($_POST['submit'])){
    $messageId = $_POST['id'];
    // var_dump($messageId);
    // var_dump($con);
    $query = "DELETE FROM shouts WHERE id='$messageId'";
    if(!mysqli_query($con,$query)){
        die('There is an error running your query : ' . mysqli_connect_error());
    }else{
        header('Location: index.php');
        exit();
    }
}