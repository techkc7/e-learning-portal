<?php
class CourseProvider {
    

    public function create($entity) 
    {
        $crs = $entity->getCourse();

        if(sizeof($crs) == 0) 
        {
            return;
        }

           $videosHtml  = "<div class='row col-10 m-auto card m-3 pt-3'> <h3 class='d-block text-center text-dark p-3'>Course Contents</h3><hr>";
  
            foreach($crs as $video) {
                $videosHtml .= $this->createVideoSquare($video);
            

            }
       

        return $videosHtml .= "</div>";
    }

    private function createVideoSquare($video) {
       $id= $video->getId();
        $thumbnail = $video->getThumbnail();
        $name = $video->getTitle();
        $view = $video->getViews();
        $p = ceil($video->getPrice()*0.1);
        
        $description = $video->getDescription();
       
        return "                  
                        <div class='row  m-auto  text-center w-100'>
                          <div class='col-md-2'>
                            <img src='$thumbnail' class='' height='60px'>
                            </div>
                            <div class='col-md-3'>
                               <p class='p-0 text-black-50 mr-3'> Lecture No.  $id</p>
                                <h5 class='lead text-dark mr-2'> $name </h5>
                                </div>
                                <div class='col-md-7'>
                                <b class=' h5'>We Covers in this lession:</b>
                                <p class=' card-text text-left'>$description</p>
                                <a href='singlevid.php?sv=$id&&p=$p' class='btn mr-2  btn-primary  text-gray-100 spayv ' data-spay='$id'>watch Now @ ₹$p</a>
                                </div>
                                
                          </div>
                                <div class=' text-right mt-2'>
                              
                               <p class=' mr-2  fas fa-eye text-lg '> views $view</p>
                               </div>                         
                      
                      
                       <hr>
                ";
    }
    
    //get user course video
    public function creates($entity,$user) 
    {
        $cr = $entity->getUserCourse($user);

        if(sizeof($cr) == 0) 
        {
            return;
        }

           $videosHtml  = "<div class='row col-10 m-auto card m-3 pt-3' style='background:linear-gradient(315deg, #d2d2e2 60%,#f2f2f2 40%);'> <h3 class='d-block text-center text-dark p-3'>Course Contents</h3>";
  
            foreach($cr as $video) {
                $videosHtml .= $this->createVideo($video);
            

            }
       

        return $videosHtml .= "</div>";
    }

    private function createVideo($video) {
       $id= $video->getId();
        $thumbnail = $video->getThumbnail();
        $name = $video->getTitle();
        $dsc = $video->getDescription();
        $vpath = $video->getFilePath();
        $note = $video->getNote();
        
   
       
        return "                  
                        <div class='row  mb-3 mr-auto vid' data-id='$id' data-vpath='../$vpath' data-vposter='../$thumbnail' data-dsc='$dsc' role='button'>
                          <div class='col-3'>
                            <img src='../$thumbnail' class='img-fluid' >
                            </div>
                            <div class='col-9'>
                               <p class=' text-black-50'> Lecture No.  $id</p>
                                <h4 class='h5'> $name </h5>
                                 
                               
                             </div>                         
                      
                       </div>
                       <hr>
                       <div class='row  mb-3 m-auto text-center  '><a href='../$note'> Download Notes pdf</a></div>
                       <hr>
                ";
    }
}
?>