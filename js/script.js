$(document).scroll(function(){
    var isScrolled = $(this).scrollTop() > $(".top_bar").height();
    $(".top_bar").toggleClass("scrolled", isScrolled);
});

function volumeToggle(button) {
    var muted = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted", !muted);

    $(button).find("i").toggleClass("fa-volume-mute");
    $(button).find("i").toggleClass("fa-volume-up");
}

function pause_play(){
    var ply=$(".plbtn");
    $(".svpl").on('click',function(e) {
        e.stopPropagation();
        var video = $(".previewVideo").get(0);
    
        if(video.paused || video.ended) {
            video.play();     
            ply.removeClass("fa-play");     
            ply.addClass("fa-pause");
        } 
        else{
            video.pause();
            ply.removeClass("fa-pause");     
            ply.addClass("fa-play");
        }
    
        return false;
    });    
    
    
}

 
function previewEnded() {
    $(".pVideo").toggle();
    $(".pImg").toggle();
}




function openCloseNav() {
   $(".sidenav").toggle().css("width","200px");
  }
  
 
  
  $(document).ready(function () {
      $(document).on("click","#addCart",function () { 
         var courseId=$(this).data("cid");
                     $.post("ajax/addCart.php",{cid:courseId},function (data) {
                         $(".msg").show().fadeIn('slow').html("Product added to cart successfuly");
                         $(".cartcount").text(data);
                         setTimeout(() => {
                            $(".msg").fadeOut(800).hide();
                         }, 2000);
                     })                                    
     })
      
    $(document).on("click", ".delcart", function () {
          var el = $(this);
          var delid = $(this).data("id");
          $.post("ajax/addCart.php", { delid: delid }, function (data) {
              $(".cartcount").text(data);
              el.closest("tr").remove();


          });
      });
    
    $('#ckout').click( function (e) {
        e.preventDefault();
         
          $.post("ajax/insertCart.php", function (data) {
              if (data==1) {
         
                  window.location="checkout.php";
              }else{
                   $(".msg").text(data);
                   window.location="cart.php";
                 }


          });
      });
      
      
      $(document).on("click",".vid",function () { 
        
        var $vpath=$(this).data("vpath");
        var $vpst=$(this).data("vposter");
        var $dsc=$(this).data("dsc");
       
        $("#video").html('<source src='+$vpath+'  type="video/mp4"></source>'); 
        $("#vdsc").text($dsc); 
        $("#video").attr('poster', $vpst);
        $("#video").get(0).load();                       
        $("#video").get(0).play();          
        
        var $id=$(this).data("id");
         $.post("../ajax/updateView.php",{vid:$id},function(data) {
            
         });             
    })
      
      
      
  });
  
  $(document).ready(function () {
    var timer;

    $(".searchInput").keyup(function() {
        clearTimeout(timer);

        timer = setTimeout(function() {
            var val = $(".searchInput").val();
            
            if(val != "") {
                $.post("ajax/getSearchResults.php", { term: val }, function(data) {
                    $(".srch").html("<h2 class='text-center '>Search Results <hr></h2>"+data);
                })
            }
            else {
                $(".srch").html("");
            }

        }, 500);
    })
  });