<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/23
 * Time: 16:35
 */

namespace app\api\controller\cms;


use app\common\controller\Base;
use app\common\validate\FormValidate;
use lin\Auth;
use lin\JwtToken;

class User extends Base
{
    public function login()
    {
        $userData = input('param.');
        (new FormValidate())->goCheck();
//        $test = new JwtToken();
//        $test->authorizations();
        //如果用户名密码正确颁发令牌

        //假如正确
        //        return ([
        //            'access_token'=>"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1NDgxNTg3NTgsIm5iZiI6MTU0ODE1ODc1OCwianRpIjoiMTQxYTFhOGMtOWM4ZC00MDUxLThmNTMtN2VmNTE2NmM4OTY2IiwiZXhwIjoxNTQ4MTYyMzU4LCJpZGVudGl0eSI6MSwiZnJlc2giOmZhbHNlLCJ0eXBlIjoiYWNjZXNzIn0.Gu86KXkxvc66JkLzYKErUhoUjXR5N9k398hBVYH-_Q0",
        //            'refresh_token'=> "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1NDgxNTg3NTgsIm5iZiI6MTU0ODE1ODc1OCwianRpIjoiNzM3YzM5N2ItZjQ3MC00MzcxLThiOWYtNzBmYTk3ZjQyOGYyIiwiZXhwIjoxNTUwNzUwNzU4LCJpZGVudGl0eSI6MSwidHlwZSI6InJlZnJlc2gifQ.D2cr5Sk6aOBPOryoqtb2w8C0LpJb-KzImhSXtko6xrc"
        //        ]);
    }


    public function auths(){

    }
}