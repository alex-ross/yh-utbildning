<?php

require_once '../../../application.php';

Authorization::checkOrRedirect();
require_once ROOT_PATH . '/header.php';

var_dump($_POST);
var_dump($_FILES);

if(isset($_POST['item'])) {
  $item = new PortfolioItem($_POST['item']);
  $item->save();

  if (isset($_FILES['image'])) $item->attachUploadedImage($_FILES['image']);
} else {
  $item = PortfolioItem::find($_GET['id']);
}

?>

<h1>Edit: <?php echo $item->title; ?></h1>
<form action="" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="item[id]" value="<?php echo $item->id; ?>">

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="item[title]" value="<?php echo $item->title; ?>" class="form-control">
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" name="item[content]" class="form-control"><?php echo $item->content; ?></textarea>
  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="image">Image</label>
      <input type="file" id="image" name="image" value="<?php echo $item->title; ?>" class="form-control">
    </div>

    <div class="col-md-6"><img src="<?php echo $item->imageSrc(); ?>"></div>
  </div>

  <input type="submit" name="submit" value="Spara" class="btn">
</form>
<?php require_once ROOT_PATH . '/footer.php'; ?>
