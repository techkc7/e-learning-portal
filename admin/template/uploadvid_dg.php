
<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
    <form action="" method="post"  id="f3"  class="form-group col-lg-10 m-auto " enctype="multipart/form-data">

    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

<tr align="center">

     <th align="right"><b> Video Title</b></th>
     <td>
     <input type="text" name="v_title" placeholder=" Title" class="form-control " required>
     </td>
 </tr>
<tr align="center">

     <th align="right"><b> Description</b></th>
     <td>
     <textarea type="text"  name="desc" placeholder=" Description" class="form-control " required></textarea>
     </td>
 </tr>

  <tr align="center">
     <td align="right"><b>  Course</b></td>
      <td>
         <select name="v_cat" id="" class="form-control " required >

           <option value="">Select Course</option>
           <?php
              $id=new Course($con);
              $id->get_course_id();
           ?>

        </select>
       </td>
    </tr>



 <tr align="center">
    <th align="right"><b>  Video Path </b></th>
    <td><input type="text" name="vid"  class=" form-control " placeholder="Video Url" required ></td>
 </tr>
 
 <tr align="center">
    <th align="right"><b> Video  Notes  </b></th>
    <td><input type="text" name="vid_notes"  class=" form-control " placeholder="Notes Url" required ></td>
 </tr>



 <tr align="center">
     <td colspan="2"><input type="submit" name="upd"  class=" col-sm-4 btn btn-primary text-white" value="Upload" ></td>
 </tr>
</table>
  <div class="upmsg alert-success"></div>
   </form>  

    </div>
  </div>
</div>