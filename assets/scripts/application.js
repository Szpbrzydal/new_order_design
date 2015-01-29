/**
 * Created by grzegorzgurzeda on 16/09/14.
 */

/** YT Player handle **/
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '640',
//        videoId: 'Mnm73wBgJpo',
        videoId: 'wTcNtgA6gHs',
        playerVars: { 'autoplay': 0, 'controls': 0, 'start': 10, 'html5': 1},
        events: {
            'onStateChange': onPlayerStateChange
        }
    });
}

/** Loop through video **/
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        player.playVideo();
    }
}
/** //YT Player handle **/


$(document).ready(function() {

    /** YT Control **/
    $('header svg').bind('click', function() {
        if (player.getPlayerState() == 2)
        {
            player.playVideo();
        } else {
            player.pauseVideo();
        }
    });
    /** //YT Control **/

    // Scroll easing
    //$('html').niceScroll();

    // Smooth scroll to anchor
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - $('nav').outerHeight()
                }, 700);
                return false;
            }
        }
    });

    // handle tap menu
    $(".menu-button-action").on('click', function(e) {
        e.preventDefault();
        $("nav ul").css('display', 'block');
        $("nav ul").css('min-height', '280px');
        $("nav ul").css('max-height', '280px');
    });
    $("nav ul li a").on('click', function(e) {
        $("nav ul").css('min-height', '0px');
        $("nav ul").css('max-height', '0px');
    });

    // After load complete
    $('#portfolio div.element').css('-webkit-animation', 'fadeIn 0.4s ease-out');
     $('#portfolio div.element').css('fadeIn 0.4s ease-out', 'fadeIn 0.4s ease-out');

    // close cookie window
    $('a.cookie-accept').click(function(e) {
        e.preventDefault();
        $('div.cookie').fadeOut(400);
        $.post('/json/hide_cookie_box');
    });

    // Toogle mouse over text
    $('a.cookie-accept').mouseover(function() {
        $(this).html('Om nom nom!');
    });

    // Toogle mouse out text
    $('a.cookie-accept').mouseout(function() {
        $(this).html('I understand!');
    });

    var intermissionTop = $('#intermission').position().top;
    var intermissionHeight = $('#intermission').outerHeight();
    var intermissionImageHeight = $('#intermission image').height();
    var intermissionBottom = intermissionTop + intermissionHeight;
    var marginTop = 0;
    var windowHeight = $(window).height();
    var headerHeight = $('header').outerHeight();

    // Handle scroll event
    $(window).scroll(function() {
        var offset = $(window).scrollTop();

        windowHeight = $(window).height();

        if(offset + windowHeight < intermissionBottom)
        {
            $('#intermission img').css('margin-top', 0);
        } else {
            marginTop = 0 - (offset + windowHeight - intermissionBottom);
            console.log(marginTop * 100 / 838);
            console.log(windowHeight - headerHeight);
            $('#intermission img').css('margin-top', marginTop);
        }

        var volume = 100 - (offset / 10);
        if (volume > 3)
        {
            //player.setVolume(volume);
        }

        var height = $('#header').height();

        switch (true)
        {
            case (offset < headerHeight):
                $('nav').css('background-color', '#273749');
                $('nav svg').css('fill', '#FFFFFF');
                $('nav ul li a').css('color', '#FFFFFF');
                break;

//            case (offset >= ($('header').outerHeight())):
            case (offset >= $('section#whatwedo').scrollTop()):
                $('nav').css('background-color', '#FFFFFF');
                $('nav svg').css('fill', '#273749');
                $('nav ul li a').css('color', '#273749');
                break;
        }

        if (offset > height) {
            $('nav').css('position', 'fixed');
            $('nav').css('z-index', '10');
            $('nav').css('top', '0');
            $('nav').css('left', '0px');
            $('nav').css('right', '0px');
        } else {
            $('nav').css('top', '');
            $('nav').css('position', 'absolute');
        }
    });
});