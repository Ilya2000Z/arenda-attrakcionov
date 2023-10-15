<?php
/**
 * Template Name: Главная редизайн
*/
get_header('new');
$main_slider = get_field('main_slider');
$post_list = get_field('post_list_копия');
$posts_list_ttl = get_field('posts_list_ttl');
$info_ttl = get_field('info_ttl');
$info_txt = get_field('info_txt');
$info_txt_btn = get_field('info_txt_btn');
$info_lnk_btn = get_field('info_lnk_btn');
$info_sml_txt_btn = get_field('info_sml_txt_btn');
$info_img = get_field('info_img');
$cnt_list = get_field('cnt_list');
?>
<div class="container home-slider-wrapper">
	<div class="home-slider" style="max-height:400px;overflow: hidden;">
		<? foreach($main_slider as $slide) { ?>
			<div class="home-slider__item" style="height:400px;background-image:url('<?= $slide['img'] ?>')">
				<div class="home-slider__item-mob-img-wr" style="display:none;">
					<img class="home-slider__item-mob-img" src="<?= $slide['img'] ?>" alt="<?= $slide['ttl'] ?>" title="<?= $slide['ttl'] ?>">
				</div>
				<div class="home-slider__item-cnt">
					<span class="home-slider__item-title"><?= $slide['ttl'] ?></span>
					<a href="<?= $slide['lnk_btn'] ?>" class="orange-btn orange-btn--home-slider"><?= $slide['txt_btn'] ?></a>
				</div>
			</div>
		<? } ?>
	</div>
</div>
<div class="main-page">
    <div class="main-content">
    <div class="first-screen">
        <div class="bg-image">
            <img src="/wp-content/uploads/first-screen-bg-1.jpg" alt="foto">
        </div>
        <div class="container">
            <div class="columns-wrapper">
                <div class="left-col">
                    <div class="top round-block">
                        <h2 class="title">Мастер-классы</h2>
                        <div class="text-block">
                            <p>Более 200 выездных мастер-классов с выездом по Москве и МО. Наши высококлассные мастера помогут вам разнообразно и творчески провести досуг.</p>
                        </div>
                        <div class="advantages-wrapper">
                            <div class="orange-advantage-block">
                                <div class="main-text">200+</div>
                                <div class="small-text">Мастер-классов</div>
                            </div>
                            <div class="orange-advantage-block">
                                <div class="main-text">5 лет</div>
                                <div class="small-text">На рынке</div>
                            </div>
                            <div class="orange-advantage-block">
                                <div class="main-text infinity-symbol-wrapper"><span class="infinity-symbol">∞</span></div>
                                <div class="small-text">Всё включено</div>
                            </div>
                        </div>
                        <div class="orange-advantage-block">
                            <div class="main-text">Собственная студия</div>
                            <div class="small-text">В Москве</div>
                        </div>
                    </div>
                    <div class="bottom round-block">
                        <form>
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
                                        <input type="radio" name="feedback-type-choose" checked>
                                        <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.1" height="22.92" viewBox="0 0 65.74 64.96"><path d="m36.93,45.98c-1.12.08-1.97-.51-2.79-1.16-4.03-3.19-7.72-6.75-11.17-10.56-1.13-1.25-2.24-2.53-3.25-3.89-1.3-1.75-1.07-3.86.53-5.03.36-.27.8-.38,1.24-.47.98-.21,1.91-.57,2.71-1.17,1.09-.83,1.51-2.59,1.01-4.1-.27-.81-.59-1.61-1.07-2.34-2.13-3.24-3.88-6.69-5.61-10.15-.61-1.21-1.22-2.46-2.23-3.42-1.81-1.74-3.83-1.96-5.88-.52-2.27,1.59-4.45,3.32-6.3,5.41-1.69,1.9-2.42,4.16-2.24,6.67.14,1.87.86,3.59,1.62,5.28,2.62,5.85,5.75,11.41,9.63,16.53,3.01,3.97,6.34,7.65,10.09,10.94,6.05,5.31,12.74,9.62,20.09,12.89,1.72.77,3.41,1.6,5.27,2.04,3.23.76,5.95-.18,8.3-2.35,1.8-1.66,3.27-3.62,4.74-5.58,1.88-2.5.7-5.73-1.55-7.22-1.75-1.16-3.61-2.15-5.44-3.18-2.42-1.37-4.85-2.72-7.3-4.03-.96-.51-1.96-.92-3.1-.96-1.78-.06-2.85.83-3.58,2.34-.29.6-.4,1.25-.61,1.87-.49,1.46-1.49,2.17-3.03,2.17" style="fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px"/></svg>
                                    </div>
                                    <div class="option">
                                        <input type="radio" name="feedback-type-choose">
                                        <svg id="_Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" width="23.19" height="22.92" viewBox="0 0 65.74 64.96"><defs><style>.cls-1{fill:none;stroke:#383838;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px}</style></defs><path class="cls-1" d="m29.47,24.46c-.29.69-.78,1.23-1.3,1.75-1.97,1.98-2.11,5.46-.19,7.58,1.11,1.22,2.26,2.4,3.5,3.5,1.65,1.47,3.56,1.75,5.63,1.1,1.1-.34,1.91-1.11,2.73-1.87,1.28-1.18,3.64-1.19,4.91,0,1.51,1.42,3,2.88,4.4,4.41,1.25,1.36,1.3,3.16.33,4.58-.56.83-1.33,1.47-2.06,2.15-1.34,1.24-2.91,1.9-4.73,2.02-1.02.06-2.03,0-3.05,0-1.76-.01-3.49-.3-5.18-.74-4.01-1.04-7.57-2.95-10.63-5.76-3.21-2.95-5.54-6.48-6.94-10.62-1.04-3.07-1.36-6.24-1.29-9.46.03-1.41.39-2.74,1.11-3.95.7-1.17,1.71-2.08,2.71-2.98,1.35-1.22,3.6-1.24,4.92,0,1.28,1.2,2.5,2.47,3.77,3.68.92.88,1.61,1.85,1.61,3.18,0,0-.15,1.14-.26,1.42Z"/><path class="cls-1" d="m1.48,63.58c1.42-.04,2.73-.29,3.76-.5,3.54-.71,7.08-1.43,10.63-2.14.17-.04.35-.07.52-.13,1.5-.55,2.85-.16,4.22.51,2.39,1.16,4.96,1.79,7.58,2.2,2.31.37,4.66.46,6.99.26,6.44-.55,12.24-2.77,17.3-6.85,3.87-3.11,6.83-6.92,8.93-11.41,1.2-2.56,2.02-5.25,2.45-8.04.37-2.4.5-4.81.31-7.26-.26-3.27-.95-6.42-2.17-9.45-1.29-3.21-3.1-6.12-5.36-8.76-2.91-3.39-6.38-6.02-10.38-7.94-2.5-1.2-5.14-2.03-7.89-2.49-2-.33-4.01-.55-6.03-.5-4.61.12-9,1.14-13.16,3.16-3.88,1.89-7.21,4.48-10.03,7.72-3.61,4.14-5.93,8.95-7.05,14.32-.47,2.25-.65,4.56-.6,6.86.08,3.19.61,6.3,1.62,9.33.4,1.19.8,2.41,1.44,3.49.51.87.26,1.71.09,2.54-.87,4.31-1.81,8.6-2.69,12.9-.12.58-.48,2.18-.48,2.18Z"/></svg>
                                    </div>
                                    <div class="option">
                                        <input type="radio" name="feedback-type-choose">
                                        <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.7548 0.921519C23.653 0.83363 23.5292 0.775196 23.3967 0.75252C23.2641 0.729844 23.1279 0.743787 23.0028 0.792846L1.62846 9.15757C1.36848 9.2593 1.14853 9.44263 1.00162 9.68002C0.854718 9.91742 0.788798 10.1961 0.813763 10.4741C0.838727 10.7522 0.953227 11.0146 1.14007 11.2221C1.32691 11.4295 1.57601 11.5707 1.84995 11.6245L7.55792 12.7456V19.0938C7.55803 19.3881 7.64609 19.6756 7.8108 19.9195C7.9755 20.1634 8.20933 20.3525 8.48227 20.4626C8.75522 20.5727 9.05483 20.5987 9.34265 20.5372C9.63047 20.4758 9.89337 20.3298 10.0976 20.1179L12.9073 17.2038L17.2927 21.0481C17.5604 21.285 17.9055 21.4159 18.263 21.4162C18.4191 21.4158 18.5742 21.3913 18.7228 21.3434C18.9665 21.2663 19.1856 21.1267 19.3585 20.9385C19.5313 20.7503 19.6518 20.5201 19.7079 20.2708L23.9921 1.64609C24.0222 1.51515 24.016 1.37848 23.9742 1.2508C23.9324 1.12312 23.8565 1.00927 23.7548 0.921519ZM2.07881 10.3789C2.07477 10.368 2.07477 10.356 2.07881 10.3452C2.08358 10.3415 2.08893 10.3386 2.09463 10.3367L18.939 3.74281L8.04413 11.5475L2.09463 10.3831L2.07881 10.3789ZM9.18635 19.2383C9.15728 19.2684 9.11989 19.2893 9.07894 19.2981C9.03799 19.3069 8.99534 19.3034 8.95642 19.2879C8.91751 19.2724 8.88408 19.2456 8.86042 19.2111C8.83675 19.1765 8.82391 19.1357 8.82354 19.0938V13.621L11.9549 16.3632L9.18635 19.2383ZM18.475 19.985C18.4672 20.0207 18.45 20.0536 18.4251 20.0803C18.4003 20.107 18.3687 20.1266 18.3337 20.1369C18.2979 20.1494 18.2595 20.1521 18.2224 20.1447C18.1853 20.1373 18.1509 20.12 18.1227 20.0947L9.20745 12.2742L22.429 2.79886L18.475 19.985Z" fill="#383838"/></svg>
                                    </div>
                                </div>
                                <button>Оставить заявку</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right-col">
                    <img src="/wp-content/uploads/pic1-1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="container">
    <section class="master-classes-categories">
        <div class="container">
            <h2 class="h1 title-with-margin">Категории мастер-классов</h2>
            <div class="master-class-cards-wrapper">
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Кулинарные</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Для детей</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Для взрослых</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Для женщин</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Для мужчин</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Корпоративные</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Творческие</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Роспись</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Быстрые</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Экологические</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Популярные</p>
                </div>
                <div class="master-class-card">
                    <a href="#" class="link"></a>
                    <img src="/wp-content/uploads/mc1-1.jpg" alt="">
                    <p class="text">Тематические</p>
                </div>
            </div>
        </div>
    </section>
</div>
<div>
    <section class="profitable-offers-section">
        <div class="container">
            <h2 class="h1 title-with-margin">Выгодные предложения</h2>
            <div class="three-items-slider">
                <div class="swiper">
                    <div class="swiper-wrapper popup-gallery">
                        <div class="swiper-slide">
                            <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                <img src="/wp-content/uploads/pic2-1.png" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                <img src="/wp-content/uploads/pic2-1.png" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                <img src="/wp-content/uploads/pic2-1.png" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                <img src="/wp-content/uploads/pic2-1.png" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/wp-content/uploads/pic2-1.png" class="img-link">
                                <img src="/wp-content/uploads/pic2-1.png" alt="">
                            </a>
                        </div>





                    </div>
                </div>
                <div class="swiper-button-next"><span>></span></div>
                <div class="swiper-button-prev"><span><</span></div>
            </div>
        </div>
    </section>
</div>


<div>
    <section class="about-team-section">
        <div class="container">
            <h2 class="h1 title-with-margin">Наша команда профессионалов</h2>
            <div class="add-padding-border">
                <div class="about-team-wrapper">
                    <div class="text">
                        <p>Наша компания предоставляет услуги профессиональных ведущих мастер-классов. Мы сотрудничаем с опытными профессионалами, которые могут провести мастер-классы по различным темам, таким как кулинария, рукоделие, искусство и многое другое. Ведущие мастер-классов нашей компании имеют богатый опыт работы и готовы поделиться своими знаниями и навыками с участниками мастер-классов. Мы гарантируем интересное и познавательное времяпрепровождение для всех участников мероприятия. Наша компания предоставляет услуги профессиональных ведущих мастер-классов. Мы сотрудничаем с опытными профессионалами, которые могут провести мастер-классы по различным темам, таким как кулинария, рукоделие, искусство и многое другое.</p>
                    </div>
                    <div class="pictures">
                        <div class="team-person-card">
                            <div class="avatar">
                                <img src="/wp-content/uploads/ava-1.jpg" alt="">
                            </div>
                            <div class="name">Мария</div>
                        </div>
                        <div class="team-person-card">
                            <div class="avatar">
                                <img src="/wp-content/uploads/ava-1.jpg" alt="">
                            </div>
                            <div class="name">Сигизмундроздофил</div>
                        </div>
                        <div class="team-person-card">
                            <div class="avatar">
                                <img src="/wp-content/uploads/ava-1.jpg" alt="">
                            </div>
                            <div class="name">Анатолий</div>
                        </div>
                        <div class="team-person-card">
                            <div class="avatar">
                                <img src="/wp-content/uploads/ava-1.jpg" alt="">
                            </div>
                            <div class="name">Айран-Жульбан-Углы</div>
                        </div>
                        <div class="team-person-card">
                            <div class="avatar">
                                <img src="/wp-content/uploads/ava-1.jpg" alt="">
                            </div>
                            <div class="name">Мария</div>
                        </div>
                        <div class="team-person-card">
                            <div class="avatar">
                                <img src="/wp-content/uploads/ava-1.jpg" alt="">
                            </div>
                            <div class="name">Мария</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<div>
    <section class="held-masterclasses-section">
        <div class="container">
            <h2 class="h1 title-with-margin">Проведенные мастер-классы</h2>
            <div class="four-items-slider mb30">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide held-mc-card">
                            <a href="#" class="img-link">
                                <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                            </a>
                        </div>
                        <div class="swiper-slide held-mc-card">
                            <a href="#" class="img-link">
                                <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                            </a>
                        </div>
                        <div class="swiper-slide held-mc-card">
                            <a href="#" class="img-link">
                                <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                            </a>
                        </div>
                        <div class="swiper-slide held-mc-card">
                            <a href="#" class="img-link">
                                <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                <!-- думаю, размер этого текста, а именно количество символов надо регулировать на беке -->
                                <span class="text">Мехенди на выпускном для ребенка на корпоратив бла бла бла бла бла бла блша харикришнахарихари</span>
                            </a>
                        </div>
                        <div class="swiper-slide held-mc-card">
                            <a href="#" class="img-link">
                                <img src="/wp-content/uploads/pic3-1.jpg" alt="">
                                <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"><span>></span></div>
                <div class="swiper-button-prev"><span><</span></div>
            </div>
        </div>
    </section>
</div>


<div>
    <section class="feedback-global-section">
        <div class="container">
            <h2 class="h1 title-with-margin">Оставьте заявку</h2>
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
    </section>
</div>

<div>
    <section class="reviews-section">
        <div class="container">
            <h2 class="h1 title-with-margin">Отзывы</h2>
            <div class="any-items-slider reviews-slider">
                <div class="swiper">
                    <div class="swiper-wrapper popup-gallery">
                        <div class="swiper-slide review-slide">
                            <a class="img-link" href="/wp-content/uploads/review-1.jpg"><img src="/wp-content/uploads/review-1.jpg" alt=""></a>
                        </div>
                        <div class="swiper-slide review-slide">
                            <a class="img-link" href="/wp-content/uploads/review-1.jpg"><img src="/wp-content/uploads/review-1.jpg" alt=""></a>
                        </div>
                        <div class="swiper-slide review-slide">
                            <a class="img-link" href="/wp-content/uploads/review-1.jpg"><img src="/wp-content/uploads/review-1.jpg" alt=""></a>
                        </div>
                        <div class="swiper-slide review-slide">
                            <a class="img-link" href="/wp-content/uploads/review-1.jpg"><img src="/wp-content/uploads/review-1.jpg" alt=""></a>
                        </div>
                        <div class="swiper-slide review-slide">
                            <a class="img-link" href="/wp-content/uploads/review-1.jpg"><img src="/wp-content/uploads/review-1.jpg" alt=""></a>
                        </div>
                        <div class="swiper-slide review-slide">
                            <a class="img-link" href="/wp-content/uploads/review-1.jpg"><img src="/wp-content/uploads/review-1.jpg" alt=""></a>
                        </div>
                        <div class="swiper-slide review-slide">
                            <a class="img-link" href="/wp-content/uploads/review-1.jpg"><img src="/wp-content/uploads/review-1.jpg" alt=""></a>
                        </div>



                    </div>
                </div>
                <div class="swiper-button-next"><span>></span></div>
                <div class="swiper-button-prev"><span><</span></div>
            </div>
        </div>
    </section>
</div>


<div>
    <section class="faq-section">
        <div class="container">
            <h2 class="h1 title-with-margin">Часто задаваемые вопросы</h2>
            <div class="faq-wrapper">
                <div class="spoiler-block">
                    <div class="spoiler-title">Что такое выездные мастер-классы?</div>
                    <div class="spoiler-content">
                        <p>Выездные мастер-классы - это формат обучения, при котором наша студия приезжает к вам на место и проводит мастер-классы по выбранной теме.</p>
                    </div>
                </div>
                <div class="spoiler-block">
                    <div class="spoiler-title">Что такое выездные мастер-классы? Далеко-далеко за словесными, горами в стране гласных и согласных живут рыбные тексты.</div>
                    <div class="spoiler-content">
                        <p>Выездные мастер-классы - это формат обучения, при котором наша студия приезжает к вам на место и проводит мастер-классы по выбранной теме.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div>
    <section class="seo-section">
        <div class="container">
            <h2 class="h1 title-with-margin">Заголовок текста</h2>

            <div class="add-padding-border">
                <div class="text" title="Показать больше текста">
                    <p>Организовать корпоратив на природе, тимбилдинг или массовый праздник не сложно. Главное, чтобы гостям не было скучно. Заполнить досуг поможет аттракцион в аренду. Это хороший способ провести соревнования среди взрослых, занять веселыми играми детей. В компании Art-Active для праздника есть надувные батуты, интерактивные спартакиады, скалодром, выездные фотозоны. Доставка по Москве, безопасный монтаж и качество обслуживания.</p>
                    <p>Далеко-далеко за словесными горами, в стране гласных и согласных, живут рыбные тексты. Наш ее она вскоре, безорфографичный имеет возвращайся путь своего домах приставка но напоивший всемогущая предупредила мир которое, вопрос оксмокс пор точках рыбными там языком. Знаках первую моей дорогу, даль которое жаренные домах последний себя встретил использовало вершину свою рукописи за.</p>
                    <p>Далеко-далеко за словесными горами, в стране гласных и согласных, живут рыбные тексты. Наш ее она вскоре, безорфографичный имеет возвращайся путь своего домах приставка но напоивший всемогущая предупредила мир которое, вопрос оксмокс пор точках рыбными там языком. Знаках первую моей дорогу, даль которое жаренные домах последний себя встретил использовало вершину свою рукописи за.</p>
                    <p>Далеко-далеко за словесными горами, в стране гласных и согласных, живут рыбные тексты. Наш ее она вскоре, безорфографичный имеет возвращайся путь своего домах приставка но напоивший всемогущая предупредила мир которое, вопрос оксмокс пор точках рыбными там языком. Знаках первую моей дорогу, даль которое жаренные домах последний себя встретил использовало вершину свою рукописи за.</p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer('new');
?>
<script>
var $slickEl = $('.custom-modal .slider');
$slickEl.slick({
  centerMode: true,
  centerPadding: '100px',
  slidesToShow: 3,
  focusOnSelect: true,
  dots: false,
  infinite: false,
  responsive: [
	{
      breakpoint: 991,
      settings: {
		centerPadding: '0',
        arrows: true,
        centerMode: true,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
		centerPadding: '0',
        arrows: true,
        centerMode: true,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
		centerPadding: '0',
        arrows: true,
        centerMode: true,
        slidesToShow: 1
      }
    },
	  {
      breakpoint: 0,
      settings: {
		  centerPadding: '0',
        arrows: true,
        centerMode: true,
        slidesToShow: 1
      }
    }
  ]
});
$slickEl.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
  var i = (currentSlide ? currentSlide : 0) + 1;
});
var stopFlag = true;
var isVideo = false;
var currentVideo;
var stopTicking = false;
var poster = '';
var setLabel = false;
var isDisableElements = false;
var isPlaySound = false;
var glVideos;
var glSoundsControls;
var currentSlideAnal = 0;
var widgetTitle = '';
var widgetDescription = ``;
var widgetBtnTitle = '';
var widgetBtnLink = '#';
var isShowWidget = false;
var widgetBtnColor = '#583a88';
var widgetUtmsTrack = false;
//--------------------------
function stopSlider () {
  stopTicking = true;
  if (currentVideo && currentVideo.length && currentVideo.length !== 0) {
    currentVideo[0].pause();
  }
}
function startSlider () {
  stopTicking = false;
  if (currentVideo && currentVideo.length && currentVideo.length !== 0) {
    currentVideo[0].play();
  }
}
function checkIsVideoPlaying(videoElement) {
  return videoElement.currentTime > 0 && !videoElement.paused && !videoElement.ended && videoElement.readyState > 2;
}
function CreatePlayPauseElements () {
  $('.pause-control').remove()
  var soundsControls = $('.sound-control')
  function Pause () {
    $(this).removeClass('pause-control_pause')
    $(this).addClass('pause-control_play')
    glVideos[this.dataset.index].pause()
    stopSlider()
    this.removeEventListener('click', Pause)
    this.addEventListener('click', Play)
  }
  function Play () {
    $(this).removeClass('pause-control_play')
    $(this).addClass('pause-control_pause')
    glVideos[this.dataset.index].play()
    startSlider()
    this.removeEventListener('click', Play)
    this.addEventListener('click', Pause)
  }
  if (soundsControls.length > 0) {
    soundsControls.each(function(index, element) {
      $(element).after('<div data-index=' + index + ' class="pause-control pause-control_pause"></div>')
      document.getElementsByClassName('pause-control')[index].addEventListener('click', Pause)
    })
  }
}
setTimeout(function() {
  $('.custom-modal .slick-arrow').click(function() {
    CreatePlayPauseElements()
    startSlider()
	})
}, 500)
  glVideos = $('.sound-control').parent().find('video')
  $('.stop-slider').click(function() {
    stopSlider()
    $('.custom-modal .slider').slick("slickSetOption", "swipe", false);
  })
  $('.start-slider').click(function() {
    startSlider()
    $('.custom-modal .slider').slick("slickSetOption", "swipe", true);
  })
// Ticking machine
var defaultTime = 10;
var percentTime;
var tick;
var time = defaultTime;
var progressBarIndex = 0;
var slidesNumber = 5;
var slides = slidesNumber - 1
var unmuteClass = 'sound-control_unmute';
$('.progressBarContainer .progressBar').each(function (index) {
  var progress = "<div class='inProgress inProgress" + index + "'></div>";
  $(this).html(progress);
});
var isMuted = true;
var videos = $("video");
var soundControls = $('.sound-control');
var onceSoundControlMode = 'default'
soundControls.click(function(e) {
  if (isDisableElements) {
    return
  }
  e.stopPropagation();
  if (onceSoundControlMode == 'default') {
      isMuted = !isMuted;
      soundControls.toggleClass(unmuteClass, isMuted);
      $(videos).prop('muted', isMuted);
  }
  if (onceSoundControlMode == 'all_videos') {
      var video = $(this).parent().find('video')
      var curentSoundStatus = video.prop('muted')
      isMuted = !curentSoundStatus
      soundControls.toggleClass(unmuteClass, !curentSoundStatus);
      video.prop('muted', !curentSoundStatus)
  }
});
function startProgressbar() {
  resetProgressbar()
  const ItemsForFill = []
  for (var i = 0; i < progressBarIndex; i++) {
    $('.inProgress').eq(i).css({
      width: '100%'
    })
  }
  currentVideo = $('.custom-modal .slide').eq(progressBarIndex).find('video');
  isVideo = currentVideo.length !== 0;
  soundControls.hide();
  console.log(progressBarIndex)
  videos.each(function() {
    var video = $(this);
    if (progressBarIndex != 0) {
      onceSoundControlMode = 'default'
      video.prop('muted', isMuted)
    }
    video.get(0).currentTime = 0;
    video.get(0).pause();
  });
  if (isVideo) {
    var soundControl = $('.custom-modal .slide').eq(progressBarIndex).find('.sound-control');
    $(soundControl).show();
    currentVideo.on(
    "timeupdate",
    function(event){
      var that = this
      time = this.duration
      if (isNaN(time)) {
        var loadVideoTimer = setInterval(function() {
          if (!isNaN(that.duration)) {
            clearInterval(loadVideoTimer)
            time = that.duration
          }
        })
      }
    })
    var isPlaying = checkIsVideoPlaying(currentVideo);
    if (!isPlaying) {
      currentVideo[0].play();
    }
  } else {
    $('video').off()
    time = defaultTime
  }
  percentTime = 0;
  tick = setInterval(interval, 10);
}
function interval() {
  if (stopTicking) {
    return;
  }
  if (!($('.custom-modal .slider .slick-track div[data-slick-index="' + progressBarIndex + '"]').hasClass("slick-center"))) {
    progressBarIndex = $('.custom-modal .slider .slick-track div[class="slide slick-slide slick-current slick-center"]').attr("data-slick-index");
    startProgressbar();
  } else {
    if (stopFlag) {
      if (isVideo) {
      }
      percentTime += 1 / time;
      $('.inProgress' + progressBarIndex).css({
        width: percentTime + "%"
      });
      if (percentTime >= 100) {
        $('.custom-modal .slider').slick('slickNext');
        progressBarIndex++;
        currentVideo = $('.custom-modal .slide').eq(progressBarIndex).find('video')
        isVideo = currentVideo.length !== 0
        if (isVideo) {
          currentVideo.on(
          "timeupdate",
          function(event) {
            var that = this
            time = this.duration
            if (isNaN(time)) {
              var loadVideoTimer = setInterval(function() {
                if (!isNaN(that.duration)) {
                  clearInterval(loadVideoTimer)
                  time = that.duration
                  //console.log(time)
                }
              })
            }
          })
          currentVideo[0].currentTime = 0
        } else {
          $('video').off()
          time = defaultTime
        }
        if (progressBarIndex > slides) {
          stopProgressbar()
        } else {
          startProgressbar();
        }
      }
    }
  }
}
function resetProgressbar() {
  $('.inProgress').css({
    width: 0 + '%'
  });
  clearInterval(tick);
}
function stopProgressbar() {
  $('.inProgress .inProgress' + slides).css({
    width: 100 + '%'
  });
  clearInterval(tick);
}
$('.slick-replay').click(function () {
  clearInterval(tick);
  var goToThisIndex = $(this).find("span").attr("data-slick-index");
  $('.custom-modal .slider').slick('slickGoTo', 0);
  startProgressbar();
});
$('.iplay').click(function(){
	if(!$(this).hasClass('active')) {
		stopSlider();
	} else {
		startProgressbar();
	}
	$(this).toggleClass('active');
})
$('.progressBarContainer div').click(function () {
  if (isDisableElements) {
    return
  }
  startSlider()
  CreatePlayPauseElements()
  clearInterval(tick);
  var goToThisIndex = $(this).find("span").attr("data-slick-index");
  $('.custom-modal .slider').slick('slickGoTo', goToThisIndex, false);
  startProgressbar();
});
var $div = $('.slick-track .slick-slide:last-child');
var observer = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    if (mutation.attributeName === "class") {
      clearInterval(tick);
      var goToThisIndex = $(this).find("span").attr("data-slick-index");
      $('.custom-modal .slider').slick('slickGoTo', 0);
      startProgressbar();
    }
  });
});
observer.observe($div[0], {
  attributes: true
});
//startProgressbar();
$('.custom-modal .slide').click(function (e) {
  if ($(this).hasClass('slick-current')) {
    return;
  }
  if (isDisableElements) {
    return
  }
  startSlider()
  CreatePlayPauseElements()
  clearInterval(tick);
  var goToThisIndex = $(this).find("span").attr("data-slick-index");
  $('.custom-modal .slider').slick('slickGoTo', goToThisIndex, false);
  startProgressbar();
});
$('.storis-btn, .custom-modal_close').click(function(){
  $('.custom-modal').toggleClass('active');
  startProgressbar();
})
$('.custom-modal_close').click(function(){
	stopSlider();
})
/////////////
</script>