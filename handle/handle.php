<?php
 require_once '../inc/db.php' ;

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $body = $_POST['body'];

    $errors = [];
    if(empty($title)){
        $errors['title'] = "please enter the title";
    };
    if(empty($body)){
        $errors['body'] = "please enter the post";
    };

    $img = $_FILES['image'];

    $imgName = $img['name'];
    $imgtmb = $img['tmp_name'];
    $imgerror = $img['error'];
    $imgsize = $img['size'];
    $imgext= pathinfo($imgName,PATHINFO_EXTENSION);
    $newname = uniqid().'.'.$imgext;

    if (empty($img)){
        $errors['image'] = "please enter image";

    }elseif($imgerror > 0){
        $errors['image'] = "image is broken";

    
    }elseif(! in_array($imgext,['jpg','png'])){
        $errors['image'] = "image must be jpg or png";

    }

    if(empty($errors)){

        $query = "INSERT INTO POSTS (`title`,`body`,`image`,`user_id`) 
        values ('$title','$body','$newname',1)";

        $resault = mysqli_query($connection,$query);

        if($resault){

            $_SESSION['success'] = 'post inserted successfully';
            move_uploaded_file($imgtmb,"../assets/images/postImage/".$newname);
            header("location:../index.php");
            exit();
        }

       
    }
    $_SESSION['errors']= $errors;
    print_r($_SESSION['errors']);
    header("location:../addPost.php");
}
     
    
