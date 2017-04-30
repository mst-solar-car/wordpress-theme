import { MinimizeOnScroll } from "./minimizeOnScroll";
import { ImageZoom } from "./ImageZoom";
import { LazyLoader } from "./LazyLoader";


// Setup the scroller to control the navbar
var scroller = new MinimizeOnScroll(document.getElementById('nav-bar'), 80, 'minimized-navbar', 'peek-navbar');

// Setup the zoom control for zooming in on images
var zoom = new ImageZoom('zoomIn', document.getElementById('imageGalleryOverlay'), 'visible');



// Preload the navigation menu images
window.addEventListener('load', () => {
  var nav_menu = document.getElementById('nav-menu');

  nav_menu.classList.remove('pre-load');

  // Lazy load images
  let lazyImages = document.querySelectorAll('img[data-lazyloadsrc]');
  for (let i = 0; i < lazyImages.length; i++)
  {
    if (lazyImages[i].tagName.toLowerCase() != 'img') continue; // Only lazy load images

    new LazyLoader(lazyImages[i] as HTMLElement, 'data-lazyloadsrc'); // Lazy load the image when it comes into the viewport
  }

  // Discover zoomable images that have been loaded after initialization
  zoom.DiscoverImages();

});
