<?php

namespace lin\Model;

use lin\Exception\AuthFailed;
use lin\Exception\NotFound;
use think\Model;

/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 19:11
 */

class User extends Model
{
    private $userService;
    protected function initialize()
    {
        parent::initialize();
        $this->userService = \think\Loader::model('lin\service\User','service');
    }

    /** 登录验证
     * @param $nickname
     * @param $password
     * @return array|false|\PDOStatement|string|Model
     * @throws AuthFailed
     * @throws NotFound
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function verify($nickname,$password){

        $userInfo = $this->where(['nickname'=>$nickname])->find();
        if (!$userInfo){
            $this->error = '帐号不存在';
            throw new NotFound(['msg'=>$this->error]);
        }elseif(!$this->userService->check_password($password,$userInfo['password'])){
            $this->error = '密码错误，请输入正确密码';
            throw new AuthFailed(['msg'=>$this->error]);
        }else{
            return $userInfo;
        }
    }

}