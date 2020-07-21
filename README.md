# edward-captcha

thinkphp6 验证码类库,支持base64

## 安装
> composer require edward1108/edward-redis

## 前后端分离中使用
###### 生成短信验证码
```

use edward\captcha\facade\CaptchaApi;

$data = CaptchaApi::createSMS($phone);

其中$data 返回为：
{
        "key": "13800138000",
		"code": "20"
    }
	
	phone: 为手机号
	key: 返回给前端，用于前端提交验证
	code: 验证码值，用短信发送出去
```

###### 验证短信验证码
```
CaptchaApi::checkSMS($code,$key);

其中code为用户输入的短信验证码， key为上面返回到key 用于替代session， 同时使用cache作为缓冲。
```

###### 生成图片验证码
```

use edward\captcha\facade\CaptchaApi;

$data = CaptchaApi::create();

其中$data 返回为：
{
        "base64": "data:image/png;base64,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\r\nX+d/MZUz1l7P1Q0AAAAASUVORK5CYII=\r\n",
        "key": "$2y$10$JS3S//sVv5YhKZmxFdh4WevMPF3mhV0YpNr76daQs3acpv/JOUUIW",
        "md5": "c16a5320fa475530d9583c34fd356ef5",
		"code": "20"
    }
	
	base64: 图片base64地址
	key: 用于前端提交验证
	md5: 验证码端md5值，用于前端自我验证先，验证通过再请求发送 验证码和key到后台进行验证
	code: 验证码值，方便用于postman测试和自动化测试，切记正式上线，记得返回api是进行unset() 掉该值，避免被别人利用
```

###### 验证图片验证码
```
CaptchaApi::check($code,$key);

其中code为用户输入的验证码， key为上面返回到key 用于替代session， 同时使用cache作为缓冲
```

## 来源
~~~
基于think-captcha进行扩展，保留了think-captcha所有功能，用于非前后端分离项目
~~~

## 使用

### 在控制器中输出验证码

在控制器的操作方法中使用

~~~
public function captcha($id = '')
{
	return captcha($id);
}
~~~
然后注册对应的路由来输出验证码


### 模板里输出验证码

首先要在你应用的路由定义文件中，注册一个验证码路由规则。

~~~
\think\facade\Route::get('captcha/[:id]', "\\edward\\captcha\\CaptchaController@index");
~~~

然后就可以在模板文件中使用
~~~
<div>{:captcha_img()}</div>
~~~
或者
~~~
<div><img src="{:captcha_src()}" alt="captcha" /></div>
~~~
> 上面两种的最终效果是一样的


### 控制器里验证

使用TP的内置验证功能即可
~~~
$this->validate($data,[
    'captcha|验证码'=>'require|captcha'
]);
~~~
或者手动验证
~~~
if(!captcha_check($captcha)){
 //验证失败
};
~~~