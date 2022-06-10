$(document).scroll(() => {
    let height = $(document).scrollTop();
    let width = $(document).width();

    if(width <= 767 && height > 0){
        $('.brand').addClass('fix');
        $('main').addClass('fix');
        return
    }
    else if(width <= 767 && height <= 0){
        $('.brand').removeClass('fix');
        $('main').removeClass('fix');
        return
    }

    if(width >= 768 && width <= 1023 && height > 40){
        $('.brand').addClass('fix');
        $('.banner__row').addClass('fix');
        return
    }
    else if(width >= 768 && width <= 1023  && height < 40){
        $('.brand').removeClass('fix');
        $('.banner__row').removeClass('fix');
        return
    }

    if(width <= 1366 && height > 144){
        $('nav').addClass('fix');
        $('.brand').addClass('fix');
        return
    }
    else if(width <= 1366 && height < 144){
        $('nav').removeClass('fix');
        $('.brand').removeClass('fix');
        return
    }

    if(height > 145){
        $('nav').addClass('fix');
        $('.brand').addClass('fix');
    }
    else{
        $('nav').removeClass('fix');
        $('.brand').removeClass('fix');
    }
})

$('.navigation  .dropOut .sub_nav__items li').click(function(){
    let item = $(this);
    $('.navigation  .dropOut .sub_nav__items li').removeClass('active');
    if(item.hasClass('active')){
        item.removeClass('active');
    }
    else{
        item.addClass('active')
    }
});

document.addEventListener('DOMContentLoaded', function() {

    var Nav = new hcOffcanvasNav('#main-nav', {
        disableAt: false,
        width: '100%',
        position: 'right',
        customToggle: '.MenuToggleButton',
        levelSpacing: 40,
        navTitle: 'Главное меню',
        levelTitles: true,
        levelTitleAsBack: true,
        pushContent: '#container',
        labelBack: 'Назад',
        swipeGestures: false,
        levelOpen: 'expand'
    });

});

$(document).ready(() => {
    $("#mobile-menu").remove('d-none');
});

$('.navigation .dropOut ul.firstChild .firstList').hover((event) => {
    $('.navigation .dropOut ul.firstChild > .firstList').removeClass('active');
    $(event.currentTarget).addClass('active');
})

$('.navigation .dropOut ul.second_sub_nav__items .secondList').hover((event) => {
    $('.navigation .dropOut ul.second_sub_nav__items > .secondList').removeClass('active');
    $(event.currentTarget).addClass('active');
})

$('.navigation .dropOut ul.third_sub_nav__items .thirdList').hover((event) => {
    $('.navigation .dropOut ul.third_sub_nav__items > .thirdList').removeClass('active');
    $(event.currentTarget).addClass('active');
})
