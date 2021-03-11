<?php
    include "ContactControllers.php";

    showErrors(1);
    $controllers = loadControllers();
    
    //***** Get Request Method and Page Variable *****/
    $method = $_SERVER['REQUEST_METHOD'];
    $page = $_REQUEST['page'];
   
    //*****Process Controller Based on Method and Page *** */
    $controller = $controllers[$method.$page];
    if($method=='GET'){
        $controller->processGET();
    }
    if($method=='POST'){
        $controller->processPOST();
    }

    function loadControllers(){
        $controllers["GET"."list"] = new ContactList();
        $controllers["GET"."add"] = new ContactAdd();
        $controllers["POST"."add"] = new ContactAdd();
        $controllers["GET"."delete"] = new ContactDelete();
        $controllers["POST"."delete"] = new ContactDelete();
        return $controllers;
    }

    function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
?>