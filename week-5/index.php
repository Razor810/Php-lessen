<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo $_ENV['DB_HOST'];
echo $_ENV['DB_USER'];
echo $_ENV['DB_PASS'];
echo $_ENV['DB_NAME'];

$pdo = new PDO(
  'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
  $_ENV['DB_USER'],
  $_ENV['DB_PASS']
);

