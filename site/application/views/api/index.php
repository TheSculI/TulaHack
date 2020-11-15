<?php

//print_r($request);
//print_r($data);
?>
<?if($request["cur_step"] > 0 and $request["recipe_id"] ):?>
<?if($not_ready == "Y") :?>
    <div class="alert alert-primary" role="alert">
  В данный момент рецепт не доступен!
</div>
<?die();?>
<?endif;?>
<div class="text-center"><span class="timer"  style="display:none;"   ></span></div>

<script>
function goTime(){
        $('.timer').show();
        $('.timer').countTo({
        from:10,
        to: 0,
        speed: 10000,
         onComplete: function (value) {
                //console.debug(this);
                $("#btn-step").attr("disabled",false);
            }
    });
}
</script>
<div class="row">
<div class="col-12 text-center">
<img src="<?=$data["img"]?>" class="w-75">
</div>
<div class="col-12 text-center my-3">
<?=$data["description"]?>
</div>
<??>
    <div class="col-12 text-center">
    <?if($last_step == "Y"):?>
    <button class="btn btn-secondary  btn-detail" onclick="closeShow();" data-recipe="<?=$data["recipe_id"]?>" >Завершить</button>
    <?else:?>
        <button class="btn btn-secondary  btn-detail" id="btn-step"   onclick="goTime();" >Запустить таймер</button>

        <button class="btn btn-secondary  btn-detail" id="btn-step"   onclick="setNextStep(<?=$next_step?>,<?=$data["recipe_id"]?> );" data-recipe="<?=$data["recipe_id"]?>" >Дальше</button>
    <?endif;?>
    </div>
</div>
    <?endif;?>