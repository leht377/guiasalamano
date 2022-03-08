<?php
 use Twilio\Rest\Client;


class mensajeswhatp{

    public function mensajeswhatp(){

                require_once 'vendor/autoload.php'; 
        
        
        
        $sid    = "AC6d208c123c4fbdd5b0036f68ba70fdf1"; 
        $token  = "fbf9fbe0f72ec75e159b4cb59c51a09c"; 
        $twilio = new Client($sid, $token); 
        
        $message = $twilio->messages 
                        ->create("whatsapp:+573104241775", // to 
                                array( 
                                    "from" => "whatsapp:+14155238886",       
                                    "body" => "Diego puto." 
                                ) 
                        ); 
 
//print($message->sid);

    }








}






?>