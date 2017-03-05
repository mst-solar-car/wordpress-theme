import { MinimizeOnScroll } from "./minimizeOnScroll";
import { ImageZoom } from "./ImageZoom";
import { LazyLoader } from "./LazyLoader";


// Setup the scroller to control the navbar
//var scroller = new MinimizeOnScroll(document.getElementById('nav-bar'), 10, 'minimized-navbar', 'full-navbar');

// Setup the zoom control for zooming in on images
var zoom = new ImageZoom('zoomIn', document.getElementById('imageGalleryOverlay'), 'visible');



// Preload the navigation menu images
window.addEventListener('load', () => {
  var nav_menu = document.getElementById('nav-menu');

  nav_menu.classList.add('hidden');
  nav_menu.classList.remove('pre-load');

  // Lazy load images
  let lazyImages = document.querySelectorAll('img[data-lazyLoadSrc]');
  for (let i = 0; i < lazyImages.length; i++)
  {
    if (lazyImages[i].tagName.toLowerCase() != 'img') continue; // Only lazy load images

    new LazyLoader(lazyImages[i] as HTMLElement, 'data-lazyLoadSrc'); // Lazy load the image when it comes into the viewport
  }

  // Discover zoomable images that have been loaded after initialization
  zoom.DiscoverImages();


  // Event Listeners for the nav menu button
 /* var navMenuBtn: HTMLElement = document.getElementById('nav-menu-button');
  navMenuBtn.addEventListener('click', ToggleNavMenu);
  navMenuBtn.addEventListener('keypress', (e: KeyboardEvent) => {
    // Allow enter key to toggle the nav menu when the button is in focus
    if (e.keyCode == 13)
      ToggleNavMenu();
  });*/


});




/*

function ToggleNavMenu() {
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
  (document.activeElement as any).blur(); // Remove focus from the nav menu button
}


function refresh_page()
{
  document.querySelector('body').classList.remove('is-loading');
}
*/
