$(document).on("click",".ajoutPanier",function(e){
    
    console.log("aer");
    $(this).hide(); 
    var button= $(this).attr("data-bdid");
    var panier=$("#panier").val();
    $.ajax({
        method:"POST",
        url:button,
        data:{
        },
        success:function(r){
            
            console.log(r);

            
        }
    });
});