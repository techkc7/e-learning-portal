
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
    <form action="" method="post"  id="f2"  class="form-group col-lg-10 m-auto " enctype="multipart/form-data">

 <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

    <tr align="center">

    <th align="right"><b> Course Title</b></th>
    <td>
    <input type="text" name="v_title" placeholder=" Title" class="form-control " required>
    </td>
</tr>
<tr align="center">

    <th align="right"><b> Course Price</b></th>
    <td>
    <input type="number" min="1" max="99999" name="v_price" placeholder=" Price" class="form-control " required>
    </td>
</tr>

<tr align="center">
    <td align="right"><b>  Category</b></td>
    <td>
        <select name="v_cat" id="" class="form-control " required >

          <option value="">Select Categories</option>
          <?php
            $cat=new Category($con);
            $cat->get_cat();
          ?>
          
      </select>
      </td>						
  </tr>

<tr align="center">
  <th align="right"><b> Preview Image </b></th>
  <td><input type="file" name="img"   class=" form-control-file " placeholder="Image Url" required ></td>
</tr>

<tr align="center">
  <th align="right"><b> Preview Video </b></th>
  <td><input type="file" name="vid"  class=" form-control " placeholder="Video Url" required ></td>
</tr>



<tr align="center">
<td colspan="2"><input type="submit" name="upload"  class=" col-sm-4 btn btn-primary text-white" value="Upload" ></td>
</tr>
</table>
  <div class="upmsg alert-success"></div>
   </form>  

    </div>
  </div>
</div>