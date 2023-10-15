<?php

get_header('new');

?>

<?php
//if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
$cat = get_the_category($post->ID);
$vido = types_render_field("video", array("raw" => "true", "output" => "", "show_name" => "false"));

if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $vido, $match)) {
	//$video_id = $match[1];
	global $video_src;
	$video_src = $match[1];
}

//preg_match('/src="(?P<src>([^"]*))"/i', $vido, $matches);

//$video_src = @$matches[2];
//print_r($matches[2]);


//var_dump($vido);

?>

<div class="right2 container">

	<!-- <div style="display:flex;flex-wrap:nowrap;justify-content:space-around;">
		<div onclick="history.back();" class="go_back_category"><a>Назад в раздел</a></div>
		<div class="go_description"><a>Об аттракционе</a></div>
		<div onclick="$.cookie('item_source',null);" class="go_back"><a href="https://arenda-attrakcionov.ru/attrakciony">Все аттракционы</a></div>
	</div> -->
	<?php
	// $trating = rand(4,5);
	// wp_star_rating( array( 'rating'=>$trating, 'type'=>'rating' ) );
	?>

	<div class="row">
		<div class="col">
			<div class="d-flex justify-content-start align-items-center">
				<h1 itemprop="name" class="h2 text-left me-2"><?= get_the_title() ?></h1>
				<?= do_shortcode('[ccc_my_favorite_select_button post_id="" style="1"]') ?>
			</div>
		</div>
	</div>
    <div class="mc-inside-page">
        <section class="first-section">
            <div class="container">
                <nav class="breadcrumbs">
                    <ul>
                        <li class="home-link">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <path d="M3.04101 10.8333H3.87434V16.6667C3.87434 17.5858 4.62184 18.3333 5.54101 18.3333H15.541C16.4602 18.3333 17.2077 17.5858 17.2077 16.6667V10.8333H18.041C18.2058 10.8333 18.3669 10.7844 18.5039 10.6928C18.6409 10.6013 18.7477 10.4711 18.8107 10.3189C18.8738 10.1666 18.8903 9.99911 18.8582 9.83748C18.826 9.67585 18.7467 9.52738 18.6302 9.41084L11.1302 1.91084C11.0529 1.83338 10.961 1.77194 10.8599 1.73001C10.7588 1.68808 10.6505 1.6665 10.541 1.6665C10.4316 1.6665 10.3232 1.68808 10.2221 1.73001C10.121 1.77194 10.0292 1.83338 9.95185 1.91084L2.45184 9.41084C2.33534 9.52738 2.256 9.67585 2.22386 9.83748C2.19172 9.99911 2.20822 10.1666 2.27128 10.3189C2.33434 10.4711 2.44112 10.6013 2.57813 10.6928C2.71514 10.7844 2.87622 10.8333 3.04101 10.8333ZM8.87434 16.6667V12.5H12.2077V16.6667H8.87434ZM10.541 3.67834L15.541 8.67834V12.5L15.5418 16.6667H13.8743V12.5C13.8743 11.5808 13.1268 10.8333 12.2077 10.8333H8.87434C7.95518 10.8333 7.20768 11.5808 7.20768 12.5V16.6667H5.54101V8.67834L10.541 3.67834Z" />
                                </svg>
                            </a>
                        </li>
                        <li><a href="#">Мастер-классы</a></li>
                        <li><a href="#">Детские</a></li>
                        <li><a href="#">Детские</a></li>
                        <li><a href="#">Детские</a></li>
                        <li>Игрушки из лыка</li>
                    </ul>
                </nav>
                <div class="two-cols-wrapper">
                    <div class="gallery-block">
                        <div class="thumbs-gallery">
                            <div class="swiper preview-block">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide video-slide" data-link="https://www.youtube.com/embed/Z4Cm6r0GHH4">
                                        <img src="img/slide1.jpg" alt=""/>
                                        <div class="play-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="48" viewBox="0 0 42 48" fill="none">
                                                <path d="M40.5 21.4019C42.5 22.5566 42.5 25.4434 40.5 26.5981L4.5 47.3827C2.5 48.5374 1.49388e-06 47.094 1.59483e-06 44.7846L3.41188e-06 3.21539C3.51283e-06 0.905985 2.5 -0.537388 4.5 0.617313L40.5 21.4019Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="swiper-slide video-slide" data-link="https://www.youtube.com/embed/Z4Cm6r0GHH4">
                                        <img src="img/slide1.jpg" alt=""/>
                                        <div class="play-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="48" viewBox="0 0 42 48" fill="none">
                                                <path d="M40.5 21.4019C42.5 22.5566 42.5 25.4434 40.5 26.5981L4.5 47.3827C2.5 48.5374 1.49388e-06 47.094 1.59483e-06 44.7846L3.41188e-06 3.21539C3.51283e-06 0.905985 2.5 -0.537388 4.5 0.617313L40.5 21.4019Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="swiper-slide video-slide" data-link="https://www.youtube.com/embed/Z4Cm6r0GHH4">
                                        <img src="img/slide1.jpg" alt=""/>
                                        <div class="play-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="48" viewBox="0 0 42 48" fill="none">
                                                <path d="M40.5 21.4019C42.5 22.5566 42.5 25.4434 40.5 26.5981L4.5 47.3827C2.5 48.5374 1.49388e-06 47.094 1.59483e-06 44.7846L3.41188e-06 3.21539C3.51283e-06 0.905985 2.5 -0.537388 4.5 0.617313L40.5 21.4019Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="swiper-slide video-slide" data-link="https://www.youtube.com/embed/Z4Cm6r0GHH4">
                                        <img src="img/slide1.jpg" alt=""/>
                                        <div class="play-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="48" viewBox="0 0 42 48" fill="none">
                                                <path d="M40.5 21.4019C42.5 22.5566 42.5 25.4434 40.5 26.5981L4.5 47.3827C2.5 48.5374 1.49388e-06 47.094 1.59483e-06 44.7846L3.41188e-06 3.21539C3.51283e-06 0.905985 2.5 -0.537388 4.5 0.617313L40.5 21.4019Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="swiper-slide video-slide" data-link="https://www.youtube.com/embed/Z4Cm6r0GHH4">
                                        <img src="img/slide1.jpg" alt=""/>
                                        <div class="play-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="48" viewBox="0 0 42 48" fill="none">
                                                <path d="M40.5 21.4019C42.5 22.5566 42.5 25.4434 40.5 26.5981L4.5 47.3827C2.5 48.5374 1.49388e-06 47.094 1.59483e-06 44.7846L3.41188e-06 3.21539C3.51283e-06 0.905985 2.5 -0.537388 4.5 0.617313L40.5 21.4019Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="thumbs-block">
                                <div thumbsSlider="" class="swiper">

                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="img/slide-preview.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="img/slide-preview.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="img/slide-preview.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="img/slide-preview.jpg" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="img/slide-preview.jpg" />
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-button-next"><span>></span></div>
                                <div class="swiper-button-prev"><span><</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="description-block">
                        <div class="description">
                            <h1 class="title">Игрушки из лыка</h1>
                            <div class="text-wrapper">
                                <p>Этот занятный и творческий мастер-класс предлагает уникальную возможность детям создавать собственные игрушки из натурального материала - лыка.</p>
                                <p>Мастер-класс «Игрушки из лыка» предлагает детям веселое и познавательное время, полное творчества и развития.</p>
                            </div>
                            <div class="icons-wrapper">
                                <div class="icon-block">
                                    <img src="img/icons/man.svg" alt="">
                                    <div class="text">от 10 человек</div>
                                </div>
                                <div class="icon-block">
                                    <img src="img/icons/time.svg" alt="">
                                    <div class="text">от 1 часа</div>
                                </div>
                                <div class="icon-block">
                                    <img src="img/icons/clock.svg" alt="">
                                    <div class="text">от 5 лет</div>
                                </div>
                            </div>
                        </div>
                        <form class="feedback-global-form">
                            <div class="left">
                                <input type="text" placeholder="Имя">
                                <input type="tel" placeholder="Телефон">
                                <label class="custom-checkbox-wrapper agreement-checkbox">
                                    Я согласен на обработку персональных данных
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="right">
                                <div class="feedback-type-choose-wrapper">
                                    <div class="option">
                                        <input type="radio" name="feedback-type-choose2" checked>
                                        <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.1" height="22.92" viewBox="0 0 65.74 64.96"><path d="m36.93,45.98c-1.12.08-1.97-.51-2.79-1.16-4.03-3.19-7.72-6.75-11.17-10.56-1.13-1.25-2.24-2.53-3.25-3.89-1.3-1.75-1.07-3.86.53-5.03.36-.27.8-.38,1.24-.47.98-.21,1.91-.57,2.71-1.17,1.09-.83,1.51-2.59,1.01-4.1-.27-.81-.59-1.61-1.07-2.34-2.13-3.24-3.88-6.69-5.61-10.15-.61-1.21-1.22-2.46-2.23-3.42-1.81-1.74-3.83-1.96-5.88-.52-2.27,1.59-4.45,3.32-6.3,5.41-1.69,1.9-2.42,4.16-2.24,6.67.14,1.87.86,3.59,1.62,5.28,2.62,5.85,5.75,11.41,9.63,16.53,3.01,3.97,6.34,7.65,10.09,10.94,6.05,5.31,12.74,9.62,20.09,12.89,1.72.77,3.41,1.6,5.27,2.04,3.23.76,5.95-.18,8.3-2.35,1.8-1.66,3.27-3.62,4.74-5.58,1.88-2.5.7-5.73-1.55-7.22-1.75-1.16-3.61-2.15-5.44-3.18-2.42-1.37-4.85-2.72-7.3-4.03-.96-.51-1.96-.92-3.1-.96-1.78-.06-2.85.83-3.58,2.34-.29.6-.4,1.25-.61,1.87-.49,1.46-1.49,2.17-3.03,2.17" style="fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px"/></svg>
                                    </div>
                                    <div class="option">
                                        <input type="radio" name="feedback-type-choose2">
                                        <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.19" height="22.92" viewBox="0 0 65.74 64.96"><defs><style>.cls-1{fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px}</style></defs><path class="cls-1" d="m29.47,24.46c-.29.69-.78,1.23-1.3,1.75-1.97,1.98-2.11,5.46-.19,7.58,1.11,1.22,2.26,2.4,3.5,3.5,1.65,1.47,3.56,1.75,5.63,1.1,1.1-.34,1.91-1.11,2.73-1.87,1.28-1.18,3.64-1.19,4.91,0,1.51,1.42,3,2.88,4.4,4.41,1.25,1.36,1.3,3.16.33,4.58-.56.83-1.33,1.47-2.06,2.15-1.34,1.24-2.91,1.9-4.73,2.02-1.02.06-2.03,0-3.05,0-1.76-.01-3.49-.3-5.18-.74-4.01-1.04-7.57-2.95-10.63-5.76-3.21-2.95-5.54-6.48-6.94-10.62-1.04-3.07-1.36-6.24-1.29-9.46.03-1.41.39-2.74,1.11-3.95.7-1.17,1.71-2.08,2.71-2.98,1.35-1.22,3.6-1.24,4.92,0,1.28,1.2,2.5,2.47,3.77,3.68.92.88,1.61,1.85,1.61,3.18,0,0-.15,1.14-.26,1.42Z"/><path class="cls-1" d="m1.48,63.58c1.42-.04,2.73-.29,3.76-.5,3.54-.71,7.08-1.43,10.63-2.14.17-.04.35-.07.52-.13,1.5-.55,2.85-.16,4.22.51,2.39,1.16,4.96,1.79,7.58,2.2,2.31.37,4.66.46,6.99.26,6.44-.55,12.24-2.77,17.3-6.85,3.87-3.11,6.83-6.92,8.93-11.41,1.2-2.56,2.02-5.25,2.45-8.04.37-2.4.5-4.81.31-7.26-.26-3.27-.95-6.42-2.17-9.45-1.29-3.21-3.1-6.12-5.36-8.76-2.91-3.39-6.38-6.02-10.38-7.94-2.5-1.2-5.14-2.03-7.89-2.49-2-.33-4.01-.55-6.03-.5-4.61.12-9,1.14-13.16,3.16-3.88,1.89-7.21,4.48-10.03,7.72-3.61,4.14-5.93,8.95-7.05,14.32-.47,2.25-.65,4.56-.6,6.86.08,3.19.61,6.3,1.62,9.33.4,1.19.8,2.41,1.44,3.49.51.87.26,1.71.09,2.54-.87,4.31-1.81,8.6-2.69,12.9-.12.58-.48,2.18-.48,2.18Z"/></svg>
                                    </div>
                                    <div class="option">
                                        <input type="radio" name="feedback-type-choose2">
                                        <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.7548 0.921519C23.653 0.83363 23.5292 0.775196 23.3967 0.75252C23.2641 0.729844 23.1279 0.743787 23.0028 0.792846L1.62846 9.15757C1.36848 9.2593 1.14853 9.44263 1.00162 9.68002C0.854718 9.91742 0.788798 10.1961 0.813763 10.4741C0.838727 10.7522 0.953227 11.0146 1.14007 11.2221C1.32691 11.4295 1.57601 11.5707 1.84995 11.6245L7.55792 12.7456V19.0938C7.55803 19.3881 7.64609 19.6756 7.8108 19.9195C7.9755 20.1634 8.20933 20.3525 8.48227 20.4626C8.75522 20.5727 9.05483 20.5987 9.34265 20.5372C9.63047 20.4758 9.89337 20.3298 10.0976 20.1179L12.9073 17.2038L17.2927 21.0481C17.5604 21.285 17.9055 21.4159 18.263 21.4162C18.4191 21.4158 18.5742 21.3913 18.7228 21.3434C18.9665 21.2663 19.1856 21.1267 19.3585 20.9385C19.5313 20.7503 19.6518 20.5201 19.7079 20.2708L23.9921 1.64609C24.0222 1.51515 24.016 1.37848 23.9742 1.2508C23.9324 1.12312 23.8565 1.00927 23.7548 0.921519ZM2.07881 10.3789C2.07477 10.368 2.07477 10.356 2.07881 10.3452C2.08358 10.3415 2.08893 10.3386 2.09463 10.3367L18.939 3.74281L8.04413 11.5475L2.09463 10.3831L2.07881 10.3789ZM9.18635 19.2383C9.15728 19.2684 9.11989 19.2893 9.07894 19.2981C9.03799 19.3069 8.99534 19.3034 8.95642 19.2879C8.91751 19.2724 8.88408 19.2456 8.86042 19.2111C8.83675 19.1765 8.82391 19.1357 8.82354 19.0938V13.621L11.9549 16.3632L9.18635 19.2383ZM18.475 19.985C18.4672 20.0207 18.45 20.0536 18.4251 20.0803C18.4003 20.107 18.3687 20.1266 18.3337 20.1369C18.2979 20.1494 18.2595 20.1521 18.2224 20.1447C18.1853 20.1373 18.1509 20.12 18.1227 20.0947L9.20745 12.2742L22.429 2.79886L18.475 19.985Z" fill="#383838"/></svg>
                                    </div>
                                </div>
                                <button>Оставить заявку</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
	<div class="row row-cols-1 row-cols-md-2 g-4 mb-2">
		<div class="col h-100 left-column">

			<!-- <div class="position-absolute btn-video top-0 end-0">
				<div class="block">Посмотреть Видео</div>
			</div> -->

			<!-- <div class="row">
			<div class="col">
				<h1 style="font-size: 1.4rem;" itemprop="name" class="h2 text-left">Галерея</h1>
			</div>
		</div> -->

			<!-- LEFT COLUMN -->

			<style>
				.slider-for img {
					display: block;
					width: 100%;
					height: calc(320px + 45%);
					object-fit: cover;
					object-position: center;
				}

				.slider-nav img {
					display: block;
					width: 100%;
					height: 70px;
					object-fit: cover;
					object-position: center;
				}
			</style>

			<div class="slider-for">

				<?php

				// $text_photo_data = types_render_field("text_photo", array(
				// 	"raw" => "true",
				// 	"output" => "",
				// 	"show_name" => "true",
				// 	"url" => "false",
				// 	"separator" => "|"
				// ));
				// $text_photo_array = explode("|",$text_photo_data);

				// if(isset($_COOKIE['debug'])) {
				// 	echo "<pre>";
				// 	var_dump($text_photo_array);
				// 	echo "</pre>";
				// }


				$previews = explode("|", types_render_field("photo", array("html" => "true", "output" => "", "proportional" => "true", "class" => "grunge", "width" => 620, "height" => 620, "show_name" => "false", "url" => "false", "separator" => "|"))); ?>

				<?php //var_dump($previews);
				?>

				<? if (@$video_src) { ?>

					<?
					$vido = str_replace("<p>", "", $vido);
					$vido = str_replace("</p>", "", $vido);
					$vido = str_replace("</iframe><br>", "</iframe>", $vido);
					$vido = str_replace("</iframe>", "</iframe><br>", $vido);
					$videos = explode('<br>', $vido);
					?>
					<? foreach ($videos as $item_video) {
						if ($item_video) { ?>
							<div class="slide youtube">
								<?= $item_video ?>
								<!--<iframe id="player" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player" src="<?= $video_src ?>?enablejsapi=1&amp;origin=https%3A%2F%2Farenda-attrakcionov.ru&amp;widgetid=1" width="100%" height="450" frameborder="0"></iframe>-->
								<!--<div id="player"></div>-->
							</div>
						<? } ?>
					<? } ?>

				<?php } ?>
				<? //var_dump($previews);
				//unset($previews);
				?>

				<? for ($i = 0; $i < count($previews); $i++) {
					if (!empty($previews[$i])) {
						$previews[$i] = str_replace('http://', 'https://', $previews[$i]); ?>

						<div class="slide">
							<!-- <img class="grunge" src="<? echo $previews[$i]; ?>"/> -->
							<? echo $previews[$i]; ?>
						</div>

				<?php
					}
				} ?>

			</div>

			<div class="slider-nav">
				<? if (is_array($videos) && $videos) {
					foreach ($videos as $item_video) { ?>
						<? if ($item_video) { ?>
							<div class="slide youtube-mini" style="background-image:url('https://img.youtube.com/vi/<?= explode('"', explode('/', stristr($item_video, 'ed/'))[1])[0] ?>/maxresdefault.jpg');">
								<div class="play-video position-absolute top-50 start-50 translate-middle"><img class="grunge w-100 h-100" src="/wp-content/uploads/qwqwe.png" width="56" height="56"></div>
							</div>
						<? } ?>
					<? } ?>
				<? } ?>
				<!--<div class="slide">
						<img class="grunge w-100 h-100" src="<? echo $previews[$i]; ?>" width="192" height="192" />
					</div>-->
				<? $previews = explode("|", types_render_field("photo", array("raw" => "true", "output" => "", "show_name" => "false", "url" => "false", "separator" => "|")));
				for ($i = 0; $i < count($previews); $i++) {
					if ($previews[$i] != "") {
						$previews[$i] = str_replace('http://', 'https://', $previews[$i]); ?>
						<div class="slide">
							<img class="grunge w-100 h-100" src="<? echo $previews[$i]; ?>" width="192" height="192" />
						</div>
				<?php
					}
				} ?>

				<?php if (@$video_src) { ?>

					<!--<div class="slide">
						<div class="d-flex h-100 w-100 align-items-stretch video-thumb">
							<img class="grunge w-100 h-100" src="https://img.youtube.com/vi/<?= $video_src ?>/mqdefault.jpg" width="192" height="192" />
							<div class="play-video position-absolute top-50 start-50 translate-middle"><img class="grunge w-100 h-100" src="<?php echo get_template_directory_uri(); ?>/images/new/desktop_play.png" width="56" height="56" /></div>
						</div>
					</div>-->

				<?php } ?>

			</div>

			<!-- LEFT COLUMN -->

		</div>
		<div class="col right-column justify-content-center">

			<div>
				<?php /* <div class="tooltip feedback_form" title="Узнай подробно про страхование от опозданий у менеджера по телефону"><?="<img style='height:54px;' src='".get_template_directory_uri()."/images/product/btn-warranty.png'>"?></div> */ ?>
				<?php
				$price = get_post_meta($post->ID, 'wpcf-price_stuff', true);
				$price = number_format((int)$price, 0, '', '');
				?>
				<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
					<span itemprop="ratingValue"><?= $trating ?></span>
				</div>
				<div itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer">
					<meta itemprop="lowPrice" content="<?php echo esc_attr($price) ?>">
					<meta itemprop="priceCurrency" content="RUB">
				</div>

				<div class="time card h-100 p-4 w-100 mb-4" style="background: rgba(254, 93, 38, 0.02);">
					<p class="head" style="text-align: center;font-size: 1.4rem;">Время и стоимость</p>
					<?
					echo types_render_field("time", array(
						"raw" => "true",
						"output" => "",
						"show_name" => "true",
						"url" => "false"
					));
					?>
				</div>
			</div>

			<?php
			$specifications_data = types_render_field("specifications", array(
				"raw" => "true",
				"output" => "",
				"show_name" => "true",
				"url" => "false",
				"separator" => "|"
			));
			$specifications = explode("|", $specifications_data);
			$lastLinkSpec = array_pop($specifications);
			?>


			<div class="mobile-container-info-buttons btn-group w-100 mb-2" role="group" aria-label="">
				<input type="radio" class="btn-check" name="btnradioinfo" id="btnradioinfo1" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#priceTab" aria-expanded="true" aria-controls="priceTab">
				<label class="btn btn-outline-primary" for="btnradioinfo1">Опции</label>

				<input type="radio" class="btn-check" name="btnradioinfo" id="btnradioinfo3" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#specificationTab" aria-expanded="false" aria-controls="specificationTab">
				<label class="btn btn-outline-primary" for="btnradioinfo3">Тех. Инфо</label>
			</div>
			<div id="mobile-container-info-content" class="w-100">
				<div class="collapse show" id="priceTab">
					<div class="card-body price">

						<?php

						if (get_field('dop_options_carousel_1')) {

							$titleOptionsCarousel = get_field('title_options_carousel');
							if (!empty($titleOptionsCarousel)) {
								echo "<p class=\"head\" style=\"text-align: center;font-size: 1.4rem;\">$titleOptionsCarousel</p>";
							}


							$dop_options_carousel = [];

							for ($i = 1; $i <= 6; $i++) {
								$field = get_field('dop_options_carousel_' . $i);
								if (empty($field) || empty($field['dop_options_carousel_price'])) {
									break;
								}
								$dop_options_carousel[$i]['img'] = wp_get_attachment_image_src($field['dop_options_carousel_img'], 'thumb')[0];
								$dop_options_carousel[$i]['name'] = $field['dop_options_carousel_name'];
								$dop_options_carousel[$i]['price'] = $field['dop_options_carousel_price'];
								$dop_options_carousel[$i]['prefix'] = $field['dop_options_carousel_price_prefix'];
							}

							if (is_array($dop_options_carousel) && count($dop_options_carousel) > 0) {

								$html_options_carousel = '<div class="dop_options_carousel row mb-4">';
								foreach ($dop_options_carousel as $item) {


									if (empty((int) $item['price'])) {
										$html_options_carousel .= "<div class=\"col\"><div class=\"dop_options_carousel_item card h-100 text-center me-2\"><img class=\"aspect-16to9 img-fluid card-img-top\" src=\"{$item['img']}\"/><div class=\"card-body p-16to9\"><div class=\"card-body-content\"><div class=\"dop_options_carousel_item_name\">{$item['name']}</div></div></div></div></div>";
									} else {
										$html_options_carousel .= "<div class=\"col\"><div class=\"dop_options_carousel_item card h-100 text-center me-2\"><img class=\"aspect-16to9 img-fluid card-img-top\" src=\"{$item['img']}\"/><div class=\"card-body p-16to9\"><div class=\"card-body-content\"><div class=\"dop_options_carousel_item_name\">{$item['name']}</div></div></div><div class=\"dop_options_carousel_item_price card-footer\"><b>{$item['prefix']} " . number_format($item['price'], 0, '', ' ') . "<span> Р</span></b></div></div></div>";
									}
								}
								$html_options_carousel .= "</div>";

								echo $html_options_carousel;
							}
						}

						?>

						<script>
							jQuery(document).ready(function() {

								$('.dop_options_carousel').slick({
									infinite: false,
									autoplay: false,
									dots: false,
									arrows: true,
									fade: false,
									slidesToShow: 4,
									slidesToScroll: 1,
									responsive: [{
											breakpoint: 1024,
											settings: {
												slidesToShow: 4,
												slidesToScroll: 4
											}
										},
										{
											breakpoint: 600,
											settings: {
												slidesToShow: 2,
												slidesToScroll: 2
											}
										},
										{
											breakpoint: 480,
											settings: {
												slidesToShow: 2,
												slidesToScroll: 2
											}
										}
									]
								});

							});
						</script>

						<?php

						//}



						echo types_render_field("price", array(
							"raw" => "true",
							"output" => "",
							"show_name" => "true",
							"url" => "false"
						));
						$linkPartner = types_render_field("partner_link", array("output" => "raw"));
						if (!empty($linkPartner))
							echo "<font color=\"blue\">Так же вы можете <a class=\"buy\" title=\"купить аттракцион " . get_the_title() . "\" href=\"$linkPartner\"></a> данный аттракцион от производителя.</font>";
						?>
						<?php
						if (!empty($lastLinkSpec)) {
							echo "<div class=\"mt-4 justify-content-center\">$lastLinkSpec</div>";
						}
						?>
					</div>
				</div>
				<div class="collapse" id="specificationTab">
					<div class="card-body specifications">
						<?php /* <div class="tooltip dezinfaction" style="margin-left: 3px;" title="Подробная информация про дезинфекцию на мероприятии"><a href="/kerling-po-russki/" target="_blank"></a></div> */ ?>
						<?php

						if (!empty($specifications_data)) {
						?>
							<ul>
								<?php

								foreach ($specifications as $key => $value) {
									echo "<li>" . $value . "</li>";
								}
								?>
							</ul>
						<?php
						} else {
						?>
							<span class="nothing">
								Скоро здесь появится информация :)
							</span>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
	</div>

	<div class="container-fluid" id="item_block">
		<div class="stuff py-4 px-4">
			<div class="container">

				<div class="d-block" itemprop="description">
					<?

					//while(have_posts())
					//{
					//the_post();
					get_template_part('loop', 'single');
					wp_reset_query();
					//}
					?>
				</div>

			</div>
			<?	/*
						//wp_reset_query();
						$pid = $post->ID;
						$wp_session = WP_Session::get_instance();
						if($wp_session['viewed_posts'] == '') $wp_session['viewed_posts'] = '|';
						if(!preg_match("/\|".$pid."\|/is", $wp_session['viewed_posts']))
						{
							$wp_session['viewed_posts'] .= $pid.'|';
						}

						if($wp_session['viewed_posts'] != '')
						{
							$items = explode("|", $wp_session['viewed_posts']);
							foreach($items as $key=>$value)
							{
								$include_ids[] = $value;
							}
							echo "<div class=\"viewed\">";
								echo "<div class=\"cpt\">Вы смотрели ранее:</div>";
								echo "<a href=\"#\" class=\"prev\"></a>";
								echo "<div class=\"viewport\">";
									echo "<div class=\"container\">";
										query_posts( array('showposts' => '99', 'post_type' => 'post', 'post__in' => $include_ids) );
										while(have_posts())
										{
											the_post();
											get_template_part('loop', 'viewed');
										}
										wp_reset_query();
									echo "</div>";
								echo "</div>";
								echo "<a href=\"#\" class=\"next\"></a>";
							echo "</div>";
						}
						*/
			?>
			<div class="clear"></div>
			<div style="width: 100%;">
				<div style="width: 100%; margin: 0 auto; text-align: center;">
					<?php
					$cat_fiesta = 23;
					$cat_group = 24;
					$categories = get_the_category($pid);
					if (is_category($cat_fiesta, $pid) || in_category($cat_fiesta, $pid) || post_is_in_descendant_category($cat_fiesta, $pid)) {

						echo "<div style=\"display: inline-block; color: #FFFFFF; min-width: 49%;\"><span>Праздники:</span><br><span>";

						foreach ($categories as $cat) {

							if ($cat->category_parent == $cat_fiesta) {
								$url = parse_url(get_category_link($cat->cat_ID));
								$link = basename($url['path']);
								$links .= "<a title=\"$cat->name\" style=\"color: #FFFFFF;\" target=\"_blank\" href=\"//{$url['host']}/$link\">$cat->name</a>, ";
							}
						}
						$links = substr_replace($links, '', -2, -1);
						echo "$links</span></div>";
						$links = '';
					}
					?>


					<?php

					if (is_category($cat_group, $pid) || in_category($cat_group, $pid) || post_is_in_descendant_category($cat_group, $pid)) {
						echo "<div style=\"display: inline-block; color: #FFFFFF; min-width: 49%;\"><span>Группы:</span><br><span>";
						foreach ($categories as $cat) {

							if ($cat->category_parent == $cat_group) {
								$url = parse_url(get_category_link($cat->cat_ID));
								$link = basename($url['path']);
								$links .= "<a title=\"$cat->name\" style=\"color: #FFFFFF;\" target=\"_blank\" href=\"//{$url['host']}/$link\">$cat->name</a>, ";
							}
						}
						$links = substr_replace($links, '', -2, -1);
						echo "$links</span></div>";
					}

					?> </div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div>

		<div class="h2">Выгодные предложения</div>
		<div class="vie mb-4">
			<div class="wrap-dop-place row">
				<div class="container w-100 slider-pre"><!--scrollbar-rail-->
					<div class="row justify-content-around">
						<?php

						$place_posts = [

							0 => [
								'name' => 'Шатры',
								'link' => '/arenda-shatrov/',
								'img' => '/images/product/banner_tent.jpg',
							],
							1 => [
								'name' => 'Мебель',
								'link' => '/arenda-mebeli/',
								'img' => '/images/product/banner_mebel1.jpg'
							],
							2 => [
								'name' => 'Фан-казино',
								'link' => '/vyezdnoe-fan-kazino/',
								'img' => '/images/product/banner_casino1.jpg'
							],
							3 => [
								'name' => 'Наша площадка',
								'link' => '/ploshchadka-dlya-meropriyatiy/',
								'img' => '/images/product/banner_atrium1.jpg',
							],
							// 3 => [
							// 	'name' => 'Фуд-корт',
							// 	'link' => '/fud-kort/',
							// 	'img' => '/images/product/banner_foodkourt1.jpg',
							// ],

						];

						foreach ($place_posts as $item) {

						?>

							<div class="item mx-0 my-2 col-6 col-lg-3 col-sm-6 card border-0 h-100">
								<img width="306" height="193" class="img-fluid" src="<?= get_template_directory_uri() . $item['img'] ?>" />
								<div class="card-body p-0 m-o">
									<a class="title stretched-link" title="" target="_blank" href="<?= $item['link'] ?>"></a>
								</div>
							</div>

						<?php
						}
						?>
					</div>

				</div>

			</div>

			<!-- <div style="text-align: right;"> -->
			<!-- <a class="btn bg-orange loftForEvent" id="moredesc0" href="javascript:void(0)"><span class="upstr">показать все</span></a> -->
			<!-- </div> -->
		</div>

		<?php
		$dop_oborud = rwmb_meta('meta_select_post_posts');

		if (is_array($dop_oborud) && count($dop_oborud) > 0 && !in_array("", $dop_oborud)) {
			$dop_oborud = implode(',', $dop_oborud);
		?>
			<div class="h2">Дополнительное оборудование</div>
			<div class="vie mb-2">
				<div class="wrap-dop row">
					<div class="container slider-dop dopobor col">
						<?php

						$dop_posts = get_posts(array('include' => $dop_oborud, 'orderby' => 'post__in'));

						foreach ($dop_posts as $post) {

							setup_postdata($post);

						?>

							<div class="item card border-0 h-100">
								<div class="single-carousel-cart-img" style="background-image:url('<?= get_the_post_thumbnail_url($post->ID, 'full') ?>')">

								</div>
								<? // get_the_post_thumbnail(null, array(150, 150), array('class' => "mx-auto border border-2 border-light"))
								?>
								<div class="card-body">
									<!-- <div class="card-body-content"> -->
									<a class="title stretched-link" title="<?= get_the_title() ?>" target="_blank" href="<?= get_permalink() ?>"><?= get_the_title() ?>
										<?
										if ((int)get_post_meta($post->ID, 'wpcf-is_myot', true) > 0) $ot = 'От ';
										else $ot = '';
										$pr = get_post_meta($post->ID, 'wpcf-price_stuff', true);
										if (!$pr) {
											$pr = 0;
										}
										?>
									</a>
									<!-- </div> -->
								</div>
								<div class="card-footer">
									<span class="price2"><?= $ot . number_format($pr, 0, '', ' ') ?></span>
									<span class="rur">p<span>уб.</span></span>
								</div>
							</div>
						<?php
						}
						?>

					</div>

				</div>

				<!--<div class="minimaze" style="text-align: right;">
						<a class="btn bg-orange loftForEvent" id="moredesc1" href="javascript:void(0)"><span class="upstr">показать все</span></a>
					</div>-->
			</div>
			<?php
			wp_reset_postdata();
			?>

			<script>
				jQuery(document).ready(function() {


					$('.dopobor').slick({
						infinite: false,
						autoplay: false,
						dots: false,
						arrows: true,
						fade: false,
						slidesToShow: 4,
						slidesToScroll: 4,
						responsive: [{
								breakpoint: 1024,
								settings: {
									slidesToShow: 3,
									slidesToScroll: 3
								}
							},
							{
								breakpoint: 600,
								settings: {
									slidesToShow: 2,
									slidesToScroll: 2
								}
							},
							{
								breakpoint: 480,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
							}
						]
					});

				});
			</script>

		<?php
		}
		?>

		<?php
		$dop_oborud = rwmb_meta('meta_select_post_dopattrakcion');

		if (is_array($dop_oborud) && count($dop_oborud) > 0 && !in_array("", $dop_oborud)) {
			$dop_oborud = implode(',', $dop_oborud);
		?>
			<div class="h2">Похожие позиции</div>
			<div class="vie mb-2">
				<div class="wrap-dop row">
					<div class="container scrollbar-rail dopattr col">
						<?php

						$dop_posts = get_posts(array('include' => $dop_oborud, 'orderby' => 'post__in'));

						foreach ($dop_posts as $post) {

							setup_postdata($post);

						?>

							<div class="item card border-0 h-100">
								<div class="single-carousel-cart-img" style="background-image:url('<?= get_the_post_thumbnail_url($post->ID, 'full') ?>')">

								</div>
								<? // get_the_post_thumbnail(null, array(150, 150), array('class' => "mx-auto border border-2 border-light"))
								?>
								<div class="card-body">
									<a class="title stretched-link" title="<?= get_the_title() ?>" target="_blank" href="<?= get_permalink() ?>"><?= get_the_title() ?>
										<?
										if ((int)get_post_meta($post->ID, 'wpcf-is_myot', true) > 0) $ot = 'От ';
										else $ot = '';
										$pr = get_post_meta($post->ID, 'wpcf-price_stuff', true);
										if (!$pr) {
											$pr = 0;
										}
										?>
									</a>

								</div>
								<div class="card-footer">
									<span class="price2"><?= $ot . number_format($pr, 0, '', ' ') ?></span>
									<span class="rur">p<span>уб.</span></span>
								</div>
							</div>
						<?php
						}
						?>

					</div>

				</div>

				<!--<div class="minimaze" style="text-align: right;">
						<a class="btn bg-orange loftForEvent" id="moredesc2" href="javascript:void(0)"><span class="upstr">показать все</span></a>
					</div>-->
			</div>
			<?php
			wp_reset_postdata();
			?>

			<script>
				jQuery(document).ready(function() {


					$('.dopattr').slick({
						infinite: false,
						autoplay: false,
						dots: false,
						arrows: true,
						fade: false,
						slidesToShow: 4,
						slidesToScroll: 4,
						responsive: [{
								breakpoint: 1024,
								settings: {
									slidesToShow: 3,
									slidesToScroll: 3
								}
							},
							{
								breakpoint: 600,
								settings: {
									slidesToShow: 2,
									slidesToScroll: 2
								}
							},
							{
								breakpoint: 480,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
							}
						]
					});

				});
			</script>

		<?php
		}
		?>
		<!--<script>
				$('.slider-for').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					// fade: true,
					asNavFor: '.slider-nav'
				});
				$('.slider-nav').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					asNavFor: '.slider-for',
					adaptiveHeight: true,
					dots: false,
					centerMode: false,
					focusOnSelect: true
				});

				$.fancybox.defaults.hideScrollbar = false;

				$('.right-column .time table tbody tr td img, .right-column .price table tbody tr td img, body.single-post .slider-for .slick-slide img').on("load", function() {
					$(this).fancybox({
						href: $(this).attr('src'),
						openEffect: 'none',
						closeEffect: 'none',
						autoCenter: true,
						helpers: {
							overlay: {
								locked: false
							}
						}
						// afterLoad: function () {
						// 	this.content = this.content.html();
						// }
					});
				});
				$('.right-column .price table tbody tr td .thumbnail ins').on("click", function(event) {
					$(this).next().find("img").click();

				});
				$('.right-column .time > table tr').toggleClass('row');
				$('.right-column .price > table tr').toggleClass('grid');
				//let lnghColTime = $('.right-column .time > table tr td').length;
				let lnghColPrice = $('.right-column .price > table tr td').length;

				$('.right-column .time > table tr').each(function() {
					let lnghColTime = $(this).find('td').length;
					//console.log(lnghColTime);
					if (lnghColTime > 1 && lnghColTime < 4) {
						$(this).find('td:nth-child(1)').toggleClass('col').css({
							'width': 'auto',
							'height': 'auto'
						});
						$(this).find('td:nth-child(2)').toggleClass('col col-md-auto p-0');
						$(this).find('td:nth-child(3)').toggleClass('col col-lg-2');
					} else if (lnghColTime == 4) {
						$(this).find('td:nth-child(1)').toggleClass('col').css({
							'width': 'auto',
							'height': 'auto'
						});
						$(this).find('td:nth-child(2)').toggleClass('col col-md-auto p-0');
						$(this).find('td:nth-child(3)').toggleClass('col col-lg-2');
						$(this).find('td:nth-child(4)').toggleClass('col col-lg-2');
					} else {
						$(this).find('td:nth-child(1)').toggleClass('col').css({
							'width': 'auto',
							'textAlign': 'inherit!important',
							'height': 'auto'
						});
					}
				});

				$('.right-column .price > table tr').each(function() {
					let lnghColPrice = $(this).find('td').length;
					//console.log(lnghColTime);
					if (lnghColPrice > 1 && lnghColPrice < 4) {
						$(this).find('td:nth-child(1)').toggleClass('g-col-4').css({
							'width': 'auto',
							'height': 'auto'
						});
						$(this).find('td:nth-child(2)').toggleClass('g-col-4').css({
							'width': 'auto',
							'height': 'auto'
						});
						$(this).find('td:nth-child(3)').toggleClass('g-col-4').css({
							'width': 'auto',
							'height': 'auto'
						});
					} else if (lnghColPrice == 4) {
						$(this).find('td:nth-child(1)').toggleClass('g-col-3').css({
							'width': 'auto',
							'height': 'auto'
						});
						$(this).find('td:nth-child(2)').toggleClass('g-col-3');
						$(this).find('td:nth-child(3)').toggleClass('g-col-3');
						$(this).find('td:nth-child(4)').toggleClass('g-col-3');
					} else {
						$(this).find('td:nth-child(1)').toggleClass('g-col').css({
							'width': 'auto',
							'textAlign': 'inherit!important',
							'height': 'auto'
						});
					}
				});

				document.addEventListener('DOMContentLoaded', () => {

					let button = document.getElementById('burger'),
						span = button.getElementsByTagName('span')[0];
					//$('#mobile-container-menu-content .collapse').collapse({ toggle: false, parent: $('#mobile-container-menu-content') });
					$('.mobile-container-info-buttons .btn-check').click(e => {
						e.preventDefault();
						$('#mobile-container-info-content .collapse.show').collapse('hide');
					});

					// $('#burger').on('show.bs.dropdown', function() {
					// 	console.log("show");
					// }).on('shown.bs.dropdown', function() {
					// 	console.log("shown");
					// }).on('hide.bs.dropdown', function() {
					// 	console.log("hide");
					// }).on('hidden.bs.dropdown', function() {
					// 	console.log("hidden");
					// });
				});
			</script>-->
	</div>
</div>


<?php get_footer('new'); ?>
<script>
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		// fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		adaptiveHeight: true,
		dots: false,
		centerMode: false,
		focusOnSelect: true
	});

	$.fancybox.defaults.hideScrollbar = false;

	$('.right-column .time table tbody tr td img, .right-column .price table tbody tr td img, body.single-post .slider-for .slick-slide img').on("load", function() {
		$(this).fancybox({
			href: $(this).attr('src'),
			openEffect: 'none',
			closeEffect: 'none',
			autoCenter: true,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});
	}).each(function() {
		if (this.complete) {
			$(this).trigger('load');
		};
	});

	$('.right-column .price table tbody tr td .thumbnail ins').on("click", function(event) {
		$(this).next().find("img").click();

	});
	$('.right-column .time > table tr').toggleClass('row');
	$('.right-column .price > table tr').toggleClass('grid');
	//let lnghColTime = $('.right-column .time > table tr td').length;
	let lnghColPrice = $('.right-column .price > table tr td').length;

	$('.right-column .time > table tr').each(function() {
		let lnghColTime = $(this).find('td').length;
		//console.log(lnghColTime);
		if (lnghColTime > 1 && lnghColTime < 4) {
			$(this).find('td:nth-child(1)').toggleClass('col').css({
				'width': 'auto',
				'height': 'auto'
			});
			$(this).find('td:nth-child(2)').toggleClass('col col-md-auto p-0');
			$(this).find('td:nth-child(3)').toggleClass('col col-lg-2');
		} else if (lnghColTime == 4) {
			$(this).find('td:nth-child(1)').toggleClass('col').css({
				'width': 'auto',
				'height': 'auto'
			});
			$(this).find('td:nth-child(2)').toggleClass('col col-md-auto p-0');
			$(this).find('td:nth-child(3)').toggleClass('col col-lg-2');
			$(this).find('td:nth-child(4)').toggleClass('col col-lg-2');
		} else {
			$(this).find('td:nth-child(1)').toggleClass('col').css({
				'width': 'auto',
				'textAlign': 'inherit!important',
				'height': 'auto'
			});
		}
	});

	$('.right-column .price > table tr').each(function() {
		let lnghColPrice = $(this).find('td').length;
		//console.log(lnghColTime);
		if (lnghColPrice > 1 && lnghColPrice < 4) {
			$(this).find('td:nth-child(1)').toggleClass('g-col-4').css({
				'width': 'auto',
				'height': 'auto'
			});
			$(this).find('td:nth-child(2)').toggleClass('g-col-4').css({
				'width': 'auto',
				'height': 'auto'
			});
			$(this).find('td:nth-child(3)').toggleClass('g-col-4').css({
				'width': 'auto',
				'height': 'auto'
			});
		} else if (lnghColPrice == 4) {
			$(this).find('td:nth-child(1)').toggleClass('g-col-3').css({
				'width': 'auto',
				'height': 'auto'
			});
			$(this).find('td:nth-child(2)').toggleClass('g-col-3');
			$(this).find('td:nth-child(3)').toggleClass('g-col-3');
			$(this).find('td:nth-child(4)').toggleClass('g-col-3');
		} else {
			$(this).find('td:nth-child(1)').toggleClass('g-col').css({
				'width': 'auto',
				'textAlign': 'inherit!important',
				'height': 'auto'
			});
		}
	});

	document.addEventListener('DOMContentLoaded', () => {

		let button = document.getElementById('burger'),
			span = button.getElementsByTagName('span')[0];
		//$('#mobile-container-menu-content .collapse').collapse({ toggle: false, parent: $('#mobile-container-menu-content') });
		$('.mobile-container-info-buttons .btn-check').click(e => {
			e.preventDefault();
			$('#mobile-container-info-content .collapse.show').collapse('hide');
		});

		// $('#burger').on('show.bs.dropdown', function() {
		// 	console.log("show");
		// }).on('shown.bs.dropdown', function() {
		// 	console.log("shown");
		// }).on('hide.bs.dropdown', function() {
		// 	console.log("hide");
		// }).on('hidden.bs.dropdown', function() {
		// 	console.log("hidden");
		// });
	});
</script>