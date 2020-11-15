function setNextStep(id,recipe_id){
    $.post(
        "/api",
        {
           cur_step: id,
           recipe_id:recipe_id
        },
        function(data){
            $("#modalBody").html(data)
            console.log(data);
        }
    );
 }
function closeShow(){
    $("#modalBody").html("");
    $('#staticForm').modal('hide');
}

$(function(){
     $("#startCook").click(function(){
 
         $('#staticForm').modal('show');
        console.log( $("#recipe_id").val() );
         $.post(
             "/api",
             {
                cur_step: 1,
                recipe_id :  $("#recipe_id").val()
             },
             function(data){
                 $("#modalBody").html(data)
                 console.log(data);
             }
         );

     });


     $("#addToFavourite").click(function(){
        
        $.post(
            "/api/recipe",
            {
               method: "addToFavourite",
               recipe_id :  $("#recipe_id").val(),
               cmd:false,
               id:false
            },
            function(data){
                console.log(data);
                if(data == "add"){
                    $("#addToFavourite").text("В закладках");
                }else{
                    $("#addToFavourite").text("В закладки");
                }
            }
        );
        
        
     });

    
});