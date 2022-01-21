
    

  $(document).on("click", ".del-course", function () {
      var el = $(this);
      var delid = $(this).data("course_del");
     
    if (confirm("Are you sure??")) {
      $.post("ajax/delCourse.php", { delid: delid }, function (data) {
         if (data==1) {
             
       
          el.closest("tr").remove();
         
      }
      });
    }
  });
 
 
  $(document).on("click", ".del-video", function () {
    var el = $(this);
    var vdelid = $(this).data("video_del");
   
  if (confirm("Are you sure??")) {
    $.post("ajax/delCourseVid.php", { delid: vdelid }, function (data) {
       if (data==1) {
           
     
        el.closest("tr").remove();
       
    }else{
      alert(data)
    }
    });
  }
});
 

   
  $(document).on("click", ".catdel", function () {
      var el = $(this);
      var delid = $(this).data("cat");
     
      $.post("ajax/delCat.php", { delid: delid }, function (data) {
         if (data==1) {
             
       
          el.closest(".catcont").remove();
         
      }
      });
  });
 
  



 $("#f2").on('submit', function(e) {
     e.preventDefault();
    var  formData = new FormData($(this)[0]);
     
       $.ajax({
         url: 'ajax/add_course.php',
         type: 'POST',
         data: formData,
         contentType: false,
         processData: false,
         cache: false,
        
         success: function(result) {
         
           if(result==1) {
           
           $.post("ajax/viewCourse.php",function (data) {
               $(".upmsg").fadeIn(1000).text("Uploaded successfully..").fadeOut(4000);;
             
               $("#f2").trigger("reset");
               $(".loadcourse").html(data);
               
           });
 
           } else {
            alert("something went wrong...");
           }
         }
       });
 
      
    })
 
    $(document).on("click", ".edit-course", function () {
  
        var eid = $(this).data("course_edit");
       
        $.post("ajax/edit_course.php", { edt: eid }, function (data) {
            
            $("#cform").html(data);
            
        });
        
        
    });
    
    $("#cform").on('submit', function(e) {
      e.preventDefault();
      $myform= $(this);
    var  formData = new FormData($(this)[0]);
     
       $.ajax({
         url: 'ajax/update_course.php',
         type: 'POST',
         data: formData,
         contentType: false,
         processData: false,
         cache: false,
        
         success: function(result) {
           if(result==1) {
           
           $.post("ajax/viewCourse.php",function (data) {
               $(".msgupd").fadeIn(1000).text("Updated successfully..").fadeOut(4000);;
             
               
               $(".loadcourse").html(data);
               
           });
 
           } else {
            alert("something went wrong...");
           }
         }
       });
 
       
     });
    
   
    
    
    
    $("#f3").on('submit', function(e) {
      e.preventDefault();
    
     
       $.ajax({
         url: 'ajax/add_video.php',
         type: 'POST',
         data: $('#f3').serialize(),
        
         success: function(result) {
           if(result==1) {
           
           $.post("ajax/viewVideo.php",function (data) {
               $(".umsg").fadeIn(1000).text("Uploaded successfully..").fadeOut(4000);;
             
               $("#f3").trigger("reset");
             
               $(".loadcourse").html(data);
               
           });
 
           } else {
            alert("something went wrong...");
           }
         }
       });
 
       
     });
    
     $(document).on("click", ".edit-video", function () {
  
      var eid = $(this).data("video_edit");
     
      $.post("ajax/edit_video.php", { edt_vid: eid }, function (data) {
          
          $("#cform2").html(data);
          
      });
      
      
  });
     
  $("#cform2").on('submit', function(e) {
    e.preventDefault();

   
     $.ajax({
       url: 'ajax/update_video.php',
       type: 'POST',
       data: $('#cform2').serialize(),
      
       success: function(result) {
         if(result==1) {
         
         $.post("ajax/viewVideo.php",function (data) {
             $(".msgupd").fadeIn(1000).text("Updated successfully..").fadeOut(4000);;
             $('#cform2').trigger("reset");
             
             $(".loadcourse").html(data);
             
         });

         } else {
          alert("something went wrong...");
         }
       }
     });

     
   });
    
     $(document).ready(function(){

      $.ajax({
        url: "ajax/viewOrders.php",
        type: "POST",
        cache: false,
        success: function(dataResult){
          $('.odrata').html(dataResult); 
        }
      });
    });
    
     $(document).ready(function(){

      $.ajax({
        url: "ajax/viewUsers.php",
        type: "POST",
        cache: false,
        success: function(dataResult){
          $('.userdata').html(dataResult); 
        }
      });
    });
    // Delete 
    $(document).on("click", ".del", function() { 
        var $ele = $(this).parent().parent();
        $.ajax({
          url: "ajax/delete_user.php",
          type: "POST",
          cache: false,
          data:{
            id: $(this).attr("data-id")
          },
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              $ele.fadeOut(2000).remove();
            }
          }
        });
      });
    