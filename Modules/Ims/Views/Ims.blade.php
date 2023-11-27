<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('meta')
    <!-- Fonts -->
    <link rel="shortcut icon" type="image/png" href="{{ route('uploads', $ims['logo_favicon']->content ?? '') }}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/loading.css') }}">
    <link rel="stylesheet" href="{{ mix('css/ims.css') }}">
    <link rel="stylesheet" href="{{ mix('css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    @yield('css')
    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}" defer></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/loading.js') }}" defer></script>
    <script src="{{ mix('js/select2.min.js') }}" defer></script>

</head>

<body class="h-screen bg-[#ffffff] text-[#232323]">
    {!! html_entity_decode($ims['conf']['embedcode_body'] ?? '') !!}
    @include('Ims::Header')
    @yield('content')
    @include('Ims::Component.RegisterEmail')
    @include('Ims::Footer')

    <div class="fixed right-[15px] top-[80%] z-[99] flex flex-col md:top-[70%]">
        <div class="shadow-full flex h-[50px] w-[50px] items-center justify-center rounded-full shadow-[#000]/25">
            <a href="tel:{{ Config('ims.conf.hotline') ?? '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="95" height="95" viewBox="0 0 95 95">
                    <defs>
                        <filter id="Ellipse_1281" x="0" y="0" width="95" height="95" filterUnits="userSpaceOnUse">
                            <feOffset input="SourceAlpha" />
                            <feGaussianBlur stdDeviation="7.5" result="blur" />
                            <feFlood flood-opacity="0.251" />
                            <feComposite operator="in" in2="blur" />
                            <feComposite in="SourceGraphic" />
                        </filter>
                    </defs>
                    <g id="Group_29029" data-name="Group 29029" transform="translate(22.5 22.5)">
                        <g transform="matrix(1, 0, 0, 1, -22.5, -22.5)" filter="url(#Ellipse_1281)">
                            <circle id="Ellipse_1281-2" data-name="Ellipse 1281" cx="25" cy="25" r="25" transform="translate(22.5 22.5)" fill="#fefefe" />
                        </g>
                        <circle id="Ellipse_1294" data-name="Ellipse 1294" cx="21" cy="21" r="21" transform="translate(4 4)" fill="#fefefe" />
                        <g id="Ellipse_1296" data-name="Ellipse 1296" transform="translate(4 4)" fill="none" stroke="#6a1206" stroke-width="5">
                            <circle cx="21" cy="21" r="21" stroke="none" />
                            <circle cx="21" cy="21" r="18.5" fill="none" />
                        </g>
                        <g id="Group_58903" data-name="Group 58903" transform="translate(7.795 7.796)">
                            <path id="Path_33026" data-name="Path 33026"
                                d="M-538.955-19.652a17.214,17.214,0,0,1,17.2,17.145A17.186,17.186,0,0,1-538.76,14.755,17.161,17.161,0,0,1-556.155-2.33,17.176,17.176,0,0,1-538.955-19.652ZM-533.5,7.885a1.651,1.651,0,0,0,.386-.143,18.539,18.539,0,0,0,4.2-3.545c.423-.489.4-.779-.122-1.17A23.762,23.762,0,0,0-533.6.288c-.511-.228-.685-.177-1.07.241-.4.439-.8.885-1.182,1.345a.569.569,0,0,1-.746.189c-.416-.177-.853-.312-1.258-.511a10.771,10.771,0,0,1-5.584-6.28.664.664,0,0,1,.218-.867c.406-.313.785-.662,1.166-1.006.589-.533.67-.7.28-1.388q-1.222-2.163-2.563-4.257c-.432-.675-.763-.691-1.368-.15a19.061,19.061,0,0,0-3.394,4.051,1.071,1.071,0,0,0-.138.707,15.542,15.542,0,0,0,.518,2.115,19.427,19.427,0,0,0,4.092,6.628,22.593,22.593,0,0,0,8.018,5.946A10.878,10.878,0,0,0-533.5,7.885Zm4.852-11.077a9.5,9.5,0,0,0-9.554-9.525V-11.3A8.043,8.043,0,0,1-532.5-8.92a8.057,8.057,0,0,1,2.4,5.728Zm-3.72,0a5.719,5.719,0,0,0-5.831-5.82v1.4a4.46,4.46,0,0,1,3.1,1.308,4.5,4.5,0,0,1,1.318,3.116Z"
                                transform="translate(556.155 19.652)" fill="#6a1206" />
                        </g>
                    </g>
                </svg>

            </a>
        </div>
        <button id="backtotop" class="backtotop shadow-full z-[99] mt-[10px] flex h-[50px] w-[50px] items-center justify-center rounded-full bg-[#F6F3E9] shadow-[#000]/25">
            <svg class="rounded-full" xmlns="http://www.w3.org/2000/svg" width="9.302" height="23.256" viewBox="0 0 9.302 23.256">
                <path id="Path_134416" data-name="Path 134416"
                    d="M0,4.418a.71.71,0,0,1,.718-.33c7.666.011,7.784.015,15.45.02h.392L15.123,0c.849.6,1.67,1.229,2.541,1.775.89.558,1.814,1.063,2.749,1.538s1.874.869,2.843,1.313A29.822,29.822,0,0,0,15.084,9.3l1.474-4.2h-.344C9.3,5.1,9.937,5.094,3.025,5.09c-.784,0-1.567-.01-2.351,0A.658.658,0,0,1,0,4.729Z"
                    transform="translate(0 23.256) rotate(-90)" fill="#530507" />
            </svg>

        </button>
    </div>

    <!-- Scripts -->
    <script src="https://www.youtube.com/iframe_api"></script>
    @stack('js')
    @yield('js')
    <script type="module">
        $(function() {
            $(document).bind("contextmenu", function(e) {
                return false;
            });
            $(document).keydown(function(event) {
                if (event.keyCode == 123) { // Prevent F12
                    return false;
                } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
                    return false;
                }
            });

            $('.service-sub-container').hover(function(e) {
                $('.icon-product').css('rotate', '270deg');
            }, function(e) {
                $('.icon-product').css('rotate', '');
            });
            $(window).scroll(function() {
                if ($(this).scrollTop() > 500) $(".backtotop").fadeIn();
                else $(".backtotop").fadeOut();
            });
            $(".backtotop").click(function() {
                $("body,html").animate({
                    scrollTop: 0
                }, "slow");
            });
            $(".button__group").on('click', function() {
                let id = $(this).data('id');
                let showGroup = $(".show__group-" + id);
                if (showGroup.is(":visible")) {
                    $(this).html('<i class="fas fa-caret-right text-[#000000]"></i>');
                    showGroup.hide();
                } else {
                    showGroup.show();
                    $(this).html('<i class="fas fa-sort-down text-[#000000]"></i>');
                }
            });

            $('.show-menu').click(function() {
                $('.menu-main').hide();
                $('.hide-menu').show();
                $('.menu-aside').addClass('show');
                $('body').css('overflow', 'hidden');
            });

            $('.hide-menu').click(function() {
                $('.menu-main').show();
                $('.hide-menu').hide();
                $('.menu-aside').removeClass('show');
                $('body').css('overflow', 'unset');
            })

        });

        $(function() {
            $(".button__submit-email").on('click', function() {
                let email = $(".pl_email").val();
                let error = false;
                if (email == '') {
                    $('.form-contact-common .error__email').text('Email không được để trống');
                    error = true;
                    $('.form-contact-common #email').focus();
                } else {
                    var regex_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (!regex_email.test(email)) {
                        $('.form-contact-common .error__email').text('Email không đúng định dạng.');
                        error = true;
                        $('.form-contact-common #email').focus();
                    }
                }

                if (error) {
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: '{{ route('register.email') }}',
                    data: $('.form-contact-common').serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (!response.errors) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            });
            $('.form-contact-common .pl_email').keyup((e) => {
                if (e.target.value.length > 0) {
                    $('.form-contact-common .error__email').text("");
                }
                var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (!regex.test(e.target.value)) {
                    $('.form-contact-common .error__email').text('Email không đúng định dạng');
                    error = true;
                    $('.form-contact-common .pl_email').focus();
                }
            });
            $(".banner__slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                // dots: true,
                autoplay: false
            });
            $(".button_search").on("click", function() {
                $(".show__search").toggle();
            });


            /* Hiệu ứng chạy chữ tìm kiếm */

            $(document).ready(function() {
                const message = "{{ $ims['global_lang']['search_new'] ?? '' }}";
                let index = 0;

                function type() {
                    if (index < message.length) {
                        $('.animation__search').attr('placeholder', message.substring(0, index + 1));
                        index++;
                        setTimeout(type, 100);
                    } else {
                        setTimeout(resetType, 1000);
                    }
                }

                function resetType() {
                    index = 0;
                    type();
                }
                type();
            });

        });
        //stick_menu

        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll < 190) {
                $('.sticky__menu').removeClass('active');

            } else {
                $('.sticky__menu').addClass('active');
            }
        });
        /*Mobile */
        $(document).ready(function() {
            $(".hamburger").click(function() {
                /* Toggle active class */
                $(this).toggleClass("active");
                $(".nav-menu").toggleClass("active");

                /* Toggle aria-expanded value */
                let menuOpen = $(".nav-menu").hasClass("active");
                let newMenuOpenStatus = menuOpen;
                $(".hamburger").attr("aria-expanded", newMenuOpenStatus);
            });

            // Close mobile menu
            $(".nav-link").click(function() {
                $(".hamburger").removeClass("active");
                $(".nav-menu").removeClass("active");
                // Toggle aria-expanded value
                let menuOpen = $(".nav-menu").hasClass("active");
                $(".hamburger").attr("aria-expanded", menuOpen);
            });

            $(".button__show-sub").on("click", function() {
                let id = $(this).attr("data-id");
                $(".show__menu-child-" + id).toggle();
            });



            $('.button__mobile-show').on("click", function() {

                $(".show__mobile-category").toggle();
            });
            /* End Mobile */

        });
        $(document).ready(function() {
            $('.show__group').each(function() {
                var id = $(this).data('id');
                var $showGroup = $('.show__group-' + id);
                var isActive = $showGroup.hasClass('active__show-parent');
                var $subgroups = $showGroup.find('.active_show').length > 0;
                if (isActive == true) {
                    $showGroup.show(isActive);
                } else {
                    $showGroup.hide(isActive);
                }
                if ($subgroups == true) {
                    $showGroup.show(isActive);
                }
            });
        });

        // window.onload = function () {
        //     var height = $('.banner-main').outerHeight();
        //     $('.menu-desktop').css('height', height);
        // }
    </script>
</body>

</html>
