<?php
/**
 * Shared configuration for setting up a smarty instance with
 * proper directories.
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  BoL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */


$smarty = new Smarty;
$smarty->template_dir = '../templates';