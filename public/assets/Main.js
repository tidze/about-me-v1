/*top hamburger menu when the resolution is 1/3*/
let atl_holder_toggle = false;
$('#alt-holder-btn-toggle').css({"background-color": "#0078F2"});
$('#alt-holder-btn-toggle').children(' img').attr("src", "assets/images/hamburger-rectangular-corners-white.png");
$('#alt-holder-btn-toggle').on('click', function () {
    if (atl_holder_toggle) {
        $(this).css({"background-color": "#0078F2"});
        $(this).children(' img').attr("src", "assets/images/hamburger-rectangular-corners-white.png");
        $('#alt-holder').animate({"right": "-85vw"}, 100);
        atl_holder_toggle = false;
        console.log('atl_holder_toggle', atl_holder_toggle);
    } else if (!atl_holder_toggle) {
        $(this).css({"background-color": "#1d1d1d"});
        $(this).children(' img').attr("src", "assets/images/cross-white.png");
        $('#alt-holder').animate({"right": "0vw"}, 150);
        atl_holder_toggle = true;
        console.log('atl_holder_toggle', atl_holder_toggle);
    }
});

/*carousel variables*/
let position = 1;
let nLoading = 0;
let reverseSpeed = 90;
let nArray = $('.image-holder').length;
let mouseover = false;

/*when the page loaded completely*/
$(document).ready(function () {

    // console.log("height", $('.card-view-type-alpha:nth-child(1) div').innerHeight());

    fixRatioSlideShow($('#slide-show-container'));
    fixRatioCardViewTypeA($('.card-view-image'));
    changeInfoContainerHeight();
    /*slide show info related*/
    $('.info-holder:nth-child(1)').animate({
        opacity: 1
    }, 300);
    w1 = $('#slide-show-container').innerWidth();
    w2 = $('.info').innerWidth();

    loadingClockWiseAlt();
    /*change the img height of card-view-type-alpha*/
    $('.card-view-type-alpha > a > div:nth-of-type(1)').innerHeight(ratio16_9($('.card-view-type-alpha > a > div:nth-of-type(1)').innerWidth()));
    /*change the img height of card-view-type-beta*/
    $('.card-view-type-beta-image-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));
    /*change the info height of card-view-type-beta*/
    $('.card-view-type-beta-info-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));

    /*top navbar on mouse over & on mouse leave*/
    $('#top-navbar #top-navbar-ul li').on('mouseover', function () {
        $(this).children("div").css("border-bottom", "6px solid #0aaff1");
        $(this).children("a").css("color", "white");
    });

    $('#top-navbar #top-navbar-ul li').on('mouseleave', function () {
        $(this).children("div").css("border-bottom", "0px solid #0aaff1");
        $(this).children("a").css("color", "#9B9B9B");
    });

    /*clicks for slide show prev & next*/
    $('.slide-show-buttons').click(function () {
        setCarousel($('.image-holder'), w1, $('.info-holder'), w2, $(this));
        resetDashOffset();
    });

    $('#slide-show-and-info-container').on('mouseover', function () {
        mouseover = true;
    });

    $('#slide-show-and-info-container').on('mouseleave', function () {
        mouseover = false;
        loadingClockWiseAlt();
    });

    $('#loading-animation-container circle').css({r: "1px"});

    /*for the first time page loaded first circle r should be 9px cause all of them are 1px in css*/
    $('#loading-animation-container div:nth-child(1) circle').css({r: "9px"});

    $('#loading-animation-container div').click(
        function () {
            console.log($(this).children())
            // console.log($(this));
            // console.log($('#loading-animation-container div:nth-child(1)'));
            //
            // if ($(this) === $('#loading-animation-container div:nth-child(1)')) {
            //     console.log("1");
            // } else if ($(this) === $('#loading-animation-container div:nth-child(2)')) {
            //     console.log("2");
            // }else if ($(this) === $('#loading-animation-container div:nth-child(3)')) {
            //     console.log("3");
            // }else if ($(this) === $('#loading-animation-container div:nth-child(4)')) {
            //     console.log("4");
            // }
        }
    );

    if (window.innerWidth < 768) {
        $('#search-container').css({"display": "none"});

    } else if (window.innerWidth >= 768 && window.innerWidth < 1024) {
        $('#search-container').css({"display": "none"});

    } else {
        $('#search-container').css({"display": "inline-block"});

    }

    let toggle_active_tab = false;
    $('#discover-and-browse-alt').css({"display": "none"});

    $('#active-tab p ').click(function () {
        if (toggle_active_tab) {
            $('#search-icon-alt').css({"display": "inline-block"});

            $('#active-tab p:nth-child(2) svg').css("transform", "rotate(90deg)");
            $('#discover-and-browse-alt').css({"display": "none"});

            toggle_active_tab = false;
        } else if (!toggle_active_tab) {
            $('#search-icon-alt').css({"display": "none"});

            $('#active-tab p:nth-child(2) svg').css({"transform": "rotate(270deg)"});
            $('#discover-and-browse-alt').css({"display": "inline-block"});
            toggle_active_tab = true;
        }
    });

    $('#search-icon-alt img:nth-child(2)').css({"display": "none"});

    let toggle_search_tab = false;
    $('#search-icon-alt').click(function () {
        if (toggle_search_tab) {
            // $('#active-tab p:nth-child(2) svg').css("transform","rotate(90deg)");
            $('#search-container').css({"display": "none"});
            $('#search-icon-alt img:nth-child(1)').css({"display": "inline-block"});
            $('#search-icon-alt img:nth-child(2)').css({"display": "none"});

            toggle_search_tab = false;
        } else if (!toggle_search_tab) {
            // $('#active-tab p:nth-child(2) svg').css({"transform":"rotate(270deg)"});
            $('#search-container').css({"display": "inline-block"});
            $('#search-icon-alt img:nth-child(1)').css({"display": "none"});
            $('#search-icon-alt img:nth-child(2)').css({"display": "inline-block"});
            toggle_search_tab = true;
        }
    });


});

/*these things should be done when the window changes*/
$(window).bind("resize", function () {
    fixRatioSlideShow($('#slide-show-container'));
    fixRatioCardViewTypeA($('.card-view-image'));
    changeInfoContainerHeight();
    fixHolderPos();
    w1 = $('#slide-show-container').innerWidth();
    w2 = $('.info').innerWidth();
    if (window.innerWidth < 768) {
        $('#search-container').css({"display": "none"});
        $('#search-icon-alt img:nth-child(1)').css({"display": "inline-block"});
        $('#search-icon-alt img:nth-child(2)').css({"display": "none"});
        $('#search-icon-alt').css("display", "inline-block");

        /*change the img height of card-view-type-alpha*/
        $('.card-view-type-alpha > a > div:nth-of-type(1)').innerHeight(ratio16_9($('.card-view-type-alpha > a > div:nth-of-type(1)').innerWidth()));
        /*change the img height of card-view-type-beta*/
        $('.card-view-type-beta-image-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));
        /*change the info height of card-view-type-beta*/
        $('.card-view-type-beta-info-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));

    } else if (window.innerWidth >= 768 && window.innerWidth < 1024) {
        $('#search-container').css({"display": "none"});
        $('#search-icon-alt img:nth-child(1)').css({"display": "inline-block"});
        $('#search-icon-alt img:nth-child(2)').css({"display": "none"});
        $('#search-icon-alt').css("display", "inline-block");

        /*change the img height of card-view-type-alpha*/
        $('.card-view-type-alpha > a > div:nth-of-type(1)').innerHeight(ratio16_9($('.card-view-type-alpha > a > div:nth-of-type(1)').innerWidth()));
        /*change the img height of card-view-type-beta*/
        $('.card-view-type-beta-image-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));
        /*change the info height of card-view-type-beta*/
        $('.card-view-type-beta-info-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));

    } else {
        $('#search-container').css({"display": "inline-block"});
        $('#search-icon-alt').css("display", "none");
        /*change the img height of card-view-type-alpha*/
        $('.card-view-type-alpha > a > div:nth-of-type(1)').innerHeight(ratio16_9($('.card-view-type-alpha > a > div:nth-of-type(1)').innerWidth()));
        /*change the img height of card-view-type-beta*/
        $('.card-view-type-beta-image-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));
        /*change the info height of card-view-type-beta*/
        $('.card-view-type-beta-info-holder').innerHeight(ratio16_9($('.card-view-type-beta-image-holder').innerWidth()));
    }
});


/*changes the height of info next to slide show from 0 to where it should be */
function changeInfoContainerHeight() {
    let h = ($('#slide-show-container').innerHeight());
    let width_type_c = $('.box-type-c .card-view-image').innerWidth();
    $('.box-type-c .card-view-image').innerHeight(ratio16_9(width_type_c));

    if (window.innerWidth < 768) {
        $('#info-container').innerHeight(230);

    } else if (window.innerWidth >= 768 && window.innerWidth < 1024) {
        $('#info-container').innerHeight(250);
        // $('#info').innerHeight("100%");
    } else {
        $('#info-container').innerHeight(h);
        // $('#info').innerHeight("100%");
    }
}

/*set height of the slide show to the proper ratio16_9*/
function fixRatioSlideShow(container) {
    let width = $(container).innerWidth();
    $(container).innerHeight(ratio16_9(width));
    return width;
}

function fixRatioCardViewTypeA(container) {
    let width = $(container).innerWidth();
    $(container).innerHeight(ratioCustom(width));
    return width;
}

/*return height based on ratio of 16:9*/
function ratio16_9(width) {
    return width * 0.5625;
}

function ratioCustom(width) {
    return width * 1.3;
}

function setCarousel(inner_container, move_unit, inner_container_info, move_unit_info, button) {
    let length = inner_container.length;
    let inner_container_firstChild = $(inner_container[0]);
    let inner_container_info_firstChild = $(inner_container_info[0]);

    button = (typeof button !== 'undefined') ? button : $('.slide-show-buttons:nth-child(2)');

    function scrollToRight(inner_container, move_unit, callback) {
        inner_container.animate({
            marginLeft: "-=" + move_unit
        }, 200, callback);
    }

    function scrollToLeft(inner_container, move_unit, callback) {
        inner_container.animate({
            marginLeft: "+=" + move_unit
        }, 200, callback);
    }

    function scrollOnlyOpacity(inner_container, opacity) {
        inner_container.animate({
            opacity: opacity
        }, 100);
    }

    function shrinkCircle(position) {
        $('#loading-animation-container div:nth-child(' + position + ') svg circle').animate({r: "1px"}, 200);
    }

    function growCircle(position) {
        $('#loading-animation-container div:nth-child(' + position + ') svg circle').animate({r: "9px"}, 200);
    }

    function next() {
        if (position < length) {
            shrinkCircle(position);
            growCircle(position + 1);
            scrollToRight(inner_container_firstChild, move_unit);
            scrollOnlyOpacity($(inner_container_info[position - 1]), 0);
            scrollToRight(inner_container_info_firstChild, move_unit_info, function () {
                scrollOnlyOpacity($(inner_container_info[position - 1]), 1);
            });
            position++;
        } else if (position === length) {
            shrinkCircle(position);
            growCircle(1);
            scrollToLeft(inner_container_firstChild, (length - 1) * move_unit);
            scrollOnlyOpacity($(inner_container_info[position - 1]), 0);
            scrollToLeft(inner_container_info_firstChild, (length - 1) * move_unit_info, function () {
                scrollOnlyOpacity($(inner_container_info[position - 1]), 1);
            });
            position = 1;

        }
    }

    function prev() {
        if (position > 1) {
            shrinkCircle(position);
            growCircle(position - 1);
            scrollToLeft(inner_container_firstChild, move_unit);
            scrollOnlyOpacity($(inner_container_info[position - 1]), 0);
            scrollToLeft(inner_container_info_firstChild, move_unit_info, function () {
                scrollOnlyOpacity($(inner_container_info[position - 1]), 1);
            });
            position--;
        } else if (position === 1) {
            shrinkCircle(1);
            growCircle(length);
            scrollToRight(inner_container_firstChild, (length - 1) * move_unit);
            scrollOnlyOpacity($(inner_container_info[position - 1]), 0);
            scrollToRight(inner_container_info_firstChild, (length - 1) * move_unit_info, function () {
                scrollOnlyOpacity($(inner_container_info[position - 1]), 1);
            });
            position = length;
        }
    }

    function checkPos() {

    }

    if (button.attr('id') === 'prev-slide-show-btn') {
        prev();
    } else if (button.attr('id') === 'next-slide-show-btn') {
        next();
    }
}

/*fixes the position of the first image holder and info holder */
function fixHolderPos() {
    let width = $('#slide-show-container').innerWidth();
    let width2 = $('.info').innerWidth();
    let newPos = width * (position - 1);
    let newPos2 = width2 * (position - 1);
    let imageHolder = $('.image-holder:nth-child(1)');
    let infoHolder = $('.info-holder:nth-child(1)');
    imageHolder.css("marginLeft", "-" + newPos + "px");
    infoHolder.css("marginLeft", "-" + newPos2 + "px");
}

/*resets the loading circle*/
function resetDashOffset() {
    let AllCircles = $('#loading-animation-container svg circle:nth-child(2)');
    AllCircles.css("stroke-dashoffset", 59);
    AllCircles.css("stroke-dasharray", 59);
    nLoading = 0;
}

function loadingClockWiseAlt() {
    let Circle = $('#loading-animation-container div:nth-child(' + position + ') svg circle:nth-child(2)');
    let stroke_dasharray = Circle.css("stroke-dasharray");
    let calc = 59 - (59 * nLoading) / 100;
    let stroke_dashoffset = Circle.css("stroke-dashoffset");
    let stroke_width = Circle.css("stroke-width");
    Circle.css("stroke-dashoffset", calc);

    if (nLoading > 100) {
        nLoading = 0;
        loadingClockWiseAlt();
        setCarousel($('.image-holder'), w1, $('.info-holder'), w2);
    } else {
        if (!mouseover) {
            setTimeout(function () {
                nLoading += 1;
                loadingClockWiseAlt();
            }, reverseSpeed);
        } else {

        }
    }
}

