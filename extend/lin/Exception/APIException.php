<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 17:51
 */

namespace lin\Exception;


use Exception;

class APIException extends Exception
{
    public  $code = 500;
    public  $msg = '抱歉，服务器未知错误';
    public  $error_code = 999;

        //设计构造函数,方便某些异常类需要传入参数修改
    public function __construct($params = [])
    {
        if (!is_array($params) || empty($params)) {
            //如果不是数组或为空,则代表不修改当前的类成员变量,也就是用预设的值来返回给客户端
            return;
        }
        if (key_exists('code', $params)) {
            $this->code = $params['code'];
        }
        if (key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }
        if (key_exists('$error_code', $params)) {
            $this->errorCode = $params['$error_code'];
        }
    }
}