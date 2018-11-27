
$(document).ready(function () {
    var cnt = Number(getCookie('cnt'));
    if (cnt >= 3) {
        $('.add_compare').addClass('btn_block');
    }
    if (cnt == 0) {
        $('.head_compare').addClass('btn_block');
    }      
    $('.populap__tabs-tovar').find('.dell_block').parent().parent().addClass('compare');    

  
    $('.moby__menu .moby__menu-language li.active a').click(function() {
        if($(".moby__menu .moby__menu-language li.active a").text() == 'ua') {
            document.location.href='/ru/';
        } else {
            document.location.href='/ua/';
        }
        return false;
    });
    
    $('.compare.red_btn').mousedown(function() {
        $(".cnt").addClass("animation");
    }); 
    
    
    
    $('.compare.red_btn').mouseup(function() {
       setTimeout( function() {
        $(".cnt").removeClass("animation");
       }, 1000);
    });
    
 }); 
$(document).on('click', '.add_compare', function () {     
    $(this).removeClass('add_compare');       $(this).parent().parent().addClass('compare');    
    $(this).addClass('dell_block');
    $(this).text($('.mess26').attr('data-text'));
    var cnt = Number(getCookie('cnt'));
    cnt++;
    document.cookie = "cnt=" + cnt+ "; path=/";
    $(".cnt").text(cnt); 
    if (cnt >= 3) {
        $('.add_compare').addClass('btn_block');
    }
    if (cnt > 0) {
        $('.head_compare').removeClass('btn_block');
    }
    if (cnt == 0) {
        $('.head_compare').addClass('btn_block');
    }
    var id1 = getCookie('id1');
    var id2 = getCookie('id2');
    var id3 = getCookie('id3');
    var id = $(this).attr('data-id');
    if (id1 == null || typeof id1 === "undefined" || id1 == "dell") {
        document.cookie = "id1=" + id + "; path=/";
    } else if (id2 == null || typeof id2 === "undefined" || id2 == "dell") {
        document.cookie = "id2=" + id + "; path=/";
    } else if (id3 == null || typeof id3 === "undefined" || id3 == "dell") {
        document.cookie = "id3=" + id + "; path=/";
    }  
});

$(document).on('click', '.dell_block', function () {        $(this).parent().parent().removeClass('compare');
    $(this).removeClass('dell_block');
    $(this).addClass('add_compare');    
    
    $(this).text($('.mess25').attr('data-text'));

    var cnt = Number(getCookie('cnt'));
    cnt--;
    document.cookie = "cnt=" + cnt+ "; path=/";
    if (cnt == 0) {
        $('.head_compare').addClass('btn_block');
    }
    if (cnt < 3) {
        $('.add_compare').removeClass('btn_block');
    }

    $(".cnt").text(cnt);
    var id = $(this).attr('data-id');
    var id1 = getCookie('id1');
    var id2 = getCookie('id2');
    var id3 = getCookie('id3');
    if (id === id1) {
        document.cookie = "id1=dell; path=/";
    } else if (id === id2) {
        document.cookie = "id2=dell; path=/";
    } else if (id === id3) {
        document.cookie = "id3=dell; path=/";
    }      
       
});




function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}


$(document).on('change', '.sort-ch', function () {
     $(".sort-ch").not(this).prop("checked", false);
});

$(document).on('change', '.check-filter', function () {

   $(".sort-content").removeClass('open');
    var filter ={};
    for(var i=0; i<$(".check-filter:checkbox:checked").length;i++ ){
        if(typeof(filter[$(".check-filter:checkbox:checked").eq(i).attr('name')])=="undefined"){
            filter[$(".check-filter:checkbox:checked").eq(i).attr('name')]={}
            filter[$(".check-filter:checkbox:checked").eq(i).attr('name')]=$(".check-filter:checkbox:checked").eq(i).val();
        }else{
            filter[$(".check-filter:checkbox:checked").eq(i).attr('name')]=filter[$(".check-filter:checkbox:checked").eq(i).attr('name')]+','+$(".check-filter:checkbox:checked").eq(i).val();
        }

    }

    $.ajax({
        url: "/product/find",
        method: "POST",
        dataType: 'html',
        data: {
            name: 'text',
            obj: filter,
            "_csrf-frontend": $("input[name='_csrf-frontend']").val(),

        },
        error: function () {

        },
        success: function (res) {
            $('.category__content-list').html(res);

        },
        complete: function () {
            __isAjax = false;
            _return = false;
        }
    });

});


$(document).on('click', '.product-select', function () {
    var id = $(this).attr('data-id');
    var old = getCookie('interes_prod');
    if ( old == null || typeof old === "undefined") {
        document.cookie = "interes_prod=" + id+ "; path=/";
    } else {
        var prod = old + ',' + id;
        document.cookie = "interes_prod=" + prod+ "; path=/";
    }
});

$('.popup_offers').css("display", "none");
$(function() {
    $('.popap_offers_btn').on('click', function(e)  {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/site/offers",
            method: "POST",
            dataType: 'html',
            data: {
                id: id,
                "_csrf-frontend": $("input[name='_csrf-frontend']").val(),
            },
            error: function () {
            },
            success: function (res) {
                $('.popup_list').html(res);
            },
            complete: function () {
                __isAjax = false;
                _return = false;
            }
        });
        $('.popup_offers').fadeIn(350);
        e.preventDefault();
        $('body').addClass('overflow');
    });
    $('[data-popup-close]').on('click', function(e)  {

        $('.popup_offers').fadeOut(350);
        $('body').removeClass('overflow');
        e.preventDefault();
    });
});


$(document).ready(function () {

$('.popap_shops_btn').on('click', function(e)  {
    var id = $(this).attr('data-id');
    $.ajax({
        url: "/site/shops-widget",
        method: "POST",
        dataType: 'html',
        data: {
            id: id,
            "_csrf-frontend": $("input[name='_csrf-frontend']").val(),
        },
        error: function () {
        },
        success: function (res) {
            $('.popup_list').html(res);
        },
        complete: function () {
            __isAjax = false;
            _return = false;
        }
    });
    $('.popup_offers').fadeIn(350);
    e.preventDefault();
    $('body').addClass('overflow');
});

});



