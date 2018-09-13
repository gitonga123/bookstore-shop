<?php
namespace Bookstore\Core;

use Bookstore\Controllers\ErrorController;
use Bookstore\Controllers\CustomerController;

/**
 * The Router
 * URLs matching wth regular expressions
 * Extracting the arguments of the URL
 */
class Router
{
    private $routerMap;
    private static $regexPatterns = [
        'number' => '\d+',
        'string' => '\w'
    ];

    public function __construct()
    {
        $json = file_get_contents(__DIR__.'/../../config/routes.json');
        $this->routeMap = json_decode($json, true);
    }
    //match the url with regular expression
    public function route(Request $request): string
    {
        $path = $request->getPath();

        foreach ($this->routeMap as $route => $info) {
            $regexRoute = $this->getRegexRoute($route, $info);
            if (preg_match("@^/$regexRoute$@", $path)) {
                  return $this->executeController($route, $path, $info, $request);
            }
        }
        $errorController = new ErrorController($request);
        return $errorController->notFound();
    }

    //URLs matching wth regular expressions
    private function getRegexRoute(string $route, array $info): string
    {
        if (isset($info['params'])) {
            foreach ($info['params'] as $name => $type) {
                $route = str_replace(':', $name, self::$rexPatters[$type], $route);
            }
        }

        return $route;
    }

    //Extracting the arguments of the URL
    private function extractParams(string $route, string $path): array
    {
        $params = [];
        $pathParts = explode('/', $path);
        $routeParts = explode('/', $route);

        foreach ($routeParts as $key => $routePart) {
            if (strpos($routePart, ':') === 0) {
                $name = substr($routePart, 1);
                $params[$name] = $pathParts[$key + 1];
            }
        }

        return $params;
    }
}
