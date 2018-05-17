<?php
namespace aliLogin;


abstract  class  AliLogin{

    //回调地址,appid
    abstract  function alilogin($url, $app_id);
    //appid，私钥，阿里公钥，auth_code
    abstract  function aliRedirect($appId,$rsaPrivateKey,$alipayrsaPublicKey,$auth_code);
}
