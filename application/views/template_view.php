<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/css/main.css" />
</head>

<body>
	<header class="header">
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
			<a class="navbar-brand" href="/">Главная</a>
			<div class="collapse navbar-collapse ">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?= $snake_array ?>" href="/snake_array/">Массив змейкой</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<?php include 'application/views/' . $content_view; ?>

	<footer class="footer">

	</footer>

	<script src="/js/bootstrap/bootstrap.js" type="text/javascript"></script>
	<script src="/js/main.js" type="text/javascript"></script>
</body>

</html>