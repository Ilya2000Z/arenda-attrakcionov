<?php
/*
Template Name: проведенные мастер классы
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
$cnt_list = get_field('cnt_list');function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>


<link rel="stylesheet" href="../wp-content/themes/my_theme/css/main.min.css">
<div class="main-content">
    <div class="container">
        <nav class="usual-breadcrumbs">
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
    </div>
    <section class="master-classes-catalogue no-border-bg">
        <div class="container">
            <h1 class="h1 title-with-margin">Проведенные мастер-классы</h1>
            <nav class="subcategories-wrapper">
                <div class="mobile-title">Фильтры</div>
                <div class="wrapper">
                    <div class="subcategory-link">Для девочек</div>
                    <div class="subcategory-link">Для мальчиков</div>
                    <div class="subcategory-link">Для малышей</div>
                    <div class="subcategory-link">Для подростков</div>
                </div>
            </nav>
            <div class="content-wrapper">
                <div class="master-class-catalogue-wrapper">
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                    <div class="swiper-slide held-mc-card">
                        <a href="#" class="img-link">
                            <img src="../wp-content/themes/my_theme/images/pic3.jpg" alt="">
                            <span class="text">Мехенди на выпускном для ребенка на корпоратив</span>
                        </a>
                    </div>
                </div>
                <div class="navigation-block">
                    <a href="#" class="show-more-btn">Показать еще</a>
                    <nav class="pagination-block">
                        <ul>
                            <li><a href="#"><<</a></li>
                            <li><a href="#"><</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li>...</li>
                            <li class="current">7</li>
                            <li>...</li>
                            <li><a href="#">12</a></li>
                            <li><a href="#">13</a></li>
                            <li><a href="#">></a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </nav>
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

