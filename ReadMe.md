   _**AliLogin**_

**laravel的支付宝第三方登陆**

**一：特点**

`1.毫无特点`

`2.只能laravel用`

**二：使用方法**

一.composer require phpalipay/alipay-login

二.在laravel config目录下的app.php,添加providers

'App\Providers\AlipayServiceProvider::class，`

三.

3.1

跳转支付宝登陆页面 :AliLogin自动注入，调用alilogin函数，依次传入回调地址，app_id即可

3.2

获取用户信息，AliLogin自动注入，调用aliRedirect函数,依次传入：app_id,应用私钥，支付宝公钥，auth_code

  use aliLogin\AliLogin;


    public function login(AliLogin $aliLogin)
    {
          //回调地址
          $url   = xxxx
          
          $app_id = xxxxx;
          
          $url = $aliLogin->alilogin($url,$app_id)
          
          //跳转
          return redirect($url);
    }





    public function notify(Request $request,AliLogin $aliLogin)
 
      {
  
          //获取http请求得到的auth_code
          $auth_code =$request->auth_code;
  
          $app_id     = env('ALI_KEY');
  
          //应用私钥
          $rsa_private_key = env('ALI_rsaPrivateKey');
  
          //支付宝公钥
          $alipay_rsa_public_key = env('ALI_alipayrsaPublicKey');
  
          $user = $aliLogin->aliRedirect($app_id,$rsa_private_key,$alipay_rsa_public_key,$auth_code);
  
          dd($user);
      }

**三：作者**

黄智健 

哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈

      

