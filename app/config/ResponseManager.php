<?php 
class ResponseManager{

    public function sessionMessage($type, $message){
        $_SESSION['message']['type'] = $type;

        $_SESSION['message']['text'] = $message;
    }
    
    public function redirect($path){
        header($path);
        
        exit();
    }
}

