<?php
/**
 * PHP version 7.2
 *
 * @category Routing
 * @package  BOL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */

/**
 * Interface for incomming HTTP requests
 *
 * @category Routing
 * @package  BOL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */
interface IRequest
{
    /**
     * Retrieves the body from the request.
     *
     * @return array
     */
    public function getBody();
}
