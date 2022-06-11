<?php
include('database.php');

//Check if form submitted
if(isset($_POST['submit'])){
    $user= mysqli_real_escape_string($con,$_POST['user']);
    $message= mysqli_real_escape_string($con,$_POST['message']);

    //Set timezone
    date_default_timezone_set('Europe/Paris');
    $time = date('h:i:s a', time());//we pass as variable the format and the current timestamp

    //Validate input (empty())
    if(!isset($user) || $user == '' || !isset($message) || $message == ''){
        $error= "Please fill in your name and a message!";
        header('Location: index.php?error=' . urlencode($error));//urlencode is useful when using certain URL shortener services. The returned URL from the shortener may be truncated if not encoded. Ensure the URL is encoded.
        exit();
    }else{
        $query="INSERT INTO shouts(user,message,time) VALUES ('$user','$message','$time')";

        if(!mysqli_query($con,$query)){
            die('Error: ' . mysqli_connect_error());
        }else{
            header('Location: index.php');
            exit();//to stop the script
        }
    }
}