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

require '../vendor/autoload.php';

$smarty = new Smarty;

$smarty->assign("pageTitle", "Hello World!");
$smarty->assign("message", "A message!!!");

$smarty->assign("__content", $smarty->fetch("templates/pages/index.tpl"));
$smarty->display("layouts/page-layout.tpl");
