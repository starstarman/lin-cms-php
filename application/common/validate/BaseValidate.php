<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/24
 * Time: 18:31
 */

namespace app\common\validate;


use lin\Exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    //验证拦截器
    public function go_check(){
        $request = Request::instance();
        $params= $request->param();
        $result = $this->batch()->check($params);
        if (!$result) {
            //如果结果为false,调用getError方法获取错误信息
            $error = $this->getError();
            //抛出参数错误异常
            throw new ParameterException(['msg' => $error]);
        } else {
            return $result;
        }
    }
}