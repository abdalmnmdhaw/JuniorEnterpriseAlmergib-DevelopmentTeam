<?php
namespace src;
use router\Router;
class App{
    private Router $rout;
    static App $APP;
    public function __construct(){
        self::$APP = $this;
        $this->rout = new Router();
    }
    public function setDisten(string $Method,string $uri,$callback){
        $this->rout->callBack = $callback ?? false;
        if($Method === "get"){
            $this->rout->get ($uri!=null ? $uri : "/");
        }else if($Method === "post"){
            $this->rout->post($uri!=null ? $uri : "/");
        }
    }
    public function run(){
        $this->rout->resolve();
    }
}