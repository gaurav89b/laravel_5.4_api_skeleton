<?php

namespace App\Api\V1\Model;

use App\User;
use JWTAuth;


class CommonModel {
    
    /**
     * Generate API token on successful login.
     * @param array $param containing email & password.
     * @return array
     */
    private function _generateApiToken(array $param) {
        $response = ['status' => FALSE, 'token' => '', 'message' => ''];
        $token = JWTAuth::attempt($param);
        if ($token) {
            $response = ['status' => TRUE, 'token' => $token, 'message' => 'Token Created Successfully'];
        } else {
            $response['message'] = 'Invalid Credentials';
        }
        return $response;
    }
    
    /**
     * Fetch user details on the basis of token.
     * @param string $token
     * @return array
     */
    public function getUserDetailsByToken($token) {
        $response = ['status' => FALSE, 'data' => '', 'message' => ''];
        $details = JWTAuth::toUser($token);
        if ($details) {
            $response = ['status' => TRUE, 'data' => $details, 'message' => 'Data fetched Successfully'];
        }
        return $response;
    }

    /**
     * Generate API token on successful login 
     * & get all user details.
     * 
     * @param array $param containing email & password.
     * @return array
     */
    public function getUserdetailsWithToken(array $param) {
        $response = ['status' => FALSE, 'data' => '', 'message' => ''];
        $tokenDetails = $this->_generateApiToken($param);
        if ($tokenDetails['status']) {
            $userDetails =  $this->getUserDetailsByToken($tokenDetails['token']);
            $userDetails['token'] = $tokenDetails['token'];
            return $userDetails;
        }
        return $response;
    }
    
    /**
     * Return current user id by token
     * 
     * @param type $token
     * @return type
     */
    public function getUserIdByToken($token) {
        $response = ['status' => FALSE, 'id' => '', 'message' => ''];
        $details = JWTAuth::toUser($token);
        if ($details) {
            $response = ['status' => TRUE, 'id' => $details->id, 'message' => 'Data fetched Successfully'];
        }
        return $response;
    }
    
}