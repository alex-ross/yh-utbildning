<?php
require_once '../../../application.php';

// Kollar om användaren är inloggad. Annars skickas man vidare till inlogningssidan
Authorization::checkOrRedirect();
require_once ROOT_PATH . '/header.php';

$categories = Category::all();
?>
<h1>Kategorier</h1>

<a href="/admin/category/new.php">Ny kategori</a>

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Namn</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($categories as $item): ?>
      <tr>
        <td><?php echo $item->id; ?></td>
        <td><?php echo $item->name; ?></td>
        <td>
          <a href="/admin/category/edit.php?id=<?php echo $item->id; ?>">Edit</a>
          <span> | </span>
          <a href="/admin/category/remove.php?id=<?php echo $item->id; ?>">Ta bort</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<?php require_once ROOT_PATH . '/footer.php' ?>
