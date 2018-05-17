   _**AliLogin**_

**laravel的支付宝第三方登陆**

**一：特点**

`1.毫无特点`

`2.只能laravel用`

**二：使用方法**

1.composer require phpalipay/alipay-login

2.在laravel config目录下的app.php,添加providers

'App\Providers\AlipayServiceProvider::class，`

3.获取用户信息，AliLogin自动注入，然后调用alilogin函数依次传入：app_id,私钥，支付宝公钥，auth_code

  use aliLogin\AliLogin;


    public function login_zfb(AliLogin $aliLogin)
    {
          //回调地址
          $url   = xxxx
          
          $app_id = xxxxx;
          
          $url = $aliLogin->aliRedirect($url,$app_id)
          
          //跳转
          return redirect($url);
    }





    public function notify(Request $request,AliLogin $aliLogin)
 
      {
  
          //获取http请求得到的auth_code
          $auth_code =$request->auth_code;
  
          $app_id     = env('ALI_KEY');
  
          $rsa_private_key = env('ALI_rsaPrivateKey');
  
          $alipay_rsa_public_key = env('ALI_alipayrsaPublicKey');
  
          $user = $aliLogin->alilogin($app_id,$rsa_private_key,$alipay_rsa_public_key,$auth_code);
  
          dd($user);
      }

**三：作者**

黄智健 

哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈

      

