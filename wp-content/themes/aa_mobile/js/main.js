$.fn.clickToggle = function(a,b) {
  var ab = [b,a];
  return this.on("click", function(){ ab[this._tog^=1].call(this); });
};

$(function() {

    var color = $('#left_menu [data-color]').data('color');
    if(color){
        $("#content h1").css({'color':'#ffffff', 'backgroundColor':"#"+color});
    }

    $( window ).resize(function() {
        if($('.custom-container').hasClass('open'))
        {
            var w = parseInt(document.body.clientWidth) - 64;
            $('.custom-container, .custom-navbar').css('left',w+'px');
        }
    });

    $('#v-pills-photos-tab').tab('show');
    setTimeout(function() { $('#v-pills-video-tab').tab('show') }, 2000);

    $('.custom-navbar #categories, #menu .categories').clickToggle(function() {
       var w = parseInt(document.body.clientWidth) - 64;
        $('.sidebar').animate({
            left: '0'
        }, 500);
        $('.custom-container, .custom-navbar').addClass('open').animate({
            left: w+'px'
        }, 500);
    }, function() {
        var w =  64 - parseInt(document.body.clientWidth);
        $('.sidebar').animate({
            left: '-100%'
        }, 500);
        $('.custom-container, .custom-navbar').removeClass('open').animate({
            left: '0'
        }, 500);
    });

    $('.photos').slick({
      dots: false,
      infinite: false,
      arrows: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      adaptiveHeight: true,
      autoplay: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
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

    $('#slides').slick({
      dots: false,
      infinite: true,
      arrows: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      adaptiveHeight: true,
      autoplay: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
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