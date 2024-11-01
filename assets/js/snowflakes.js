/**
 * Contains all the javascript to run the snow flakes. This
 * includes the placement of the image divs and the GASP animations.
 * This file has been built with love and care.
 *
 * @package   Snow Flakes
 * @author    David Buss - PDERAS Consulting Group Inc.
 * @version   1.1
 * @license   GPLv2
 */
jQuery(function() {
    /* Create all the snowflake divs that will animate.*/
    var container = jQuery('#snowflakes-wrapper');
    var windowHeight = jQuery('html').height();
    var ratio = jQuery(window).width() / 50;
    if(isMobile.any()) {
        var snowflakeCount = windowHeight / 20;
    } else {
        var snowflakeCount = windowHeight / 10;
    }
    for(var i = 0; i < snowflakeCount; i++) {
        var snowFlake = jQuery('<img/>').attr('height', '50px')
            .attr('width', '50px')
            .attr('src', snowFlakeFilePath + '/assets/images/snowflake-'+getRandomInt(1,25)+'.png')
            .addClass('snowflake')
            .attr('id', 'snowflake-'+i)
            .css('left', (50 * getRandomInt(0, ratio)) + 'px');
        container.append(snowFlake);
        TweenMax.set(snowFlake, {
            y: -50
        });
        
        var delay = Math.random() * ((windowHeight/100) - 0 + 1);
        setSnowFlakeAnimation(snowFlake, windowHeight, delay);
    }
});
    
/**
 * Creates the falling snowflake animation for the object given.
 *
 * @param {object} snowFlake The object to add the animation to.
 * @param int windowHeight The height of the window the animation is in.
 * @param int delay The delay to set on the animation.
 *
 * @return void
 */
function setSnowFlakeAnimation(snowFlake, windowHeight, delay) {
    TweenMax.to(snowFlake, windowHeight / 100,{
        bezier: {
            values: [
                {x:getRandomInt(-25,25), y: windowHeight/4},
                {x:getRandomInt(-25,25), y: windowHeight/3},
                {x:getRandomInt(-25,25), y: windowHeight/2},
                {x:getRandomInt(-25,25), y: windowHeight}
            ],
            autoRotate: true
        },
        ease: Linear.easeIn,
        repeat: -1,
        delay: delay
    });   
}

/**
 * Get a random number between a range.
 *
 * @param Int min The bottom of the range.
 * @param Int max The top of the range.
 *
 * @return Int 
 */
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Determines what mobile device is running the javascript
 *
 */
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};