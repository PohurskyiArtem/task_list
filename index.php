<?php
	if( isset($_COOKIE['loggeduser']) )
	{
		$user_id = $_COOKIE['loggeduser'];
	} else
	{
		header('Location: ./api/login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.min.css">
	<link rel="stylesheet" href="css/libraries/jquery-ui.css">
	<link rel="stylesheet" href="css/libraries/jquery.mCustomScrollbar.min.css">
</head>
<body>
	<header>
		<div class="page-header">
			<div class="site-logo-wrapper">
				<a href="#"><img src="images/logo-task-list.png" alt=""></a>
			</div>
			<div class="calendar">
				<div class="calendar__wrapper">

				<input type="text" id="datepicker" class="date-picker" readonly="">
				</div>
				<span class="clock"></span>
			</div>
			<div class="logo-wrapper">
				<a href="https://www.xe.com/" target="_blank"><img src="images/logo.png" alt="" ></a>
			</div>
		</div>
		<div class="logout-btn">
			<a href="./api/logout.php"><img src="images/logout.png" alt=""></a>
		</div>
	</header>
	<main class="site-content-wrapper">
		<div class="site-content-container">
			<div class="task-group-list">
				<div class="task-group-list__title-container"><h1>Все задачи</h1><img src="images/more.png" alt=""></div>
				<div class="task-group-list__add-group-btn"><img src="images/plus.png" alt=""><a>Создать новое задание</a></div>
				<div class="task-group-list__list-container">
					<ul class="task-group-list__list mCustomScrollbar" data-mcs-theme="dark">
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>18.11.2020 в 18:55</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>19.11.2020 в 08:00</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>18.11.2020 в 18:55</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>19.11.2020 в 08:00</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>18.11.2020 в 18:55</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>19.11.2020 в 08:00</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>18.11.2020 в 18:55</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>19.11.2020 в 08:00</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>18.11.2020 в 18:55</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>19.11.2020 в 08:00</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>18.11.2020 в 18:55</p></li>
						<li class="quest-list__item"><img src="images/trash.png" class="quest-item__delete-btn" alt=""><img src="images/monthly.png" alt=""><p>19.11.2020 в 08:00</p></li>
					</ul>
				</div>
			</div>
			<div class="quest-list">
				<div class="quest-list__header"><div class="quest-name">Павел</div><img src="images/pen.png" alt=""></div>
				<div class="quest-list__container">
					<div class="quets-list__list mCustomScrollbar" data-mcs-theme="dark"">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, sed consequuntur! Odio, commodi maxime. Sed deserunt ducimus accusamus debitis harum. Explicabo sint, asperiores laborum adipisci vero inventore dignissimos placeat quod.</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, sed consequuntur! Odio, commodi maxime. Sed deserunt ducimus accusamus debitis harum. Explicabo sint, asperiores laborum adipisci vero inventore dignissimos placeat quod.</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, sed consequuntur! Odio, commodi maxime. Sed deserunt ducimus accusamus debitis harum. Explicabo sint, asperiores laborum adipisci vero inventore dignissimos placeat quod.</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, sed consequuntur! Odio, commodi maxime. Sed deserunt ducimus accusamus debitis harum. Explicabo sint, asperiores laborum adipisci vero inventore dignissimos placeat quod.</p>

					</div>
				</div>
				<div class="quest-list__save-btn">
					<button>Сохранить</button>
				</div>
			</div>
			<div class="links-list">
				<div class="links-list__header"><button >Ссылки и другое</button></div>
				<div class="links-list__container">
					<div class="post"><img src="images/plus.png" alt=""><p>Добавить</p></div>
					<div class="links-list__new-link-form">
						<form action="" method="post">
							<input type="text" placeholder="Название"> 
							<input type="text" placeholder="Ссылка">
							<input type="submit" value="Сохранить">	
						</form>
					</div>
					<div class="links-list__list-container">
						<ul class="links-list__list">
							<li><img src="images/link.png" alt=""><a href="">Сайт Авито</a></li>
							<li><img src="images/link.png" alt=""><a href="">Сайт Михаиbbла</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/libraries/jquery.mousewheel.min.js"></script>
	<script src="js/libraries/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="js/index.min.js"></script>
	
	<script>
	$( function() {
		$( "#datepicker" ).datepicker();
	} );
	</script>
	</body>
</html>
