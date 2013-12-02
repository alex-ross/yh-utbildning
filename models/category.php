<?php

class Category extends BaseModel
{
  // Anger vad tabellen i databasen heter flör denna klass
  const TABLE_NAME = 'categories';

  // Skapar en variable för varje kolumn i databasen.
  public $id,
         $name;

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
  public static function destroyWhereId($id) {
    $statement = self::$dbh->prepare("DELETE FROM ".self::TABLE_NAME." WHERE id = :id");
    $statement->execute(array('id' => $id));
  }

  // $item->destroy();
  public function destroy() {
    self::destroyWhereId($this->id);
  }

  /**
   * Sparar nuvarande portfolio item i databasen. Denna methoden är inte kapabel
   * att skapa en ny rad i databasen. Det behöver vi skapa en annan metod för.
   */
  public function save() {
    // Förbereder mysql kommando
    $statement = self::$dbh->prepare(
      "UPDATE ".self::TABLE_NAME." SET name=:name WHERE id=:id");
    // Exekverar mysql kommando
    $statement->execute(array('id' => $this->id, 'name' => $this->name));
  }

  public function create() {
    $statement = self::$dbh->prepare("INSERT INTO " . self::TABLE_NAME . " (name) VALUES (:name)");
    $statement->execute(array('name' => $this->name));

    // Hämtar senaste id och sätter det till objektet
    $this->id = self::$dbh->lastInsertId();
  }

}
