<?php

namespace App\Controllers;

class HomeController extends Controller {

    /**
     * HomeController constructor.
     * @param \Slim\App $app
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $app->get('version/{name}', [$this, 'versionAction']);
        $app->post('hello', [$this, 'helloAction']);
    }

    public function versionAction($request){
        $this->validateRequest($request);

        return $this->responseJson(['version' => '1.0']);
    }

    public function helloAction($request){
        $this->validateRequest($request);

        $body = $this->request->getParsedBody();
        return $this->responseJson(['name' => 'ok', 'body' => $body]);
    }
}