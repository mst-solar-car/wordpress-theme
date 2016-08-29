(function(){
  var minimizeOnScroll = function(scroll_limit, minimized_class, maximized_class)
  {
    if (this === HTMLElement) { return new minimizeOnScroll(scroll_limit, minimized_class, maximized_class); }

    var me = this.parent = this;

    // Default Parameters
    this.scroll_limit = (scroll_limit === undefined) ? 5 : scroll_limit;
    this.minimized_class = (minimized_class === undefined) ? 'minimized' : minimized_class;
    this.maximized_class = (maximized_class === undefined) ? 'maximized' : maximized_class;

    // Allows for only 3 paramters, element and classes
    if (arguments.length == 2 && isNaN(this.scroll_limit))
    {
      this.maximized_class = arguments[3] = arguments[2];
      this.minimized_class = arguments[2] = arguments[1];
      this.scroll_limit = arguments[1] = 15;
    }

    this.minimize = function(){
      this.parent.classList.add(this.minimized_class);
      this.parent.classList.remove(this.maximized_class);
    };
    this.maximize = function(){
      this.parent.classList.add(this.maximized_class);
      this.parent.classList.remove(this.minimized_class);
    };
    // Scroll event listener
    var checkScroll = function(){
      if ((window.pageYOffset > me.scroll_limit) || document.getElementById('nav-menu').classList.contains('visible'))
      {
        // Minimize
        me.minimize();
      }
      else
      {
        // Maximize
        me.maximize();
      }
    };


    this.check = function(){checkScroll();};

    // Add Event Listeners
    checkScroll();    // Minimizes navbar if scrolled down on page load
    document.addEventListener('scroll', checkScroll);  // Minimizes/maximizes navbar on scroll

    return this;
  };

  if (!HTMLElement.prototype.minimizeOnScroll)
  {
    HTMLElement.prototype.minimizeOnScroll = minimizeOnScroll;
  }
}());

var scroller = document.getElementById('nav-bar').minimizeOnScroll(10, 'minimized-navbar', 'full-navbar');




// Preload the navigation menu images
window.addEventListener('load', function(){
  var nav_menu = document.getElementById('nav-menu');

  nav_menu.classList.add('hidden');
  nav_menu.classList.remove('pre-load');

  // Begin lazy loader
  window.echo = (function (window, document) {
    'use strict';

    /*
     * Constructor function
     */
    var Echo = function (elem) {
      this.elem = elem;
      this.render();
      this.listen();
    };

    /*
     * Images for echoing
     */
    var echoStore = [];

    /*
     * Element in viewport logic
     */
    var scrolledIntoView = function (element) {
      var coords = element.getBoundingClientRect();
      return ((coords.top >= 0 && coords.left >= 0 && coords.top) <= (window.innerHeight || document.documentElement.clientHeight));
    };

    /*
     * Changing src attr logic
     */
    var echoSrc = function (img, callback) {
      img.src = img.getAttribute('data-echo');
      if (callback) {
        callback();
      }
    };

    /*
     * Remove loaded item from array
     */
    var removeEcho = function (element, index) {
      if (echoStore.indexOf(element) !== -1) {
        echoStore.splice(index, 1);
      }
    };

    /*
     * Echo the images and callbacks
     */
    var echoImages = function () {
      for (var i = 0; i < echoStore.length; i++) {
        var self = echoStore[i];
        if (scrolledIntoView(self)) {
          echoSrc(self, removeEcho(self, i));
        }
      }
    };

    /*
     * Prototypal setup
     */
    Echo.prototype = {
      init : function () {
        echoStore.push(this.elem);
      },
      render : function () {
        if (document.addEventListener) {
          document.addEventListener('DOMContentLoaded', echoImages, false);
        } else {
          window.onload = echoImages;
        }
      },
      listen : function () {
        echoImages();
        window.onscroll = echoImages;
      }
    };

    /*
     * Initiate the plugin
     */
    var lazyImgs = document.querySelectorAll('img[data-echo]');
    for (var i = 0; i < lazyImgs.length; i++) {
      new Echo(lazyImgs[i]).init();
    }
  })(window, document); // End lazy loader

  // Add zoom for all images with the zoomIn class
  var overlay = document.getElementById('imageGalleryOverlay');
  var images = document.querySelectorAll('.zoomIn');
	for (var i = 0; i < images.length; i++)
	{
		images[i].addEventListener('click', function(){
			overlay.classList.add('visible');
			overlay.innerHTML = '';
			overlay.innerHTML = '<img src="' + this.getAttribute('src') + '">';
		});
	}

	overlay.addEventListener('click', function(){
		overlay.classList.remove('visible');
		overlay.innerHTML = '';
	});

});

window.addEventListener('beforeunload', function(){
	var overlay = document.getElementById('imageGalleryOverlay');
	overlay.classList.remove('visible');
	overlay.innerHTML = '';
});


// Show/hide the navigation menu
(document.getElementById('nav-menu-button')).addEventListener('click', function(){
  var nav_menu = document.getElementById('nav-menu');
  var nav_bar = document.getElementById('nav-bar');
  var fluid_nav = document.querySelector('.fluid-nav');
  var btn = document.getElementById('nav-menu-button');

  if (nav_menu.classList.contains('visible'))
  {
    // Hide the menu
    nav_menu.classList.remove('visible');
    nav_menu.classList.add('hidden');
    fluid_nav.classList.add('reading-width');
    btn.classList.remove('close');

    scroller.check(); // Will maximize the navbar if still at the top
  }
  else
  {
    // Show the menu
    nav_menu.classList.remove('hidden');
    nav_menu.classList.add('visible');

    // Minimize the navbar when showing the menu
    scroller.minimize();
    fluid_nav.classList.remove('reading-width');
    btn.classList.add('close');
  }

});



function refresh_page()
{
  document.querySelector('body').classList.remove('is-loading');
}
