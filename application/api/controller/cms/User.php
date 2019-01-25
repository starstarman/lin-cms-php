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
use lin\model\User as UserModel;
use lin\JwtToken;

class User extends Base
{
    public function login()
    {
        $userModel = new UserModel('user');
        $userData = input('param.');

        (new FormValidate())->scene('login')->go_check();
        $userInfo =$userModel->verify($userData['nickname'],$userData['password']);

        $token = (new JwtToken())->get_tokens($userInfo['id']);
        return $token;
    }

}