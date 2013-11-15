<?php
require_once '../application.php';
require ROOT_PATH . '/header.php';

if (isset($_POST['email'])) {
$email = $_POST['email'];

function bodyMessage($email) {
  $txt = "Tel: " . $email['phone'] . "\n";
  $txt .= "Namn: " . $email['name'] . "\n";
  $txt .= "Meddelande: " . $email['message'];
  return $txt;
}

$transport = Swift_SmtpTransport::newInstance(SMTP_ADDRESS, SMTP_PORT,SMTP_ENCRYPT_PROTOCOL)
  ->setUsername(SMTP_USER)
  ->setPassword(SMTP_PASS);

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Nytt mail ifrån min portfolio')
  ->setFrom(array($email['email_address'] => $email['name']))
  ->setReplyTo(array($email['email_address'] => $email['name']))
  ->setTo(array(ADMIN_EMAIL => ADMIN_NAME))
  ->setBody(bodyMessage($email));

$result = $mailer->send($message);
}
?>

<h1>Kontakta mig</h1>
<p>Skicka mig ett mail så återkommer jag så snart som möjligt.</p>

<?php var_dump($_POST); 

?>
<?php if(isset($_POST['email'])): ?>
  <?php if ($result >= 1): ?>
    <div class="alert alert-success">
      <p>Tack för ditt mail, jag återkommer så snart som möjligt.</p>
    </div>
  <?php else: ?>
    <div class="alert alert-danger">
      <p>Det gick tyvärr inte att skicka mailer, var god försök igen.</p>
    </div>
  <?php endif; ?>
<?php endif; ?>

<div class="row">
  <form action="" method="POST">
    <div class="col-md-6">
      <div class="form-group">
        <label for="name">Namn</label>
        <input type="text" id="name" name="email[name]" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">E-post</label>
        <input type="email" id="email" name="email[email_address]" class="form-control">
      </div>
      <div class="form-group">
        <label for="phone">Telefon</label>
        <input type="tel" id="phone" name="email[phone]" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" class="btn" value="Skicka" name="submit">
        <input type="submit" class="btn" value="Reset" name="submit">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="message">Meddelande</label>
        <textarea id="message" name="email[message]" class="form-control" rows="12"></textarea>
      </div>
    </div>
  </form>
</div>
<?php require ROOT_PATH . '/footer.php' ?>
