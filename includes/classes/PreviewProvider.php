<?php
class PreviewProvider {

    private $con;

    public function __construct($con) {
        $this->con = $con;
        
    }

    public function createCategoryPreviewVideo($categoryId) {
        $entitiesArray = EntityProvider::getEntities($this->con, $categoryId, 1);

        if(sizeof($entitiesArray) == 0) {
            ErrorMessage::show("No Category");
        }

        return $this->createPreviewVideo($entitiesArray[0]);
    }



    public function createPreviewVideo($entity) {
        
        if($entity == null) {
            $entity = $this->getRandomEntity();
        }

       
        $name = $entity->getName();
        $id = $entity->getId();
        $price = $entity->getPrice();
        $thumbnail = $entity->getThumbnail();
        $vurl = $entity->getPreview();
       

        return "<div class='row col-lg-10 col-md-12 m-auto   pb-0  text-center ' >
   
                   
                
                      <div class=' col-md-8  embed-responsive-item ' id=''>
                               
                    <video   muted class='embed-responsive-21by9 w-100'  height='300'  controls>
                    <source src='$vurl' type='video/mp4'>
                    </video>
                    
                    </div>
                    <hr>
                           
                         <div class=' card p-0 col-md-4 '>
                         <div class=' card-header bg-warning  '>
                         <p class=' card-title lead text-white h3 text-uppercase '>$name</p>
                         </div>
                         <div class=' card-body'>
                         <p class='card-title  text-lg '>course id : $id</p>
                         <h3 class='card-title h3 text-dark'>₹$price</h3> 
                         <p class='card-title lead text-info'>$name</p>
                         </div>
                         <div class=' p-0 card-footer text-center bg-primary '>
                          <p  class=' btn btn-primary btn-lg col-12 border-0'  data-cid='$id' id='addCart'>Add to card</p>
                        
                         
                          </div>
                          </div>
                    
                
            </div>
            <hr>
                ";
                

    }

    public function createEntityPreviewSquare($entity) {
        $id = $entity->getId();
        $price = $entity->getPrice();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return " <div class=' card mx-auto   p-0  my-3  ' style='width:17rem;border:2px groove #fff; box-shadow:0px 2px 4px 1px #11f;'>
                   
                   <a href='entity.php?id=$id'>
                  
                        <img src='$thumbnail' height='180' title='$name' class=' card-img-top p-0 '>
                   
                    </a>              
                       
                       <div class='card-body text-center ' style='background:linear-gradient(0deg, #f0f ,#000,#10f);'>
                       <b class='h5 text-warning '>₹$price</b> 
                        <p class=' lead text-white'>$name</p>
                       
                        <button  class='btn btn-outline-light p-2   m-auto' data-cid='$id' id='addCart'>Add to card</button>
                        </div>
                        
                    </div>
                
                ";
    }
    public function createEntityPreviewSquareUser($entity) {
        $id = $entity->getId();
        $price = $entity->getPrice();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return " <div class=' card mx-auto   p-0  my-3   ' style='width:17rem;border:1px groove #f2f2f2; box-shadow:0px 2px 4px 1px #299;'>
                   
                   <a href='../entity.php?id=$id'>
                  
                        <img src='../$thumbnail' height='180' title='$name' class=' card-img-top p-0'>
                   
                    </a>              
                       
                       <div class='card-body text-center' style='background:linear-gradient(135deg, #f02fc2 0%,#6094ea 100%);'>
                       <b class='h5 text-warning '>₹$price</b> 
                        <p class=' lead text-white'>$name</p>
                       
                        <button  class='btn btn-outline-light p-2   m-auto' data-cid='$id' id='addCart'>Add to card</button>
                        </div>
                        
                    </div>
                
                ";
    }

    private function getRandomEntity() {

        $entity = EntityProvider::getEntities($this->con, null, 1);
        return $entity[0];
    }

}
?>