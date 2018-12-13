<?php
/**
 * Bank of learning Index Page.
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  BOL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */

require_once '../vendor/autoload.php';
require_once '../src/routing/Request.php';
require_once '../src/routing/Router.php';
header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');

$smarty = new Smarty;
$smarty->setTemplateDir(realpath(__DIR__ . '/../templates'));
$smarty->setCompileDir(realpath(__DIR__ . '/..') . '/templates_c');

$router = new Router(new Request, array('GET', 'POST'));

$router->get('/', function ($request) use ($smarty) {
    $smarty->assign("pageTitle", "Hello World!");
    $smarty->assign("message", "A message!!!");

    $smarty->assign("__content", $smarty->fetch("pages/index.tpl"));
    $smarty->display("layouts/page-layout.tpl");
});

$router->get('/profile', function ($request) use ($smarty) {
    $smarty->assign("pageTitle", "Hello World!");
    $smarty->assign("message", "A message!!!");

    $smarty->assign("__content", $smarty->fetch("pages/index.tpl"));
    $smarty->display("layouts/page-layout.tpl");
});

$router->post('/data', function ($request) {
    echo "herp";
});
