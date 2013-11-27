<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/Stockholm');

define('ROOT_PATH', dirname(__FILE__));

// Admin
define('ADMIN_EMAIL', 'yhutbildning@aross.se');
define('ADMIN_PASS', 'password');
define('ADMIN_NAME', 'Alexander Ross');

// Smtp configuration
define('SMTP_ADDRESS', 'smtp.gmail.com');
define('SMTP_PORT', 465);
define('SMTP_ENCRYPT_PROTOCOL', 'ssl');
define('SMTP_USER', 'yhutbildning@aross.se');
define('SMTP_PASS', '2tpdsh7RzgXR');

// Database configurations
define('DB_HOST', 'localhost');
define('DB_NAME', 'myPortfolioSE');
define('DB_USER', 'root');
define('DB_PASS', '');
