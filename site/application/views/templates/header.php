<html class="h-100">
<head>
	<meta charset="utf-8">
	<title>Cooking teacher</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/style.css?v=32dewesweewwsdsdwedssssdsaeew" >
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<!-- jQuery and JS bundle w/ Popper.js -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<script src="/js/jquery.countTo.js" ></script>

	<script src="/js/main.js" ></script>
</head>
<body class="d-flex flex-column h-100">
	<div class="fixed-top">
		<header>
			<div  >
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active"><a href="<?php echo base_url('/'); ?>" class="navbar-brand"> Главная</a></li>
								<li class="nav-item "><a href="<?php echo base_url('recipes/'); ?>" class="nav-link"> Рецепты</a></li>


							</ul>
							<div class="form-inline my-2 my-lg-0">
								<?if($this->session->userdata('userId')):?>
								<a href="<?php echo base_url('users/account'); ?>" title="Личный кабинет" class="mr-3">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
										<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
										<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
									</svg>
								</a>
								<a href="<?php echo base_url('favourites'); ?>" title="Избранное" class="mr-3"  ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-suit-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
								</svg></a>
								<a href="<?php echo base_url('users/logout'); ?>" title="Выход" class="" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
								</svg></a>
								<?else:?>
								<a href="<?php echo base_url('users/login'); ?>" class="mr-1 ">Вход</a> /
								<a href="<?php echo base_url('users/registration'); ?>" class="ml-1  " >Регистрация</a>
								<?endif;?>
							</div>
						</div>
				<?/*
				<button type="button" class="btn navbar-brand" data-toggle="modal" data-target="#staticRegister">Зарегистрироваться</button>
				<button type="button" class="btn navbar-brand" data-toggle="modal" data-target="#staticAuth">Авторизоваться</button>*/?>
			</nav>
		</div>
	</div>
</header>
</div>
<!--
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="/application/views/images/header.jpg" class="d-block w-100" >
		</div>


	</div>
</div>
-->
<?//if($_SERVER["REQUEST_URI"] == "/"):?>
<div class="container">
	<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item text-center active">
				<img src="/application/views/images/header.jpg">
				<div class="carousel-caption d-none d-md-block" style="background-color: rgba(108, 117, 125,0.6); border-radius: 3px">
					<h5>Пельмешки</h5>
					<p>Но я не уверен что это и вправду они</p>
				</div>
			</div>
			<div class="carousel-item text-center">
				<img src="/application/views/images/chocolate.jpg">
				<div class="carousel-caption d-none d-md-block" style="background-color: rgba(108, 117, 125,0.6); border-radius: 3px">
					<h5>Шоколадки</h5>
					<p>Но я не уверен что это и вправду они</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(108, 117, 125,0.6); border-radius: 3px"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(108, 117, 125,0.6); border-radius: 3px"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
								<?//endif;?>
	<main class="container mt-4 pb-4">
		<h1 class="text-center"><?php echo $title ?></h1>