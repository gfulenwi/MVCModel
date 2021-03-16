<?php
    class Contact{
        private $contactID;
        private $username;
        private $email;
        private $passwd;

        public function load($row){
            $this->setContactID($row['contactID']);
            $this->setUsername($row['username']);
            $this->setEmail($row["email"]);
            $this->setPasswd($row["passwd"]);
        }

        public function setContactID($contactID){
            $this->contactID=$contactID;
        }

        public function getContactID(){
            return $this->contactID;
        }

        public function setUsername($username){
            $this->username=$username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setEmail($email){
            $this->email=$email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPasswd($passwd){
            $this->passwd=$passwd;
        }

        public function getPasswd(){
            return $this->passwd;
        }
    }
?>