<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller {

    /**
     * ProductController constructor.
     * @param \Slim\App $app
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $app->get('/list', [$this, 'getListAction']);
    }

    /**
     * get version
     * @return mixed
     * @throws \RuntimeException
     */
    public function getListAction(){
        try{
            return $this->responseAsJson(Product::getAll());
        } catch (\Exception $e) {
           return $this->responseExceptionAsJson($e);
        }
    }
}