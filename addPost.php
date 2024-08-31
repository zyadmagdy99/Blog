<?php 
session_start();
require_once 'inc/header.php'; 
require_once 'inc/db.php'; 
?>

<!-- Page Content -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>New Post</h4>
          <h2>Add new personal post</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container w-50">
  <div class="d-flex justify-content-center">
    <h3 class="my-5">Add New Post</h3>
  </div>
  <form method="POST" action="../blog/handle/handle.php" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="">
      <?php if(isset($_SESSION['errors']['title'])) { ?>
        <div class="alert alert-danger">
          <?php echo $_SESSION['errors']['title']; ?>
        </div>
      <?php } ?>
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      <textarea class="form-control" id="body" name="body" rows="5"></textarea>
      <?php if(isset($_SESSION['errors']['body'])) { ?>
        <div class="alert alert-danger">
          <?php echo $_SESSION['errors']['body']; ?>
        </div>
      <?php } ?>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control-file" id="image" name="image">
      <?php if(isset($_SESSION['errors']['image'])) { ?>
        <div class="alert alert-danger">
          <?php echo $_SESSION['errors']['image']; ?>
        </div>
      <?php } ?>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>

<?php require_once 'inc/footer.php'; ?>
<?php unset($_SESSION['errors']); ?>
