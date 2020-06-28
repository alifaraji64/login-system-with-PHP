<?php
if(isset($_POST['signup-submit'])){
    require 'dbh.inc.php';
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($pwd) || empty($pwd_repeat)){
        header("location: ../signup.php?error=emptyfield&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("location: ../signup.php?error=invalidEmail"."&uid=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../signup.php?error=invalidUsername&mail=".$email);
        exit();
    }
    else if($pwd !== $pwd_repeat){
        header("location: ../signup.php?error=passwordCheck&uid=".$username."&email".$email);
        exit();
    }
    else{
        //if the user exists in our database
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../signup.php?error=sqlError");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck>0){
                //we have a user in our database
                header("location: ../signup.php?error=userTaken".$email);
                exit();
            }
            else{
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("location: ../signup.php?error=sqlError");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("location: ../signup.php");
    exit();
}