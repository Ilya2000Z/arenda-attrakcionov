jQuery(document).ready(function($){if(jQuery(document).find('.filter').length){var filter_top=jQuery(document).find('.filter').offset().top,content_top=jQuery(document).find('.sales-slider__wrapper').offset().top-70;jQuery(window).scroll(function(){var window_top=jQuery(window).scrollTop()-0;if(window_top>filter_top){var filterEl=jQuery('.filter');if(window_top>content_top){jQuery('.filter').removeClass('sticky');filterEl.css('width','auto');}else if(!filterEl.is('.sticky')&&filter_top<content_top){jQuery('.filter').addClass('sticky');var filterParentWidth=filterEl.parent().width()+'px';filterEl.css('width',filterParentWidth);}}else{var filterEl=jQuery('.filter');jQuery('.filter').removeClass('sticky');filterEl.css('width','auto');}});}
jQuery('.fsort_btn').click(function(){jQuery(this).toggleClass('active');jQuery('.fsort_dropdown').toggleClass('active');})
jQuery('.filter-show-all').click(function(){jQuery(this).toggleClass('active');jQuery('.filter-labels').toggleClass('active');})
var sort_active_el=jQuery('.filter-dropdown--sort').find('.fsort_item.active'),labels_active_el=jQuery('.filter-dropdown--labels').find('.filter-item--active'),text_labels='';jQuery(labels_active_el).each(function(i){text_labels=jQuery(this).find('.filter-item_txt').text();});jQuery('.filter-dropdown--sort .filter-dropdown_active span').text(sort_active_el.text());jQuery('.filter-dropdown--labels .filter-dropdown_active span').text(text_labels);jQuery('.filter-dropdown').click(function(){var thisEl=jQuery(this);if(thisEl.hasClass('active')){thisEl.find('.filter-dropdown_icon').removeClass('active');thisEl.find('.filter-dropdown_list').removeClass('active');thisEl.removeClass('active');}else{jQuery('.filter-dropdown_icon').removeClass('active');jQuery('.filter-dropdown_list').removeClass('active');jQuery('.filter-dropdown').removeClass('active');thisEl.find('.filter-dropdown_icon').addClass('active');thisEl.find('.filter-dropdown_list').addClass('active');thisEl.addClass('active');}})
jQuery('.fsort_item').click(function(){jQuery('.filter-dropdown--sort .filter-dropdown_active span').text(jQuery(this).text());jQuery('.filter-dropdown_icon').removeClass('active');jQuery('.filter-dropdown_list').removeClass('active');jQuery('.filter-dropdown').removeClass('active');})
jQuery('.fsort_item').click(function(){jQuery('.fsort_item').removeClass('active');jQuery(this).addClass('active');jQuery('.fsort_dropdown').toggleClass('active');var sort=jQuery(this).attr('data-sort'),cat=jQuery(this).attr('data-category'),filter_item_label=jQuery('.filter-item-label.filter-item--active').attr('data-label'),paged=jQuery('.loadmore-wrapper').attr('data-paged');if(jQuery('.filter-item-label.filter-item--active').length){filter_item_label=filter_item_label;}else{filter_item_label=0;}
$.ajax({url:arenda_filter_ajax_obj.ajaxurl,data:{'action':'arenda_filter_ajax_request','nonce':arenda_filter_ajax_obj.nonce,'sort':1,'sort_data':sort,'category':cat,'paged':paged,'filter_item_label':filter_item_label,},success:function(data){jQuery(document).find('.loadmore-wrapper').empty();jQuery(document).find('.loadmore-wrapper').append(data);$("div.product div.img-items.brazz").brazzersCarousel();},error:function(xhr,status,error){}});})
jQuery('.filter-item-all').on('click',function(e){var sort=jQuery('.fsort_item.active').attr('data-sort'),cat=jQuery('.fsort_item.active').attr('data-category'),paged=jQuery('.loadmore-wrapper').attr('data-paged');jQuery('.filter-item-label').removeClass('filter-item--active');jQuery('.filter-item-all').addClass('filter-item--active');var url=document.location.href;url=url.split('?')[0];window.history.pushState({"html":document.html,"pageTitle":document.title},"",url);$.ajax({url:arenda_filter_ajax_obj.ajaxurl,data:{'action':'arenda_filter_ajax_request','nonce':arenda_filter_ajax_obj.nonce,'sort':0,'sort_data':sort,'category':cat,'paged':paged,'filter_item_label':'all',},success:function(data){jQuery(document).find('.loadmore-wrapper').empty();jQuery(document).find('.loadmore-wrapper').append(data);$("div.product div.img-items.brazz").brazzersCarousel();},error:function(xhr,status,error){}});});jQuery('.filter-item-label').on('click',function(e){e.preventDefault();e.stopImmediatePropagation();var labels_active_all=jQuery('.filter-dropdown--labels').find('.filter-item--active'),text_label='';jQuery(labels_active_all).each(function(i){text_label=text_label+jQuery(this).find('.filter-item_txt').text();});jQuery('.filter-dropdown--labels .filter-dropdown_active span').text(text_label);jQuery('.filter-dropdown_icon').removeClass('active');jQuery('.filter-dropdown_list').removeClass('active');jQuery('.filter-dropdown').removeClass('active');jQuery('.filter-item-all, .filter-item-label').removeClass('filter-item--active');jQuery(this).addClass('filter-item--active');var sort=jQuery('.fsort_item.active').attr('data-sort'),cat=jQuery('.fsort_item.active').attr('data-category'),filter_item_label=jQuery(this).attr('data-label'),paged=jQuery('.loadmore-wrapper').attr('data-paged');if(jQuery('.filter-item-label.filter-item--active').length){filter_item_label=filter_item_label;}else{filter_item_label=0;}
var url=document.location.href;url=url.split('?')[0]+"?label="+filter_item_label;window.history.pushState({"html":document.html,"pageTitle":document.title},"",url);$.ajax({url:arenda_filter_ajax_obj.ajaxurl,data:{'action':'arenda_filter_ajax_request','nonce':arenda_filter_ajax_obj.nonce,'sort':1,'sort_data':sort,'category':cat,'paged':paged,'filter_item_label':filter_item_label,},success:function(data){jQuery(document).find('.loadmore-wrapper').empty();jQuery(document).find('.loadmore-wrapper').append(data);$("div.product div.img-items.brazz").brazzersCarousel();},error:function(xhr,status,error){}});});var hiddenEls=new Array();$(".filter-labels").find(".filter-item").each(function(index,value){if(index==0){return true;}
if($(value)[0].offsetTop>$(".filter-labels")[0].offsetTop+40){hiddenEls.push($(value));}});var numrow=hiddenEls.length;$("[counter]").text(`Ещё(${numrow})`);});