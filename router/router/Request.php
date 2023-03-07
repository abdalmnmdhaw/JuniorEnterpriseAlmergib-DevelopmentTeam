<?php 
namespace router;
/*
 REQUEST_URI
 REQUEST_METHOD
*/
class Request{
    private string $PATH;
    private string $METHOD;
    public function __construct(){
        $path = $_SERVER["REQUEST_URI"];
        $postion = strpos($path,'?',0);
        if($postion){
            $path = substr($path,0,$postion);
        }
        $this->PATH = $path;
        $this->METHOD = strtolower($_SERVER["REQUEST_METHOD"]);
    }
    public function getPATH(){
        return $this->PATH;
    }
    public function getMETHOD(){
        return $this->METHOD;
    }
}