$(".chosen-select").chosen();

 $('.popup_btn').magnificPopup({
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
      beforeOpen: function() {
         this.st.mainClass = this.st.el.attr('data-effect');
      }
    },
    midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  });

//   owl carousel
/*
$('.loop').owlCarousel({
    center: true,
    items:2,
    loop:true,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
});
$('.nonloop').owlCarousel({
    center: true,
    items:2,
    loop:false,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
});*/

//range calendar

/*$(function() {
        $('.calendar').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
*/

// dropdown tabs
    /*$('.tab_open').click(function() {
        $('.g_popup_openedside').slideUp();
        $(this).next('.g_popup_openedside').stop().slideToggle();
    });*/


    //tabs


/*$(document).ready(function() {

        $('.header_tablinks li a').on('click', function(e) {
            var currentNewsValue = $(this).attr('href');

            $('.table_tab ').hide();
            $(currentNewsValue).fadeIn(500);


            $(this).parent('li').addClass('active').siblings().removeClass('active');
            e.preventDefault();
        });
    });

*/

//datepicker

/*$('[data-toggle="datepicker"]').datepicker({
        inline: true,
        format: 'dd-mm-yyyy'
    });
*/

$(".datepick").flatpickr({
    dateFormat: "d-m-Y",
});

$('.main_banner_slider .owl-carousel').owlCarousel({
    center: false,
    items:1,
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        600:{
            items:1
        }
    }
});

$(document).on('click' , '.product_like' ,function(e){

    var button = $(this);
    var data = {
        'id':$(this).data('data_id')
    }

    $.ajax({
        type: "POST",
        url:"/wishlist",
        data: data,
        dataType: 'json',
        headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function (result) {
            button.toggleClass('liked');
            $('.header_wishlist').find('span').html(result.count);
        }
    })
});

var call = $('#send-call-form');

var callForm = call.parents('form');

call.click(function (e) {
    e.preventDefault();
    var data = callForm.serialize();

    $.ajax({
        type: "POST",
        url: "/call-me",
        data: data,
        dataType: "json",
        success: function (result) {
            console.log(result);
        }
    })
})



$('.main_sale_container .owl-carousel').owlCarousel({
    center: false,
    items:4,
    loop:true,
    margin:52,
    nav:true,
    dots:true,
    responsive:{
        0:{
            items:2,
            margin:16,
            nav:false,
        },
        768:{
            items:3,
            margin:16,
            nav:false,
        },
        1200:{
            items:4
        }
    }
});

$('.main_news_section .owl-carousel').owlCarousel({
    center: false,
    items:4,
    loop:true,
    margin:30,
    nav:true,
    dots:true,
    responsive:{
        0:{
            items:2,
            autoWidth:true,
            nav:false,
        },
        600:{
            items:2,
            margin:16,
            nav:false,
        },
        768:{
            items:3,
            margin:16,
            nav:false,
        },
        1200:{
            items:4
        }
    }
});

$('.news_inner_recommended .owl-carousel').owlCarousel({
    center: false,
    items:4,
    loop:true,
    margin:30,
    nav:true,
    dots:true,
    responsive:{
       0:{
            items:2,
            autoWidth:true,
            nav:false,
        },
        600:{
            items:2,
            margin:16,
            nav:false,
        },
        768:{
            items:3,
            margin:16,
            nav:false,
        },
        1200:{
            items:4
        }
    }
});

$('.main_reviews_container .owl-carousel').owlCarousel({
    center: false,
    items:3,
    loop:true,
    margin:23,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2,
            autoWidth:true,
            nav:false,
        },
        600:{
            items:2,
            margin:16,
            nav:false,
        },
        768:{
            items:2,
            margin:16,
            nav:false,
        },
        1200:{
            items:3
        }
    }
});

var productPrice = $('#product_price').html();
var totalPrice = $('#product_total_price');
totalPrice.html(productPrice);

 $('.num_counter').click(function(e) {

       e.preventDefault();
        var bu = $(this),
            parent = bu.parents('.mehsul_counter'),
            input = parent.find('.numeric'),
            min = parseInt(input.attr('min')),
            max = parseInt(input.attr('max')),
            old_value = parseInt(input.val()),
            new_value = (bu.hasClass('numeric_down')) ? (old_value > min) ? old_value -= 1 : old_value : (old_value < max) ? old_value += 1 : old_value;
            input.val(parseFloat(new_value));
            // $('#product_total_price').html(Number($("input[name = 'count']").val() * $('#product_price').html()).toFixed(1))
            // bu.parents('.basket_bottom_buttons').find('.bpt_val').text(bu.parents('.basket_bottom_buttons').find('.bpp_val').text() * new_value)
            // $('.basket_right_table').children('tbody').children().eq(bu.parents('.basket_card').index()).children().eq(1).find('span').text(new_value)
            // console.log($('.basket_right_table').children('tbody').children().eq(bu.parents('.basket_card').index()).children().eq(1).find('input').val(new_value))
            // $('.basket_right_table').children('tbody').children().eq(bu.parents('.basket_card').index()).children().eq(2).find('.table_azn').find('span').html(bu.parents('.basket_bottom_buttons').find('.bpt_val').html())
            // console.log($(this).parents('.basket_bottom_buttons').find('.bpp_val').html())
            bu.parents('.update-form').submit()
        return false;
 });
    
$('.header_user_box>a').click(function (e) {
    $(this).toggleClass('active');
    $('.header_user_drop').fadeToggle();
    e.preventDefault();
});

$('.header_user_box>a').click(function(e){
    e.stopPropagation();
});

$('.header_user_box>a').click(function(e){
    e.stopPropagation();
});
$(document).click(function() {
    $('.header_user_box>a').removeClass('active');
    $('.header_user_drop').fadeOut();
});

$(document).ready(function() {

    $('.my_profile_tab_links  a').on('click', function(e) {
        var currentNewsValue = $(this).attr('href');

        $('.my_profile_tab ').hide();
        $(currentNewsValue).fadeIn(500);


        $(this).addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
});

$(document).ready(function() {

    $('.pro_right_tablinks  a').on('click', function(e) {
        var currentNewsValue = $(this).attr('href');

        $('.product_cat_tab ').hide();
        $(currentNewsValue).fadeIn(500);


        $(this).addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
});

if($(window).width() < 769){
    $('.mb_cats_heading').click(function(){
        $('.mb_cats').slideToggle();
        $(this).toggleClass('active')
    });
}

$('.header_search').click(function(e){
    $(this).toggleClass('active')
    $(this).prev('input').toggleClass('inp_0');
    e.preventDefault();
});

$('.header_search').click(function(e){
    e.stopPropagation();
});

$('.header_search_box input').click(function(e){
    e.stopPropagation();
});
$(document).click(function() {
   $('.header_search_box input').addClass('inp_0');
    $('.header_search').removeClass('active');
});

$('.menu_open').click(function(){
    $('.mobile_menu').addClass('opened');
});

$('.menu_close').click(function(){
    $('.mobile_menu').removeClass('opened');
})