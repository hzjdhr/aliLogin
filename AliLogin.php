<?php
namespace aliLogin;


abstract  class  AliLogin{

    //appid，私钥，阿里公钥，auth_code
    abstract  function alilogin($url, $app_id);

    abstract  function aliRedirect($appId,$rsaPrivateKey);
}
