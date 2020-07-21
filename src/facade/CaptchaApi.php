<?php

namespace edward\captcha\facade;

use think\Facade;

/**
 * Class Captcha
 * @package edward\captcha\facade
 * @mixin \edward\captcha\Captcha
 */
class CaptchaApi extends Facade
{
    protected static function getFacadeClass()
    {
        return \edward\captcha\CaptchaApi::class;
    }
}
