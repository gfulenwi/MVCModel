<?php
    include "ControllerAction.php";
    include "model/ContactDAO.php";


    class ContactList implements ControllerAction{

        function processGET(){
            $contactDAO = new ContactDAO();
            $contacts = $contactDAO->getContacts();
            include "listContact.php";
        }

        function processPOST(){
            return;
        }

    }

    class ContactAdd implements ControllerAction{

        function processGET(){
            include "addContact.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $contact = new Contact();
            $contact->setUsername($username);
            $contact->setEmail($email);
            $contactDAO = new ContactDAO();
            $contactDAO->addContact($contact);
            header("Location: controller.php?page=list");
            exit;
        }

    }

    class ContactDelete implements ControllerAction{

        function processGET(){
            $contactid = $_GET['contactID'];
            include 'delContact.php';

        }

        function processPOST(){
            $contactid=$_POST['contactID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $contactDAO = new ContactDAO();
                $contactDAO->deleteContact($contactid);
            }
            header("Location: controller.php?page=list");
            exit;
        }

    }

?>