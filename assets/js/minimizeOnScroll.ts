
export class MinimizeOnScroll {

  private scroll_limit: number = 5;
  private minimized_class: string = 'minimized';
  private maximized_class: string = 'maximized';

  private parent: HTMLElement;


  // Minimize on scroll constructor
  constructor(el: HTMLElement, limit?: number, minimizedClass?: string, maximizedClass?: string)
  {
    if (limit) this.scroll_limit = limit;
    if (minimizedClass) this.minimized_class = minimizedClass;
    if (maximizedClass) this.maximized_class = maximizedClass;

    this.parent = el;

    this.checkScroll();    // Minimizes navbar if scrolled down on page load

    document.addEventListener('scroll', () => {
      this.checkScroll();
    });  // Minimizes/maximizes navbar on scroll
  }


  /**
   * This function will minimized the parent element
   */
  public minimize = (): void => {
    this.parent.classList.add(this.minimized_class);
    this.parent.classList.remove(this.maximized_class);
  };


  /**
   * This function will maximize the parent element
   */
  public maximize = (): void => {
    this.parent.classList.add(this.maximized_class);
    this.parent.classList.remove(this.minimized_class);
  };


  /**
   * This will minimize or maximize based on the scroll position
   */
  public checkScroll = (): void => {
    if ((window.pageYOffset > this.scroll_limit) || this.parent.classList.contains('visible'))
    {
      // Minimize
      this.minimize();
    }
    else
    {
      // Maximize
      this.maximize();
    }
  };

  // Alias for checkScroll
  public check = (): void => {
    this.checkScroll();
  };

} // End minimizeOnScroll
