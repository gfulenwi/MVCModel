<?php
    include_once "ControllerAction.php";
    include "model/ContactDAO.php";


    class ContactList implements ControllerAction{
        private $contactDAO;
        private $contacts;

        function process($method){
            $this->contactDAO = new ContactDAO();
            $this->contacts = $this->contactDAO->getContacts();
        }

        function render($method){
            $contacts=$this->contacts;
            include "listContact.php";

        }

    }


?>