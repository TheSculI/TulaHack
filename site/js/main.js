$(function(){
     $("#formRegister").submit(function(event ){
        
        event.preventDefault();

        $.post(
            "/api",
            {
                show: "Y",
                result : $(this).serialize()
            },
            function(data){
                console.log(data);
            }
        );

        console.log( $(this).serialize() );
        return false;
     });
});