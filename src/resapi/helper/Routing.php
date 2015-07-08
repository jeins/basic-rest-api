<?php
 /*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * Routing.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\helper;

use resapi\controller\ExpControllerDataCustomer;
use resapi\libraries\APITokenAuth;
use resapi\Setup;

class Routing {

    /**
     * Setup routing request
     * @param Setup $app
     */
    public static function setupRouting(Setup $app){
        $app->group(
            '/v1',
            function() use($app){
                // CREATE API KEY
                $app->post('/create-api-token', function() use($app){
                    $token = new APITokenAuth($app);
                    $token->createNewToken();
                });

                // SAMPLE REQUEST
                $controller = new ExpControllerDataCustomer($app);

                ### GET REQUEST
                $app->get(
                    '/customers',
                    function() use($controller){
                        $controller->getCustomers();
                    }
                );
                $app->get(
                    '/customer/:ID_CUSTOMER',
                    function($id_customer) use($controller){
                        $controller->getCustomers($id_customer);
                    }
                );
                $app->get(
                    '/customer_items/:ID_CUSTOMER',
                    function($id_customer) use($controller){
                        $controller->getCustomerItems($id_customer);
                    }
                );
                $app->get(
                    '/customer/filterby',
                    function() use($controller){
                        $controller->filterCustomerBy();
                    }
                );
                $app->get(
                    '/customer_items/filterby',
                    function() use($controller){
                        $controller->filterCustomerItems();
                    }
                );

                ### POST REQUEST
                $app->post(
                    '/customer',
                    function() use($controller){
                        $controller->addNewCustomer();
                    }
                );
                $app->post(
                    '/customer_items',
                    function() use($controller){
                        $controller->addCustomerItems();
                    }
                );

                ### PUT REQUEST
                $app->put(
                    '/customer_items/:ID_CUSTOMER',
                    function($id_customer) use($controller){
                        $controller->changeCustomerData($id_customer);
                    }
                );

                ### DELETE REQUEST
                $app->delete(
                    '/customer_items/:ID_CUSTOMER',
                    function($id_customer) use($controller){
                        $controller->removeCustomer($id_customer);
                    }
                );
            }
        );
    }
}