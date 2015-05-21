$(document).on("click",".ajoutPanier",function(e){
    //console.log("aer");
    var button = $(this).attr("data-bdid");
    $.ajax({
        method:"POST",
        url:button,
        success:function(r){
            //console.log(r);
            $(this).parents(".dispo").val()
        }
    });
});

$(document).on("click",".panier_delete",function(e){
    console.log("aer");
    var button = $(this).attr("data-remove");
    $.ajax({
        method:"POST",
        url:button,
        success:function(r){
            //console.log(r);
            $(this).parents(".apercu").hide("slow")
        }
    });
});