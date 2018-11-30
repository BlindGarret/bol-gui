<?php
/**
 * Learning PHP
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  Php101
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */

header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');

$host = '127.0.0.1';
$db = 'test';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);
$rows = $pdo->query('SELECT val FROM messages');

foreach ($rows as $row) {
    echo "<p>" . $row['val'] . "</p>";
}