<?php
/**
 * Bank of learning login page
 * 
 * PHP version 7.2
 *
 * @category PHP
 * @package  BOL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */

 require 'config.php';
 require 'smarty-config.php';

$smarty->assign("pageTitle", "Hello World!");
$smarty->assign("message", "A message!!!");

$smarty->assign("__content", $smarty->fetch("pages/index.tpl"));
$smarty->display("layouts/page-layout.tpl");
