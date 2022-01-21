
<?php
class Category {

    private $con;

    public function __construct($con) {
        $this->con = $con;


    }

    public function add_cat($name) {
        $query = $this->con->prepare("INSERT INTO `category`( `title`)
        VALUES (:nm)");
        $query->bindValue(":nm", $name);
        

        if ($query->execute()) {
        
         return $this->view_cat();
    }
  }
    public function delCategory($id) {
        $query = $this->con->prepare("delete from `category` where cat_id=:id
       ");
        $query->bindValue(":id", $id);
        

        if ($query->execute()) {
        
         return 1;
    }
  }

   

    public function view_cat() {
      $query = $this->con->prepare("SELECT * FROM category order by 1 desc");
      $query->execute();

      $html = "<div class=''>";

      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $html .= $this->getCategoryHtml($row, null);
      }
      return $html;
    }
      public function get_cat() {
        $query = $this->con->prepare("SELECT * FROM category");
        $query->execute();
  
      
  
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $cat_id=$row ['cat_id'];
            $cat_title=$row ['title'];
            echo"<option class='' value='$cat_id'>$cat_title</option>";
        }

      
    }

   

    private function getCategoryHtml($sqlData, $title) {
      $categoryId = $sqlData["cat_id"];
      $title = $title == null ? $sqlData["title"] : $title;


      return "<div class=' card  col-8 mx-auto my-2  p-2  catcont'>
                  <div class='row w-100 '>
                  <div class='col-md-8'> 
                  <p class='h5  text-dark ' value=' $categoryId '>$title</p>
                  </div>
                  <div class='col-md-4 text-right'>
                  
                   <p class='btn btn-danger  catdel ' title='$categoryId' data-cat=' $categoryId '>Delete</p>
                   
                   </div>
                      
                   </div>
           
              </div>
             
              ";

  }

}
?>