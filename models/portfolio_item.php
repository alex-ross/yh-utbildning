<?php

class PortfolioItem
{
  public $id,
         $title,
         $content;

  public function __construct(array $attributes) {
    foreach ($attributes as $key => $value) {
      $this->$key = $value;
    }
  }

  private static $url = '/portfolio_items';

  public function url() {
    return "/portfolio_item/" . $this->id;
  }

  public static function indexUrl() {
    return self::$url;
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
