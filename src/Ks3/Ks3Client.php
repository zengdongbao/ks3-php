<?php

namespace Zeng\Ks3;


class Ks3Client
{
    public static $vhost = false;
    public static $log = false;
    public static $display_log = false;
    public static $log_path = '';
    public static $use_https = false;
    public static $debug_mode = false;

    private static $defined = false;

    private static $client;



    public static function make($ak,$sk,$endpoint="kss.ksyun.com")
    {
        if(!self::$defined){
            self::syncDefine();
            require_once(__DIR__."/sdk/Ks3Client.class.php");
        }

        return self::$client = new \Ks3Client($ak,$sk,$endpoint);
    }


    public static function __callStatic($method, $parameters)
    {
        if(is_null(self::$client)){
            throw new \ErrorException('Undefined static method '.get_called_class().'::'.$method);
        }

        return call_user_func_array([self::$client, $method], $parameters);
    }




    private static function syncDefine()
    {
        if(!defined("KS3_API_VHOST")){
            //是否使用VHOST
            define("KS3_API_VHOST",self::$vhost);
        }

        if(!defined("KS3_API_LOG")){
            //是否开启日志(写入日志文件)
            define("KS3_API_LOG",self::$log);
        }

        if(!defined("KS3_API_DISPLAY_LOG")){
            //是否显示日志(直接输出日志)
            define("KS3_API_DISPLAY_LOG", self::$display_log);
        }

        if(!defined("KS3_API_LOG_PATH")){
            //定义日志目录(默认是该项目log下)
            define("KS3_API_LOG_PATH", self::$log_path);
        }

        if(!defined("KS3_API_USE_HTTPS")){
            //是否使用HTTPS
            define("KS3_API_USE_HTTPS",self::$use_https);
        }

        if(!defined("KS3_API_DEBUG_MODE")){
            //是否开启curl debug模式
            define("KS3_API_DEBUG_MODE",self::$debug_mode);
        }

        self::$defined = true;
    }
}