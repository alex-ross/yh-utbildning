<?php

require_once '../application.php';
require ROOT_PATH . '/header.php';

// Hämtar alla kategorier
$categories = Category::all();

// Om användaren har tryckt på länk eller använt formuläret för att välja
// kategori visar vi endast dom innom kategorin. Annars hämtar och visar vi
// alla.
if (isset($_GET['categoryId'])) {
  $portfolioItems = PortfolioItem::whereCategoryId($_GET['categoryId']);
} else {
  $portfolioItems = PortfolioItem::all();
}

?>
<div class="jumbotron">
  <h2>Alex Ross <span class="text-muted">Utvecklare</span></h2>
  <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
  <p><a class="btn btn-lg btn-success" href="contact.html" role="button">Kontakta mig</a></p>
</div>

<!-- Exempel 1: Välj vilken kategori du ska visa med hjälp av länkar -->
<ul>
  <li><a href="?">Alla</a></li>
<?php foreach($categories as $category): ?>
  <li><a href="?categoryId=<?php echo $category->id; ?>"><?php echo $category->name; ?></a></li>
<?php endforeach; ?>
</ul>
<!-- Slut på exempel 1 -->

<!-- Exempel 2: Välj vilken kategori du ska visa med hjälp av formulär -->
<form method="GET">
  <select name="categoryId">
  <?php foreach($categories as $category): ?>
    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
  <?php endforeach; ?>
  </select>
  <input type="submit" class="btn" value="Visa">
</form>
<!-- Slut på exempel 2 -->

<?php foreach ($portfolioItems as $item): ?>
  <div class="row marketing">
    <div class="col-md-8">
      <h2><?php echo $item->title; ?></h2>
      <p class="lead"><?php if($item->category()) echo $item->category()->name; ?></p>
      <?php echo $item->content; ?>
      <br>
      <a class="btn btn-default" href="<?php echo $item->url(); ?>" role="button">
        Mer information »
      </a>
    </div>
    <div class="col-md-4">
      <img class="img-responsive" src="<?php echo $item->imageSrc(); ?>" alt="500x500" >
    </div>
  </div>

  <hr>
<?php endforeach; ?>
<?php require ROOT_PATH . '/footer.php' ?>
