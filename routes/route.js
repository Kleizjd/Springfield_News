
$(document).ready(function () {
    //=============================[  PRODUCT  ]=================================//	
    $(function verNoticia() { var menu = "noticia";
        $(document).on("click", "#verNoticia", function () { llamarVista(menu, menu, menu); }); });

    $(document).on("click", "#ajustes", function() { 
        let userId = new Object();  userId["userId"] = $("#userId").val(); //VARIABLES
         llamarVista("perfil", "perfil", "perfil", userId);
    });
});
     //=============================[   HOME / INICIO ]=========================//	
     $(function pageHome() { 
        $(document).on("click", "#coffee", function () { var menu = "home"; llamarVista(menu, menu, "coffee"); })
        $(document).on("click", "#contactanos", function () { var menu = "home"; llamarVista(menu, menu, "contactanos"); })
        $(document).on("click", "#contributors", function () { var menu = "home"; llamarVista(menu, menu, "contributors"); })
        $(document).on("click", "#join", function () { var menu = "home"; llamarVista(menu, menu, "join"); })
    });