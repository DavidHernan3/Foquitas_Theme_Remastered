/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * Main JavaScript file for Baby Seals Joyride Theme
 */

(function($) {
    'use strict';
    
    // Document Ready
    $(document).ready(function() {
        // Mobile Menu Toggle
        $('#mobile-menu-button').on('click', function() {
            $('#mobile-menu').toggleClass('foki-nav__mobile--active');
        });
        
        // Header scroll effect
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 50) {
                $('.foki-header').addClass('foki-header--scrolled');
            } else {
                $('.foki-header').removeClass('foki-header--scrolled');
            }
        });

        // Emoji explosion effect for buttons
        $('.foki-button').on('click', function(event) {
            createEmojiExplosion(event.pageX, event.pageY);
        });
    });
    
    // Create emoji explosion effect
    function createEmojiExplosion(x, y) {
        const emojis = ['🦭', '❄️', '✨', '💙', '🌊'];
        
        for (let i = 0; i < 15; i++) {
            const emoji = document.createElement('div');
            emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
            emoji.style.position = 'fixed';
            emoji.style.left = x + 'px';
            emoji.style.top = y + 'px';
            emoji.style.fontSize = (Math.random() * 20 + 10) + 'px';
            emoji.style.userSelect = 'none';
            emoji.style.pointerEvents = 'none';
            emoji.style.zIndex = '9999';
            document.body.appendChild(emoji);
            
            const angle = Math.random() * Math.PI * 2;
            const distance = Math.random() * 100 + 50;
            const destinationX = x + Math.cos(angle) * distance;
            const destinationY = y + Math.sin(angle) * distance;
            
            anime({
                targets: emoji,
                left: destinationX,
                top: destinationY,
                opacity: [1, 0],
                duration: Math.random() * 1500 + 500,
                easing: 'easeOutExpo',
                complete: function() {
                    document.body.removeChild(emoji);
                }
            });
        }
    }
})(jQuery);

// Add Anime.js for animations if not already loaded
if (typeof anime === 'undefined') {
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js';
    script.async = true;
    document.head.appendChild(script);
}
