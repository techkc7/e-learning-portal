<?php
class SearchResultsProvider {

    private $con;

    public function __construct($con) {
        $this->con = $con;
       
    }

    public function getResults($inputText) {
        $entities = EntityProvider::getSearchEntities($this->con, $inputText);

        $html = "<div class='container  noScroll'>";

        $html .= $this->getResultHtml($entities);

        return $html . "</div>";
    }

    private function getResultHtml($entities) {
        if(sizeof($entities) == 0) {
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con);
        foreach($entities as $entity) {
            $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
        }

        return " <div class=' d-inline-flex flex-wrap  '>
        $entitiesHtml
     
       </div>
       <hr>";
    }
}
?>