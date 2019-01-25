<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/23
 * Time: 16:31
 */

namespace app\common\behavior;


class Cors
{
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header("Access-Control-Allow-Headers: *");
        if (request()->isOptions()){
            exit();
        }
    }
}