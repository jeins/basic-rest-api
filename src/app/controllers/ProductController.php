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
        $app->get('/{id}', [$this, 'getByIdAction']);
        $app->post('/', [$this, 'postAction']);
        $app->put('/{id}', [$this, 'putAction']);
        $app->delete('/{id}', [$this, 'deleteAction']);
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

    public function getByIdAction(){}

    public function postAction($request){
        try{
            $this->validateRequest($request);

            $body = $this->request->getParsedBody();
            return Product::insert($body);
        } catch (\Exception $e) {
            return $this->responseExceptionAsJson($e);
        }
    }

    public function putAction(){}

    public function deleteAction(){}
}