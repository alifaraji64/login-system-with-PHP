<?php
if(isset($_POST['login-submit'])){
    require './dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if(empty($mailuid) || empty($password)){
        header('location: ../index.php?error=emptyFields');
        exit();
    }
    //inputs are not empty
    else{
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header('location: ../index.php?error=sqlError');
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,'ss',$mailuid,$mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            // if there is some record in the db that matches the recieves mailuid
            if($row = mysqli_fetch_assoc($result)){
                $pwd = $row['pwdUsers'];
               $pwdCheck = password_verify($password,$row['pwdUsers']);
                //password incorrect
                if($pwdCheck == false){
                    header('location: ../index.php?error=wrongPassword');
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header('location: ../index.php?login=success');
                    exit();
                }
                //if the result of $pwdCheck is not a boolean
                else{
                    header('location: ../index.php?error=wrongPasswordN');
                    exit();
                }
                if($pwd){
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header('location: ../index.php?login=success');
                    exit(); 
                }
            }
            //if there is not such user in db
            else{
                header('location: ../index.php?error=noUser');
                exit();
            }
        }
    }
}
else{
    header('location: ../index.php');
    exit();
}