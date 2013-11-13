<?php require '../header.php' ?>
<h1>Kontakta mig</h1>
<p>Skicka mig ett mail så återkommer jag så snart som möjligt.</p>

<div class="row">
  <form action="" method="POST">
    <div class="col-md-6">
      <div class="form-group">
        <label for="name">Namn</label>
        <input type="text" id="name" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">E-post</label>
        <input type="email" id="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="phone">Telefon</label>
        <input type="tel" id="phone" phone="name" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="message">Meddelande</label>
        <textarea id="message" name="message" class="form-control" rows="12">
        </textarea>
      </div>
    </div>
  </form>
</div>
<?php require '../footer.php' ?>
