<?php
$k = 1;
foreach ($recipes as $recipe):
	foreach ($favorRecip as $favor) {
		if ($recipe['id'] == $favor['idRecipes'] && $userId == $favor['idUser']) {
			if ($k == 1) {
				echo "<div class='card-group mt-3'>";
			}
			$k++?>

			<div class="card">
				<a href="/recipes/<?php echo $recipe['code'] ?>">
					<?if(!$this->session->userdata('userId') && $recipe['locked'] == 1):?>
					<div class="card-img-top" style="background-image:url('<?=$recipe["img"]?>');">
						<div class="locked">
						</div>
					</div>
					<?else:?>
					<div class="card-img-top" style="background-image:url('<?=$recipe["img"]?>');"></div>
					<?endif;?>
				</a>
				<?/*<img src='<?=$recipe["img"]?>' class="card-img-top" alt="<?=$recipe['img']?>">*/?>
				<div class="card-body">
					<h5 class="card-title text-center"><?=$recipe["name"]?></h5>
					<?$short = substr($recipe["short_description"],0,150);?>
					<p class="card-text"><?=$short?></p>
				</div>
				<div class="card-footer text-center">
					<p class="card-text"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-alarm" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
					</svg> <?echo date(" H:i:s", strtotime($recipe["time"] ) ); ?> </p>
					<a href="/recipes/<?php echo $recipe['code'] ?>" class="btn btn-secondary btn-lg btn-block btn-detail">Перейти</a>
				</div>
			</div>

			<?php 
			if ($k >= 5) {
				echo "</div>";
				$k=1;
			}
		}
	}
	endforeach;?>