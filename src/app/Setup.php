<?php

namespace App;

use Slim\App;
use App\Middleware\MediaType;
use Illuminate\Database\Capsule\Manager as Capsule;

class Setup extends App{

    /**
     * Setup constructor.
     * @param array|\Interop\Container\ContainerInterface $settings
     */
    public function __construct($settings)
    {
        parent::__construct($settings);

        $this->loadDependenciesInjection();
        $this->loadGlobalMiddleware();
        $this->loadRoutes();
    }

    /**
     * application middleware
     */
    private function loadGlobalMiddleware(){
        $this->add(new MediaType());
    }

    /**
     * DIC configuration
     */
    private function loadDependenciesInjection(){
        $container = $this->getContainer();

        //Database
        $capsule = new Capsule;
        $capsule->addConnection($container['settings']['db']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * routes
     */
    private function loadRoutes(){
        $this->group('/v1', function () {
            $exceptClass = ['Controller'];

            $classFiles = scandir(__DIR__ . '/controllers');

            foreach ($classFiles as $file) {
                if ($file === '.' || $file === '..') continue;

                $className = explode('.', $file)[0];

                if (in_array($className, $exceptClass, true)) continue;

                $groupFromClassName = str_replace('controller', '', strtolower($className));
                $this->group('/' . $groupFromClassName, function () use ($className) {
                    $fullClassName = "\\App\\Controllers\\" . $className;
                    new $fullClassName($this);
                });
            }
        });
    }
}