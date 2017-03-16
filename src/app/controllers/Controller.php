<?php

namespace App\Controllers;

class Controller {
    /**
     * @var \Slim\Http\Response
     */
    protected $response;

    /**
     * @var \Slim\Http\Request
     */
    protected $request;

    /**
     * constructor.
     * @param \Slim\App $app
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct($app)
    {
        $this->response = $app->getContainer()->get('response');
        $this->request = $app->getContainer()->get('request');
    }

    /**
     * @param $data
     * @return mixed
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    protected function responseAsJson($data)
    {
        $params = [
            'success'   => true,
            'data'      => $data
        ];

        return $this->response
            ->withStatus(200)
            ->withJson($params);
    }

    protected function responseExceptionAsJson(\Exception $e)
    {
        $params = [
            'success' => false,
            'errorMessage'  => $e->getMessage()
        ];

        return $this->response
            ->withStatus($e->getCode())
            ->withJson($params);
    }

    protected function validateRequest($request)
    {
        $this->request = $request;
    }
}