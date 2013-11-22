<?php

require_once 'config.php';

// Skapar anslutning med PDO
$dbh = new PDO(
  'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
  DB_USER,
  DB_PASS,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);


// Mailer library
require_once 'lib/Swift-5.0.1/lib/swift_required.php';

// Models
require_once ROOT_PATH . '/models/base_model.php';
require_once ROOT_PATH . '/models/portfolio_item.php';

BaseModel::setDbh($dbh);

// $db = new PDO('mysql:host=localhost;dbname=<SOMEDB>', '<USERNAME>', 'PASSWORD');
// 
// $stmt = $db->prepare("select contenttype, imagedata from images where id=:id");
// $stmt->execute(array('id' => $_GET['id']));
// 
// $stmt->bindColumn(1, $type, PDO::PARAM_STR, 256);
// $stmt->bindColumn(2, $lob, PDO::PARAM_LOB);
// 
// $stmt->fetch(PDO::FETCH_BOUND);
// 
// ob_clean();
// header("Content-Type: $type");
// echo $lob; // fpassthru reports an error that $lob is not a stream so echo is used in place.
// 
// 
// 
