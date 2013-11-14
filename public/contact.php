<?php
require '../header.php';
require_once '../lib/Swift-5.0.1/lib/swift_required.php';

if (isset($_POST['email'])) {
$email = $_POST['email'];

function bodyMessage($email) {
  $txt = "Tel: " . $email['phone'] . "\n";
  $txt .= "Namn: " . $email['name'] . "\n";
  $txt .= "Meddelande: " . $email['message'];
  return $txt;
}

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('yhutbildning@aross.se')
  ->setPassword('2tpdsh7RzgXR');

$mailer = Swift_SmtpMailer::newInstance($transport);

$message = Swift_Message::newInstance('Nytt mail ifrån min portfolio')
  ->setFrom(array($email['email_address'] => $email['name']))
  ->setTo(array('yhutbildning@aross.se' => 'Alex Ross'))
  ->setBody(bodyMessage($email));

$result = $mailer->send($message);
}
?>

<h1>Kontakta mig</h1>
<p>Skicka mig ett mail så återkommer jag så snart som möjligt.</p>

<?php var_dump($_POST); 

?>

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
<?php require '../footer.php' ?>
