<?php
class CategoryContainers {

    private $con; 

    public function __construct($con) {
        $this->con = $con;
        
    }

    public function showAllCategories() {
        $query = $this->con->prepare("SELECT * FROM category");
        $query->execute();

        $html = "<div class='container m-auto p-1 pt-2  '>";
        $txt="text-info ";
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml($row, null,  $txt,$btn=null);
        }

        return $html . "</div>";
    }

    public function showCategory($categoryId, $title = null,$btn="d-none") {
        $query = $this->con->prepare("SELECT * FROM category WHERE cat_id=:id");
        $query->bindValue(":id", $categoryId);
        $query->execute();
        $txt="text-success";
        $html = "<div class='container m-auto p-1 pt-2 '>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtml($row, $title,$txt,$btn);
        }

        return $html . "</div>";
    }


    public function showCategoryuser($categoryId, $title = null,$btn="d-none") {
        $query = $this->con->prepare("SELECT * FROM category WHERE cat_id=:id");
        $query->bindValue(":id", $categoryId);
        $query->execute();
        $txt="text-success";
        $html = "<div class='container m-auto p-1 pt-2 '>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getCategoryHtmluser($row, $title,$txt,$btn);
        }

        return $html . "</div>";
    }


    private function getCategoryHtml($sqlData, $title,$txt,$btn) {
        $categoryId = $sqlData["cat_id"];
        $title = $title == null ? $sqlData["title"] : $title;
        $btn = $btn == null ? "d-flex" : $btn;
        
            $entities = EntityProvider::getEntities($this->con, $categoryId, 4);
      

        if(sizeof($entities) == 0) {
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con);
        foreach($entities as $entity)
         {
            $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
      
        }
                return " 
                  <div class=' row col-auto m-auto  p-0 ' style='box-shadow:0px 2px 4px 1px #777;background:linear-gradient( #fff ,#fff);'  >
                      <div class=' row  text-capitalize col-md-12 rounded border-bottom-light py-2 px-5 m-auto  ' style='background:linear-gradient(90deg,#222, #21f ,#333);'>
                      <div  class='$txt pt-2  col-md-8 h5   '>$title </div>
                      <div class='  col-md-4 text-center px-3 ' >  <a href='category.php?id=$categoryId' class='btn float-right  $btn text-gray-100 btn-outline-dark '>
                       View All
                       </a>
                       </div>
                       </div>

                   
                    
                    <div class=' d-inline-flex flex-wrap  col-12   '>
                      $entitiesHtml
                   
                     </div>
                     </div>
                     <br>
                ";
          
    }
    private function getCategoryHtmlUser($sqlData, $title,$txt,$btn) {
        $categoryId = $sqlData["cat_id"];
        $title = $title == null ? $sqlData["title"] : $title;
        $btn = $btn == null ? "d-flex" : $btn;
        
            $entities = EntityProvider::getEntities($this->con, $categoryId, 6);
      

        if(sizeof($entities) == 0) {
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con);
        foreach($entities as $entity)
         {
            $entitiesHtml .= $previewProvider->createEntityPreviewSquareUser($entity);
      
        }
                return " 
                  <div class=' row col-auto m-auto bg-white '>
                      <div class='  text-uppercase col-12 py-2  border-bottom-light' style='background:linear-gradient(30deg, #409 60%,#f31f81 40%);'>
                      <span  class='$txt  px-5 h5 font-weight-bold '>$title </span>
                      <span class='float-right pr-5 ' >  <a href='category.php?id=$categoryId' class='btn $btn text-gray-100 bg-dark '>
                       View All
                       </a>
                       </span>
                       </div>

                   
                    
                    <div class=' d-inline-flex flex-wrap  col-12  '>
                      $entitiesHtml
                   
                     </div>
                     </div>
                     <br>
                ";
          
    }

}
?>