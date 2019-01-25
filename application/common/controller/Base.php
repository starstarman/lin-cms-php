<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/23
 * Time: 16:33
 */

namespace app\common\controller;


use think\Controller;

class Base extends Controller
{
    //检查权限
    public $_userinfo; //当前登录账号信息
    //初始化
    protected function _initialize()
    {
        parent::_initialize();
//        //验证登录
//        //过滤不需要登陆的行为
//        $allowUrl = ['admin/index/login',
//            'admin/index/logout',
//        ];
//        $rule = strtolower($this->request->module() . '/' . $this->request->controller() . '/' . $this->request->action());
//        if (in_array($rule, $allowUrl)) {
//
//        } else {
//            $this->AdminUser_model = new AdminUser_model;
//            if (defined('UID')) {
//                return;
//            }
//            define('UID', (int) $this->AdminUser_model->isLogin());
//            if (false == $this->competence()) {
//                //跳转到登录界面
//                $this->error('请先登陆', url('admin/index/login'));
//            } else {
//                //是否超级管理员
//                if (!$this->AdminUser_model->isAdministrator()) {
//                    //检测访问权限
//                    if (!$this->checkRule($rule, [1, 2])) {
//                        $this->error('未授权访问!');
//                    }
//                }
//
//            }
//        }

    }
}