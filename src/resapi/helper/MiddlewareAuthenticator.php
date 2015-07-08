<?php
/*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * MiddlewareAuthenticator.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\helper;

use resapi\libraries\APITokenAuth;
use \Slim\Middleware;

class MiddlewareAuthenticator extends Middleware{

    protected $unprotectedURIs;

    /**
     * use constructor to set unprotectedURIS
     * to generate new APIKey
     * @param bool $unprotectedURIs
     */
    public function __construct($unprotectedURIs = false){
        $this->unprotectedURIs = $unprotectedURIs;
    }

    /**
     * Setup Middleware ApiKey
     * request is available if api-key exists
     * header must be contains
     * WWW-Authorization : base64(username/password)
     * API-Token : Token
     */
    public function call(){
        $request    = $this->app->request();
        $headers    = $request->headers;
        $response   = $this->app->response();
        $apiKey = $headers->get('API-Token');
        $authorization = $headers->get('WWW-Authorization');

        $session = new APITokenAuth($this->app);

        if($this->unprotectedURIs){
            $this->next->call();
            return;
        }

        // go ahead if the sessionid is valid
        if ($session->isApiKeyUserPassValid($apiKey, $authorization)) {
            $this->next->call();
            return;
        }

        $response['Content-type'] = 'application/json';
        $response->setBody(json_encode(['errmsg' => 'Authentication invalid']));
        $response->status(401);
        return;
    }
} 