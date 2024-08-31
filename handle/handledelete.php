<?php require_once '../inc/db.php' ;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query="select * from posts where id =$id";
    $resault = mysqli_query($connection,$query);
    $oldimg = mysqli_fetch_assoc($resault)["image"];
    
    $query = "delete from posts where id = $id";
    $resault = mysqli_query($connection,$query);
    
    if($resault){

      
        unlink("../assets/images/postImage/".$oldimg);

        $_SESSION['success'] = 'post deleted successfully';
        header("location:../index.php");
        exit();
    }


}
header("location:../index.php");
        exit();