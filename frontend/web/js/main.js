$(document).ready(function() {

    $('.partners_slider').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      nextArrow: '<div class="partners_slider-arrow arrows"></div>',
      prevArrow: '<div class="partners_slider-arrow arrows"></div>',
      responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      }
    ]
    });


    $('.language .current').on('click', function() {
        $('.language').toggleClass('open');
    });

  $(document).mouseup(function (e){
    var div = $(".language"); 
    if (!div.is(e.target) && div.has(e.target).length === 0) {
      div.removeClass('open') 
    }
  });
  $('.mobyl-menu').on('click', function() {
    $('.mobyl-menu').hide();
    $('.moby__menu').addClass('open');
    $('body').addClass('overflow');
  });

  $('.moby__menu-close').on('click', function() {
    $('.mobyl-menu').show();
    $('.moby__menu').removeClass('open');
    $('body').removeClass('overflow');
  });
    

    $('.main__slider').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      nextArrow: '<div class="next__arrow arrows"></div>',
      prevArrow: '<div class="prev__arrow arrows"></div>',
      responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows: false
        }
      }
    ]
    });

  $(function() {
    $('ul.populap__tabs-caption').on('click', 'li:not(.active)', function() {
      $(this)
        .addClass('active').siblings().removeClass('active')
        .closest('div.populap__tabs').find('div.populap__tabs-content').removeClass('active').eq($(this).index()).addClass('active');
    });
  });



  $('.prod__cart-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.prod__cart-slider-nav',
      responsive: [
      {
        breakpoint: 767,
        settings: {
          dots: true
        }
      }
    ]
  });

  $('.prod__cart-slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    asNavFor: '.prod__cart-slider',
    focusOnSelect: true,
    vertical: true,
    dots: false,
    nextArrow: '<div class="next__arrow arrows"></div>',
    prevArrow: '<div class="prev__arrow arrows"></div>'
  });


  $('.prod__advantages-slider').slick({
      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      speed: 500,
      nextArrow: '<div class="next__arrow arrows"></div>',
      prevArrow: '<div class="prev__arrow arrows"></div>',
      responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow:3
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow:1,
          centerMode: true,
          arrows: false
        }
      }
    ]
  });

  $('.cart__recipes-slider').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      speed: 500,
      nextArrow: '<div class="next__arrow arrows"></div>',
      prevArrow: '<div class="prev__arrow arrows"></div>',
      responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow:3
        }
      },
       {
        breakpoint: 767,
        settings: {
          slidesToShow:1,
          centerMode: true,
          arrows: false
        }
      }
    ]
  });

  $('.cart__documentation-blocks').slick({
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      responsive: [
       {
        breakpoint: 767,
        settings: {
          slidesToShow:1,
          centerMode: true
        }
      }
    ]
  });

  $('.video-slick').slick({
    infinite: true,
    slidesToShow: 1,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
        }
      }
    ]
  });

  

  $(".cart__FAQ-question").click(function(){
    $(".cart__FAQ-answer").slideUp('fast');  
    $('.cart__FAQ-question').removeClass('open');
    if($(this).next().is(':hidden')){
      $(this).toggleClass('open');
      $(this).next().slideDown('fast');
    }
  });


  $('.interested-tovar-slider').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      nextArrow: '<div class="next__arrow arrows"></div>',
      prevArrow: '<div class="prev__arrow arrows"></div>',
      responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow:2
        }
      },
      {
        breakpoint: 762,
        settings: {
          slidesToShow:1,
          arrows: false
        }
      }
    ]
  });
  


  $(".compare__table table :contains('ні')").html(function (_, html) {
      return html.replace(/(ні)/g, '<span class="false">$1</span>');
  });
  $(".compare__table table :contains('Ні')").html(function (_, html) {
      return html.replace(/(Ні)/g, '<span class="false">$1</span>');
  });
  $(".compare__table table :contains('Так')").html(function (_, html) {
      return html.replace(/(Так)/g, '<span class="true">$1</span>');
  });
  $(".compare__table table :contains('так')").html(function (_, html) {
      return html.replace(/(так)/g, '<span class="true">$1</span>');
  });


  $('.nav__description-list ').navScroll({
    mobileDropdown: true,
    mobileBreakpoint: 768,
    scrollSpy: true,
    navHeight: 180
  });

  $('a[href^="#"]').not('body .moby__menu-language .active a').click(function(){
     var target = $(this).attr('href');
     if ( $(window).width() < 767) {
        $('html, body').animate({scrollTop: $(target).offset().top - 100}, 1000);
     } else {
        $('html, body').animate({scrollTop: $(target).offset().top - 180}, 1000);
     }
     return false;
  });

   jQuery(window).on('resize', function () {
        if (jQuery(window).width() < 767) {
          
        }
    });

  $(function() {
		$(document).on('click', '[data-popup-open]', function(e)  {
      var targeted_popup_class = $(this).attr('data-popup-open');
      $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
      e.preventDefault();
      $('body').addClass('overflow');
    });
    $('[data-popup-close]').on('click', function(e)  {
      var targeted_popup_class = $(this).attr('data-popup-close');
      $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
      $('body').removeClass('overflow');
      e.preventDefault();
    });
  });


  $('.sidebar__list>li>label').not($('.box-filter')).click(function() {
    $(this).toggleClass('active');
    $(this).parent().toggleClass('open');
  });
  $('.sidebar__list .box-filter label').click(function() {
    $(this).toggleClass('checked');
  });

  $('.sort-content').click(function() {
    $(this).toggleClass('open');
  });
  $(document).mouseup(function (e){ 
    var div = $(".sort-content");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
      div.removeClass('open'); 
    }
  });
  $('.sort-content li label').click(function() {
    $('.sort-content li').removeClass('checked');
    $(this).parent().addClass('checked');
    $('.sort-content-checked').text($(this).text());
  });

  $('.category__content-mode .view-mode').click(function() {
    $('.category__content-mode .view-mode').removeClass('active');
    $(this).toggleClass('active');
  });

  $('.category__content-mode .view-col').click(function() {
    $('.category__content-list').addClass('colun');
    $('.category__content-list').removeClass('row');
  });  

  $('.category__content-mode .view-row').click(function() {
    $('.category__content-list').addClass('row');
    $('.category__content-list').removeClass('colun');
  }); 


/*   $('.moby__menu-language li.active').click(function() {
     $(this).toggleClass('open');
     $( ".moby__menu-language li" ).slideToggle(0);
     return false
  }); */


  if (jQuery(window).width() < 767) {
    $('.sidebar__title').click(function() {
      $('.sidebar__list').slideToggle();
    });

    $('.cart__navigation .nav__description-list li:first-child').click(function(e) {
      $('.cart__navigation .nav__description-list li').toggleClass('open');
      e.preventDefault();
    });

  }

  $('.prod__cartinfo-comparison').click(function () {
    if($(this).text() == 'Додано' ) {
       $(this).removeClass('addCart').text('Додати до порівняння');
    } else {
      $(this).addClass('addCart').text('Додано')
    }
  });


   $(".compare__table tbody,.contant .compare__tovars-inners").on('scroll', function(e) { 
        var ele = $(e.currentTarget);
        var left = ele.scrollLeft();
        var top = ele.scrollTop();
      if (ele.attr("class") === 'compare__tovars-block' || ele.attr("class") === 'compare__tovars-block' ) {
            console.log('one');
        } else {
            $(".compare__tovars-inners").scrollTop(top);
            $(".compare__tovars-inners").scrollLeft(left);
                  $(".compare__table tbody").scrollTop(top);
            $(".compare__table tbody").scrollLeft(left);
        }
   });


class Popup {
  constructor(opt) {
    this.options = opt;

    this.popup = $(opt.popup);
    this.popupIn = $(opt.popupIn);
    this.popupClose = $(opt.popupClose);
    this.popupOpen = $(opt.popupOpen);

    this.afterOpen = opt.afterOpen;
    this.beforeOpen = opt.beforeOpen;
    this.afterClose = opt.afterClose;

    this.popupOpen.on('click', this.open.bind(this));
    this.popupClose.on('click', this.hide.bind(this));

    if (this.options.hideFromParent) this.popup.on('click', this._hideFromParent.bind(this));
  }

  open(e, dataPopup) {
    let target = $(e.currentTarget) || {};
    let data = dataPopup || target.data('open');
    let popup = this.popup.filter(`[data-popup="${data}"]`);

    if ($('.popup').hasClass('is-open')) {

      let zIndexList = [].map.call($('.popup.is-open'), item => +getComputedStyle(item).zIndex);
      let zIndex = Math.max(zIndexList);

      popup.css("zIndex", zIndex + 1);
    }

    if (this.beforeOpen && isFunction(this.beforeOpen)) this.beforeOpen(this.popup, e);

    // popup.fadeIn('fast');
    $('.js-popup').addClass('is-open');
    $('.js-open-popup').removeClass('active');
    popup.addClass('is-open');
    target.addClass('active');

    //this._scrollTop = $(window).scrollTop();
    $('body')
    //.css('top', -this._scrollTop)
    .addClass('popup-open');

    //callback
    function isFunction(functionToCheck) {
      let getType = {};
      return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
    }

    if (this.afterOpen && isFunction(this.afterOpen)) this.afterOpen(this.popup);

    e.preventDefault();
  }

  hide(e, dataPopup) {
    let target = $(e.currentTarget) || {};
    let data = dataPopup || target.data('open');
    let popup = dataPopup ? this.popup.filter(`[data-popup="${data}"]`) : target.closest(this.options.popup);

    $('body').removeAttr('style').removeClass('popup-open');
    //.scrollTop(this._scrollTop);


    // popup.fadeOut('fast');
    popup.removeClass('is-open');
    $('.js-open-popup').removeClass('active');

    function isFunction(functionToCheck) {
      let getType = {};
      return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
    }

    if (this.afterClose && isFunction(this.afterClose)) this.afterClose(this.popup);

    e.preventDefault();
  }

  _hideFromParent(e) {

    if (!$(e.target).closest(this.options.popupIn).length) {}
  }

}

//data-open / data-popup

let popup = new Popup({
  popup: '.js-popup',
  popupClose: '.js-close-popup',
  popupOpen: '.js-open-popup',
  popupIn: '.js-popup-in',
  hideFromParent: true,
  beforeOpen(popup, e) {
    let target = $(e.currentTarget);
  }
});

//hide popup on click anywhere
$(window).click(function () {
  $('.js-popup').removeClass('is-open');
  $('body').removeClass('popup-open');
  $("iframe").each(function () {
    var src = $(this).attr('src');
    $(this).attr('src', src);
  });
    setTimeout(function(){
        stopVideo(player);
    },200);
});


var player = $('#main_video');
function startVideo(id){
  player=$('#'+id);
  if( player.prop('src').indexOf("?autoplay=1") == -1){
      player.prop('src', player.prop('src')+"?autoplay=1");
  }
}


function stopVideo(player){
    var videoURL = player.prop('src');
    player.prop('src','');
    player.prop('src',videoURL);

      player.prop('src', player.prop('src')+"?autoplay=0");

}

$('.js-popup-in, .js-open-popup, #second_submit').click(function (event) {
  event.stopPropagation();
  startVideo('main_video');
  $('js-popup').addClass('is-open')
});

//hide popup on Escape press
$(document).keydown(function (e) {
  if (e.keyCode == 27) {
    $('.js-popup').removeClass('is-open');
    $('body').removeClass('popup-open');
    $("iframe").each(function () {
      var src = $(this).attr('src');
      $(this).attr('src', src);
        setTimeout(function(){
            stopVideo(player);
        },200);
    });
  }
});

//stop video in popup on close
$('.js-close-popup[data-close="video"]').click(function () {
  $("iframe").each(function () {
    var src = $(this).attr('src');
    $(this).attr('src', src);
  });
  setTimeout(function(){
      stopVideo(player);
  },200);
});



$('.sidebar__list li').click(function(event){
	var filterH = $('.sidebar__list').outerHeight();
	filterH = filterH + 150;
	$('main').css('min-height', filterH + 'px');
});


});
