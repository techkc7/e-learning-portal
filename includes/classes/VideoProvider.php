<?php
class VideoProvider {
    public static function getUpNext($con, $currentVideo) {
        $query = $con->prepare("SELECT * FROM videos
                            WHERE course_id=:entityId AND video_id!= :videoId
                            ORDER BY video_id ASC LIMIT 1");
        $query->bindValue(":entityId", $currentVideo->getEntityId());
       
        $query->bindValue(":videoId", $currentVideo->getId());
        
        $query->execute();

        if($query->rowCount() == 0) {
            $query = $con->prepare("SELECT * FROM videos
                                    WHERE  video_id!= :videoId
                                    ORDER BY views DESC LIMIT 1");
            $query->bindValue(":videoId", $currentVideo->getId());
            $query->execute();
        }

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return new Video($con, $row);
    }



    public static function getEntityVideo($con, $entityId) {
    
            $query = $con->prepare("SELECT video_id FROM videos 
                                    WHERE course_id=:entityId
                                    ORDER BY video_id ASC LIMIT 1");
            $query->bindValue(":entityId", $entityId);
            $query->execute();
     

        return $query->fetchColumn();
    }
}
?>