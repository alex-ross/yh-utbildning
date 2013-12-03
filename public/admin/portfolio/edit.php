<?php

require_once '../../../application.php';

Authorization::checkOrRedirect();
require_once ROOT_PATH . '/header.php';

// Hämtar alla kategorier till en array
$categories = Category::all();

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

  <div class="form-group">
    <label for="category">Kategori</label>
    <select id="category" name="item[categoryId]">
      <option value=""></option>
      <!-- Loopar igenom kategorier och skapar options för dom -->
      <?php foreach($categories as $category): ?>
        <!-- Sätter option som selected om kategori id är samma som "categoryId" i item -->
        <option value="<?php echo $category->id; ?>"
          <?php if($item->categoryId == $category->id) echo 'selected'; ?>
        >
          <!-- Ekar ut namn för kategori -->
          <?php echo $category->name; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <?php var_dump($item); ?>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="image">Image</label>
      <input type="file" id="image" name="image" value="<?php echo $item->title; ?>" class="form-control">
    </div>

    <div class="col-md-6"><img class="img-responsive" src="<?php echo $item->imageSrc(); ?>"></div>
  </div>

  <input type="submit" name="submit" value="Spara" class="btn">
</form>
<br>
<?php require_once ROOT_PATH . '/footer.php'; ?>
