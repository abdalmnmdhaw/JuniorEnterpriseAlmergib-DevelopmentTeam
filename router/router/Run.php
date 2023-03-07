<?php
namespace router;
class Run{
    private $callback;
    public function __construct(array $boot){
        $this->callback = $boot["map"][$boot["method"]][$boot["path"]];
        
        if(is_string($this->callback)){
            $this->executSTR();
        }elseif(is_callable($this->callback)){
            $this->executFUNC($this->callback);
        }elseif(is_array($this->callback)){
            $this->executARRAY();
        }else{
            exit;
        }
    }
    private function executSTR(){
        echo $this->callback;
    }
    private function executFUNC(){
        call_user_func($this->callback);
    }
    private function executARRAY(){
        $this->callback[0] = new $this->callback[0]();
        call_user_func($this->callback);
    }
}