<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 18:09
 */

namespace lin\Exception;


class NotFound extends APIException
{
    public $code = 404;
    public $error_code = 10020;
    public $msg = '资源不存在';
}
