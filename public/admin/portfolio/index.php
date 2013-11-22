<?php

require_once '../../../application.php';
require_once ROOT_PATH . '/header.php';

$portfolioItems = PortfolioItem::all();
?>
<h1>Portfolio items</h1>

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
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<?php require_once ROOT_PATH . '/footer.php' ?>
