jQuery(function ($) {

  let pathName = document.location.pathname;


  $("#loadmore").on("click", function () {
    // клик на кнопку
    $(this).text("Загрузка..."); // меняем текст на кнопке
    // получаем нужные переменные
    var data = {
      action: "loadmore",
      query: posts_vars,
      page: current_page,
    };
    // отправляем Ajax запрос
    $.ajax({
      url: ajaxurl,
      data: data,
      method: "POST",
      success: function (data) {
        if (data) {

          $("#loadmore").text("Показать ещё"); // добавляем новые посты
          let loadmore = $("#loadmore");
          $("#loadmore").detach();
          $(".loadmore").append(data); // добавляем новые посты
          $(loadmore).appendTo(".more");
          current_page++; // записываем новый номер страницы

          $('#page-'+current_page)[0].scrollIntoView(false);

          //emm-page emm-current
          $(".emm-page.emm-current").toggleClass("emm-current");
          $(".emm-page:contains(" + current_page + ")").toggleClass(
            "emm-current"
          );

          if (current_page == max_pages) $("#loadmore").remove(); // если последняя страница, удаляем кнопку

          /*
          $(".items_list .item").hover(
            function () {
              var color = $("#cat_menu li.current-menu-item").css(
                "backgroundColor"
              );
              $(this).find(".pic").css("borderColor", color);
              var result = color.replace(")", ", 0.3)").replace("rgb", "rgba");
              $(this)
                .find(".pic .block-item-title")
                .css("backgroundColor", result);
            },
            function () {
              $(this)
                .find(".pic .block-item-title")
                .css("backgroundColor", "transparent");
              $(this).find(".pic").css("borderColor", "transparent");
            }
          );
          */
            $("div.product div.img-items.brazz").brazzersCarousel();
            $("div.product div.img-items").removeClass("brazz");

            $('div.product').off().on('click', function(evt) {

              if ($(evt.target).hasClass('active')) {
    
                var href = evt.target.hasAttribute('data-href') ?
                  evt.target.getAttribute('data-href') :
                  evt.currentTarget.getAttribute('data-href');

                  window.location.href = href;
              }
            });


            //setLocation('page/'+current_page);
            //window.history.pushState(null, null, "/site/users/" + user_name);

            let fixedPageUrl = pathName.replace(/page\/(\d+)\//g, '');
            window.history.pushState(null, null, fixedPageUrl + "page/" + current_page + "/");
            //console.log(document.location.pathname);

        } else {
          $("#loadmore").remove(); // если посты не были получены так же удаляем кнопку
        }
      },
    });
  });
});
