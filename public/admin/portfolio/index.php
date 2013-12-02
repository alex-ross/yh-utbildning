<?php
require_once '../../../application.php';

// Kollar om användaren är inloggad. Annars skickas man vidare till inlogningssidan
Authorization::checkOrRedirect();
require_once ROOT_PATH . '/header.php';

$portfolioItems = PortfolioItem::all();
var_dump($_GET);
?>
<h1>Portfolio items</h1>

<a href="/admin/portfolio/new.php">Ny portfolio item</a>

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($portfolioItems as $item): ?>
      <tr>
        <td><?php echo $item->id; ?></td>
        <td><?php echo $item->title; ?></td>
        <td>
          <a href="<?php echo $item->adminEditUrl(); ?>">Edit</a>
          <span> | </span>
          <a href="/admin/portfolio/remove.php?id=<?php echo $item->id; ?>">Ta bort</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<?php require_once ROOT_PATH . '/footer.php' ?>
