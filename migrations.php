<?php

use impresja\impresja\Application;
use impresja\controllers\AuthController;
use impresja\controllers\SiteController;

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

ini_set('display_errors', $_ENV['DISPLAY_ERRORS']);
error_reporting(E_ALL ^ E_NOTICE);

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DBPASSWORD']
    ]
];

$app = new Application(__DIR__, $config);
$app->db->applyMigrations();
