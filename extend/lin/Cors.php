<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 20:06
 */

namespace lin;


class Cors
{
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: http://localhost:8080');
        header('Access-Control-Allow-Methods: DELETE, GET, HEAD, OPTIONS, PATCH, POST, PUT');
        header("Access-Control-Allow-Headers: authorization, content-type");
        if (request()->isOptions()){
            exit();
        }
    }
}