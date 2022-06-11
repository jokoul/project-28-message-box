<?php include('database.php'); ?>
<?php include('process.php'); ?>
<?php include('delete.php'); ?>
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
                <h1>Message Box</h1>
                <p>Leave a message in the Box</p>
            </header>
             <main id="shouts">
                <ul>
                    <?php while($row=mysqli_fetch_assoc($shouts)): ?>
                        <!-- <p><?php print_r($row); ?></p> -->
                        <li data-id="<?php echo $row['id'] ?>" class="shout">
                            <span><?php echo $row['time'] ?> - </span><span class="name"><?php echo $row['user'] ?></span>: <?php echo $row['message'] ?>
                        </li>
                        <div class="buttons">
                            <div>
                                <a class="updateBtn" href="updateView.php?id=<?php echo $row['id'] ?>">update</a>
                            </div>
                            <form class="deleteForm" action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <input class="deleteBtn" type="submit" name="submit" value="Delete">
                            </form>
                        </div>
                    <?php endwhile; ?>
                </ul>
            </main>
            <div id="input">
                <?php if(isset($_GET['error'])): ?>
                    <!-- <p><?php print_r($_GET) ?></p> -->
                    <div class="error"><?php echo $_GET['error'] ?></div>
                <?php endif; ?>
                <form action="process.php" method="post">
                    <input type="text" name="user" placeholder="Enter Your Name">
                    <input type="text" name="message" placeholder="Enter Your Message">
                    <br>
                    <input class="shout-btn" type="submit" name="submit" value="Send message in box">
                </form>
            </div>
        </div>
    </body>
</html>