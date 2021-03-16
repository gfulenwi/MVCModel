<?php
    include_once 'Contact.php';

    class ContactDAO {


        public function getConnection(){
            $mysqli = new mysqli("127.0.0.1", "cs2033user", "Spring-2021", "cs2033");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addContact($contact){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO contacts (username, email, passwd) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $contact->getUsername(), $contact->getEmail(),$contact->getPasswd());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteContact($contactid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM contacts WHERE contactID = ?");
            $stmt->bind_param("i", $contactid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getContacts(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM contacts;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $contact = new Contact();
                $contact->load($row);
                $contacts[]=$contact;
            }    
            $stmt->close();
            $connection->close();
            return $contacts;
        }

        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM contacts WHERE username = ? AND passwd = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            $connection->close();
            return $row;
        }


    }
?>
