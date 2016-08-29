define(["require", "exports", "./minimizeOnScroll", "./ImageZoom", "./LazyLoader"], function (require, exports, minimizeOnScroll_1, ImageZoom_1, LazyLoader_1) {
    "use strict";
    var scroller = new minimizeOnScroll_1.MinimizeOnScroll(document.getElementById('nav-bar'), 10, 'minimized-navbar', 'full-navbar');
    var zoom = new ImageZoom_1.ImageZoom('zoomIn', document.getElementById('imageGalleryOverlay'), 'visible');
    window.addEventListener('load', function () {
        var nav_menu = document.getElementById('nav-menu');
        nav_menu.classList.add('hidden');
        nav_menu.classList.remove('pre-load');
        var lazyImages = document.querySelectorAll('img[data-lazyLoadSrc]');
        for (var i = 0; i < lazyImages.length; i++) {
            if (lazyImages[i].tagName.toLowerCase() != 'img')
                continue;
            new LazyLoader_1.LazyLoader(lazyImages[i], 'data-lazyLoadSrc');
        }
        zoom.DiscoverImages();
    });
    (document.getElementById('nav-menu-button')).addEventListener('click', function () {
        var nav_menu = document.getElementById('nav-menu');
        var nav_bar = document.getElementById('nav-bar');
        var fluid_nav = document.querySelector('.fluid-nav');
        var btn = document.getElementById('nav-menu-button');
        if (nav_menu.classList.contains('visible')) {
            nav_menu.classList.remove('visible');
            nav_menu.classList.add('hidden');
            fluid_nav.classList.add('reading-width');
            btn.classList.remove('close');
            scroller.check();
        }
        else {
            nav_menu.classList.remove('hidden');
            nav_menu.classList.add('visible');
            scroller.minimize();
            fluid_nav.classList.remove('reading-width');
            btn.classList.add('close');
        }
    });
    function refresh_page() {
        document.querySelector('body').classList.remove('is-loading');
    }
});
