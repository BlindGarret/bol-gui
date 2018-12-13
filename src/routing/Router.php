<?php
/**
 * PHP version 7.2
 */

/**
 * Class representing a router for the requests coming into
 * the server.
 *
 * @category Routing
 * @package  BOL
 * @author   Lucas Roe <lroe2930@gmail.com>
 * @license  undefined undefined
 * @link     undefined
 */
class Router
{
    private $request;
    private $supportedHttpMethods;
    private $defaultRouteHandler;
    private $invalidMethodHandler;

    /**
     * Constructor
     *
     * @param IRequest $request Server request object.
     * @param array $allowedMethods Method types allowed by this router.
     */
    public function __construct(IRequest $request, array $allowedMethods)
    {
        $this->request = $request;
        $this->supportedHttpMethods = $allowedMethods;
        $this->defaultRouteHandler = function (IRequest $request) {
            http_response_code(404);
        };
        $this->invalidMethodHandler = function (IRequest $request) {
            http_response_code(405);
        };
    }

    /**
     * Default function for undefined calls
     *
     * @param string $name Name of the function called
     * @param array  $args Arguments passed into function
     */
    public function __call($name, $args)
    {
        list($route, $method) = $args;
        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    /**
     * Sets the handler to be used when an invalid method is requested.
     *
     * @param callable $handler Handler to be used
     */
    public function setInvalidMethodHandler(callable $handler)
    {
        $this->invalidMethodHandler = $handler;
    }

    /**
     * Sets the handler to be used as the default when a nonexistant route is requested.
     *
     * @param callable $handler Handler to be used
     */
    public function setDefaultRouteHandler(callable $handler)
    {
        $this->defaultRequestHandler = $handler;
    }

    /**
     * Removes trailing forward slashes from the right of the route.
     *
     * @param string $route Route path as string.
     *
     * @return string Formatted route string.
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    /**
     * Resolves a route
     *
     * @return void
     */
    public function resolve()
    {
        $handlerTable = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        $handler = $handlerTable[$formatedRoute];
        if (is_null($handler)) {
            if (!in_array(strtoupper($this->request->requestMethod), $this->supportedHttpMethods)) {
                call_user_func_array($this->invalidMethodHandler, array($this->request));
                return;
            }
            call_user_func_array($this->defaultRouteHandler, array($this->request));
            return;
        }
        call_user_func_array($handler, array($this->request));
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        $this->resolve();
    }
}
