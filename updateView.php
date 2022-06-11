<?php 
include('database.php');
$messageId = $_GET['id'];
// print_r($messageId);
$query="SELECT * FROM shouts WHERE id='$messageId'";
if(!$shout=mysqli_query($con,$query)){
    die('Error: ' . mysqli_connect_error());
}else{
    $row=mysqli_fetch_assoc($shout);
    // print_r($row);
    // var_dump($shout);
}
?>
<?php include('update.php') ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Message Box</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Edit <?php echo $row['user']; ?> Message </h1>
                <p>Change your message in the Box</p>
            </header>
             <main id="shouts">
                <p><?php echo $row['message']; ?></p>
            </main>
            <div id="input">
                <?php if(isset($_GET['error'])): ?>
                    <!-- <p><?php print_r($_GET) ?></p> -->
                    <div class="error"><?php echo $_GET['error'] ?></div>
                <?php endif; ?>
                <form action="updateView.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input class="updateInput" type="text" name="newmessage" placeholder="Enter Your New Message">
                    <br>
                    <input class="shout-btn" type="submit" name="submit" value="Send message in box">
                </form>
            </div>
        </div>
    </body>
</html>