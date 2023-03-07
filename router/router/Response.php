<?php
namespace router;
class Response{
    public int $http_code;
    public function status(array $map,$path){
        $checkStatus = false;
        foreach($map as $key => $values){
            foreach($values as $value => $none){        
                if($path === $value){
                    $this->setStatus(200);
                    $checkStatus = true;
                }
            }
        }
        if(!$checkStatus){
            $this->setStatus(404);
        }
        return $checkStatus;
    }
    private function setStatus(int $state){
        http_response_code($state);
    }
}