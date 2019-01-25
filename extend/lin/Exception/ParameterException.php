<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 18:29
 */

namespace lin\Exception;


class ParameterException extends APIException
{
    public $code = 400;
    public $error_code = 10030;
    public $msg = '参数错误';
}