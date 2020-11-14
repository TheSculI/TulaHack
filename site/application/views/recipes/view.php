<div class="row mt-4 ">
<div class="col-md-6">
<?if(!$this->session->userdata('userId') && $recip_item['locked'] == 1):?>
    <div class="card-img-top" style="height: 400px;background-image:url('<?=$recip_item["img"]?>');">
					<div class="locked">
				</div>
				</div>
     
<?else:?>
    <img class="w-100" src="<?=$recip_item["img"]?>">
<?endif;?>
 
</div>  
<div class="col-md-6">
     <div> Рейтинг:
     <??>
    <?for($i = 1; $i < 6; $i++):?>
    <svg <?php if((int)$recip_item["rangeR"] >= $i): ?> style="color: gold;" <?endif;?> width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><?endfor;?>
  
<h3 class="">Состав </h3>
    <div class="mb-4">
    <?=$recip_item["recipe"]?>
    </div>
 
<?if(!$this->session->userdata('userId') &&  $recip_item['locked'] == 1 ):?>
    <div class="alert alert-primary" role="alert">
  <a href="<?php echo base_url('users/login'); ?>">Авторизуйтесь</a> для того чтобы приготовить блюдо
</div>
    
<?else:?>
    <div class="row">
    <div class="col-6">
    <button class="btn btn-success btn-lg btn-block btn-detail" id="addToFavourite"> 
     В закладки</button></div>
    <div class="col-6">
    
    <button id="startCook" class="btn btn-secondary btn-lg btn-block btn-detail">Начать готовить!</button></div>
    </div>
     
   <input type="hidden" name="recipe_id" id="recipe_id" value="<?=$recip_item["id"]?>">  
 
<?endif;?>
</div>
</div>
<div class="mb-5 mt-4">
<h3>Описание</h3>
<?=$recip_item["long_description"]?>
</div>