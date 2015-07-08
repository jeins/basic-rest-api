<?php
/*******************************************************
 * Copyright (C) 2015 Muhammad Juan Akbar - All Rights Reserved
 * Written by Muhammad Juan Akbar <mail@mjuanakbar.info>, 07 2015
 *
 * APIKeyManager.php can not be copied and/or distributed without the express
 * permission of author.
 *******************************************************/

namespace resapi\libraries;

use resapi\models\APITokenAuthModel;
use Rhumsaa\Uuid\Uuid;

class APITokenAuth extends Base{

    /**
     * get database connection
     * @return APITokenAuthModel
     */
    private function getDB(){
        return new APITokenAuthModel();
    }

    /**
     * generate new api of exists user
     * body request => JSON
     *{'username':'username', 'password':'password'}
     */
    public function createNewToken(){
        $request = json_decode($this->request->getBody());

        $username = isset($request->username) ? filter_var($request->username, FILTER_SANITIZE_STRING) : false;
        $password = isset($request->password) ? filter_var($request->password, FILTER_SANITIZE_STRING) : false;

        if (!$username || !$password) {
            $this->writeToJson(['errmsg' => 'parameter missing'], 400);
            return;
        }

        if(!$this->isUserValid($username, $password)){
            $this->writeToJson(['errmsg' => 'username/password not found'], 400);
            return;
        }

        $token = $this->generateUUID($username."/".$password);

        try{
            $arrId = $this->getDB()->query()->where('username', '=', $username)
                ->where('password', '=', sha1($password))
                ->get(['id_auth'])->toArray();

            $id = $arrId[0]['id_auth'];
            $wantAddAPI = $this->getDB()->find($id);
            $wantAddAPI->token = $token;

            if($wantAddAPI->save()){
                $this->writeToJson(["message" => "key telah berhasil dibuat", "username" => $username, "api key" => $token, 201]);
            } else{
                $this->writeToJSON(['errmsg' => 'error save to database'], 500);
            }
        } catch(\Exception $e){
            $this->writeToJSON(['errmsg' => 'service unavailable'], 503);
        }
    }

    /**
     * check if API-Key and WWW-Authorization valid
     * @param $token
     * @param $authentication
     * @return bool
     */
    public function isApiKeyUserPassValid($token, $authentication){
        $auth = explode("/",base64_decode($authentication));

        try{
            if(Uuid::isValid($token)){
                $check = $this->getDB()->query()->where('username', '=', $auth[0])
                    ->where('password', '=', sha1($auth[1]))
                    ->where('token', '=', $token)
                    ->get()->count();
                if(!$check){
                    return false;
                }
                return true;
            }
        } catch(\Exception $e){
            $this->writeToJSON(['errmsg' => 'service unavailable'], 503);
        }
        return false;
    }

    /**
     * check if user valid or not
     * by username & password
     * @param $username
     * @param $password
     * @return bool
     */
    private function isUserValid($username, $password){
        $check = $this->getDB()->query()->where('username', '=', $username)
            ->where('password', '=', sha1($password))
            ->get()->count();
        if($check){
            return true;
        }
        return false;
    }

    /**
     * generate random api-key
     * @param $mixed
     * @return string
     */
    private function generateUUID($mixed){
        return Uuid::uuid5(Uuid::uuid4(), $mixed)->toString();
    }
} 