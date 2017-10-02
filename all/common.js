	$(document).ready(function(){$(window).scroll(function(e){parallax();});function parallax(){var scrolled=$(window).scrollTop();$('.parallax').css('top',-(scrolled*.4)+'px');};});$(window).load(function(){$(".loader_inner").fadeOut();$(".loader").delay(400).fadeOut("slow");});new WOW().init();$('.popup').magnificPopup({type:'image'});$('.popup_content').magnificPopup({type:'inline',midClick:true});var $top_mnu=$('.top_mnu');var $sandwich=$('.sandwich');$('.toggle_mnu').click(function(){$top_mnu.fadeToggle(600);$('.top_mnu li a').toggleClass('fadeInUp animated');$sandwich.toggleClass("active");});$(".top_mnu a[href*='#']").mPageScroll2id();$top_mnu.click(function(){$(this).fadeOut(600);$sandwich.toggleClass("active");});    $("a[rel='m_PageScroll2id']").mPageScroll2id({
          layout:"auto"});    $("form").submit(function() { //Change
        var th = $(this);
        $.ajax({
            type: "POST",
            url: "submit.php", //Change
            data: th.serialize()
        }).done(function() {
            alert("Thank you!");
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });