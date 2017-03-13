<?php

namespace App;

use Slim\App;
use App\Middleware\MediaType;

class Setup extends App{

    public function __construct()
    {
        parent::__construct(
            [
                'settings' => [
                    // Slim Settings
                    'determineRouteBeforeAppMiddleware' => false,
                    'displayErrorDetails' => false
                ]
            ]
        );

        $this->loadDependenciesInjection();
        $this->loadGlobalMiddleware();
        $this->loadRoutes();
    }

    private function loadGlobalMiddleware(){
        $this->add(new MediaType());
    }

    private function loadDependenciesInjection(){
        $container = $this->getContainer();
        var_dump($container);die();
    }

    private function loadRoutes(){
        $this->group('/v1', function () {
            $exceptClass = ['Controller'];

            $classFiles = scandir(__DIR__ . '/controllers');

            foreach ($classFiles as $file) {
                if ($file === '.' || $file === '..') continue;

                $className = explode('.', $file)[0];

                if (in_array($className, $exceptClass, true)) continue;

                $this->group('/', function () use ($className) {
                    $fullClassName = "\\App\\Controllers\\" . $className;
                    new $fullClassName($this);
                });
            }
        });
    }
}