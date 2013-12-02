<?php

class PortfolioItem extends BaseModel
{
  // Anger vad tabellen i databasen heter flör denna klass
  const TABLE_NAME = 'portfolioItems';

  // Skapar en variable för varje kolumn i databasen.
  public $id,
         $title,
         $content,
         $categoryId;

  public function __construct(array $attributes = null) {
    // Om ingen array skickades med och värdet är null så kör vi inte våran loop
    // för att sätta värden
    if ($attributes === null) return;

    // Loopar igenom arrayen som skickades med
    foreach ($attributes as $key => $value) {
      // Om $attributes är `array('id' => 1, 'title' => 'Hej');` så kommer $key
      // att vara id första gången och title andra gången
      $this->$key = $value;
    }
  }

  // PortfolioItem::destroy($_GET['id']);
  // OBS: ej testad
  public static function destroyWhereId($id) {
    $statement = self::$dbh->prepare("DELETE FROM ".self::TABLE_NAME." WHERE id = :id");
    $statement->execute(array('id' => $id));
  }

  // $item->destroy();
  // OBS: ej testad
  public function destroy() {
    self::destroyWhereId($this->id);
  }



  private static $url = '/portfolio_items';

  /**
   * Url där vi visar portfolio itemet för användaren
   *
   * @return string
   */
  public function url() {
    return "/portfolio_item.php?id=" . $this->id;
  }

  public static function indexUrl() {
    return self::$url;
  }

  /**
   * Url där jag som administratör redigerar portfolio itemet
   *
   * @return string
   */
  public function adminEditUrl() {
    return '/admin/portfolio/edit.php?id=' . $this->id;
  }

  public function imageSrc() {
    return "/img/uploaded/portfolio_item_" . $this->id . ".png";
  }

  public function attachUploadedImage($image) {
    $validFileTypes = array('image/png', 'image/x-png');
    if ($image['size'] >= 1 && in_array($image['type'], $validFileTypes)) {
      return move_uploaded_file($image['tmp_name'], ROOT_PATH . '/public/img/uploaded/portfolio_item_' . $this->id . '.png');
    } else {
      return false;
    }
  }

  /**
   * Sparar nuvarande portfolio item i databasen. Denna methoden är inte kapabel
   * att skapa en ny rad i databasen. Det behöver vi skapa en annan metod för.
   */
  public function save() {
    // Förbereder mysql kommando
    $statement = self::$dbh->prepare(
      "UPDATE ".self::TABLE_NAME." SET title=:title,
                                       content=:content,
                                       categoryId=:categoryId
                                       WHERE id=:id");
    // Exekverar mysql kommando
    $statement->execute(array('id' => $this->id,
                              'title' => $this->title,
                              'content' => $this->content,
                              'categoryId' => $this->categoryId
                             ));
  }

  public function create() {
    $statement = self::$dbh->prepare("INSERT INTO " . self::TABLE_NAME . "
      (title, content, categoryId) VALUES (:title, :content, :categoryId)");
    $statement->execute(array('title' => $this->title,
                              'content' => $this->content,
                              'categoryId' => $this->categoryId));

    // Hämtar senaste id och sätter det till objektet
    $this->id = self::$dbh->lastInsertId();
  }

}
