<?php
class Video {
    private $con, $sqlData, $entity;

    public function __construct($con, $input) {
        $this->con = $con;

        if(is_array($input)) {
            $this->sqlData = $input;
        }
        else {
            $query = $this->con->prepare("SELECT * FROM videos WHERE video_id=:id");
            $query->bindValue(":id", $input);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        }

        $this->entity = new Entity($con, $this->sqlData["course_id"]);
    }

    public function getId() {
        return $this->sqlData["video_id"];
    }
    public function getViews() {
        return $this->sqlData["views"];
    }


    public function getTitle() {
        return $this->sqlData["title"];
    }

    public function getDescription() {
        return $this->sqlData["description"];
    }

    public function getFilePath() {
        return "admin/".$this->sqlData["filepath"];
    }

    public function getThumbnail() {
        return $this->entity->getThumbnail();
    }
    public function getPrice() {
        return $this->entity->getPrice();
    }

  

    public function getEntityId() {
        return $this->sqlData["course_id"];
    }
    public function getNote() {
        return "admin/".$this->sqlData["notes"];
    }

    public function incrementViews() {
        $query = $this->con->prepare("UPDATE videos SET views=views+1 WHERE video_id=:id");
        $query->bindValue(":id", $this->getId());
        $query->execute();
    }

   

       

 
}
?>