<?php
 require_once '../inc/db.php' ;

 if(isset($_POST['submit']) && $_GET['id']){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $id = $_GET['id'];
    $query="select * from posts where id =$id";
    $resault = mysqli_query($connection,$query);
    $oldimg = mysqli_fetch_assoc($resault)["image"];
    $errors = [];
    if(empty($title)){
        $errors['title'] = "please enter the title";
    };
    if(empty($body)){
        $errors['body'] = "please enter the post";
    };
    if (isset($_FILES['image'])&&$_FILES['image']['name']){
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
    
    }else{
        $newname = $oldimg;
    };

    
    if(empty($errors)){

        $query = "update posts set `title`='$title',`body`='$body',`image`='$newname' where id = '$id'";
        $resault = mysqli_query($connection,$query);

        if($resault){

            $_SESSION['success'] = 'post updated successfully';
            move_uploaded_file($imgtmb,"../assets/images/postImage/".$newname);
            unlink("../assets/images/postImage/".$oldimg);
            header("location:../index.php");
            exit();
        }

       
    }else{
        header("Location: ../editPost.php?id=$id");
        exit();
    }
    $_SESSION['errors']= $errors;
    header("location:../index.php");
}







