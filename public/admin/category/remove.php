<?php
require_once '../../../application.php';

// Kollar om användaren är inloggad. Annars skickas man vidare till inlogningssidan
Authorization::checkOrRedirect();

if (isset($_POST['id'])) {
  $category = Category::find($_POST['id']);
  $category->destroy();
  header('Location: /admin/category');
  exit;
}

$category = Category::find($_GET['id']);
require_once ROOT_PATH . '/header.php';

?>
<h1>Vill du verkligen ta bort "<?php echo $category->name; ?>"</h1>

<form action="" method="POST">
  <input type="hidden" name="id" value="<?php echo $category->id; ?>">
  <input type="submit" class="btn" value="Ja">
  <a href="/admin/category" class="btn btn-primary">Avbryt</a>
</form>


<?php require_once ROOT_PATH . '/footer.php' ?>
