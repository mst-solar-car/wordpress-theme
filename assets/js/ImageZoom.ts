/**
 * This file contains the class for that allows images to be zoomable
 */
export class ImageZoom {

  private zoomClass: string;
  private visibleClass: string;
  private overlayElement: HTMLElement;

  private zoomableImages: HTMLImageElement[]; // Array of images that are zoomable


  /**
   * Class constructor
   */
  constructor (zoom_class: string, overlay_element: HTMLElement, overlay_visible_class: string) {
    this.zoomClass = (zoom_class != undefined) ? zoom_class : 'zoomIn';
    this.visibleClass = (overlay_visible_class != undefined) ? overlay_visible_class : 'visible';

    this.overlayElement = overlay_element;

    this.zoomableImages = [];

     // Hide the overlay when overlay is clicked
    this.overlayElement.addEventListener('click', () => {
      this.hideOverlay();
    });

    // Hide overlay if window is going to unload
    window.addEventListener('beforeunload', () => {
      this.hideOverlay();
    });

    this.DiscoverImages(); // Discover images on initialization
  }


  /**
   * This discovers images and registers a click handler
   */
  public DiscoverImages (zoom_class?: string): void  {
    if (zoom_class == undefined) zoom_class = this.zoomClass;

    let images: NodeListOf<Element> = document.querySelectorAll('.' + zoom_class);

    for (let i = 0; i < images.length; i++)
    {
      // Continue through for-loop if it is not an image
      if (images[i].tagName.toLowerCase() != 'img') continue;

      // Continue through for-loop if image has already been registered
      if (this.zoomableImages.indexOf(images[i] as HTMLImageElement) != -1) continue;

      // Initialize the clickable image
      images[i].addEventListener('click', (e: Event) => {
        this.clickEvent(e);
      }); // Registers the click event
      this.zoomableImages.push(images[i] as HTMLImageElement); // Push to the array
    }

  }



  /**
   * Click handler
   */
  private clickEvent(e: Event): void {
    let src: string = (e.target as HTMLElement).getAttribute('src'); // Get the image source

    this.overlayElement.classList.add(this.visibleClass);
    this.overlayElement.innerHTML = '<img src="' + src + '">';
  }

  /**
   * Hide the overlay element
   */
  private hideOverlay(): void {
    this.overlayElement.classList.remove(this.visibleClass);
    this.overlayElement.innerHTML = '';
  }

}
