<?php

require_once '../../../application.php';

Authorization::checkOrRedirect();

if(isset($_POST['item'])) {
  $item = new PortfolioItem($_POST['item']);
  $item->create();

  if (isset($_FILES['image'])) $item->attachUploadedImage($_FILES['image']);
  header('Location: ' . $item->adminEditUrl());
  exit;
} else {
  $item = new PortfolioItem();
}

require_once ROOT_PATH . '/header.php';

?>

<h1>New portfolio item</h1>
<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="item[title]" value="<?php echo $item->title; ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" name="item[content]" class="form-control"><?php echo $item->content; ?></textarea>
  </div>

  <div class="row">
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" id="image" name="image" value="<?php echo $item->title; ?>" class="form-control">
    </div>
  </div>

  <input type="submit" name="submit" value="Skapa" class="btn">
</form>
<br>
<?php require_once ROOT_PATH . '/footer.php'; ?>
