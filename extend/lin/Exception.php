<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2019/1/25
 * Time: 17:21
 */

namespace lin;

use lin\Exception\APIException;
use think\Config;
use think\exception\Handle;
use think\Log;
use Exception as E;

class Exception  extends Handle
{
    private  $code;
    private  $msg;
    private  $error_code;

    public function render(E $e)
    {
        //如果这个传入的异常类是我们自定义的异常类的话,就说明这个异常在我们的控制之中
        if ($e instanceof APIException) {
            //将该异常设定好的属性给赋值到总的异常处理类
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->error_code = $e->error_code;
        } else {
            //判断配置中的debug是否开启确定开发或生产模式
            if (Config::get('app_debug')) {
                //如果是开发模式
                return parent::render($e);

            } else {
                //如果是生产模式,则返回与设定好的未知错误的json
                $this->code = 500;
                $this->msg = '抱歉，服务器未知错误';
                $this->error_code = 999;
            }
            //全局的记录日志
            $this->recordErrorLog($e);
        }
        $request = request();
        $result = [
            'error_code' => $this->error_code,
            'msg' => $this->msg,
            'request' => $request->url()
        ];
        //返回异常信息到客户端
        return json($result, $this->code);
    }

    /**
     * @param $e
     * 传入异常对象
     */
    private function recordErrorLog(Exception $e)
    {
        //由于在config文件中关闭了tp5自己的日志系统,我们需要重新初始化下
        Log::init([
            'type' => 'file',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        //记录日志,传入异常的信息
        Log::record($e->getMessage(), 'error');
    }
}