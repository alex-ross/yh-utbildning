<?php
require_once '../../../application.php';

// Kollar om användaren är inloggad. Annars skickas man vidare till inlogningssidan
Authorization::checkOrRedirect();

if (isset($_POST['id'])) {
  $item = PortfolioItem::find($_POST['id']);
  $item->destroy();
  header('Location: /admin/portfolio');
  exit;
}

$item = PortfolioItem::find($_GET['id']);
require_once ROOT_PATH . '/header.php';

?>
<h1>Vill du verkligen ta bort "<?php echo $item->title; ?>"</h1>

<form action="" method="POST">
  <input type="hidden" name="id" value="<?php echo $item->id; ?>">
  <input type="submit" class="btn" value="Ja">
  <a href="/admin/portfolio" class="btn btn-primary">Avbryt</a>
</form>


<?php require_once ROOT_PATH . '/footer.php' ?>
