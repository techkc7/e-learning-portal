<?php
class Entity {

    private $con, $sqlData;

    public function __construct($con, $input) {
        $this->con = $con;

        if(is_array($input)) {
            $this->sqlData = $input;
        }
        else {
            $query = $this->con->prepare("SELECT * FROM course WHERE id=:id");
            $query->bindValue(":id", $input);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getId() {
        return $this->sqlData["id"];
    }
    public function getPrice() {
        return $this->sqlData["price"];
    }

    public function getName() {
        return $this->sqlData["name"];
    }

    public function getThumbnail() {
        return "admin/".$this->sqlData["prev_img"];
    }

    public function getPreview() {
        return "admin/".$this->sqlData["prev_video"];
    }

    public function getCategoryId() {
        return $this->sqlData["cat_id"];
    }
    
    public function getCourse() {
        $query = $this->con->prepare("SELECT * FROM videos WHERE course_id=:id");
        $query->bindValue(":id", $this->getId());
        $query->execute();

       
        $videos = array();
      
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            $videos[] = new Video($this->con, $row);

        
       }
       return $videos;

    }
    
    public function getUserCourse($user) {
        
        $query = $this->con->prepare("SELECT * FROM orders WHERE course_id=:cid AND userid=:uid ");
        $query->bindValue(":cid", $this->getId());
        $query->bindValue(":uid", $user);
        $query->execute();
        $videos = array();
        if($query->rowCount()==1){
            # code...
      
        $query1 = $this->con->prepare("SELECT * FROM videos WHERE course_id=:id");
        $query1->bindValue(":id", $this->getId());
        $query1->execute();

       
        
      
        while($row = $query1->fetch(PDO::FETCH_ASSOC)) {
            
            $videos[] = new Video($this->con, $row);

        
       }
       
    }
    return $videos;
    }
}
?>