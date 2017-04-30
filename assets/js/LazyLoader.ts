/**
 * This class controls lazy loading of images
 */
export class LazyLoader {
  private elem: HTMLImageElement;
  private lazyLoadURL: string;
  private attrToLoadFrom: string;

  private loadEvent: any;

  private loaded: boolean;

  /**
   * Class Constructor
   */
  constructor (el: HTMLElement, attr?: string) {
    if (el.tagName.toLowerCase() == 'img')
      this.elem = el as HTMLImageElement;
    else
      this.elem = document.createElement('IMG') as HTMLImageElement; // Creates a new image

    this.attrToLoadFrom = (attr != undefined) ? attr : 'data-lazyloadsrc';

    this.lazyLoadURL = this.elem.getAttribute(this.attrToLoadFrom);

    this.loadEvent = null;

    this.loaded = false;

    // Register event listeners
    this.RegisterEvents();

    // Just load images that are in the viewport by default
    this.LoadImages();
  }



  /**
   * Register event listeners
   */
  private RegisterEvents = (): void => {
    // Listen for all dom content to be loaded
    document.addEventListener('DOMContentLoaded', () => {
      this.LoadImages();
    });

    // Listen for window to load
    window.addEventListener('load', () => {
      this.LoadImages();
    });

    // Listen for scroll
    document.addEventListener('scroll', () => {
      if (this.loaded) return;

      this.SetLoadTimeout();
    });
  };


  /**
   * Sets a timeout to load the image when stopped scrolling
   */
  private SetLoadTimeout = (): void => {
    // Clear the old timeout
    if (this.loadEvent != null)
      clearTimeout(this.loadEvent);

    // Set a new timeout event to load images
    this.loadEvent = setTimeout(() => {
      this.LoadImages();
    }, 250);
  };


  /**
   * Checks if the image is within the viewport
   */
  private ScrolledIntoView = (): boolean => {
    var coords = this.elem.getBoundingClientRect();

    return ((coords.top >= 0 && coords.left >= 0 && coords.top) <= (window.innerHeight || document.documentElement.clientHeight));
  };


  /**
   * Loads the images one by one
   */
  private LoadImages = (): void => {
    if (this.loaded) return;

    if (this.ScrolledIntoView())
    {
      this.elem.src = this.lazyLoadURL; // Update the image source
      this.loaded = true;
    }
  };

}
