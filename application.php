<?php
session_start();

require_once 'config.php';

// Mailer library
require_once 'lib/Swift-5.0.1/lib/swift_required.php';

// Models
require_once ROOT_PATH . '/models/base_model.php';
require_once ROOT_PATH . '/models/portfolio_item.php';
require_once ROOT_PATH . '/models/category.php';
require_once ROOT_PATH . '/models/authorization.php';


// Skapar anslutning med PDO
$dbh = new PDO(
  'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
  DB_USER,
  DB_PASS,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);

// Sätter databas som jag vill använda i Base model
BaseModel::setDbh($dbh);

