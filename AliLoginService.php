<?php

namespace aliLogin;

use AopClient;
use AlipaySystemOauthTokenRequest;
use AlipayUserInfoShareRequest;

class AliLoginService extends AliLogin {


    public function alilogin($url, $app_id)
    {

        $url  =  "https://openauth.alipay.com/oauth2/publicAppAuthorize.htm?app_id=$app_id&scope=auth_user&redirect_uri=$url";

        return $url;
    }

    public function aliRedirect($appId,$rsaPrivateKey,$alipayrsaPublicKey,$auth_code){

        include_once 'aop/AopClient.php';

        $aop  = new AopClient();

        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = $appId;
        $aop->rsaPrivateKey = trim($rsaPrivateKey);
        $aop->format = 'json';
        $aop->charset = 'UTF-8';
        $aop->signType = 'RSA2';
        $aop->alipayrsaPublicKey = trim($alipayrsaPublicKey);
        $aop->apiVersion = '3.0.0';

        include_once 'aop/request/AlipaySystemOauthTokenRequest.php';

        $requests = new AlipaySystemOauthTokenRequest();

        $requests->setGrantType("authorization_code");

        $requests->setCode($auth_code);

        $result = $aop->execute($requests);

        $access_token = $result->alipay_system_oauth_token_response->access_token;

        include_once 'aop/request/AlipayUserInfoShareRequest.php';

        $requests = new AlipayUserInfoShareRequest ();

        $result = $aop->execute ( $requests , $access_token );

        $responseNode = str_replace(".", "_", $requests->getApiMethodName()) . "_response";

        $userData = (array) $result->$responseNode;

        return $userData;


    }



}