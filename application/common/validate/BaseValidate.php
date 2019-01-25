<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/24
 * Time: 18:31
 */

namespace app\common\validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    //验证拦截器
    public function go_check(){
        $request = Request::instance();
        $params= $request->param();
        $result = $this->batch()->check($params);
        if (!$result){
            throw new Exception($this->error);
        }else{
            return $result;
        }
    }
}