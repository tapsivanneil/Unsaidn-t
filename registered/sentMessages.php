<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registered.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Unsaidn't</title>
</head>
<body>
<div class="topContainer">  
        <a href="../index.php" class="webName1"> unsaidn't </a>         
    </div>

    <div>
        <h1 class="messageTitle"> Drafts</h1> 
    </div>
<div class="msgContainer">
    <?php
        require('connect.php');
        session_start();
        $username = htmlspecialchars($_SESSION["username"]);

        $sql = "SELECT * FROM usersMessages where username = '$username' order by id desc";
         
         $res = mysqli_query($connection, $sql);
 
             while ( $r = mysqli_fetch_assoc($res)) {
         ?>      <section class="section-four">
                 <div class="messageBox"> 
                     <div> <?php echo $r['messages']; ?><br></div>
                     <div class="showDate"> <?php echo $r['created_at']; ?></div>      
                 </div>
                 </section>
         <?php } 
         
         require('navigation.php');
         
         ?>
        </div>
</body>
</html>