$(document).ready(function () {
    //Ripple
    let $btnRipple = $('.btn--ripple'),
        $btnRippleInk, btnRippleH, btnRippleX, btnRippleY;
    $btnRipple.on('mouseenter', function (e) {
        let $t = $(this);
        if ($t.find(".btn--ripple-ink").length === 0) {
            $t.prepend("<span class='btn--ripple-ink'></span>");
        }

        $btnRippleInk = $t.find(".btn--ripple-ink");
        $btnRippleInk.removeClass("btn--ripple-animate");
        if (!$btnRippleInk.height() && !$btnRippleInk.width()) {
            btnRippleH = Math.max($t.outerWidth(), $t.outerHeight());
            $btnRippleInk.css({ height: btnRippleH, width: btnRippleH });
        }

        btnRippleX = e.pageX - $t.offset().left - $btnRippleInk.width() / 2;
        btnRippleY = e.pageY - $t.offset().top - $btnRippleInk.height() / 2;
        $btnRippleInk.css({ top: btnRippleY + 'px', left: btnRippleX + 'px' }).addClass("btn--ripple-animate");
    });
    // menu
    $('.menu-button').on('click', function () {
        $('.cover-menu').css('display', 'block')
        if ($(this).hasClass('cross')) {
            $('.navList').css('right', '-20rem')
            $(this).removeClass('cross')
            $('.navItem.logo').css('transition', 'none').css('background-color', 'transparent').css('position', 'absolute')
            $('.cover-menu').css('display', 'none')
            $('#search-box,.buy-subscribe').css('z-index', '90')
            $('.menu-button').css('position', 'absolute')
        } else {
            $('.navList').css('right', '0')
            $(this).addClass('cross')
            $('.navItem.logo').css('transition', '1s ease-in-out').css('background-color', '#222327').css('position', 'fixed')
            $('#search-box,.buy-subscribe').css('z-index', '20')
            $('.menu-button').css('position', 'fixed')
        }
    })
    $('.cover-menu').on('click', function () {
        $('.navList').css('right', '-20rem')
        $('.navItem.logo').css('transition', 'none').css('background-color', 'transparent').css('position', 'absolute')
        $(this).css('display', 'none')
        $('.menu-button').removeClass('cross').css('position', 'absolute')
        $('#search-box,.buy-subscribe').css('z-index', '90')
    })
    $(window).scroll(function () {
        let currentScrollPos = window.pageYOffset;
        $(window).scroll(function () {
            let scroll_get_top = $(document).scrollTop()
            if (currentScrollPos > scroll_get_top) {
                $('.siteNav').css('top', '0')
            } else {
                $('.siteNav,.menu-items-left').css('top', '-20rem')
            }
        })
        let scroll_get = $(document).scrollTop()
        if (scroll_get > 0) {
            $('.siteNav').css({
                backgroundColor: '#000000',
                backgroundImage: 'none'
            })
        } else {
            $('.siteNav').css('background-color', 'transparent')
        }
    })
    //profile dropdown
    $('.user-login-show').on('click', function () {
        let status = $('.profile-dropdown-box').css('display')
        if (status === 'none') {
            $('.profile-dropdown-box').fadeIn(300)
        } else {
            $('.profile-dropdown-box').hide()
        }
    })
    // search box
    $('#search-box .fa-search').on('click', function () {
        $('.search-panel').css('display', 'block')
    })
    $('#close_search').on('click', function () {
        $('.search-panel').css('display', 'none')
    })
    $('.filter-search').on('click', function () {
        let status_filter_box = $('.filter-box').css('display')
        if (status_filter_box === 'none') {
            $('.filter-box').slideDown(500).css('display', 'flex')
            $('.filter-search .fa-angle-down').css('transform', 'rotate(180deg)')
        } else {
            $('.filter-box').slideUp(500)
            $('.filter-search .fa-angle-down').css('transform', 'rotate(0)')
        }
    })
    $('.menu-filters ul li').on('click', function () {
        let status_show = $(this).css('background-color')
        if (status_show === 'rgb(34, 35, 39)') {
            $(this).css('background-color', '#37383e')
            $(this).find('.fa-angle-left').css('transform', 'rotate(0)')
        } else {
            $('.menu-filters ul li').css('background-color', '#37383e')
            $(this).css('background-color', '#222327')
            $('.menu-filters ul li .fa-angle-left').css('transform', 'rotate(0)')
            $(this).find('.fa-angle-left').css('transform', 'rotate(-90deg)')
        }
    })
    $('#genre').on('click', function () {
        let status_box_show = $('.genre-box').css('display')
        if (status_box_show === 'none') {
            $('.filter-body-box').css('display', 'none')
            $('.genre-box').css('display', 'block')
        } else {
            $('.genre-box').css('display', 'none')
        }
    })
    $('#Country').on('click', function () {
        let status_box_show = $('.ManufacturingCountry-box').css('display')
        if (status_box_show === 'none') {
            $('.filter-body-box').css('display', 'none')
            $('.ManufacturingCountry-box').css('display', 'block')
        } else {
            $('.ManufacturingCountry-box').css('display', 'none')
        }
    })
    $('#Sound').on('click', function () {
        let status_box_show = $('.SoundSubtitles-box').css('display')
        if (status_box_show === 'none') {
            $('.filter-body-box').css('display', 'none')
            $('.SoundSubtitles-box').css('display', 'block')
        } else {
            $('.SoundSubtitles-box').css('display', 'none')
        }
    })
    $('#Construction').on('click', function () {
        let status_box_show = $('.YearConstruction-box').css('display')
        if (status_box_show === 'none') {
            $('.filter-body-box').css('display', 'none')
            $('.YearConstruction-box').css('display', 'block')
        } else {
            $('.YearConstruction-box').css('display', 'none')
        }
    })
    $('.checkbox-place input').on('click', function () {
        let val_filter = $(this).val()
        let id_filter = $(this).attr('id')
        if ($(this).prop("checked") === true) {
            $('.filter-place-elements').append("<span id=" + id_filter + " class='filter-place-box_new-filter'>" + val_filter + " <i class='fa fa-times'></i></span>")
        }
        else if ($(this).prop("checked") === false) {
            $('.filter-place-elements span' + '#' + id_filter).remove()
        }
        if ($('.filter_all_delete').length) {
            if ($('.filter-place-elements span').length) {
            } else {
                $('.filter_all_delete').remove()
            }
        } else {
            $('.filter-delete-place').append("<div class='filter_all_delete'>حذف همه فیلتر ها</div>")
        }
    })
    $('.filter-place-box').on('mouseenter', function () {
        $('.filter-place-box_new-filter svg').on('click', function () {
            if ($('.filter-place-elements span').length) {
                let get_id = $(this).parent().attr('id')
                $('.checkbox-place input#' + get_id).prop('checked', false)
                $(this).parent().remove()
                if ($('.filter-place-elements span').length === 0) {
                    $('.filter_all_delete').remove()
                    $('.checkbox-place input').prop('checked', false)
                }
            }
        })
        $('.filter_all_delete').on('click', function () {
            $('.filter-place-elements span').remove()
            $(this).remove()
            $('.checkbox-place input').prop('checked', false)
        })
    })
    // login and register page
    $('.login-form-load').on('click', function () {
        $('#registerForm').css('display', 'none')
        $('#loginForm').css('display', 'block')
    })
    $('.register-form-load').on('click', function () {
        $('#loginForm').css('display', 'none')
        $('#registerForm').css('display', 'block')
    })
    $('.changeMood').on('click', function () {
        let status_text = $(this).text()
        if (status_text === "ورود از طریق ایمیل") {
            $(this).text('ورود از طریق شماره تلفن همراه')
            $('#Mobile + label').text('ایمیل')
            $('#Mobile').attr('placeholder', 'example@example.mail')
            $('#loginForm h1').text('ورود از طریق ایمیل')
            $('#loginForm h3').text('لطفا ایمیل خود و رمز عبور را وارد فرمایید')
        } else {
            $(this).text('ورود از طریق ایمیل')
            $('#Mobile + label').text('شماره تلفن همراه')
            $('#Mobile').attr('placeholder', '+98**********')
            $('#loginForm h1').text('ورود از طرق شماره تلفن همراه')
            $('#loginForm h3').text('لطفا شماره تلفن خود و رمز عبور را وارد نمایید')
        }
    })
    //
    // Season movie
    $('.Season-select').on('click', function () {
        let status = $('.movie-Season-box').css('display')
        if (status === 'none') {
            $('.movie-Season-box').fadeIn(200)
        } else {
            $('.movie-Season-box').fadeOut(250)
        }
    })
    // site sharing
    $('.choosePlane').on('click', function (e) {
        e.preventDefault()
        let plan_choose_day = $(this).parent().parent().find('.plan-length').text()
        let plan_choose_price = $(this).parent().parent().find('.plan-price').text()
        let plan_choose_off = $(this).parent().parent().find('.after-off').text()
        $('.buy-sharing-plan').css('display', 'block')
        $('.buy-sharing-plan-box h1').text(plan_choose_day)
        $('.price-plan_price').text(plan_choose_price)
        let off_plan = parseInt(plan_choose_price) - parseInt(plan_choose_off)
        $('.off-plan_price').text(off_plan + ' تومان')
        let VAT = (parseInt(plan_choose_price) - parseInt(plan_choose_off)) * 45 / 100
        $('.VAT_price').text(Math.round(VAT))
        let pay_price = parseInt(plan_choose_off) + VAT;
        $('#pay_price').text(pay_price)
    })
    $('#close_buy-plan-box').on('click', function () {
        $('.buy-sharing-plan').css('display', 'none')
    })
    //profile change
    $('.edit-account-name').on('click', function () {
        $('.user-profile-change').css('display', 'block')
        $('.user-detail-change-box').css('display', 'block')
    })
    $('.change_pass_user').on('click', function () {
        $('.user-profile-change').css('display', 'block')
        $('.user-change-pass-box').css('display', 'block')
    })
    $('.user-detail-change-box .fa-times,.user-change-pass-box .fa-times').on('click', function () {
        $(this).parent().css('display', 'none')
        $('.user-profile-change').css('display', 'none')
    })

    // swiper
    var swiper = new Swiper('.header-slider', {
        effect: 'fade',
        navigation: {
            nextEl: '.next-header-slide',
            prevEl: '.prev-header-slide',
        },
        pagination: {
            el: '.swiper-pagination'
        },
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });
    //top slider
    var swiper = new Swiper('.TopSlider', {
        slidesPerGroup: 2,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // when window width is >= 0
            0: {
                slidesPerGroup: 2,
                slidesPerView: 1.4,
                spaceBetween: 15
            },
            576: {
                slidesPerView: 3.3,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3.3,
                spaceBetween: 20
            },
            992: {
                slidesPerView: 3.2,
                spaceBetween: 30
            }
        }
    });
    var swiper = new Swiper(".mobile-slider", {
        spaceBetween: 30,
        effect: "fade",
        speed: 500,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    //iran news
    var swiper = new Swiper('.IranNews', {
        slidesPerGroup: 4,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // when window width is >= 0
            0: {
                slidesPerGroup: 4,
                slidesPerView: 3,
                spaceBetween: 15
            },
            400: {
                slidesPerGroup: 4,
                slidesPerView: 4.4,
                spaceBetween: 15
            },
            576: {
                slidesPerView: 5.3,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 6.4,
                spaceBetween: 10
            },
            1200: {
                slidesPerView: 7.4,
                spaceBetween: 15
            }
        }
    });
})

$(document).click(function (e) {
    if (
        $(e.target).closest(".user-login-show").length == 0 &&
        $(e.target).closest(".profile-dropdown-box").length == 0
    ) {
        $(".profile-dropdown-box").hide();
    }
});

var prev_id = 0;
function showDetails(event, id, url) {
    event.preventDefault();

    

    let detailbox = $(event.target)
        .parents(".swiper-container")
        .next(".movie-detail-show_index");
    if (id === prev_id) {
        if (detailbox.css("display") == "block") {
            detailbox.hide();
        } else {
            detailbox.fadeIn(300);
        }
    } else {
        $(".lds-ripple").fadeIn();
        prev_id = id;
        // ajax call
        var token = $('meta[name="_token"]').attr("content");


        var request = $.post(url, { id: id, _token: token });
        request.done(function (res) {
               $(".lds-ripple").fadeOut();
            detailbox
                .css({ "background": "url(" + res.poster + ")", 'background-size': '50% 100%', 'background-repeat': 'no-repeat' });
            detailbox.find('h1').text(res.title)
            detailbox.find('.desc').html(res.desc)
            detailbox.fadeIn(300);
            $("body,html").animate(
                {
                    scrollTop: $(detailbox).offset().top,
                },
                400 //speed
            );

        });
        // end ajax call

    }
}