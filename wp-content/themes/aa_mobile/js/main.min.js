$.fn.clickToggle = function(a, b) {
	var ab =[b, a];
	return this.on("click", function() {ab[this._tog ^= 1].call(this);});
};
$(function()
{
		var color = $('#left_menu [data-color]').data('color');
		if(color) {
			$("#content h1").css({'color': '#ffffff', 'backgroundColor': "#"+color});
		}
		$(window).resize(function()
			{
				if($('.custom-container').hasClass('open'))
				{
					var w = parseInt(document.body.clientWidth)- 64;
					$('.custom-container, .custom-navbar').css('left', w+'px');
				}
			}
		);

		$("#content-single table").each(function(indx) {
		   var count = countCols( $(this).get(0) ) ;
		   if(count === 2){
		   	$(this).find('td').addClass('table-col-2');
		   }
		});


		$('#v-pills-photos-tab').tab('show');
		setTimeout(function() {$('#v-pills-video-tab').tab('show')}, 2000);
		$('.custom-navbar #categories, #menu .categories').clickToggle(function()
			{
				var w = parseInt(document.body.clientWidth)- 64;
				$('.sidebar').animate(
					{
					left: '0'
					}, 500
				);
				$('.custom-container, .custom-navbar').addClass('open').animate(
					{
					left: w+'px'
					}, 500
				);
			}, function() {
				var w = 64 - parseInt(document.body.clientWidth);
				$('.sidebar').animate(
					{
					left: '-100%'
					}, 500
				);
				$('.custom-container, .custom-navbar').removeClass('open').animate(
					{
					left: '0'
					}, 500
				);
			}
		);
		$('.photos').slick(
			{
			dots: false,
			infinite: false,
			arrows: true,
			speed: 500,
			slidesToShow: 4,
			slidesToScroll: 4,
			adaptiveHeight: true,
			autoplay: false,
			responsive:[
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
			}
		);
		$('#slides').slick(
			{
			dots: false,
			infinite: true,
			arrows: true,
			speed: 500,
			slidesToShow: 4,
			slidesToScroll: 4,
			adaptiveHeight: true,
			autoplay: true,
			responsive:[
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
			}
		);

        $(".custom-navbar #search").click(function(){
            $(this).toggleClass("selected");
            $("#searchfix").toggleClass("showed");
        });

        $('input[type="search"]').keyup(delay(function(ev) {
            liveSearch(ev, this.value);
        }, 500)).focus(function(ev){
            liveSearch(ev, this.value);
        }).blur(function(){
            window.setTimeout("$('#customize_search_results_ya').remove();", 500);
        });

		function countCols(table){
			var e = table.children[0], c = 0, r = [];
			for (var i=0; i<e.children.length;i++) {
				var ch = e.children[i].children.length;
				for (var k in r) {
					if (!r[k]) {
						r.splice(k,1);
					}else{
						ch = ch+1;
						r[k]--;
					}
				}
				for (var ii=0;ii<e.children[i].children.length;ii++) {
					if (e.children[i].children[ii].getAttribute('rowspan')) {
						r.push(Number(e.children[i].children[ii].getAttribute('rowspan'))-1);
					}
				}
				if (c < ch) {
					c = ch;
				}
			}
			return c;
		}

    function liveSearch( ev, keywords ) {

        if( ev.keyCode == 38 || ev.keyCode == 40 ) {
            return false;
        }

        $('body').on('click', function(){
            if( $('#customize_search_results_ya').length ) {
                $('#customize_search_results_ya').remove();
            }
        });

        $('#customize_search_results_ya').remove();

        if( keywords == '' || keywords.length < 1 ) {
            /*$('body').css('overflow', 'auto');*/
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
                $('.sidebar-search').append('<div style="display: flex; align-items: center; justify-content: center; padding: 3rem;" id="customize_search_results_ya" class="customize-search-ya">' +
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
                    $('body').css('overflow', 'hidden');
                }
                $('.sidebar-search').append(data);
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

});