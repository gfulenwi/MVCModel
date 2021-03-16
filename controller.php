<?php
    include_once "controllers/ControllerAction.php";
    include_once "controllers/ContactControllers.php";
    include_once "models/ContactDAO.php";

    class FrontController { 
        private $controllers;
        

        public function __construct(){
            $this->showErrors(1);
            $this->controllers = $this->loadControllers();
        }

        public function run(){
            //***** Get Request Method and Page Variable *****/
            $method = $_SERVER['REQUEST_METHOD'];
            $page = $_REQUEST['page'];
        
            //*****Process Controller Based on Method and Page *** */
            $controller = $this->controllers[$method.$page];
            if($method=='GET'){
                $controller->processGET();
            }
            if($method=='POST'){
                $controller->processPOST();
            }
        }

        private function loadControllers(){
            $controllers["GET"."list"] = new ContactList();
            $controllers["GET"."add"] = new ContactAdd();
            $controllers["POST"."add"] = new ContactAdd();
            $controllers["GET"."delete"] = new ContactDelete();
            $controllers["POST"."delete"] = new ContactDelete();
            return $controllers;
        }

        private function showErrors($debug){
            if($debug==1){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
            }
        }
    }

    $controller = new FrontController();
    $controller->run();
?>