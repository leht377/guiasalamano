<?php
    class guiaDashboardController{
        public function index (){
            session_start(); 
            require_once("./view/guiaDashoard.php");
        }


        public function logout(){
            session_start();
            if (session_destroy()){
                echo true;
            }
            echo false;
        }
    }
