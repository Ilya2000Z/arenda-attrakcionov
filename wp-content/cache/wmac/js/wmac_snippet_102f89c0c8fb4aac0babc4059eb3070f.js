var myGroup=jQuery('#menu-akkordion > li');myGroup.on('show.bs.collapse','.collapse',function(e){if($(this).is(e.target)){if($(this).parents('ul').length==1){jQuery('#menu-akkordion > li > ul').collapse('hide');}else if($(this).parents('ul').length==2){jQuery('#menu-akkordion > li > ul > li > ul').collapse('hide');}
console.log($(this).parents('ul').length);}});$(".accordion-categories__arrow").each(function(){$(this).parent().append(this);});jQuery('.sales-slider').slick({slidesToShow:3,slidesToScroll:1,arrows:true,autoplay:true,autoplaySpeed:2000,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}},{breakpoint:568,settings:{dots:true,slidesToShow:1,slidesToScroll:1}},]});jQuery(document).ready(function(){if(jQuery(window).width()<=668){jQuery('.mob-two-column-icn').parent().addClass('mob-two-column-icn-wrp');jQuery('.line-hide-mob').parent().addClass('line-hide-mob-wrp');jQuery('.page-id-41458 p, .page-id-41458 span,  .page-id-41458 h1,  .page-id-41458 h2,  .page-id-41458 h3').each(function(){const $this=jQuery(this);if($this.html().replace(/\s|&nbsp;/g,'').length===0)
$this.remove();});jQuery('.page-id-41458 span').each(function(){var textSpanTrim=jQuery(this).text().trim();jQuery(this).text(textSpanTrim);});}
jQuery(".img-items").mouseout(function(){jQuery(this).find('.tmb-wrap-table div').removeClass('active');jQuery(this).find('.tmb-wrap-table div:first-child').addClass('active');jQuery(this).find('.image-wrap img').hide();jQuery(this).find('.image-wrap img:first-child').show();console.log('outmousese');});jQuery('.catalog-products .accordion-categories span.nav-link[aria-expanded=false], .catalog-products .accordion-categories__arrow[aria-expanded=false]').click(function(e){jQuery('.accordion-categories').animate({scrollTop:jQuery(".accordion-categories").scrollTop()+jQuery(this).offsetParent('.catalog-products').offset().top-504},{duration:'medium',easing:'swing'});});jQuery('.accordion-categories .collapse').find('.current-menu-item').parent().addClass('show').find('span').attr('aria-expanded','true');jQuery('.accordion-categories .collapse').find('.current-menu-item').parent().addClass('show').find('.accordion-categories__arrow').attr('aria-expanded','true');jQuery('.accordion-categories .collapse').find('.current-menu-item').parent().parent().parent().addClass('show').find('span').attr('aria-expanded','true')
jQuery('.accordion-categories .collapse').find('.current-menu-item').parent().parent().parent().addClass('show').find('.accordion-categories__arrow').attr('aria-expanded','true')
jQuery('.ccc-favorite-post-toggle-button').removeAttr('href')
jQuery(document).on("click",".product.card",function(){window.location.hash=jQuery(this).attr('id');});if(window.location.hash&&jQuery("*").is(".product.card")){var target=jQuery(window.location.hash);if(localStorage.scrollTo!=undefined){window.location.hash=localStorage.scrollTo;localStorage.removeItem('scrollTo');}
jQuery('html,body').animate({scrollTop:target.offset().top},2500);};jQuery(document).on("click",".product.card .card-body, .product.card .card-footer, .product.card .img-items",function(){var href=jQuery(this).parent().attr('data-href');localStorage.setItem('scrollTo','#'+jQuery(this).parent().attr('id'));window.location.hash=jQuery(this).parent().attr('id');window.location.href=href;})
jQuery('.second-row-nav .block_width_item').hover(function(){var sub_menu=jQuery(this).attr('id');var submenu=jQuery('.menu-slider-cat__item[data-parent-id='+sub_menu+']').length;if(submenu){jQuery('.menu-slider-cat__item').removeClass('show');jQuery('.menu-slider-cat__item[data-parent-id='+sub_menu+']').addClass('show');jQuery('body').addClass('open-menu');}},function(){jQuery('.menu-slider-cat__item').removeClass('show');jQuery('body').removeClass('open-menu');});jQuery('.second-row-nav .menu-slider-cat__item').hover(function(){var sub_menu=jQuery(this).attr('data-parent-id');jQuery('.second-row-nav .block_width_item').removeClass('active')
jQuery('.second-row-nav .block_width_item[id='+sub_menu+']').addClass('active').attr('id',sub_menu)
jQuery('.menu-slider-cat__item').removeClass('show');jQuery('.menu-slider-cat__item[data-parent-id='+sub_menu+']').addClass('show');jQuery('body').addClass('open-menu');},function(){jQuery('.second-row-nav .block_width_item').removeClass('active')
jQuery('.menu-slider-cat__item').removeClass('show');jQuery('body').removeClass('open-menu');});jQuery(window).scroll(function(){var scroll=$(window).scrollTop();if(scroll>=200){jQuery(".navbar").addClass("isSticky");}else{jQuery(".navbar").removeClass("isSticky");}});jQuery('.home-slider').slick({slidesToShow:1,slidesToScroll:1,autoplay:true,arrows:true,dots:true,});jQuery('.subcategories-list__item-mob').click(function(){jQuery('.subcategories-list').toggleClass('show');})
var blocksSlider=jQuery(".content-blocks__slider:not(.slick-initialized)");blocksSlider.each(function(){jQuery(this).slick({slidesToShow:1,slidesToScroll:1,arrows:true,dots:true,responsive:[{breakpoint:1332,settings:{}},{breakpoint:992,settings:{}},{breakpoint:768,settings:{}},{breakpoint:568,settings:{}},]});});jQuery('.categories-cards-list__loadmore--show').click(function(){jQuery(this).hide();jQuery('.categories-cards-list--loadmore').toggle();})
jQuery('.categories-cards-list__loadmore--mobile').click(function(){jQuery(".categories-cards-list__item:hidden:lt(4)").show();if(!jQuery(".categories-cards-list__item:hidden").length){jQuery(this).remove();}})});