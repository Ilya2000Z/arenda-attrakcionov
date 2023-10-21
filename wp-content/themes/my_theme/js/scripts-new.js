//import $ from 'jquery'
//import Util from './util'
/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0): util.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */

const Util = (($) => {
  /**
   * ------------------------------------------------------------------------
   * Private TransitionEnd Helpers
   * ------------------------------------------------------------------------
   */

  let transition = false

  const MAX_UID = 1000000

  // Shoutout AngusCroll (https://goo.gl/pxwQGp)
  function toType(obj) {
    return {}.toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase()
  }

  function getSpecialTransitionEndEvent() {
    return {
      bindType: transition.end,
      delegateType: transition.end,
      handle(event) {
        if ($(event.target).is(this)) {
          return event.handleObj.handler.apply(this, arguments) // eslint-disable-line prefer-rest-params
        }
        return undefined // eslint-disable-line no-undefined
      }
    }
  }

  function transitionEndTest() {
    if (typeof window !== 'undefined' && window.QUnit) {
      return false
    }

    return {
      end: 'transitionend'
    }
  }

  function transitionEndEmulator(duration) {
    let called = false

    $(this).one(Util.TRANSITION_END, () => {
      called = true
    })

    setTimeout(() => {
      if (!called) {
        Util.triggerTransitionEnd(this)
      }
    }, duration)

    return this
  }

  function setTransitionEndSupport() {
    transition = transitionEndTest()

    $.fn.emulateTransitionEnd = transitionEndEmulator

    if (Util.supportsTransitionEnd()) {
      $.event.special[Util.TRANSITION_END] = getSpecialTransitionEndEvent()
    }
  }

  function escapeId(selector) {
    // We escape IDs in case of special selectors (selector = '#myId:something')
    // $.escapeSelector does not exist in jQuery < 3
    selector = typeof $.escapeSelector === 'function' ? $.escapeSelector(selector).substr(1)
        : selector.replace(/(:|\.|\[|\]|,|=|@)/g, '\\$1')

    return selector
  }

  /**
   * --------------------------------------------------------------------------
   * Public Util Api
   * --------------------------------------------------------------------------
   */

  const Util = {

    TRANSITION_END: 'bsTransitionEnd',

    getUID(prefix) {
      do {
        // eslint-disable-next-line no-bitwise
        prefix += ~~(Math.random() * MAX_UID) // "~~" acts like a faster Math.floor() here
      } while (document.getElementById(prefix))
      return prefix
    },

    getSelectorFromElement(element) {
      let selector = element.getAttribute('data-target')
      if (!selector || selector === '#') {
        selector = element.getAttribute('href') || ''
      }

      // If it's an ID
      if (selector.charAt(0) === '#') {
        selector = escapeId(selector)
      }

      try {
        const $selector = $(document).find(selector)
        return $selector.length > 0 ? selector : null
      } catch (err) {
        return null
      }
    },

    reflow(element) {
      return element.offsetHeight
    },

    triggerTransitionEnd(element) {
      $(element).trigger(transition.end)
    },

    supportsTransitionEnd() {
      return Boolean(transition)
    },

    isElement(obj) {
      return (obj[0] || obj).nodeType
    },

    typeCheckConfig(componentName, config, configTypes) {
      for (const property in configTypes) {
        if (Object.prototype.hasOwnProperty.call(configTypes, property)) {
          const expectedTypes = configTypes[property]
          const value         = config[property]
          const valueType     = value && Util.isElement(value)
              ? 'element' : toType(value)

          if (!new RegExp(expectedTypes).test(valueType)) {
            throw new Error(
                `${componentName.toUpperCase()}: ` +
                `Option "${property}" provided type "${valueType}" ` +
                `but expected type "${expectedTypes}".`)
          }
        }
      }
    }
  }

  setTransitionEndSupport()

  return Util
})($)
/**
 * --------------------------------------------------------------------------
 * Bootstrap (v4.0.0): collapse.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * --------------------------------------------------------------------------
 */
const Collapse = (($) => {
  /**
   * ------------------------------------------------------------------------
   * Constants
   * ------------------------------------------------------------------------
   */

  const NAME                = 'collapse';
  const VERSION             = '4.0.0';
  const DATA_KEY            = 'bs.collapse';
  const EVENT_KEY           = `.${DATA_KEY}`;
  const DATA_API_KEY        = '.data-api';
  const JQUERY_NO_CONFLICT  = $.fn[NAME];
  const TRANSITION_DURATION = 600;

  const Default = {
    toggle : true,
    parent : ''
  }

  const DefaultType = {
    toggle : 'boolean',
    parent : '(string|element)'
  }

  const Event = {
    SHOW           : `show${EVENT_KEY}`,
    SHOWN          : `shown${EVENT_KEY}`,
    HIDE           : `hide${EVENT_KEY}`,
    HIDDEN         : `hidden${EVENT_KEY}`,
    CLICK_DATA_API : `click${EVENT_KEY}${DATA_API_KEY}`,
  }

  const ClassName = {
    SHOW       : 'show',
    COLLAPSE   : 'collapse',
    COLLAPSING : 'collapsing',
    COLLAPSED  : 'collapsed'
  }

  const Dimension = {
    WIDTH  : 'width',
    HEIGHT : 'height'
  }

  const Selector = {
    ACTIVES     : '.show, .collapsing',
    DATA_TOGGLE : '[data-toggle="collapse"]'
  }

  /**
   * ------------------------------------------------------------------------
   * Class Definition
   * ------------------------------------------------------------------------
   */

  class Collapse {
    constructor(element, config) {
      this._isTransitioning = false
      this._element         = element
      this._config          = this._getConfig(config)
      this._triggerArray    = $.makeArray($(
          `[data-toggle="collapse"][href="#${element.id}"],` +
          `[data-toggle="collapse"][data-target="#${element.id}"]`
      ))
      const tabToggles = $(Selector.DATA_TOGGLE)
      for (let i = 0; i < tabToggles.length; i++) {
        const elem = tabToggles[i]
        const selector = Util.getSelectorFromElement(elem)
        if (selector !== null && $(selector).filter(element).length > 0) {
          this._selector = selector
          this._triggerArray.push(elem)
        }
      }

      this._parent = this._config.parent ? this._getParent() : null

      if (!this._config.parent) {
        this._addAriaAndCollapsedClass(this._element, this._triggerArray)
      }

      if (this._config.toggle) {
        this.toggle()
      }
    }

    // Getters

    static get VERSION() {
      return VERSION
    }

    static get Default() {
      return Default
    }

    // Public

    toggle() {
      if ($(this._element).hasClass(ClassName.SHOW)) {
        this.hide()
      } else {
        this.show()
      }
    }

    show() {
      if (this._isTransitioning ||
          $(this._element).hasClass(ClassName.SHOW)) {
        return
      }

      let actives
      let activesData

      if (this._parent) {
        actives = $.makeArray(
            $(this._parent)
                .find(Selector.ACTIVES)
                .filter(`[data-parent="${this._config.parent}"]`)
        )
        if (actives.length === 0) {
          actives = null
        }
      }

      if (actives) {
        activesData = $(actives).not(this._selector).data(DATA_KEY)
        if (activesData && activesData._isTransitioning) {
          return
        }
      }

      const startEvent = $.Event(Event.SHOW)
      $(this._element).trigger(startEvent)
      if (startEvent.isDefaultPrevented()) {
        return
      }

      if (actives) {
        Collapse._jQueryInterface.call($(actives).not(this._selector), 'hide')
        if (!activesData) {
          $(actives).data(DATA_KEY, null)
        }
      }

      const dimension = this._getDimension()

      $(this._element)
          .removeClass(ClassName.COLLAPSE)
          .addClass(ClassName.COLLAPSING)

      this._element.style[dimension] = 0

      if (this._triggerArray.length > 0) {
        $(this._triggerArray)
            .removeClass(ClassName.COLLAPSED)
            .attr('aria-expanded', true)
      }

      this.setTransitioning(true)

      const complete = () => {
        $(this._element)
            .removeClass(ClassName.COLLAPSING)
            .addClass(ClassName.COLLAPSE)
            .addClass(ClassName.SHOW)

        this._element.style[dimension] = ''

        this.setTransitioning(false)

        $(this._element).trigger(Event.SHOWN)
      }

      if (!Util.supportsTransitionEnd()) {
        complete()
        return
      }

      const capitalizedDimension = dimension[0].toUpperCase() + dimension.slice(1);
      const scrollSize = `scroll${capitalizedDimension}`;

      $(this._element)
          .one(Util.TRANSITION_END, complete)
          .emulateTransitionEnd(TRANSITION_DURATION)

      this._element.style[dimension] = `${this._element[scrollSize]}px`;
    }

    hide() {
      if (this._isTransitioning ||
          !$(this._element).hasClass(ClassName.SHOW)) {
        return
      }

      const startEvent = $.Event(Event.HIDE)
      $(this._element).trigger(startEvent)
      if (startEvent.isDefaultPrevented()) {
        return
      }

      const dimension = this._getDimension()

      this._element.style[dimension] = `${this._element.getBoundingClientRect()[dimension]}px`;

      Util.reflow(this._element)

      $(this._element)
          .addClass(ClassName.COLLAPSING)
          .removeClass(ClassName.COLLAPSE)
          .removeClass(ClassName.SHOW)

      if (this._triggerArray.length > 0) {
        for (let i = 0; i < this._triggerArray.length; i++) {
          const trigger = this._triggerArray[i]
          const selector = Util.getSelectorFromElement(trigger)
          if (selector !== null) {
            const $elem = $(selector)
            if (!$elem.hasClass(ClassName.SHOW)) {
              $(trigger).addClass(ClassName.COLLAPSED)
                  .attr('aria-expanded', false)
            }
          }
        }
      }

      this.setTransitioning(true)

      const complete = () => {
        this.setTransitioning(false)
        $(this._element)
            .removeClass(ClassName.COLLAPSING)
            .addClass(ClassName.COLLAPSE)
            .trigger(Event.HIDDEN)
      }

      this._element.style[dimension] = ''

      if (!Util.supportsTransitionEnd()) {
        complete()
        return
      }

      $(this._element)
          .one(Util.TRANSITION_END, complete)
          .emulateTransitionEnd(TRANSITION_DURATION)
    }

    setTransitioning(isTransitioning) {
      this._isTransitioning = isTransitioning
    }

    dispose() {
      $.removeData(this._element, DATA_KEY)

      this._config          = null
      this._parent          = null
      this._element         = null
      this._triggerArray    = null
      this._isTransitioning = null
    }

    // Private

    _getConfig(config) {
      config = {
        ...Default,
        ...config
      }
      config.toggle = Boolean(config.toggle) // Coerce string values
      Util.typeCheckConfig(NAME, config, DefaultType)
      return config
    }

    _getDimension() {
      const hasWidth = $(this._element).hasClass(Dimension.WIDTH)
      return hasWidth ? Dimension.WIDTH : Dimension.HEIGHT
    }

    _getParent() {
      let parent = null
      if (Util.isElement(this._config.parent)) {
        parent = this._config.parent

        // It's a jQuery object
        if (typeof this._config.parent.jquery !== 'undefined') {
          parent = this._config.parent[0]
        }
      } else {
        parent = $(this._config.parent)[0]
      }

      const selector =
          `[data-toggle="collapse"][data-parent="${this._config.parent}"]`;

      $(parent).find(selector).each((i, element) => {
        this._addAriaAndCollapsedClass(
            Collapse._getTargetFromElement(element),
            [element]
        )
      })

      return parent
    }

    _addAriaAndCollapsedClass(element, triggerArray) {
      if (element) {
        const isOpen = $(element).hasClass(ClassName.SHOW)

        if (triggerArray.length > 0) {
          $(triggerArray)
              .toggleClass(ClassName.COLLAPSED, !isOpen)
              .attr('aria-expanded', isOpen)
        }
      }
    }

    // Static

    static _getTargetFromElement(element) {
      const selector = Util.getSelectorFromElement(element)
      return selector ? $(selector)[0] : null
    }

    static _jQueryInterface(config) {
      return this.each(function () {
        const $this   = $(this)
        let data      = $this.data(DATA_KEY)
        const _config = {
          ...Default,
          ...$this.data(),
          ...typeof config === 'object' && config
        }

        if (!data && _config.toggle && /show|hide/.test(config)) {
          _config.toggle = false
        }

        if (!data) {
          data = new Collapse(this, _config)
          $this.data(DATA_KEY, data)
        }

        if (typeof config === 'string') {
          if (typeof data[config] === 'undefined') {
            throw new TypeError(`No method named "${config}"`)
          }
          data[config]()
        }
      })
    }
  }

  /**
   * ------------------------------------------------------------------------
   * Data Api implementation
   * ------------------------------------------------------------------------
   */

  $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) {
    // preventDefault only for <a> elements (which change the URL) not inside the collapsible element
    if (event.currentTarget.tagName === 'A') {
      event.preventDefault()
    }

    const $trigger = $(this)
    const selector = Util.getSelectorFromElement(this)
    $(selector).each(function () {
      const $target = $(this)
      const data    = $target.data(DATA_KEY)
      const config  = data ? 'toggle' : $trigger.data()
      Collapse._jQueryInterface.call($target, config)
    })
  })

  /**
   * ------------------------------------------------------------------------
   * jQuery
   * ------------------------------------------------------------------------
   */

  $.fn[NAME] = Collapse._jQueryInterface
  $.fn[NAME].Constructor = Collapse
  $.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT
    return Collapse._jQueryInterface
  }

  return Collapse
})($)
//export default Collapse


/*(function() {
  var supportsPassive = eventListenerOptionsSupported();  

  if (supportsPassive) {
    var addEvent = EventTarget.prototype.addEventListener;
    overwriteAddEvent(addEvent);
  }

  function overwriteAddEvent(superMethod) {
    var defaultOptions = {
      passive: true,
      capture: false
    };

    EventTarget.prototype.addEventListener = function(type, listener, options) {
      var usesListenerOptions = typeof options === 'object';
      var useCapture = usesListenerOptions ? options.capture : options;

      options = usesListenerOptions ? options : {};
      options.passive = options.passive !== undefined ? options.passive : defaultOptions.passive;
      options.capture = useCapture !== undefined ? useCapture : defaultOptions.capture;

      superMethod.call(this, type, listener, options);
    };
  }

  function eventListenerOptionsSupported() {
    var supported = false;
    try {
      var opts = Object.defineProperty({}, 'passive', {
        get: function() {
          supported = true;
        }
      });
      window.addEventListener("test", null, opts);
    } catch (e) {}

    return supported;
  }
})();*/

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

  // $('#cat_menu li').each(function (k, v) {
  //     if( $(this).hasClass('current-menu-item') )
  //     {
  //         $(this).css('backgroundColor', '#'+colors[k]);
  //         $(this).children('a').css('color', '#fefefe');
  //     }
  //     else {
  //         $(this).data("color", '#'+colors[k]);
  //     }
  // });

  // $('#cat_menu li').hover(
  //     function () {
  //        if( !($(this).hasClass('current-menu-item')) )
  //        {
  //             $( this ).css('backgroundColor', $( this ).data("color") );
  //             $(this).children('a').css('color', '#fefefe');
  //        }

  //     },
  //     function () {
  //         if( !($(this).hasClass('current-menu-item')) )
  //         {
  //             $( this ).css('backgroundColor', 'transparent' );
  //             $(this).children('a').css('color', '#3e3e3e');
  //         }

  //     }
  // );

  $('#top_menu2 li').each(function () {
    var color = $(this).children('a').css('backgroundColor');
    $(this).children('a').css('backgroundColor', color);
  });

  // $('.gray_block .stuff h1, #content .stuff .right .caption h1, #item_block .stuff .right h1').each(function () {
  //     var color = $('#cat_menu li.current-menu-item').css('backgroundColor');
  //     $(this).before('<div class="h1_bg" style="background-color: ' + color + '"></div>');
  //     /*$(this).css('float', 'left');*/
  //     if(!$(this).hasClass('crosslink'))
  //     {
  //         $(this).after('<div class="clear"></div>');
  //     }

  //     var cc = $('#top_menu2 li.current-post-ancestor').children('a').css('backgroundColor');
  //     $('#item_block .stuff .right .h1_bg').css('backgroundColor', cc);

  //     //console.log(result);

  // });

  // $('.items_list .item').hover(
  //     function () {
  //         var color = $('#cat_menu li.current-menu-item').css('backgroundColor');

  //         $( this ).css('borderColor', color);
  //         var result = color.replace(')', ', 0.3)').replace('rgb', 'rgba');
  //         $( this ).find('.pic .block-item-title').css('backgroundColor', result);
  //     },
  //     function () {

  //         $( this ).find('.pic .block-item-title').css('backgroundColor', 'transparent');

  //         $( this ).css('borderColor', '#ccc');

  //     }
  // );

  // $('#cat_menu li').mouseenter(function () {
  //     $(this).stop();
  //     $(this).animate({'marginLeft': '30px'}, 100, function () {

  //     })
  // });

  // $('#cat_menu li').mouseleave(function () {
  //     $(this).stop();
  //     $(this).animate({'marginLeft': '15px'}, 100, function () {

  //     })
  // });

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
  // if($('body.category .items_list').height() < 300) {
  // 	$('#content .stuff .left').css({'height' : 'auto', 'padding' : '3rem 0' });
  // 	$('body.category #cat_menu').css('top' , '0px');
  // }
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

// var admin_bar_height={
//     bar:'',
//     header:'',

//     bar_height:0,
//     header_top:0,

//     init:function(){
//         if($('#wpadminbar').length == 0){
//             return;
//         }
//         this.bar=$('#wpadminbar');
//         this.header=$('.body-inside #header');

//         this.header_top=parseInt(this.header.css('top').replace(/[^-\d\.]/g, ''), 10);
//     },

//     change_heigth:function(){
//         if($('#wpadminbar').length == 0){
//             return;
//         }

//         this.bar_height=this.bar.height();
//         this.header.css('top', ((this.header_top + this.bar_height) + 'px'));

//     }
// };

function search_border() {

  $(".search .input input").focus(function () {
    $(this).closest(".input").toggleClass("focus");
  }).blur(function () {
    $(this).closest(".input").toggleClass("focus");
  });

}

$(document).ready(function () {

  // admin_bar_height.init();
  // admin_bar_height.change_heigth();



  search_border();

  $('#search').keyup(delay(function(ev) {
    liveSearch(ev, this.value);
  }, 500)).focus(function(ev){
    liveSearch(ev, this.value);
  }).blur(function(){
    window.setTimeout("$('#customize_search_results_ya').remove();", 500);
  });

});

// $(window).resize(function () {
//     admin_bar_height.change_heigth();
// });

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

/*
 Sticky-kit v1.1.3 | MIT | Leaf Corcoran 2015 | http://leafo.net
*/
(function(){var c,f;c=window.jQuery;f=c(window);c.fn.stick_in_parent=function(b){var A,w,J,n,B,K,p,q,L,k,E,t;null==b&&(b={});t=b.sticky_class;B=b.inner_scrolling;E=b.recalc_every;k=b.parent;q=b.offset_top;p=b.spacer;w=b.bottoming;null==q&&(q=0);null==k&&(k=void 0);null==B&&(B=!0);null==t&&(t="is_stuck");A=c(document);null==w&&(w=!0);L=function(a){var b;return window.getComputedStyle?(a=window.getComputedStyle(a[0]),b=parseFloat(a.getPropertyValue("width"))+parseFloat(a.getPropertyValue("margin-left"))+
    parseFloat(a.getPropertyValue("margin-right")),"border-box"!==a.getPropertyValue("box-sizing")&&(b+=parseFloat(a.getPropertyValue("border-left-width"))+parseFloat(a.getPropertyValue("border-right-width"))+parseFloat(a.getPropertyValue("padding-left"))+parseFloat(a.getPropertyValue("padding-right"))),b):a.outerWidth(!0)};J=function(a,b,n,C,F,u,r,G){var v,H,m,D,I,d,g,x,y,z,h,l;if(!a.data("sticky_kit")){a.data("sticky_kit",!0);I=A.height();g=a.parent();null!=k&&(g=g.closest(k));if(!g.length)throw"failed to find stick parent";
  v=m=!1;(h=null!=p?p&&a.closest(p):c("<div />"))&&h.css("position",a.css("position"));x=function(){var d,f,e;if(!G&&(I=A.height(),d=parseInt(g.css("border-top-width"),10),f=parseInt(g.css("padding-top"),10),b=parseInt(g.css("padding-bottom"),10),n=g.offset().top+d+f,C=g.height(),m&&(v=m=!1,null==p&&(a.insertAfter(h),h.detach()),a.css({position:"",top:"",width:"",bottom:""}).removeClass(t),e=!0),F=a.offset().top-(parseInt(a.css("margin-top"),10)||0)-q,u=a.outerHeight(!0),r=a.css("float"),h&&h.css({width:L(a),
    height:u,display:a.css("display"),"vertical-align":a.css("vertical-align"),"float":r}),e))return l()};x();if(u!==C)return D=void 0,d=q,z=E,l=function(){var c,l,e,k;if(!G&&(e=!1,null!=z&&(--z,0>=z&&(z=E,x(),e=!0)),e||A.height()===I||x(),e=f.scrollTop(),null!=D&&(l=e-D),D=e,m?(w&&(k=e+u+d>C+n,v&&!k&&(v=!1,a.css({position:"fixed",bottom:"",top:d}).trigger("sticky_kit:unbottom"))),e<F&&(m=!1,d=q,null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),h.detach()),c={position:"",width:"",top:""},a.css(c).removeClass(t).trigger("sticky_kit:unstick")),
  B&&(c=f.height(),u+q>c&&!v&&(d-=l,d=Math.max(c-u,d),d=Math.min(q,d),m&&a.css({top:d+"px"})))):e>F&&(m=!0,c={position:"fixed",top:d},c.width="border-box"===a.css("box-sizing")?a.outerWidth()+"px":a.width()+"px",a.css(c).addClass(t),null==p&&(a.after(h),"left"!==r&&"right"!==r||h.append(a)),a.trigger("sticky_kit:stick")),m&&w&&(null==k&&(k=e+u+d>C+n),!v&&k)))return v=!0,"static"===g.css("position")&&g.css({position:"relative"}),a.css({position:"absolute",bottom:b,top:"auto"}).trigger("sticky_kit:bottom")},
      y=function(){x();return l()},H=function(){G=!0;f.off("touchmove",l);f.off("scroll",l);f.off("resize",y);c(document.body).off("sticky_kit:recalc",y);a.off("sticky_kit:detach",H);a.removeData("sticky_kit");a.css({position:"",bottom:"",top:"",width:""});g.position("position","");if(m)return null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),h.remove()),a.removeClass(t)},f.on("touchmove",l),f.on("scroll",l),f.on("resize",y),c(document.body).on("sticky_kit:recalc",y),a.on("sticky_kit:detach",H),setTimeout(l,
      0)}};n=0;for(K=this.length;n<K;n++)b=this[n],J(c(b));return this}}).call(this);

if(jQuery(".sticky-accordion > div").length) {
  jQuery(".sticky-accordion > div").stick_in_parent({
    offset_top: 90
  });
}
document.addEventListener("DOMContentLoaded", function(event) {
  jQuery('.wpcf7.no-js > p > label > span > input[name="your-name"]').attr("placeholder", "Имя");
  jQuery('.wpcf7.no-js > p > label > span > input[name="tel-873"]').attr("placeholder", "Телефон");
  jQuery(".back-call").on('click', function (){
    jQuery(".wpcf7-form-control.wpcf7-submit.has-spinner").trigger('click');
  })
});

