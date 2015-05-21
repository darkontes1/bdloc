$(document).on("click",".ajoutPanier",function(e){
    //console.log("aer");
    var button = $(this).attr("data-bdid");
    //var panier = $("#panier").val();
    var dispo = ($(".dispo").val());
    $.ajax({
        method:"POST",
        url:button,
        data:{
        },
        success:function(r){
            //console.log(r);
            dispo -= 1;
        }
    });
    $.ajax({
        method:"GET",
        url:button,
        data:{
            "dispo":dispo
        },
        success:function(r){
            //console.log(r);
            dispo -= 1;
            $(".dispo").val(dispo);
        }
    });
});