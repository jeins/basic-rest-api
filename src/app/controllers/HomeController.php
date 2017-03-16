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

        $app->get('version', [$this, 'versionAction']);
        $app->post('hello', [$this, 'helloAction']);
    }

    /**
     * get version
     * @return mixed
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * @internal param $request
     */
    public function versionAction(){
        return $this->responseAsJson(['version' => '1.0']);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function helloAction($request){
        $this->validateRequest($request);

        $body = $this->request->getParsedBody();
        return $this->responseAsJson(['name' => 'ok', 'body' => $body]);
    }
}