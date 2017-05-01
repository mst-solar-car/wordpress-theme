
export class MinimizeOnScroll {

  private scroll_limit: number = 5;
  private minimized_class: string = 'minimized';
  private maximized_class: string = 'maximized';

  private parent: HTMLElement;

  private scrollEvent: any;

  private previous_scroll: number = 0;

  private triggered: boolean = false;

  // Minimize on scroll constructor
  constructor(el: HTMLElement, limit?: number, minimizedClass?: string, maximizedClass?: string)
  {
    if (limit) this.scroll_limit = limit;
    if (minimizedClass) this.minimized_class = minimizedClass;
    if (maximizedClass) this.maximized_class = maximizedClass;

    this.parent = el;

    this.checkScroll();    // Minimizes navbar if scrolled down on page load

    this.scrollEvent = null;

    // Listen for scrolling
    document.addEventListener('scroll', () => {
      // Clear the old timeout event
      if (this.scrollEvent != null)
        clearTimeout(this.scrollEvent);

      // Set a new timeout event
      this.scrollEvent = setTimeout(() => {
        this.checkScroll();
      }, 50);
    });  // Minimizes/maximizes navbar on scroll
  }


  /**
   * This function will minimized the parent element
   */
  public minimize = (): void => {
    if (this.parent.classList.contains(this.maximized_class) || !this.parent.classList.contains(this.minimized_class)) {
      this.parent.classList.add(this.minimized_class);
      this.parent.classList.remove(this.maximized_class);
      document.getElementById('content-wrapper').style['margin-top'] = "80px";
    }
  };


  /**
   * This function will maximize the parent element
   */
  public maximize = (): void => {
    if (this.parent.classList.contains(this.minimized_class) || !this.parent.classList.contains(this.maximized_class)) {
        if (this.triggered)
            this.parent.classList.add(this.maximized_class);
        else
            this.parent.classList.remove(this.maximized_class);

        this.parent.classList.remove(this.minimized_class);
    }
  };


  /**
   * This will minimize or maximize based on the scroll position
   */
  public checkScroll = (): void => {
    if ((window.pageYOffset > this.scroll_limit) || document.getElementById("nav-menu").classList.contains('visible')) {
      // Minimize
      this.minimize();

      if (!this.triggered && (window.pageYOffset > this.scroll_limit))
        this.triggered = true;

      if (window.pageYOffset < this.previous_scroll)
          this.maximize();


    } else {
      // Maximize
      if (this.triggered && window.pageYOffset <= (this.scroll_limit / 2))
      {
          this.triggered = false;

          document.getElementById('content-wrapper').style['margin-top'] = "0px";
          this.parent.classList.remove(this.minimized_class);
          this.parent.classList.remove(this.maximized_class);
      }
    }

    this.previous_scroll = window.pageYOffset;
  };

  // Alias for checkScroll
  public check = (): void => {
    this.checkScroll();
  };

} // End minimizeOnScroll
