<?php
 require_once '../inc/db.php' ;

 if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $hash_pass = password_hash($password,PASSWORD_DEFAULT);

    $query = "INSERT INTO users (`name`,`email`,`password`,`phone`) 
        values ('$name','$email','$hash_pass','$phone')";
        $resault = mysqli_query($connection,$query);
        if($resault){
            header("location:../login.php");
            exit();
        }else{
            header("location:../register.php");

        }

 }