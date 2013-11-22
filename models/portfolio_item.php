<?php

class PortfolioItem extends BaseModel
{
  const TABLE_NAME = 'portfolioItems';

  public $id,
         $title,
         $content,
         $categoryId;

  public function __construct(array $attributes = null) {
    if ($attributes === null) return;

    foreach ($attributes as $key => $value) {
      $this->$key = $value;
    }
  }

  private static $url = '/portfolio_items';

  public function url() {
    return "/portfolio_item.php?id=" . $this->id;
  }

  public static function indexUrl() {
    return self::$url;
  }

  public function adminEditUrl() {
    return '/admin/portfolio/edit.php?id=' . $this->id;
  }

  public function save() {
    $statement = self::$dbh->prepare(
      "UPDATE ".self::TABLE_NAME." SET title=:title,
                                       content=:content,
                                       categoryId=:categoryId
                                       WHERE id=:id");
    $statement->execute(array('id' => $this->id,
                              'title' => $this->title,
                              'content' => $this->content,
                              'categoryId' => $this->categoryId
                             ));
  }

}

// $item1 = new PortfolioItem();
// $item2 = new PortfolioItem();
//
// $item1->id = 2;
//
// echo "<a href='" . $item1->url() . "'>portfolio</a>";
// echo "\n";
// echo "<a href='" . PortfolioItem::indexUrl() . "'>portfolio</a>";
