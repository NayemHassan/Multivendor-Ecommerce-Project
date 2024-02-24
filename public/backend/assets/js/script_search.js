$(document).ready(function () {
    const site_url = "http://127.0.0.1:8000/";
    $("body").on("keyup",function () { 
       const text = $("#search").val();
      // console.log(text);
      if(text.length > 0){
        $.ajax({  
            url: site_url +"search-product",
            data: {search:text},
            method: "POST",
            beforSend: function(){
                return request.setRequestHeader('X-CSRF-TOKEN',('meta[name="csrf-token"]'));
            },
            success: function (result) {
                $("#productSearch").html(result);
            }
        }); //End Ajax
      }//End If
      if(text.length < 1)
        $("#productSearch").html("");
      
    })
});
   