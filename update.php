<?php

$time="";
if(isset($_POST['submit'])){
    $newMessage = mysqli_real_escape_string($con,$_POST['newmessage']);
    $messageId = $_POST['id'];
    $time = date('h:i:s a', time());

    if(empty($newMessage)){
        $error ='Error updating your message.';
        header('Location: updateView.php?error=' . urlencode($error));
        exit();
    }else{
        $query="UPDATE shouts SET message='$newMessage', time='$time' WHERE id='$messageId'";
        if(!mysqli_query($con,$query)){
            die('Error: ' . mysqli_connect_error());
        }else{
            header('Location: index.php');
            exit();
        }
    }
}