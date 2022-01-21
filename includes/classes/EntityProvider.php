<?php
class EntityProvider {

    public static function getEntities($con, $categoryId, $limit) {

        $sql = "SELECT * FROM course ";

        if($categoryId != null) {
            $sql .= "WHERE cat_id=:categoryId ";
        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $con->prepare($sql);

        if($categoryId != null) {
            $query->bindValue(":categoryId", $categoryId);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
        $query->execute();

        $result = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Entity($con, $row);
        }

        return $result;
    }

    
    public static function getSearchEntities($con, $term) {

        $sql = "SELECT * FROM course WHERE name LIKE CONCAT('%', :term, '%') LIMIT 30";

        $query = $con->prepare($sql);

        $query->bindValue(":term", $term);
        $query->execute();

        $result = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Entity($con, $row);
        }

        return $result;
    }

}
?>