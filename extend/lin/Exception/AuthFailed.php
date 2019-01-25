<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 18:53
 */

namespace lin\Exception;


class AuthFailed extends APIException
{
    public $code = 401;
    public $error_code = 10000;
    public $msg = '认证失败';
}