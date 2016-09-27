<?php
  header("Content-Type: text/html; charset=utf-8");
  include 'libs/simplehtmldom/simple_html_dom.php';
  $html = file_get_html('http://www.galant-biz.ru/rent/arenda_skladov/');
  	
 ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />

	<title>Аренда складов в Самаре</title>
	<meta content="" name="description" />
	<link rel="shortcut icon" href="favicon.png" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.2.min.css" />
	<link rel="stylesheet" href="libs/myFonts/stylesheet.css" />	
<!-- 	<link rel="stylesheet" href="css/fonts.css" /> -->
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />
	<link rel="stylesheet" href="libs/fancybox/source/jquery.fancybox.css" />

</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="header_logo_wrapper">
						<img src="img/logo.png" alt="Логотип компании" class="logo">
						<span>Бизнес центр</span>
					</div>
				</div>	
				<div class="col-md-4">
					<div class="header_adress_wrapper" id="scroll_to_map">
							<span>Самара, ул. Песчаная, 1</span>
					</div>
				</div>	
				<div class="col-md-4">
					<div class="header_phone_wrapper">
						<span>8 (905) 300-83-48</span>
						<!-- <div class="btn_top">Получить консультацию</div> -->
						<a href="#modal_consult" class="open_modal btn_top">
								Получить консультацию
						</a>
						<div id="modal_consult" class="modal_div"> 
						<span class="modal_close">X</span>
							<h3>Оставьте Ваши контактные данные и мы перезвоним Вам в ближайшее время, чтобы ответить на Ваши вопросы</h3>
							<form class="area_form" id="form_consult">
								<p>Ваше имя:</p>
							    <input type="text" name="name" required="required"/>
							    <p>Ваш телефон:</p>
							    <input type="text" name="phone" required="required"/>
							    <input class="button_area" type="submit" value="Отправить"/>
							</form>
						</div>
						<div id="overlay"></div>
					</div>	
				</div>	
			</div>
		</div>
		<div class="top_background">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="header_intro">
							<h1>Складские и производственные помещения</h1>
							<span></span>
							<span>в Географическом центре</span>
							<span>Самары</span>
						</div>
					</div>
					<div class="col-md-5 header_search_wrapper" >
						<div class="header_search">
							<span>Введите размер необходимой</span>
							<span>производственной площади:</span>
							<input id="area_search"  type="text"  value="" placeholder="Площадь, м2">
							<div class="btn_search" id="button_search">Найти</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section class="advantages">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Наши преимущества</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_a"></div>
						<span>Приспособленное здание</span>
						<span>Полноценный фабричный корпус</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_b"></div>
						<span>Электричество 380 В</span>
						<span>Для подключения оборудования</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_c"></div>
						<span>Подъездные пути</span>
						<span>Для грузовых автомобилей</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_d"></div>
						<span>Транспортный узел</span>
						<span>Работники доберутся без проблем</span>
					</div>
				</div>
			</div>	
			<div class="row advantage_bottom_row">
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_e"></div>
						<span>Экономия</span>
						<span>Аренда от собственника</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_f"></div>
						<span>Безопасность</span>
						<span>Круглосуточная охрана</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_g"></div>
						<span>Офисы в том же здании</span>
						<span>Без отрыва от производства</span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="advantage_wrapper">
						<div class="my my_h"></div>
						<span>Грузовые лифты</span>
						<span>Грузоподъемностью 1 т</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="free_areas">
		<div class="container">
			<div class="row col-md-12">
				<h1>Свободные площади</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
				<?php
				$count = 1;
					foreach($html->find('table.renting tr') as $article) {
	    $item['image']     = $article->find('.fancy img', 0)->src;
	    $item['number']    = $article->find('.num_item', 0)->plaintext;
	    $item['area'] = $article->find('td', 1)->plaintext;
	    $item['desc'] = $article->find('.rem', 0)->plaintext;
	    $articles[] = $item;
	    $pattern = '/_thumb.jpg/';
	    $replacement = '.jpg';
	    
	    if(isset($item['image']))	{
	    	echo "<div class=\"free_areas_wrapper\">
	    			<div class=\"col-md-4 free_areas_image_wrapper\">
	    			<div class=\"crop\">
	    			<a class=\"fancybox\" rel=\"gallery\" href=\"http://www.galant-biz.ru".preg_replace($pattern, $replacement, $item['image']) . "\"/>
						<img src=\"http://www.galant-biz.ru".preg_replace($pattern, $replacement, $item['image']) . "\"/>
					</a>
	    				</div>
	    				<span>Помещение №".$item['number'] . "</span></div>
						<div class=\"col-md-8 free_areas_description_wrapper\">
							<h2 id=".$item['area']." >Площадь: ".$item['area']." м2</h2>
							<span class=\"free_areas_desc\">".$item['desc'] . "</span>
							<a href=\"#modal_".$count."\" class=\"open_modal free_areas_btn\">
								Узнать больше
							</a>
						</div></div>
						<div id=\"modal_".$count."\" class=\"modal_div\"> 
						<span class=\"modal_close\">X</span>
							<h3>Оставьте Ваши контактные данные и мы перезвоним Вам в ближайшее время, чтобы ответить на Ваши вопросы</h3>
							<form class=\"area_form\" id=\"form_".$count."\">
								<p>Ваше имя:</p>
							    <input type=\"text\" name=\"name\" required=\"required\"/>
							    <p>Ваш телефон:</p>
							    <input type=\"text\" name=\"phone\" required=\"required\"/>
							    <input type=\"hidden\" name=\"area\" value=\"".$item['area']."\" />
							    <input class=\"button_area\" type=\"submit\" value=\"Отправить\"/>
							</form>
						</div>
						<div id=\"overlay\"></div>";

				$count++;		
	    }
	    

	}
				?>

					
				</div>
			</div>
		</div>
	</section>
	<section id="1122" class="rewiews">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Отзывы</h1>
				</div>
			</div>	
		</div>	
		<div class="rewiews_background">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="rewiews_wrapper">
							<div class="reviews_header">
								ООО ПФК “Вербена”
							</div>
							<div class="reviews_description">
								Мы арендуем площади в бизнес-центре “Галант” с 2007 года. Здание расположено в центре города, недалеко от остановки транспорта. Удобная транспортная развязка позволяет добраться с минимальным количеством пересадок в любую часть города. Есть подъездные пути для большегрузного транспорта. Здание оборудовано грузовыми лифтами, что немаловажно при переезде и разгрузке товара. территория центра охраняется, есть парковка для клиентов. И всё это при умеренной арендной плате. 

							</div>
							<div class="reviews_from">
								ООО ПФК “Вербена”
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="rewiews_wrapper">
							<div class="reviews_header">
								Телеком- альянс
							</div>
							<div class="reviews_description">
								Компания “Телеком-Альянс” более полугода является арендатором в бизнес-центре “Галант”. Для нас бизнес-центр интересен возможностью арендовать как офисные, так и складские помещения по очень привлекательной цене. Кроме того, администрация бизнес-центра всегда идет на встречу в решении возникающих вопросов и оперативно реагирует на наши просьбы. Надеемся на то, что и дальше наша работа в бизнес-центре “Галант” будет такой же комфортной и стабильной. 

							</div>
							<div class="reviews_from">
								С уважением,<br>
Зам. Директора О.Ю. Масленикова
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="rewiews_wrapper">
							<div class="reviews_header">
								ООО “Книга”
							</div>
							<div class="reviews_description">
								Вот уже 5-й год наша фирма арендует у ЗАО “Галант”почти 500 м2 площади. Нас всё здесь устраивает: и место расположения вдали от городского шума, и “незаметная” цена, и ощущениепостоянной заботы руководства “Галанта” об улучшении условий нашего местопроживания. А они с каждым годом становятся всё более комфортными, гораздо привлекательнее. Один вопрос с организацией питания арендаторов чего стоит. А отсутствие проблем с парковкой! И т.д. и т.п. 

							</div>
							<div class="reviews_from">
								Коллектив ООО “Книга”
							</div>
						</div>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="adress_map">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 id="map_container">Где мы находимся ?</h1>
				</div>
			</div>
		</div>
		<div class="container adress_map_container" >
				<img src="img/map.jpg" alt="Расположение офиса" class="adress_map_image">
		</div>	
	</section>
	<section class="call_us">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Для получения более подробной информации</h1>
					<h2>Оставьте ваш контактный телефон и мы вам перезвоним</h2>
				</div>
			</div>
			<div class="row call_us_wrapper">
			<form id="form_phone">
				<div class="col-md-6 call_us_input_wrapper">
					<input name="phone" type="text" placeholder="+ 7 (ХХХ) ХХХ ХХ ХХ" required="required">
				</div>
				<div class="col-md-6 call_us_button_wrapper">
					<input type="submit" value="Отправить" class="call_us_btn">
				</div>
			</form>	
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="call_us_image_wrapper">
						
						<img src="img/backgroundBottom.jpg" alt="Оставьте ваш контактный телефон и мы вам перезвоним">
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4 footer_adress_wrapper">
					<span>ОАО “Галант”
</span>
					<span>Самара, песчаная, д.1</span>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4 footer_phone_wrapper">
					<span>+ 7 (905) 300-83-48
</span>
					<span>galant@galant-biz.ru</span>
				</div>
			</div>
		</div>
		<div class="footer_line">
			<span>Все права защищены, <?php echo date("Y");?></span>
		</div>
	</footer>
	<div class="hidden"></div>

	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	
	<script src="libs/jquery/jquery-1.11.2.min.js"></script>
	<script src="libs/modernizr/modernizr.js"></script>
	
	
	<script src="js/jQuery.scrollSpeed.js"></script>
	<script src="libs/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="js/common.js"></script>


	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
	
</body>
</html>