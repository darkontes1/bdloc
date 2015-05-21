$(document).on("click",".ajoutPanier",function(e){
    //console.log("aer");
    var button = $(this).attr("data-bdid");
    //var panier = $("#panier").val();
    var dispo = ($(".dispo").html());
    $.ajax({
        method:"POST",
        url:button,
        data:{"dispo":dispo
        },
        success:function(r){
            //console.log(r);
            dispo -= 1;
            //$(this).parents(".dispo").html("toto");
            //$(this).attr(".dispo").text($(this).attr(".dispo").text()-1);
        }
    });
});

$(document).on("click",".panier_delete",function(e){
    console.log("aer");
    $(".test").hide();
    var button = $(this).attr("data-remove");
    //var panier = $("#panier").val();
    var dispo = ($(".dispo").val());
    $.ajax({
        method:"POST",
        url:button,
        data:{
        },
        success:function(r){
            //console.log(r);
        }
    });
});