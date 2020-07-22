<?php

namespace edward\captcha\facade;

use think\Facade;

/**
 * Class Captcha
 * @package edward\captcha\facade
 * @mixin \edward\captcha\CaptchaApi
 */
class CaptchaApi extends Facade
{
    protected static function getFacadeClass()
    {
        return \edward\captcha\CaptchaApi::class;
    }
}
