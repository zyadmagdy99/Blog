
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/db.php' ?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <!-- <h4>Best Offer</h4> -->
            <!-- <h2>New Arrivals On Sale</h2> -->
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content"> 
            <!-- <h4>Flash Deals</h4> -->
            <!-- <h2>Get your best products</h2> -->
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <!-- <h4>Last Minute</h4> -->
            <!-- <h2>Grab last minute deals</h2> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    <?php 
          if(isset($_SESSION['success'])){ ?>
           
           <div class="alert alert-success"> <?php            echo $_SESSION['success'] ?>  </div>
            <?php      
            unset($_SESSION['success']);    } ?>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Posts</h2>
              <!-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> -->
            </div>
          </div>
          <?php 

          if(isset($_GET['page'])){
            $page = $_GET['page'];
          }else{
            $page = 1 ;
          }
      
            $limit = 3;
            $offset = ($page-1)*$limit;
            $postquery = "SELECT count(id) as numposts from posts";
            $res = mysqli_query($connection,$postquery);
            $Nposts = mysqli_fetch_assoc($res)['numposts']; 
            $numpage = ceil($Nposts / $limit);

            if($page < 1){
              header("location:index.php?page=1");
            }elseif($page > $numpage){
              header("location:index.php?page=$numpage");
            }

          $query = "select * from posts limit $limit offset $offset";
          $resault = mysqli_query($connection,$query);
          $posts = mysqli_fetch_all($resault,MYSQLI_ASSOC);
          if(!empty($posts)){

          foreach($posts as $post){

          ?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="assets/images/postImage/<?php echo $post['image']?>" alt=""></a>
              <div class="down-content">
                <a href="#"><h4><?php echo $post['title'] ?></h4></a>
                <h6><?php echo $post['created_at'] ?></h6>
                <p> <?php echo $post['body'] ?></p>
               
                <div class="d-flex justify-content-end">
                  <a href="viewPost.php?id=<?php echo $post['id']?>" class="btn btn-info "> view</a>
                </div>
                
              </div>
            </div>
          </div> <?php }}else{ ?> <h1>there is no posts</h1>
          <?php } ?>

        </div>
      </div>
    </div>

    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
  <ul class="pagination">
    <li class="page-item <?php if($page == 1) echo "disabled" ?>"><a class="page-link" href="index.php?page=<?php echo $page - 1?>">Previous</a></li>
    <?php  for($i=1 ;$i <=$numpage ; $i++){ ?>
    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php } ?>
    <li class="page-item <?php if($page == $numpage) echo "disabled" ?>"><a class="page-link"  href="index.php?page=<?php echo $page + 1 ?>">Next</a></li>
  </ul>
</nav>
 
    
<?php require_once 'inc/footer.php' ?>
