<?php
require_once '../../application.php';
require_once ROOT_PATH . '/header.php';

// definerar login
$login = '';

if (isset($_POST['login']) && isset($_POST['password'])) {
  // skriver över login med postat användarnamn
  $login = $_POST['login'];
  if (!Authorization::authenticate($_POST['login'], $_POST['password'])) {
    $errorMessage = "Fel användarnamn eller lösenord!";
  } else {
    header('Location: /admin/portfolio/index.php');
    exit;
  }
} else if (isset($_POST['submit'])){
  $errorMessage = "Var god fyll i alla fält";
}

var_dump($_SESSION);
?>
<div class="row">
  <h1>Logga in</h1>
  <?php if(isset($errorMessage)): ?>
    <div class="alert alert-warning"><?php echo $errorMessage ?></div>
  <?php endif; ?>

  <form action="" method="POST" class="form col-md-5">

    <div class="form-group">
      <label for="login">Användarnamn</label>
      <input id="login" type="text" class="form-control" name="login" value="<?php echo $login; ?>">
    </div>
    <div class="form-group">
      <label for="password">Lösenord</label>
      <input id="password" type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
      <input id="submit" type="submit" class="btn" name="submit">
    </div>
  </form>
</div>




<?php require_once ROOT_PATH . '/footer.php'; ?>
