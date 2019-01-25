<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/24
 * Time: 17:26
 */

namespace lin;


use Firebase\JWT\JWT;
use think\Config;

class JwtToken
{
    /**
     * 获取token
     * @param  $user_id
     * @return access_token refresh_token
     */
    public function get_tokens($user_id)
    {
        $key = Config::get('SECRET_KEY'); //key

        //公用信息
        $token = [
            'iat' => time(), //签发时间
            'data' => [
                'userid' => $user_id,
            ]
        ];

        $access_token = $token; // access_token
        $access_token['scopes'] = 'role_access'; //token标识，请求接口的token
        $access_token['exp'] = Config::get('JWT_ACCESS_TOKEN_EXPIRES'); //access_token过期时间

        $refresh_token = $token; //refresh_token
        $refresh_token['scopes'] = 'role_refresh'; //token标识，刷新access_token
        $refresh_token['exp'] = Config::get('JWT_REFRESH_TOKEN_EXPIRES'); //refresh_token过期时间

        $jsonList = [
            'access_token'=>JWT::encode($access_token,$key),
            'refresh_token'=>JWT::encode($refresh_token,$key),
//            'token_type'=>'bearer' //token_type：表示令牌类型，该值大小写不敏感，这里用bearer
        ];
        Header("HTTP/1.1 201 Created");
        return json($jsonList); //返回给客户端token信息
    }
}