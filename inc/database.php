<?php
    class database{
        private $servername = "172.31.22.43";
        private $username = "Samarpreet200510621";
        private $password = "sd0JXz34Ay";
        private $database = "Samarpreet200510621";
        public $con;

        public function __construct(){
            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if(mysqli_connect_error()){
                trigger_error("Failed to connect:" . mysqli_connect_error());
            }else{
                return $this->con;
            }
        }

        public function createData($post){
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $bio = $this->con->real_escape_string($_POST['bio']);
            if(empty($name)){
                $sql = false;
                $error = "Name can't be empty!";
            }
            else if(empty($email)){
                $sql = false;
                $error = "Email can't be empty!";
            }
            // the preg_match() function validates the email syntax
            else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)){ // pattern looks like something@example.com
                $sql = false;
                $error = "Syntax should be something@example.com";
            }else if(empty($bio)){
                $sql = false;
                $error = "Bio can't be empty!";
            }
            // The strlen() function
            else if(strlen($bio) <= 25){ // if length of phone number is not 10.
                $sql = false;
                $error = "Bio must be more than 25 characters!";
            }
            else{
                $sql = true;
            }
            if($sql == true){
                $query = "INSERT INTO profileInfo(name,email,bio) VALUES ('$name','$email','$bio')";
                header("Location:index.php?msg1=created");
                $sql = $this->con->query($query);
            }else{
                echo $error;
            }

        }

        public function displayProfiles(){
            $query = "SELECT * FROM profileInfo";
            $results = $this->con->query($query);
            if($results->num_rows > 0){ // so as long as we have a record in our table, this will run.
                $enrolled = array();
                while($row = $results->fetch_assoc()){ /*
                this can be decoupled in the following steps:
                1 Calculate $row = $results->fetch_assoc() and return array with elements or NULL.
                2 Substitute $row = $results->fetch_assoc() in while with gotten value and get the following statements: while(array(with elements)) or while(NULL).
                3 If it's while(array(with elements)) it resolves the while condition in True and allow to perform an iteration.
                4 If it's while(NULL) it resolves the while condition in False and exits the loop.
                    */
                    $enrolled[] = $row;
                }
                return $enrolled;
            }else{
                echo "No records found";
            }
        }

        public function displayProfilesById($id){
            $query = "SELECT * FROM profileInfo WHERE id = '$id'";
            $result = $this->con->query($query);
            if($result->num_rows > 0){ // so as long as we find at least 1 record
                $row = $result->fetch_assoc();
                return $row;
            }else{
                echo "No records found.";
            }
        }

        public function updateProfile($postData){
            $name = $this->con->real_escape_string($_POST['newname']);
            $email = $this->con->real_escape_string($_POST['newemail']);
            $bio = $this->con->real_escape_string($_POST['newbio']);
            $id = $this->con->real_escape_string($_POST['id']);
            if(!empty($id) && !empty($postData)){
                if(empty($name)){
                    $sql = false;
                    $error = "Name can't be empty!";
                }
                else if(empty($email)){
                    $sql = false;
                    $error = "Email can't be empty!";
                }
                // the preg_match() function validates the email syntax
                else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)){ // pattern looks like something@example.com
                    $sql = false;
                    $error = "Syntax should be something@example.com";
                }else if(empty($bio)){
                    $sql = false;
                    $error = "Bio can't be empty!";
                }
                // The strlen() function
                else if(strlen($bio) <= 25){ // if length of phone number is not 10.
                    $sql = false;
                    $error = "Bio must be more than 25 characters!";
                }
                else{
                    $sql = true;
                }
                if($sql == true){
                    $query = "UPDATE profileInfo SET name = '$name', email = '$email', bio = '$bio' WHERE id = '$id'";
                    header("Location:index.php?msg2=update"); //we are appending this to the index file if the connection and query work at line 25.
                    $sql = $this->con->query($query);
                }else{
                    echo "Sorry, could not update the record";
                }
            }
        }

        public function deleteProfile($id){
            $query = "DELETE FROM profileInfo WHERE id = '$id'";
            $sql = $this->con->query($query);
            if($sql == true){
                header("Location:index.php?msg3=delete");
            }else{
                echo "Could not delete the record";
            }
        }
    }
?>