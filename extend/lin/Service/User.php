<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 19:27
 */

namespace lin\Service;


use think\Model;

class User extends Model
{
    public function check_password($password,$raw){
        return password_verify($password,$raw);
    }
}