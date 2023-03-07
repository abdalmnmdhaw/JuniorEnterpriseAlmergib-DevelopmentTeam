<?php 
namespace router;
class Router{
    private Request $req;
    private Response $res;
    private Run $run;
    public $callBack;
    protected array $map;
    private function chackValdate($uri){
        foreach($this->map as $key => $value){
            if ($key === $uri && $this->map[$key][$uri] != null)
                return true;
            else
                return false;
        }
    }
    public function __construct(){
        $this->req = new Request();
        $this->res = new Response();
        $this->map = [
            "post" => [],
            "get" => []];
    }
    public function post($uri):void{
        if ($this->chackValdate($uri))
            return;
        $this->map["post"][$uri] = $this->callBack;
        return;
    }
    public function get($uri):void{
        if ($this->chackValdate($uri))
            return;
        $this->map["get"][$uri] = $this->callBack;
        return;
    }
    public function resolve(){
        $boot["map"]    = $this->map;
        $boot["method"] = $this->req->getMETHOD();
        $boot["path"]   = $this->req->getPATH();
        $boot["status"] = $this->res->status(
            $this->map,
            $boot["path"],
        );
        $run = new Run($boot);
    }
}