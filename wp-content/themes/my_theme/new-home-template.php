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
<div class="container">
    <div class="categories-cards">
        <span class="title-headline"><?= $posts_list_ttl ? $posts_list_ttl : 'аттракционы, товары и услуги' ?></span>
        <div class="categories-cards-list row">
            <div class="storis-btn col-lg-4 col-sm-3 col-6">
            </div>
            <? $i = 1; foreach($post_list as $item) {
                if ($item['метка']) {
                    $title = $item['название'] ? : $item['метка']->name;
                    $image = types_render_termmeta("thumbsfortags", array( "term_id" => $item['категория']->term_id, "class" => 'categories-cards-list__image', "alt" => $title, "width" => "183", "height" => "185" ) );
                    $link = get_term_link($item['метка']);
                } elseif ($item['категория']) {
                    $title = $item['название'] ? : $item['категория']->name;
                    $image = types_render_termmeta("thumbsforcats", array( "term_id" => $item['категория']->term_id, "class" => 'categories-cards-list__image', "alt" => $title, "width" => "183", "height" => "185" ) );
                    $link = get_term_link($item['категория']);
                } elseif ($item['запись']) {
                    $title = $item['запись'][0]->post_title;
                    $image = '<img class="categories-cards-list__image" width="183" height="185" src="'.get_the_post_thumbnail_url($item['запись'][0]->ID).'" alt="'.$title.'" title="'.$title.'">';
                    $link = get_the_permalink($item['запись'][0]->ID);
                }
                ?>
                <? if($i > 10 && !wp_is_mobile()) { break; }?>
                <a href="<?= $link ?>" class="categories-cards-list__item col-lg-2 col-sm-3 col-6" style="<?= $i > 9 && wp_is_mobile() ? 'display:none;' : ''; ?>">
                    <? if(!wp_is_mobile()) { ?>
                        <!--<img class="categories-cards-list__image" width="183" height="185" src="<?= $image ?>" alt="<?= $title ?>" title="<?= $title ?>">-->
                        <?= $image ?>
                    <? } ?>
                    <img class="categories-cards-list__image--icon" width="50" height="40" src="<?= $item['иконка'] ?>" alt="<?= $title ?>" title="<?= $title ?>">
                    <span class="categories-cards-list__title"><?= $title ?></span>
                </a>
                <? $i++; } ?>
        </div>
        <? if(wp_is_mobile()) { ?>
            <span class="categories-cards-list__loadmore categories-cards-list__loadmore--mobile orange-btn orange-btn--transparent"><span>Загрузить еще</span></span>
        <? } ?>
        <? if(!wp_is_mobile()) { ?>
            <div class="categories-cards-list row categories-cards-list--loadmore" style="display:none">
                <? $i = 1; $ii = 0; foreach($post_list as $item) { ?>
                    <? if($i <= 10) { $i++; continue; }
                    if ($item['метка']) {
                        $title = $item['название'] ? : $item['метка']->name;
                        $image = types_render_termmeta("thumbsfortags", array( "term_id" => $item['категория']->term_id, "class" => 'categories-cards-list__image', "alt" => $title, "width" => "183", "height" => "185" ) );
                        $link = get_term_link($item['метка']);
                    } elseif ($item['категория']) {
                        $title = $item['название'] ? : $item['категория']->name;
                        $image = types_render_termmeta("thumbsforcats", array( "term_id" => $item['категория']->term_id, "class" => 'categories-cards-list__image', "alt" => $title, "width" => "183", "height" => "185" ) );
                        $link = get_term_link($item['категория']);
                    } elseif ($item['запись']) {
                        $title = $item['запись'][0]->post_title;
                        $image = '<img class="categories-cards-list__image" width="183" height="185" src="'.get_the_post_thumbnail_url($item['запись'][0]->ID).'" alt="'.$title.'" title="'.$title.'">';
                        $link = get_the_permalink($item['запись'][0]->ID);
                    }
                    ?>
                    <a href="<?= $link ?>" class="categories-cards-list__item col-lg-2 col-sm-3 col-6">
                        <? if(!wp_is_mobile()) { ?>
                            <!--<img class="categories-cards-list__image" width="183" height="185" src="<?= $image ?>" alt="<?= $title ?>" title="<?= $title ?>">-->
                            <?= $image ?>
                        <? } ?>
                        <img class="categories-cards-list__image--icon" width="50" height="40" src="<?= $item['иконка'] ?>" alt="<?= $title ?>" title="<?= $title ?>">
                        <span class="categories-cards-list__title"><?= $title ?></span>
                    </a>
                    <? $ii++; } ?>
            </div>
            <? if($ii > 0) { ?>
                <span class="categories-cards-list__loadmore categories-cards-list__loadmore--show orange-btn orange-btn--transparent"><span>Загрузить еще <?= $ii ?></span><span style="display:none;">Скрыть</span></span>
            <? } ?>
        <? } ?>
    </div>
</div>
<div class="container">
    <?= do_shortcode('[sales_shortcode]') ?>
</div>
<div class="infoblock-wrapper">
    <div class="container">
        <div class="infoblock row">
            <div class="infoblock__col col-lg-6 col-12">
                <span class="infoblock__title"><?= $info_ttl ?></span>
                <p class="infoblock__txt">
                    <?= $info_txt ?>
                </p>
                <div class="infoblock__footer row">
                    <a target="_blank" href="<?= $info_lnk_btn ?>" class="orange-btn orange-btn--info col-lg-5 col-12"><?= $info_txt_btn ?></a>
                    <span class="infoblock__footer-txt col-lg-7 col-12"><?= $info_sml_txt_btn ?></span>
                </div>
            </div>
            <div class="infoblock__col col-lg-6 col-12" style="background-image:url('<?= $info_img ?>')">
            </div>
        </div>
    </div>
</div>
<div class="content-blocks-wrapper">
    <div class="container">
        <div class="content-blocks row">
            <? $i = 1; $count_cnt = count($cnt_list); foreach($cnt_list as $item) { ?>
                <div class="content-blocks__item row col-lg-12 <?= $i == $count_cnt && ($count_cnt % 2) != 0 ? 'col-sm-12' : 'col-sm-6' ?>">
                    <div class="content-blocks__item-col col-lg-6 col-12">
                        <?= $item['ttl'] ? '<h3>'.$item['ttl'].'</h3>' : '' ?>
                        <?= $item['txt'] ?>
                    </div>
                    <div class="content-blocks__item-col col-lg-6 col-12">
                        <div class="content-blocks__slider">
                            <? foreach($item['imgs'] as $itm) { ?>
                                <div>
                                    <img class="grunge content-blocks__slider-img" src="<?= $itm['картинка'] ?>" title="" alt="">
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
                <? $i++; } ?>
        </div>
    </div>
</div>
<div class="custom-modal" style="visibility:hidden;">
    <div class="custom-modal_close">x</div>
    <div class="slider center single-item">
        <? $storis = get_field('наши_сторис', 'options'); foreach($storis as $v) { ?>
            <div class="slide slick-slide">
                <div class="slide-inner slide-video">
                    <div class="slide-content">
                        <video preload="auto" muted playsinline="true">
                            <source src="<?= $v['ссылка_на_видео'] ?>" type='video/mp4;'>
                        </video>
                        <div class="sound-control sound-control_unmute"></div>
                        <div class="iplay"></div>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
    <div class="progressBarContainer">
        <? $i=0; foreach($storis as $v) { ?>
            <div><span data-slick-index="<?= $i ?>" class="progressBar"></span></div>
            <? $i++;} ?>
    </div>
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