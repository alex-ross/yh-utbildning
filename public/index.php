<?php require_once '../application.php'; ?>
<?php require ROOT_PATH . '/header.php' ?>
<div class="jumbotron">
  <h2>Alex Ross <span class="text-muted">Utvecklare</span></h2>
  <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
  <p><a class="btn btn-lg btn-success" href="contact.html" role="button">Kontakta mig</a></p>
</div>

<?php
$dbResult = array(
  array('id' => 1, 'title' => 'Projekt 1', 'content' => 'Lorem ipsum'),
  array('id' => 2, 'title' => 'Projekt 2', 'content' => 'Lorem ipsum'),
  array('id' => 3, 'title' => 'Projekt 3', 'content' => 'Lorem ipsum'),
  array('id' => 4, 'title' => 'Projekt 4', 'content' => 'Lorem ipsum'),
  array('id' => 5, 'title' => 'Projekt 5', 'content' => 'Lorem ipsum'),
);

$portfolioItems = array();
foreach ($dbResult as $r) {
  $portfolioItems[] = new PortfolioItem($r);
}


// var_dump($portfolioItems);
?>

<?php foreach ($portfolioItems as $item): ?>
  <div class="row marketing">
    <div class="col-md-8">
      <h2><?php echo $item->title; ?></h2>
      <p class="lead"><?php echo $item->content; ?></p>
      <a class="btn btn-default" href="<?php echo $item->url(); ?>" role="button">
        Mer information »
      </a>
    </div>
    <div class="col-md-4">
      <img class="img-responsive" src="holder.js/500x500/auto" alt="500x500" >
    </div>
  </div>

  <hr>
<?php endforeach; ?>
<?php require ROOT_PATH . '/footer.php' ?>
