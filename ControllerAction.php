<?php
    interface ControllerAction{
         function process($method);
         function render($method);
    }
?>