<?php 
/**
 * Definerar TestClass
 */
class TestClass
{
  // variable utan standardvärde
  public $variable;

  // Variable med standardvärde
  public $variable2 = "hej";

  /**
   * Körs varje gång vi skapar en ny instance av en class
   *
   * @param string $var   Kommer sättas till $this->variable
   * @param string $var1  Kommer sättas till $this->variable2
   *                      Har standardvärde 'du'
   */
  public function __construct($var, $var1 = 'du') {
    $this->variable = $var;
    $this->variable2 = $var1;
  }

  /**
   * Test metod
   *
   * @return string  Returnerar $this->variable som defineras på rad 8
   */
  public function test() {
    return $this->variable;
  }
}

// Skapar ny instanc av class
$test = new TestClass('hallo', 2);

// $dbResult = array(
//   array('id' => 1, 'title' => 'Projekt 1',
//         'content' => 'Lorem ipsum'),
//   array('id' => 2, 'title' => 'Projekt 2', 'content' => 'Lorem ipsum'),
// );
// 
// $portfolioItems = array();
// foreach ($dbResult as $r) {
//   $portfolioItems[] = new PortfolioItem($r);
// }
?>

<!-- Skriver ut värdet av $test->variable genom $test->test() -->
<p><?php echo $test->test(); ?></p>

<!-- Skriver ut värdet av $test->variable2 -->
<p><?php echo $test->variable2; ?></p>

