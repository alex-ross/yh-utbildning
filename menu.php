<?php
$menu = array();

$menu[] = array(
  'href' => '/',
  'text' => 'Hem'
);

$menu[] = array(
  'href' => '/about.php',
  'text' => 'Om mig'
);

$menu[] = array(
  'href' => '/contact.php',
  'text' => 'Kontakta mig'
);

if (Authorization::check()) {
  $menu[] = array(
    'href' => '/admin/logout.php',
    'text' => 'Logga ut'
  );
}
?>

<ul class="nav nav-pills pull-right">
  <?php foreach ($menu as $link): ?>
    <?php
      // Adds class active if current uri is same as links href attribute
      $classes = ($_SERVER['REQUEST_URI'] == $link['href']) ? 'active' : '';
    ?>

    <li class="<?php echo $classes; ?>">
      <a href="<?php echo $link['href']; ?>">
        <?php echo $link['text']; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
