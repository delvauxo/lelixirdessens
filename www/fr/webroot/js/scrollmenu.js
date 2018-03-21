/* Dynamic top menu positioning
 *
 */

var num = 398; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.menuCarte').addClass('fixedMenu');
    } else {
        $('.menuCarte').removeClass('fixedMenu');
    }
});

//USE SCROLL WHEEL FOR THIS FIDDLE DEMO	
