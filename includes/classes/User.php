<?php
class User {
    private $con, $sqlData;

    public function __construct($con, $username) {
        $this->con = $con;

        $query = $con->prepare("SELECT * FROM users WHERE userid=:username");
        $query->bindValue(":username", $username);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserId() {
        return $this->sqlData["userid"];
    }
    public function getName() {
        return $this->sqlData["name"];
    }

    public function getCourse() {
        return $this->sqlData["course"];
    }

    public function getEmail() {
        return $this->sqlData["email"];
    }

    

    public function getUsername() {
        return $this->sqlData["username"];
    }

}
?>