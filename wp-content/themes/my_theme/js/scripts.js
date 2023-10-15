var sliding = false;

var colors = [
    'FF7902',
    '00B1F1',
    '00D7A2',
    'FF6CB7',
    'BBA7F9',
    '00D3E5',
    'FF758D',
    '63D100',
    '00A3F3',
    'D2D927',
    '00D550',
    'FF7A6E',
    'BABABA',
    'FF758D',
    '00D7A2',
    'FF7A6E'
];

$(document).ready(function () {

    /* Обработки событий Метрики */
    var eeYm = setInterval(function () {
            if (typeof window.yaCounter24366505 != 'undefined') {

                var promoplatforma = document.getElementById('promo-platforma');
                var paramsYM = { 'params' : { 'userIP' : IP_ADDR } };


                if(promoplatforma) {
                    promoplatforma.addEventListener("click", function() {
                        yaCounter24366505.reachGoal('promo-platforma', paramsYM);
                    });
                }

                clearInterval(eeYm);

            } else {
                //console.log('Not Defined');
            }
    }, 500);
    

    $(".hustle-modal-close svg").detach();
    $(".hustle-modal-close").append('<img class="hustle-icon hustle-i_close" src="/wp-content/themes/my_theme/images/close-btn2.png">');
    $('.ftb-hover img').hover(function(){$(this).attr('src','/wp-content/uploads/perviy-festival-timbildinga-v-rossii-first-teambuilding-fest-in-russia-3.png')},function(){$(this).attr('src','/wp-content/uploads/perviy-festival-timbildinga-v-rossii-first-teambuilding-fest-in-russia-withoutcross.png')});
    
    $('.tng').on('click',function(){$('.drpdwn').siblings('.open').removeClass('open').slideUp();$('.drpdwn,.tng').toggleClass('open');});
    // слайдер деактивировать, активировать
    var cap1,cap2 = '';
    $('#moredesc1').click(function(){
       $('#moredesc1').toggleClass('switcher');
       if($(this).hasClass('switcher')){

          $(".dopobor button").remove();
          $(".dopobor .item").unwrap();
          $(".dopobor .item").unwrap();
          $(".dopobor").removeClass("slick-initialized slick-slider");
          $(".dopobor .item").removeClass('slick-slide');
          $(".dopobor .item").addClass('effect');
          cap1 = $('#moredesc1 .upstr').text();
          $('#moredesc1 .upstr').text('скрыть');



       }else{
          $(".dopobor .item").removeClass('effect');
          $('.dopobor').slick({
                infinite: false,
                autoplay: false,
                dots: false,
                arrows: true,
                fade: false,
                slidesToShow: 4,
                slidesToScroll: 4
          });
          $('#moredesc1 .upstr').text(cap1);
       }
    });

    $('#moredesc2').click(function(){
       $('#moredesc2').toggleClass('switcher');
       if($(this).hasClass('switcher')){

          $(".dopattr button").remove();
          $(".dopattr .item").unwrap();
          $(".dopattr .item").unwrap();
          $(".dopattr").removeClass("slick-initialized slick-slider");
          $(".dopattr .item").removeClass('slick-slide');
          $(".dopattr .item").addClass('effect');
          cap2 = $('#moredesc2 .upstr').text();
          $('#moredesc2 .upstr').text('скрыть');



       }else{
          $(".dopattr .item").removeClass('effect');
          $('.dopattr').slick({
                infinite: false,
                autoplay: false,
                dots: false,
                arrows: true,
                fade: false,
                slidesToShow: 4,
                slidesToScroll: 4
          });
          $('#moredesc2 .upstr').text(cap2);
       }
    });

    $('#bla').parent().prev('td').children('#cat_menu').children('li:last').addClass('current-menu-item');

    var z = 1000;
    $('#clouds .item').each(function () {
        z--;
        $(this).css('zIndex', z);
    })
    z = 1000;
    $('#banner .item').each(function () {
        z--;
        $(this).css('zIndex', z);
    })

    $('#cat_menu li').each(function (k, v) {
        if( $(this).hasClass('current-menu-item') )
        {
            $(this).css('backgroundColor', '#'+colors[k]);
            $(this).children('a').css('color', '#fefefe');
        }
        else {
            $(this).data("color", '#'+colors[k]);
        }



   	});

    $('#cat_menu li').hover(
        function () {
           if( !($(this).hasClass('current-menu-item')) )
           {
                $( this ).css('backgroundColor', $( this ).data("color") );
                $(this).children('a').css('color', '#fefefe');
           }

        },
        function () {
            if( !($(this).hasClass('current-menu-item')) )
            {
                $( this ).css('backgroundColor', 'transparent' );
                $(this).children('a').css('color', '#3e3e3e');
            }

        }
    );
    $('#top_menu2 li').each(function () {
        var color = $(this).children('a').css('backgroundColor');
        $(this).children('a').css('backgroundColor', color);
    });
    $('.gray_block .stuff h1, #content .stuff .right .caption h1, #item_block .stuff .right h1').each(function () {
        var color = $('#cat_menu li.current-menu-item').css('backgroundColor');
        $(this).before('<div class="h1_bg" style="background-color: ' + color + '"></div>');
        /*$(this).css('float', 'left');*/
        if(!$(this).hasClass('crosslink'))
        {
            $(this).after('<div class="clear"></div>');
        }

        var cc = $('#top_menu2 li.current-post-ancestor').children('a').css('backgroundColor');
        $('#item_block .stuff .right .h1_bg').css('backgroundColor', cc);

        //console.log(result);

    });
    $('.items_list .item').hover(
        function () {
            var color = $('#cat_menu li.current-menu-item').css('backgroundColor');

            $( this ).css('borderColor', color);
            var result = color.replace(')', ', 0.3)').replace('rgb', 'rgba');
            $( this ).find('.pic .block-item-title').css('backgroundColor', result);
        },
        function () {

            $( this ).find('.pic .block-item-title').css('backgroundColor', 'transparent');

            $( this ).css('borderColor', '#ccc');

        }
    );
    $('#cat_menu li').mouseenter(function () {
        $(this).stop();
        $(this).animate({'marginLeft': '30px'}, 100, function () {

        })
    });
    $('#cat_menu li').mouseleave(function () {
        $(this).stop();
        $(this).animate({'marginLeft': '15px'}, 100, function () {

        })
    });
    $('#Navigation area.center').mouseenter(function () {
        $('#the_circle>img:nth-child(2)').stop();
        $('#the_circle>img:nth-child(2)').animate({'opacity': '0'}, 100, function () {

        })
    });
    $('#Navigation area.center').mouseleave(function () {
        $('#the_circle>img:nth-child(2)').stop();
        $('#the_circle>img:nth-child(2)').animate({'opacity': '1'}, 100, function () {

        })
    });
	if($('body.category .items_list').height() < 300) {
		$('#content .stuff .left').css({'height' : 'auto', 'padding' : '3rem 0' });
		$('body.category #cat_menu').css('top' , '0px');
	}
    $('.a_').mouseenter(function () {
        $('.c_').stop();
        var id = $(this).attr('id').replace('a_', 'c_');
        $('#' + id).animate({'opacity': '1'}, 100, function () {

        });
    });
    $('.a_').mouseleave(function () {
        $('.c_').stop();
        $('.c_').css('opacity', '0');
    });
    $('#the_circle ul li a').mouseenter(function () {
        $('.c_').stop();
        var id = $(this).parent().attr('id').replace('l_', 'c_');
        $('#' + id).css({'opacity': '1'});
    });
    $('#the_circle ul li').mouseenter(function () {
        $('.c_').stop();
        var id = $(this).attr('id').replace('l_', 'c_');
        $('#' + id).css({'opacity': '1'});
    });
    $('.go_back, .go_description, .go_back_category').mouseenter(function () {   /* Изменения №1 (добавил ".go_description") */
        $(this).stop();
        $(this).children('a').animate({'top': '-10px'}, 100, function () {});
    });
    $('.go_back, .go_description, .go_back_category').mouseleave(function () {  /* Изменения №1 (добавил ".go_description") */
        $(this).stop();
        $(this).children('a').animate({'top': '0px'}, 100, function () {});
    });
	$('.go_description').click(function(event){
		$('html, body').animate({ scrollTop: ($('div#item_block').offset()).top-150}, 'slow');
	});
    $('#top_menu2 li').mouseenter(function () {
        $(this).children('a').stop();
        $(this).children('a').animate({'marginTop': '-24px'}, 100, function () {});
    });
    $('#top_menu2 li:not(.current-post-ancestor)').mouseleave(function () {
        $(this).children('a').stop();
        $(this).children('a').animate({'marginTop': '0px'}, 100, function () {});
    });
    $('#cat_menu li, #top_menu2 li, .go_back').click(function () {
        var url = $(this).children('a').attr('href');
        window.location = url;
    });
    $('.items_list .item .pic').click(function () {});

    $('#breadcrumbs span').each(function () {
        var a = $(this).children('a').text();
        if (a == 'Аттракционы') {
            $(this).next('b').remove();
            $(this).remove();
        }
    });
    $('#pics .previews li').mouseenter(function () {
        var path = $(this).children('img').attr('src');
        $('#pics .big_one').append('<div class="over"><img src="' + path + '" alt=""></div>');
        $('#pics .big_one .over').fadeIn(200);
    });
    $('#pics .previews li').mouseleave(function () {
        $('#pics .big_one .over').remove();
    });
    $('#pics .previews li').click(function () {
		$('#overlay').fadeIn(200, function () {
			$('.gallery').css('opacity','1.0').css('z-index','9999');
		});
		var number_li=$(this).children('img').attr('data-number_li');
		number_li='img[data-number='+number_li+']';
		$(number_li).click();
    });
    $('#overlay, #popup, #close_galery').click(function () {
        $('#popup').fadeOut(200, function () {
            $('#overlay').fadeOut();
        });
        $('#overlay').fadeOut();
		$('.gallery').css('opacity','0').css('z-index','-1');

    });
    $('.viewed .next').click(function () {
        if (!sliding) {
            sliding = true;
            var c = $(this).parent().children('.viewport').children('.container');
            var f = $(c).children('.item:first');
            $(f).animate({'marginLeft': '-151px'}, 300, function () {
                $(c).append($(f));
                $(f).css('marginLeft', '0px');
                sliding = false;
            })
        }
        return false;
    });
    $('.viewed .prev').click(function () {
        if (!sliding) {
            sliding = true;
            var c = $(this).parent().children('.viewport').children('.container');
            var l = $(c).children('.item:last');
            $(l).css('marginLeft', '-151px');
            $(c).prepend($(l));
            $(l).animate({'marginLeft': '0px'}, 300, function () {
                sliding = false;
            })
        }
        return false;
    });

    //console.log(typeof $('.viewed .item').length);
    var vc = $('.viewed .item').length;
    
    if (vc < 6) {
        var w = (151 * vc) - 25;
        $('.viewed .viewport').css('width', w + 'px');
        $('.viewed .prev, .viewed .next').hide();
    }
    if (vc >= 6) {
        var w = (151 * 5) - 25;
        $('.viewed .viewport').css('width', w + 'px');
    }
    var dh = $(document).height();
    var mh = dh - (107 + 126 + 30 + 30);
    $('#mark').parent().parent().parent().parent().parent().css('minHeight', mh + 'px');
    $('.banner_block img').removeAttr('width');
    $('.banner_block img').removeAttr('height');

});

$(window).resize(function () {

});

function changeCloud() {

    var c = $('#clouds');
    var f = $(c).children('.item:first');

    $(f).animate({'opacity': '0'}, 5000, function () {

        $(c).append( $(f) );

        var z = 1000;
        $('#clouds .item').each(function () {
            z--;
            $(this).css('zIndex', z);
        });

        $(f).css('opacity', '1');

    });

    setTimeout('changeCloud()', '10000');
}


function changeBanner() {

    var c = $('#banner a');
    var f = $(c).children('.item:first');

    $(f).animate({'opacity': '0'}, 1000, function () {
        $(c).append($(f));

        var z = 1000;
        $('#banner .item').each(function () {
            z--;
            $(this).css('zIndex', z);
        })

        $(f).css('opacity', '1');
    });

    setTimeout('changeBanner()', '5000');
}

var admin_bar_height={
    bar:'',
    header:'',

    bar_height:0,
    header_top:0,

    init:function(){
        if($('#wpadminbar').length == 0){
            return;
        }
        this.bar=$('#wpadminbar');
        this.header=$('.body-inside #header');

        this.header_top=parseInt(this.header.css('top').replace(/[^-\d\.]/g, ''), 10);
    },

    change_heigth:function(){
        if($('#wpadminbar').length == 0){
            return;
        }

        this.bar_height=this.bar.height();
        this.header.css('top', ((this.header_top + this.bar_height) + 'px'));

    }
};

function search_border() {

    $(".search .input input").focus(function () {
        $(this).closest(".input").toggleClass("focus");
    }).blur(function () {
        $(this).closest(".input").toggleClass("focus");
    });

}

$(document).ready(function () {

    admin_bar_height.init();
    admin_bar_height.change_heigth();
    search_border();

    $('#search').keyup(delay(function(ev) {
        liveSearch(ev, this.value);
    }, 500)).focus(function(ev){
        liveSearch(ev, this.value);
    }).blur(function(){
        window.setTimeout("$('#customize_search_results_ya').remove();", 500);
    });

});

$(window).resize(function () {
    admin_bar_height.change_heigth();
});

function liveSearch( ev, keywords ) {

    if( ev.keyCode == 38 || ev.keyCode == 40 ) {
        return false;
    }

    $('#customize_search_results_ya').remove();

    if( keywords == '' || keywords.length < 1 ) {
        return false;
    }
    keywords = encodeURI(keywords);

    $.ajax({
        type: "POST",
        url: window.wp_data.ajax_url,
        dataType: "html",
        data: {
            action : 'get_searchresult',
            s : keywords
        },
        beforeSend: function(xhr) {
            $('#search_box').append('<div style="display: flex; align-items: center; justify-content: center; padding: 3rem;" id="customize_search_results_ya" class="customize-search-ya">' +
            '<svg class="eff-loader">' +
                '<g>' +
                    '<path d="M 50,100 A 1,1 0 0 1 50,0"/>' +
                '</g>' +
                '<g>' +
                    '<path d="M 50,75 A 1,1 0 0 0 50,-25"/>' +
                '</g>' +
                '<defs>' +
                    '<linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">' +
                        '<stop offset="0%" style="stop-color:#FF56A1;stop-opacity:1" />' +
                        '<stop offset="100%" style="stop-color:#FF9350;stop-opacity:1" />' +
                    '</linearGradient>' +
                '</defs>' +
            '</svg>' +
            '</div>');
        },
        success: function(data) {
            //console.log('js code');
            //console.log(data);
            if( $('#customize_search_results_ya').length > 0 ) {
                $('#customize_search_results_ya').remove();
            }
            $('#search_box').append(data);
        }
    })

    return true;
}

function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

/*(подвижное меню останавливается при достижение футера, добавил имя scroll_menu() ) */
$(document).ready(function () {

    if( !( $('body').hasClass('category-305') ) ) {

    	$(window).scroll(function() {

    		// var top = $(document).scrollTop();
    		// var document_height=$(document).height();
    		// var height_footer=$('.gray_block').height()+$('#footer').height();
    		// var height_left_menu=$('.wrap-cat-menu').height();

    		// if ((document_height-top) < (height_footer+height_left_menu)+130)
    		// {
    		// 	$(".wrap-cat-menu").css({top: document_height-height_left_menu-height_footer-130, position: 'absolute'});
    		// }
    		// else {
    		//     top_menu=108;
            //     top_menu=top_menu+top_down; // (добавил top_menu и top_down, иначе шапка при развороте наползает на меню слева)
    		//     $(".wrap-cat-menu").css({top: top_menu+4+'px', position: 'fixed'});
    		// }

            // if(top > 150){
            //     $(".content_table").addClass('fixed');
            // }
            // else {
            //     $(".content_table").removeClass('fixed');
            // }


    	});
    }
});
/* Конец Изменения №3 (подвижное меню останавливается при достижение футера) */
