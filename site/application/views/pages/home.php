<?php
$k = 1;
foreach ($recipes as $recipe):
	if ($k == 1) {
		echo "<div class='card-deck mt-3'>";
		echo "<div class='row'>";
	}
	$k++?>

	<div class="col-lg-3">
		<div class="card">
			<img src='<?=$recipe["img"]?>' class="card-img-top" alt="<?=$recipe['img']?>">
			<div class="card-body">
				<h5 class="card-title"><?=$recipe["name"]?></h5>
				<p class="card-text"><?=$recipe["short_description"]?></p>
			</div>
			<div class="card-footer text-center">
				<p class="card-text">Время готовки - <?echo substr($recipe["time"],0,-7)?></p>
				<a href="/recipes/<?php echo $recipe['code'] ?>" class="btn btn-primary btn-lg btn-block">Перейти</a>
			</div>
		</div>
	</div>

	<?php 
	if ($k == 5) {
		echo "</div>";
		echo "</div>";
		$k=1;
	}
	endforeach;?>