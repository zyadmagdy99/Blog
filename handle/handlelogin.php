<?php
 require_once '../inc/db.php' ;

 if(isset($_POST['submit'])){

    $password = $_POST['password'];
    $email = $_POST['email'];

    if(!empty($email) && !empty($password)){

        $query = "select * from users where `email` = '$email' ";
        $resault = mysqli_query($connection,$query);

        $rows = mysqli_num_rows($resault);
        if($rows == 1){
            $user = mysqli_fetch_assoc($resault);

            $username = $user['name'];
            $userid = $user['id'];
            $dppassword = $user['password'];

            $verify = password_verify($password,$dppassword);
            if($verify){
                $_SESSION['success'] = "welcome $username";
                $_SESSION['userid'] = $userid;
                header("location:../index.php");
                exit();
            }else{
                $errors['password'] = "wrong password";
                $_SESSION['errors']=$errors;

                header("location:../login.php");
                exit();
            }
        }else{
            $errors['email'] = "wrong email";
            $_SESSION['errors']=$errors;

            header("location:../login.php");
            exit();
        }
    }
    header("location:../login.php");
    exit();

 }