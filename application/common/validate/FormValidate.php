<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/24
 * Time: 18:37
 */

namespace app\common\validate;


class FormValidate extends BaseValidate
{
    protected $rule = [
            'nickname'=>'require',
            'password'=>'require'
        ];

    protected $message = [
            'nickname.require'=>'名称不可为空',
            'password.require'=>'密码不可为空'
    ];

    protected $scene = [
            'login' => ['nickname','password'],
    ];
}