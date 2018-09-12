<?php
namespace Bookstore\Core;

use Bookstore\Controllers\ErrorController;
use Bookstore\Controllers\CustomerController;

/**
 * The Router
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
}
