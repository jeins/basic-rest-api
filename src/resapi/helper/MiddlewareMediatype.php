<?php
/*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * MiddlewareMediatype.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\helper;

use \Slim\Middleware;

class MiddlewareMediatype extends Middleware{

    /**
     * Setup Middleware change request Content-Type
     * just approve Content-Type = application/json
     */
    public function call(){
        $request = $this->app->request();
        $response = $this->app->response();
        $mediatype = $request->getMediaType();

        // Reject all wrong content types
        if ($mediatype !== 'application/json') {
            $response['Content-type'] = 'application/json';
            $response->setBody(json_encode(['errmsg' => 'Unexpected Media Type']));
            $response->status(415);
            return;
        }
        $this->next->call();
    }
} 