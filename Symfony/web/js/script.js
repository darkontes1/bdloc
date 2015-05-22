$(document).on("click",".ajoutPanier",function(e){
    var btn = $(this);
    var button = $(this).attr("data-bdid");
    $.ajax({
        method:"POST",
        url:button,
        success:function(r){
            //console.log(r);
            btn.parents(".dispo").val(btn.parents(".dispo").val()-1);
        }
    });
});

$(document).on("click",".panier_delete",function(e){
    var btn = $(this);
    //e.preventDefault();
    var button = $(this).attr("data-remove");
    $.ajax({
        method:"POST",
        url:button,
        success:function(r){
            //console.log(r);
            btn.parents(".apercu").hide("slow");
        }
    });
});

$(document).on("click", "prec", function(e)){
    var btn = $(this);
    e.preventDefault();
    $.ajax({


    });
});

$(document).on("click", "suiv", function(e)){
    var btn = $(this);
    e.preventDefault();
});