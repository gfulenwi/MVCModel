<?php
    include "ContactControllers.php";

    showErrors(1);
    $controllers = loadControllers();
    
    //***** Get Request Method and Page Variable *****/
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='GET'){
        $page = $_GET['page'];
    }
    if($method=='POST'){
        $page = $_POST['page'];
    }

    //*****Process Controller Based on Method and Page *** */
    $controller = $controllers[$method.$page];
    $nextView = $controller->process($method);

    //**** Render View******/
    $controller->render($method);


    function loadControllers(){
        $controllers["GET"."list"] = new ContactList();
        $controllers["GET"."add"] = new ContactAdd();
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