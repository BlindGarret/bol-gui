<?php
/**
 * Shared configuration for setting up files.
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  BoL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */

header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');

require_once '../vendor/autoload.php';