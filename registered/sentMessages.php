<!php>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
         <?php } ?>
</body>
</html>