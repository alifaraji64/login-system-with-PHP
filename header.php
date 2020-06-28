<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>login system with php</title>
</head>
<body>
    <header>
        <nav>
            <a href="#">
            <img src="https://img.icons8.com/wired/64/000000/database-restore.png"/>
            </a>
            <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="#">portfolio</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">contact</a></li>
            </ul>
            <div>
            <?php
            //if user is logged in show the logout button
             
                  if(isset($_SESSION['userId']) && $_SESSION['userId'] == true){
                      echo '   
                      <form action="includes/logout.inc.php" method="POST">
                         <button type="submit" name="logout-submit">logout</button>
                      </form>
                               ';
                  }
                    //show the login for if user is not logged in
                  else {
                      echo'
                              <form action="includes/login.inc.php" method="post" autocomplete="off">
                                  <input type="text" name="mailuid"  placeholder="username/email...">
                                  <input type="password" placeholder="password" name="pwd"  >
                                  <button type="submit" name="login-submit" class="btn">login</button>
                               </form>
                               <a href="signup.php" style="margin:0 1rem">signup</a>
                            ';
                  }
               ?>

            </div>
        </nav>
    </header>