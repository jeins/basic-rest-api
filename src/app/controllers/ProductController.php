<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller {
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductController constructor.
     * @param \Slim\App $app
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct($app)
    {
        parent::__construct($app);

        $this->product = new Product();

        $app->get('list', [$this, 'getListAction']);
    }

    /**
     * get version
     * @return mixed
     * @throws \RuntimeException
     */
    public function getListAction(){
        try{
            return $this->responseAsJson($this->product->getAll());
        } catch (\Exception $e) {
           return $this->responseExceptionAsJson($e);
        }
    }
}