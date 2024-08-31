<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/db.php' ?>
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new Post</h4>
              <h2>add new personal post</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Background</h2>
            </div>
          </div>

          <?php 
          $id = $_GET['id'];
          if(!isset($_GET['id'])){
              header("location:index.php") ;
             exit();
            } 
            $query = "select * from posts where id = $id";
            $resault = mysqli_query($connection,$query);
            $post = mysqli_fetch_assoc($resault);
            if(!empty($post)){
              
          
                ?>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/postImage/<?php echo $post['image'] ?>  " alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4> <?php echo $post['title'] ?></h4>
              <p><?php echo $post['body'] ?></p>
              
              <div class="d-flex justify-content-center">
                  <a href="editPost.php?id=<?php  echo $id?>" class="btn btn-success mr-3 "> edit post</a>
              
                  <a href="handle/handledelete.php?id=<?php  echo $id?>" class="btn btn-danger "> delete post</a>
              </div>
            </div>
            <?php  }else{
                ?> <img src="assets/images/team_06.jpg" alt="">
           <?php }  ?>
          </div>
        </div>
      </div>
</div>

    <?php require_once 'inc/footer.php' ?>
