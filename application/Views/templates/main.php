<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<title><?=$arResult["title"]?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/css/main.css" />
</head>

<body class="d-flex flex-column min-vh-100">
	<?if(Route::$auth):?>
	<header class="header">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<div class="container">
			<a class="navbar-brand" href="/">Главная</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse " id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?=$arResult["snake_array"]?>" href="/snake_array/">Массив змейкой</a>
					</li>
					<?if(Route::$auth):?>
					<li class="nav-item">
						<a class="nav-link" href="/main/logout">Выход</a>
					</li>
					<?endif?>
				</ul>
			</div>
			</div>
		</nav>
	</header>
	<?endif?>

	<main class="content">
		<?php include 'application/views/' . $content_view; ?>
	</main>

	<div class="wrapper flex-grow-1"></div>
	<footer class="bg-dark ">
		<div class="footer-text float-sm-right">
			Решение подготовил: Корсунов Валеирий
			<br>
			e-mail: <a href="mail-to:kors.vv@ya.ru">kors.vv@ya.ru</a> 	
			<br>
			telegram: <a href="https://t.me/valeriykorsunov">https://t.me/valeriykorsunov</a>
		</div>
	</footer>

	<script src="/js/main.js" type="text/javascript"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>