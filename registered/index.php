<?php ?>

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
<body>
    <div class="topContainer"> 
    <a href="../index.php" class="webName1"> unsaidn't </a> 
        
            <div class="showUsername/">
            <?php 
                session_start();
                $username = htmlspecialchars($_SESSION["username"]);
                
            ?>
            </div>
            <a href="../loginsystem/logout.php" class="logoutButton">Sign Out</a>
    </div>
    <div>
        <h1 class="messageTitle"> Messages </h1> 
    </div>
    
    <div class="msgContainer">
        <?php
        require('connect.php');
        require('connect.php');
        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
        
        $createTable = "CREATE TABLE IF NOT EXISTS $username(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            messages VARCHAR (255) NOT NULL
        )";

        $res = mysqli_query($connection, $createTable);

        $sql = "SELECT * FROM $username order by id desc";
         
        $res = mysqli_query($connection, $sql);

			while ( $r = mysqli_fetch_assoc($res)) {
		?>      <section class="section-four">
				<div class="messageBox"> 
                    <div> <?php echo $r['messages']; ?><br></div>
                    <div class="showDate"> <?php echo $r['created_at']; ?></div>    
                    <div class="showDate"> <?php echo time_elapsed_string($r['created_at'])?></div>   
                </div>
                </section>
		<?php } ?>

    </div>

    <!-- <div class="buttonHolder">
        <div class="addButton"> <a href="sendmessage.php" class="plus" > + </a> </div>
        <div class="sentButton"> <a href="sentMessages.php" class="plus" > S </a> </div>
    </div> -->

    <?php 
        require('navigation.php');
    ?>
    

   
</body>
</html>