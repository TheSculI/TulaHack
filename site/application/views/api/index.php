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
<?//print_r($data);?>
<?//echo $data["time"];?>
<?if($data["time"] >0 ):?>
<div class="text-center"><span class="timer"  style="display:none;"   ></span></div>

<script>
function goTime(){
        $('.timer').show();
        $('.timer').countTo({
        from:<?=$data["time"]?>,
        to: 0,
        speed: <?=$data["time"]*1000?>,
         onComplete: function (value) {
                //console.debug(this);
                $("#btn-step").attr("disabled",false);
            }
    });
}
</script>
<?endif;?>
<?if($data["time"] >0 ):?>
        <div class="text-center mb-4">
    <p> Для контроля времени<br> Вы можете воспользоваться нашим обратным отсчетом!</p>
        <button class="btn btn-warning" id="btn-step"   onclick="goTime();" >Запустить таймер</button>
    </div>
        <?endif;?>
<div class="row">
<div class="col-12 text-center">
<img src="<?=$data["img"]?>" style="height: 200px;width: auto !important;" >
</div>
<div class="col-12 text-center my-3">
<?=$data["description"]?>
</div>
<??>
    <div class="col-12 text-center">
    <?if($last_step == "Y"):?>
    <button class="btn btn-secondary  btn-detail" onclick="closeShow();" data-recipe="<?=$data["recipe_id"]?>" >Завершить</button>
    <?else:?>
        
        <button class="btn btn-secondary  btn-detail" id="btn-step"   onclick="setNextStep(<?=$next_step?>,<?=$data["recipe_id"]?> );" data-recipe="<?=$data["recipe_id"]?>" >Дальше</button>
    <?endif;?>
    </div>
</div>
    <?endif;?>