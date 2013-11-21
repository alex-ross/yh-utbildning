<?php 
class TestClass
{
  public $variable;

  public $variable2 = "hej";

  public function __construct($var, $var1) {
    $this->variable = $var;
    $this->variable2 = $var1;
  }

  public function test() {
    return $this->variable;
  }
}

$test = new TestClass('hallo', 2);

// $dbResult = array(
//   array('id' => 1, 'title' => 'Projekt 1', 'content' => 'Lorem ipsum'),
//   array('id' => 2, 'title' => 'Projekt 2', 'content' => 'Lorem ipsum'),
//   array('id' => 3, 'title' => 'Projekt 3', 'content' => 'Lorem ipsum'),
//   array('id' => 4, 'title' => 'Projekt 4', 'content' => 'Lorem ipsum'),
//   array('id' => 5, 'title' => 'Projekt 5', 'content' => 'Lorem ipsum'),
// );
// 
// $portfolioItems = array();
// foreach ($dbResult as $r) {
//   $portfolioItems[] = new PortfolioItem($r);
// }
?>

<p><?php echo $test->test(); ?></p>
<p><?php echo $test->variable2; ?></p>

