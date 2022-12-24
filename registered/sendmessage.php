<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registered.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Unsaidn't</title>
</head>
<body class="body">
<div class="topContainer"> 
        <a href="../index.php" class="webName1"> unsaidn't </a>
        <div class="showUsername">
        <?php 
            session_start();
            $username = htmlspecialchars($_SESSION["username"]);
            
        ?>
        </div>

        <a href="../loginsystem/logout.php" class="logoutButton1">Sign Out</a>
    </div>
    
    <h1 class="messageTitle"> Send messages Anonimously </h1>

    <div class="msgSender"> 
                    
                    <?php 
                    
                    require('connect.php');
                    
                    if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
                        <?php echo $fmsg; ?> </div>
                    <?php } ?>
                    <section class="section-four">
                    <form action = "sendmessage.php" method="post">
                    <div class="usernameBar" >                       
                        Dear <input type="text" class="insertUsername" name="targetUser" placeholder=" username">,
                    </div>
                    <div class="messageBar" >
                        <br> <textarea type="text" class="insertMessage" rows="2" 
                        placeholder="Insert your message here..." name="message"></textarea>
                    </div>
                    <button type="submit" class="sendButton">Send</button>
                    <input type="reset" class="clearButton" value="Clear">
                    </form>
                    
                    <!-- <a  href="index.php"><img src="../images/backarrowblk.png"  class="backButton" ></a> -->

                    </section>

                   

            <?php 

                if(isset($_POST['targetUser'])){

                    $targetUser = $_POST['targetUser'];
                    $messages = mysqli_real_escape_string($connection, $_POST['message']);
             
                    $sendMessage = "INSERT INTO $targetUser (username, messages) VALUES ('$username', '$messages')";
                    $sendMessage1 = "INSERT INTO usersMessages (username, messages) VALUES ('$username', '$messages')";
 
                    $ires = mysqli_query($connection, $sendMessage) or die(mysqli_error($connection));
                    $ires = mysqli_query($connection, $sendMessage1) or die(mysqli_error($connection));
    
                }
               
            ?>
    </div>
    
            <?php 
                require('navigation.php');
            ?>

</body>
</html>