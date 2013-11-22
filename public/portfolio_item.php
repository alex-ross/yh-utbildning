<?php
require '../application.php';
require ROOT_PATH . '/header.php';

$item = PortfolioItem::find($_GET['id']);

?>

<div class="row">
  <div class="col-md-7">
    <h1><?php echo $item->title; ?></h1>
    <?php echo $item->content; ?>
  </div>

  <div class="col-md-5">
    <img class="img-responsive" src="holder.js/350x650/auto" alt="250x650" >
  </div>
</div>
<?php require ROOT_PATH . '/footer.php' ?>
