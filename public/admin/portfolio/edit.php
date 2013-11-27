<?php

require_once '../../../application.php';

Authorization::checkOrRedirect();
require_once ROOT_PATH . '/header.php';


if(isset($_POST['item'])) {
  $item = new PortfolioItem($_POST['item']);
  $item->save();
} else {
  $item = PortfolioItem::find($_GET['id']);
}

?>

<h1>Edit: <?php echo $item->title; ?></h1>
<form action="" method="POST">
  <input type="hidden" name="item[id]" value="<?php echo $item->id; ?>">

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="item[title]" value="<?php echo $item->title; ?>">
  </div>

  <div class="form-group">
    <label for="content">Title</label>
    <textarea id="content" name="item[content]"><?php echo $item->content; ?></textarea>
  </div>

  <input type="submit" name="submit" value="Spara" class="btn">
</form>
<?php require_once ROOT_PATH . '/footer.php'; ?>
