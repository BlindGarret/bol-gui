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

require_once 'IRequest.php';

/**
 * Class representing incoming HTTP Request.
 *
 * @category Routing
 * @package  BOL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */
class Request implements IRequest
{

    /**
     * Constructor
     */
    public function __construct()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{$this->_toCamelCase($key)} = $value;
        }
    }

    /**
     * Changes snake-case to camel-case
     *
     * @param string $string The snake-case string to change
     *
     * @return string The camel-case string.
     */
    private function _toCamelCase($string)
    {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);
        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }

    /**
     * Retrieves the body from the request.
     *
     * @return array
     */
    public function getBody()
    {
        if ($this->requestMethod === "GET") {
            return;
        }
        if ($this->requestMethod == "POST") {
            $result = array();
            foreach ($_POST as $key => $value) {
                $result[$key] = filter_input(
                    INPUT_POST,
                    $key,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }
            return $result;
        }

        return $body;
    }
}
