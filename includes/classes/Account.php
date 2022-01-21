<?php
class Account {

    private $con;
    private $errorArray = array();

    public function __construct($con) {
        $this->con = $con;
    }

    public function updateDetails($fn, $ph, $em, $un,$cor,$scl) {
        $this->validateFirstName($fn);
        $this->validatePhone($ph);
   

        if(empty($this->errorArray)) {
            $query = $this->con->prepare("UPDATE users SET name=:fn, phone=:ln, email=:em, school=:scl, course=:cor
                                            WHERE userid=:un");
            $query->bindValue(":fn", $fn);
            $query->bindValue(":ln", $ph);
            $query->bindValue(":em", $em);
            $query->bindValue(":un", $un);
            $query->bindValue(":cor", $cor);
            $query->bindValue(":scl", $scl);

            return $query->execute();
        }

        return false;
    }

    public function register($fn, $un, $em, $pw, $pw2) {
        $this->validateFirstName($fn);
       
        $this->validateUsername($un);
        $this->validateEmails($em);
       
        $this->validatePasswords($pw, $pw2);

        if(empty($this->errorArray)) {
            return $this->insertUserDetails($fn,$un, $em, $pw);
        }

        return false;
    }

    public function login($un, $pw) {
        $pw = hash("sha512", $pw);

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un OR email=:un AND pass=:pw");
        $query->bindValue(":un", $un);
        $query->bindValue(":pw", $pw);

        $query->execute();

        if($query->rowCount() == 1) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['login_type'] = "user";
            $_SESSION['user_session_id'] = session_id();
            return true;
        }

        array_push($this->errorArray, Constants::$loginFailed);
        return false;
    }

    private function insertUserDetails($fn, $un, $em, $pw) {
        
        $pw = hash("sha512", $pw);
        
        $query = $this->con->prepare("INSERT INTO users(name, username, email, pass)
                                        VALUES (:fn, :un, :em, :pw)");
        $query->bindValue(":fn", $fn);
       
        $query->bindValue(":un", $un);
        $query->bindValue(":em", $em);
        $query->bindValue(":pw", $pw);

        return $query->execute();
    }

    private function validateFirstName($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }

    private function validateLastName($ln) {
        if(strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
        }
    }
    private function validatePhone($ln) {
        if(strlen($ln) < 10 || strlen($ln) > 12) {
            array_push($this->errorArray, Constants::$phoneCharacters);
        }
    }

    private function validateUsername($un) {
        if(strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE userid=:un");
        $query->bindValue(":un", $un);

        $query->execute();
        
        if($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }

    private function validateEmails($em) {
       

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em", $em);

        $query->execute();
        
        if($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    private function validateNewEmail($em, $un) {

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em AND userid != :un");
        $query->bindValue(":em", $em);
        $query->bindValue(":un", $un);

        $query->execute();
        
        if($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    private function validatePasswords($pw, $pw2) {
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDontMatch);
            return;
        }

        if(strlen($pw) < 5 || strlen($pw) > 25) {
            array_push($this->errorArray, Constants::$passwordLength);
        }
    }

    public function getError($error) {
        if(in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }

    public function getFirstError() {
        if(!empty($this->errorArray)) {
            return $this->errorArray[0];
        }
    }

    public function updatePassword($oldPw, $pw, $pw2, $un) {
        $this->validateOldPassword($oldPw, $un);
        $this->validatePasswords($pw, $pw2);

        if(empty($this->errorArray)) {
            $query = $this->con->prepare("UPDATE users SET pass=:pw WHERE userid=:un");
            $pw = hash("sha512", $pw);
            $query->bindValue(":pw", $pw);
            $query->bindValue(":un", $un);

            return $query->execute();
        }

        return false;
    }

    public function validateOldPassword($oldPw, $un) {
        $pw = hash("sha512", $oldPw);

        $query = $this->con->prepare("SELECT * FROM users WHERE userid=:un AND pass=:pw");
        $query->bindValue(":un", $un);
        $query->bindValue(":pw", $pw);

        $query->execute();

        if($query->rowCount() == 0) {
            array_push($this->errorArray, Constants::$passwordIncorrect);
        }
    }

}
?>