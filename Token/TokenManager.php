<?php
/**
 * Created by PhpStorm.
 * User: MEZGO
 * Date: 11/03/2018
 * Time: 19:29
 */
require __DIR__ . '../../vendor/autoload.php';
use \Firebase\JWT\JWT;

class TokenManager
{
    public $key = "the_supreme_key";
    public $token_timeout = "300";//5*60=300segundos

    function createToken($id, $rol){
        $token = array(
            "id" => $id,
            "rol" => $rol,
            "time" => time()
        );
        $token_to_return = JWT::encode($token, $this->getKey());
        return $token_to_return;
    }

    function updateTokenTime($token){
        $token_temp = JWT::decode($token, $this->getKey(), array('HS256'));
        $new_token = array(
            "id" => $token_temp->id,
            "rol" => $token_temp->rol,
            "time" => time()
        );
        $token_to_return = JWT::encode($new_token, $this->getKey());
        return $token_to_return;
    }

    function isSessionAlive($token){
        $token_temp = JWT::decode($token, $this->getKey(), array('HS256'));
        if(time()-$token_temp->time > $this->getTokenTimeout()){
            return false;
        }
        return true;
    }

    /**
     * @return string
     */
    private function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getTokenTimeout()
    {
        return $this->token_timeout;
    }
}