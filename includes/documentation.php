<?php
/**
 * Theme Documentation
 *
 * @author Michael Rouse
 * The Documentation page contains information about the custom theme shortcodes and options
 */
?>
<?php

add_action( 'admin_menu', function(){
	add_menu_page( 'Theme Documentation', 'Theme Documentation', 'edit_posts', 'docs', 'sct_theme_docs_do_page' );
} );

/**
 * Creates the Page
 */
function sct_theme_docs_do_page () {
  ?>
    <style>.documentation h1 { font-size: 35px; }.documentation h2 {font-size: 30px; margin-top: 40px;} .documentation h3 { font-size: 25px;} .documentation, .documentation p { font-size: 16px; padding: 0; margin: 0; line-height: 1.5em;padding-right: 10px;} section{display: block;margin: 0 0 20px 20px;padding-top:20px;} article { display: block; margin: 40px 0 20px; border-top: 1px solid #ccc;} code {display: block;font-family: Consolas, monospace; background: #f0f0f0; border: 1px solid #ccc;border-radius: 5px; line-height: 1.5em;overflow-x: auto;font-size: 15px;padding: 10px;margin:20px 0;}tab{display:inline;}tab::before{content:' ';padding-left:15px;}.toc{display: block;box-sizing:border-box;}.toc ul {display:inline-block;list-style-type:none;background: #f0f0f0;border:1px solid #ccc;border-radius: 5px;padding:10px;}.toc li {display: block;margin:0;margin-bottom:10px;font-size:14px;} .toc li ul {display: block;margin-left:20px;padding:0;border:0px;}.toc a {text-decoration: none; font-size:16px;}.toc li ul li{margin-bottom: 0px;}.toc a:hover{text-decoration:underline}.toc a::before {content: ''; padding-left:5px;}.toc-title{text-align: center;font-weight:bold;font-size:16px!important;}</style>
    <div class="documentation">
      <h1 id="title">Theme Documentation</h1>
      <p>This page serves as documentation for the Missouri S&amp;T Solar Car Team custom theme. It will go over the custom options this theme offers, including the custom shortcode.</p>
      <p>The goal of this page is to make writing posts easier for future members.</p><br/>And ignore any spelling errors.<br/>

      <div class="toc">
        <ul>
          <li class="toc-title">Contents</li>
          <li>1 <a href="#options">Theme Options</a>
            <ul>
              <li>1.1 <a href="#site_logo">Site Logo</a></li>
              <li>1.2 <a href="#colors">Colors</a></li>
              <li>1.3 <a href="#menus">Menus</a></li>
              <li>1.4 <a href="#nav_bar_section">Navigation Bar</a></li>
              <li>1.5 <a href="#footer_section">Footer</a></li>
              <li>1.6 <a href="#static_page">Static Front Page</a></li>
              <li>1.7 <a href="#custom_css">Custom CSS/JS</a></li>
            </ul>
          </li>
          <li>2 <a href="#shortcodes">Shortcodes</a>
              <ul>
                <li>2.01 <a href="#heading">Headings</a></li>
                <li>2.02 <a href="#link">Links</a></li>
                <li>2.03 <a href="#telephone_email">Telephone and Email</a></li>
                <li>2.04 <a href="#image">Images</a></li>
                <li>2.05 <a href="#break">Line Breaks</a></li>
                <li>2.06 <a href="#code">Code Segments</a></li>
                <li>2.07 <a href="#iframe">IFrames</a></li>
                <li>2.08 <a href="#youtube">YouTube</a></li>
                <li>2.09 <a href="#separator">Section Separator</a></li>
                <li>2.10 <a href="#columns">Columns</a></li>
                <li>2.11 <a href="#timeline">Timeline</a></li>
                <li>2.12 <a href="#image_desc">Image and Description</a></li>
                <li>2.13 <a href="#image_hover_text">Image Hover Text</a></li>
								<li>2.14 <a href="#tab_shortcode">Tab</a></li>
								<li>2.15 <a href="#emojis">Emojis</a></li>
                <li>2.16 <a href="#class_attribute">CSS Classes Attribute</a></li>
				<li>2.17 <a href="#lazy_loading">Lazy Loading Images</a></li>
				<li>2.18 <a href="#image_gallery">Image Galleries</a></li>
              </ul>
          </li>
          <li>3 <a href="#page_posts">Page/Post Features</a>
            <ul>
              <li>3.1 <a href="#hero_images">Featured Images</a></li>
              <li>3.2 <a href="#page_templates">Page Templates</a></li>
              <li>3.3 <a href="#sub_pages">Subpages</a></li>
            </ul>
          </li>
          <li>4 <a href="#gen_stuff">Best Practices</a>
            <ul>
              <li>4.1 <a href="#image_compression">Image Compression</a></li>
              <li>4.2 <a href="#script_issues">Script Interference</a></li>
              <li>4.3 <a href="#font_use">Fonts</a></li>
							<li>4.4 <a href="#readmore">Read More Links</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- End Table of contents -->

      <!-- Theme Options -->
      <article id="options">
        <h2>Theme Options</h2>
        Like any other theme, this one allows you to customize the way it is displayed, this includes logos, and colors, as well as the navigation bar, and footer stuff.
        <br/><br/>
        To get to this customization screen, hover over the "Appearance" tab on the left, and then select "Customize."

        <!-- Site Logo -->
        <section id="site_logo">
          <h3>Site Logo</h3>
          The site logo is under the "Header Image" tab on the customization page, here you can upload a new image that will be the site's logo. This is what shows up on the navigation bar. This image should be around 500px wide, and high quality so it looks good when scaled.<br/><br/>
          Also, under "Site Identity" there is another image upload option, this option is for the sites favicon, which is the icon that appears in the tabbed window.
        </section> <!-- End Site Logo -->

        <!-- Colors -->
        <section id="colors">
          <h3>Colors</h3>
          Colors are very, very important to a website. Thankfully, this customization screen, under colors (obviously), allows you to change the colors that items appear in. <b>Ignore the Header Text Color</b> since it is not used in this theme. The rest are self explanatory.
        </section> <!-- End Colors -->

        <!-- Menus -->
        <section id="menus">
          <h3>Menus</h3>
          The "Menus" tab allows you to create a menu that acts as navigation, when the user hits the "Menu" button. <br/>This is important, because only <b>six</b> menu options will displayed, the first six. If you have more than six, or less than six. Then the full screen navigation menu will look dumb. <br/><br/>Please have six.
          <br/><br/>
          When you add a menu option, there is a field to specify CSS Classes, this is <b>required</b> in order to have a background image for that menu option.
          <br/>
          Please follow this naming scheme:
          <code>
            menu-option-[option_name]
          </code>
          Where [option_name] is the name of the menu option.
          <br/><br/>
          Now that you have a specific class, you need to tell the webpage what image to use. To do this, go to the "Custom CSS/JS" section on the customize page.
          <br/><br/>
          In the CSS box, type:
          <code>
            .menu-option-[option_name]<br/>
            {<br/>
              <tab></tab>background: url('URL TO BACKGROUND IMAGE');<br/>
            }
          </code>
          Replace 'URL TO BACKGROUND IMAGE' with the URL to the background image (obviously).<br/>
          And then you will have a menu option with a background image!
        </section> <!-- End Menus -->

        <!-- Navigation Bar -->
        <section id="nav_bar_section">
          <h3>Navigation Bar</h3>
          The Navigation Bar section is where you will tell the webpage what text to show on the Navigation bar, as well as what text the menu button should have.
          <br/>
          <br/>
          You should notice that there are two versions of the title, a long and a short, both with a top and bottom line. <br/>
          By default, the long title is displayed on two lines, when the user starts scrolling these two lines are combined for one line.<br/>On smaller screens, the short version of the title will be used for display, and scrolling instead of the long version.
        </section> <!-- End Nav Bar -->

        <!-- Footer -->
        <section id="footer_section">
          <h3>Footer</h3>
          The footer section is where you will specify any Social Media extensions that you have, including Facebook, Twitter, and Instagram. <br/><Br/>
          You can then select the box that says "Include Social Media Links" and then shortcuts to your Social Media profiles will be given in the footer.
        </section> <!-- End Footer -->

        <!-- Static Page -->
        <section id="static_page">
          <h3>Static Front Page</h3>
          This section is where you need to select to use a static page for the front page display. This allows you to specify what page should be used for the home page, and also a page that is used to display all of the blog posts.
        </section> <!-- End Static Page -->

        <!-- Custom CSS/JS -->
        <section id="custom_css">
          <h3>Custom CSS/JS</h3>
          The "Custom CSS/JS" section, is where you specify custom CSS and any custom JavaScript that you want to use on this webpage.
          <br/><br/>
          <b>Note:</b> on the JavaScript section, <strong>DO NOT</strong> include the &lt;script&gt; tags, this way you can use this section to include any outside JavaScript files that you want.
        </section> <!-- End Custom CSS/JS -->

      </article> <!-- End Theme Options -->

      <!-- Shortcodes Section -->
      <article id="shortcodes">
        <h2>Shortcodes</h2>
        <p>WordPress has a great feature called shortcodes, these allow you to create elements easily, and with little knowledge of HTML, they're a <b>shortcut</b>.</p>
        <p>This theme has its own custom shortcodes, in order to make maintenance on this site and adding future content a breeze. Some are extremely simple but others allow for more advanced features.</p>
        <br/>
        You can use shortcode when creating a new page, or a post.<br/><br/>
        Remember, you can use shortcode inside of other shortcode. You'll see what this means, for an example, look at the timeline shortcode.

        <!-- Heading Shortcodes -->
        <section id="heading">
          <h3>Headings</h3>
          <p>The heading shortcodes simply allow for the creating bolder and larger text, see <a href="http://www.w3schools.com/html/html_headings.asp" target="_blank">here for more info on headings</a>.</p>
          <p>This theme offers shortcode for three headings, H1, H2, and H3. Using these are pretty simple, just use the syntax below:</p>
          <code>
          [h1]This is a Heading 1[/h1]<br/>
          [h2]This is a Heading 2[/h2]<br/>
          [h3]This is a Heading 3[/h3]
          </code>
          <p>Nothing major about them, they were already easy to use in HTML, but just know you can use them.</p>
        </section> <!-- End Heading Shortcode -->

        <!-- Link Shortcode -->
        <section id="link">
          <h3>Links</h3>
          <p>Making links to content/other websites is super simple with the custom shortcode! Simply use the following syntax:</p>
          <code>
            [link to="http://example.com"]Link Text Here[/link]
          </code>
          Would create this:
          <code>
            <a href="http://example.com" target="_blank">Link Text Here</a>
          </code>
        </section> <!-- End Link Shortcode -->

        <!-- Telephone and Email -->
        <section id="telephone_email">
          <h3>Telephone and Email</h3>
          Linking to a telephone and email is also super easy, like creating a link. These links allow you to click on the email to send an email, and click on a phone number to call.
          <code>
            [telephone number="0123456789"]<br/>
            [email address="test@example.com"]
          </code>
          Which would create these links:
          <code>
            <a href="tel:0123456789">(012) 345 - 6789</a><br/>
            <a href="mailto:test@example.com">test@example.com</a>
          </code>
        </section> <!-- End Telephone and Email -->

        <!-- Images -->
        <section id="image">
          <h3>Images</h3>
          Embedding images is as simple as 1, 2, 3.
          <code>
            [image src="https://upload.wikimedia.org/wikipedia/en/a/a9/Example.jpg"]
          </code>
          Would embed this image:
          <code>
            <image src="https://upload.wikimedia.org/wikipedia/en/a/a9/Example.jpg"/>
          </code>
          See, WordPress Shortcodes are easy!

					<br/><br/>
					If you want to make an image zoomable, simply add:
					<code>
						classes="zoomIn"
					</code>
					to your existing image shortcode.
					<br/>
					Example:
					<code>
						[image src="https://upload.wikimedia.org/wikipedia/en/a/a9/Example.jpg" classes="zoomIn"]
					</code>
        </section> <!-- End Images -->

        <!-- Page Breaks -->
        <section id="break">
          <h3>Page Breaks</h3>
          Page breaks are a magical thing. How else are you going to separate text easily?
          <code>
            This text will be[break]on two lines instead of one.
          </code>
          Would result in:
          <code>
            This text will be<br/>on two lines instead of one.
          </code>
        </section> <!-- End Page Breaks -->

        <!-- Code -->
        <section id="code">
          <h3>Code</h3>
          Displaying code is also incredibly easy:
          <code>
            [code]<br/>
              function test()<br/>
              {<br/>
              &nbsp;&nbsp;&nbsp;&nbsp;return 'This is some code';<br/>
              }<br/>
            [/code]
          </code>
          Gives you:
          <code>
            function test()<br/>
            {<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;return 'This is some code';<br/>
            }
          </code>
          Yes, it will be in a box like that, the page you are looking at has used the code shortcode in almost every section to show you how to use the shortcode.
        </section> <!-- End code -->

        <!-- Iframes -->
        <section id="iframe">
          <h3>IFrame</h3>
          Sometimes you need to embed another webpage into your page or post, something like Google Maps. To do this, use the iframe.
          <code>
            [responsive_iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.587927389807!2d-90.18696089033591!3d38.62469516281342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c0f0607541e5b5%3A0x79ed2889c696a834!2sThe+Gateway+Arch!5e1!3m2!1sen!2sus!4v1459706059884"]
          </code>
          This will embed the following Google Maps:
          <br/><br/>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.587927389807!2d-90.18696089033591!3d38.62469516281342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c0f0607541e5b5%3A0x79ed2889c696a834!2sThe+Gateway+Arch!5e1!3m2!1sen!2sus!4v1459706059884" width="630" height="450" frameborder="0" allowfullscreen>Your browser cannot display this content</iframe>
        </section> <!-- End IFrame -->

        <!-- YouTube Videos -->
        <section id="youtube">
          <h3>YouTube</h3>
          YouTube is a great place to host videos, use one of the following easy-to-use shortcode to display those YouTube videos:
          <code>
            [youtube video="https://www.youtube.com/watch?v=iBaXLHWg_RM"]
          </code>
          This is the same as doing:
          <code>
            [youtube video="iBaXLHWg_RM"]
          </code>
          Gives you the following YouTube video:<br/><br/>
          <iframe src="https://youtube.com/embed/iBaXLHWg_RM" width="530" height="350" frameborder="0" allowfullscreen>Your browser cannot display this content.</iframe>
        </section> <!-- End YouTube -->

        <!-- Section Separator -->
        <section id="separator">
          <h3>Section Separator</h3>
          To easily separate sections use the following shortcode:
          <code>
            [section_separator]
          </code>
          Which just gives you a padded line across the page, to separate the content. :)
        </section> <!-- End Separator -->

        <!-- Columns -->
        <section id="columns">
          <h3>Columns</h3>
          Using the shortcode to yield columns allows you to have something that takes up a given amount of space on the page.
          <br/>
          This theme has custom shortcode for one third and one fourth sized columns.
          <code>
            [one_third]Content here[/one_third]<br/>
            [one_fourth]Content here[/one_third]<br />
						[split_left]Content Here[/split_left][split_right]Content Here[/split_right]
          </code>
          Whenever you use these, you will usually have three one_thirds, or four one_fourths, in a row because the columns are designed to be next to each other, to take up the whole screen.<br/><br/>
					Split left and Split right will unevenly divide the page based on the content in each one.
        </section> <!-- End Columns -->

        <!-- Timeline -->
        <section id="timeline">
          <h3>Timeline</h3>
          Okay, so now this is shortcode is a tad more advanced, and is actually two pieces of shortcode. <br/>
          Here is the basic use of a timeline:
          <code>
            [timeline]<br/>
            <tab></tab>[timeline_entry name="Newest Item Name/Title" year="2016" image="url" href="url"]<br/>
            <tab></tab><tab></tab>Description about this timeline entry<br/>
            <tab></tab>[/timeline_entry]<br/>
            <tab></tab>.<br/><tab></tab>.<br/><tab></tab>.<br/>
            <tab></tab>[timeline_entry name="Oldest Item Name/Title" year="2000" image="url" href="url"]<br/>
            <tab></tab><tab></tab>Description about this timeline entry<br/>
            <tab></tab>[/timeline_entry]<br/>
            [/timeline]
          </code>
          There is a great example on the cars page.<br/><br/>
          As said before, there are two parts to this shortcode. The first part is the timeline short code
          <code>
            [timeline]<br/>...<br/>[/timeline]
          </code>
          All this does is tell the webpage that there are about to be items that should belong on a timeline.
          <br/><br/>
          The second part is the timeline entry shortcode
          <code>
            [timeline_entry]<br/>...<br/>[/timeline_entry]
          </code>
          Now, this one has a couple of parameters. The first is the name, this is the name or title that the timeline entry should be given. <br/><br/>The second is the year, this should be obvious.<br/><br/>Third, is an image, if you give the URL for an image here, then the image will be shown on the timeline entry.<br/><br/>Lastly, you have href, this is the URL of a webpage that has more detailed information about this timeline entry.
        </section> <!-- End Timeline -->

        <!-- Image and Description -->
        <section id="image_desc">
          <h3>Image and Description</h3>
          This is a useful shortcode, it's for showing an image onto one side of the page, and the description/content that goes along with that image onto the other side of the page.
          <br/>
          This shortcode has three parts, similar to the timeline, the outer shortcode:
          <code>
            [image_and_desc]<br/>
            <tab></tab>...<br/>
            [/image_and_desc]
          </code>
          This shortcode has a parameter, title, which you can specify to give the entire section a heading.<br/><br/>

          The image shortcode:
          <code>
            [image_and_desc_image image="URL"]
          </code>
          And then the description shortcode:
          <code>
            [image_and_desc_desc]<br/>
            <tab></tab>Description here<br/>
            [/image_and_desc_desc]
          </code>
          <br/>
          These shortcodes by themselves are useless. You can combine them so that the image is on the right or the left.
          <br/>
          <h4>Image on the Right</h4>
          <code>
            [image_and_desc]<br/>
            <tab></tab>[image_and_desc_desc]<br/>
            <tab></tab><tab></tab>Description<br/>
            <tab></tab>[/image_and_desc_desc]<br/>
            <tab></tab>[image_and_desc_image image="URL"]<br/>
            [/image_and_desc]
          </code>
          To put the image on the right, the description needs to come before the image.
          <br/>
          <h4>Image on the Left</h4>
          <code>
            [image_and_desc]<br/>
            <tab></tab>[image_and_desc_image image="URL"]<br/>
            <tab></tab>[image_and_desc_desc]<br/>
            <tab></tab><tab></tab>Description<br/>
            <tab></tab>[/image_and_desc_desc]<br/>
            [/image_and_desc]
          </code>
          To put the image on the left, the image needs to come before the description.
        </section> <!-- End Image and Description -->

        <!-- Image Hover Text -->
        <section id="image_hover_text">
          <h3>Image Hover Text</h3>
          This shortcode allows you to show text over an image when the user hovers the mouse over it. Or on smaller screens it will just display the text right below the image, since users on phones cannot really hover.
          <code>
            [image_text_hover image="URL" title="Image Title" desc="Image Description"]
          </code>
          Remember, you should keep the description short and sweet on this, same with the title. It's meant to be a little blurb, not replace the image and description shortcode.
          <br/><br/>
          Here is an example of this effect:<br/>
          <iframe src="http://codepen.io/mwrouse/full/oxwqzo/" width="530" height="300">Your browser cannot display this content</iframe>
        </section> <!-- End Image Hover Text -->

				<!-- Tab -->
				<section id="tab_shortcode">
					<h2>Tab</h2>
					Using the following shortcode will result in placing four spaces to symbolize a tab or indent.
					<code>
						[tab]
					</code>
				</section>

				<!-- Emojis -->
				<section id="emojis">
					<h2>Emojis</h2>
					Using the following shortcodes to produce their corresponding emojis:
					<code>
						[smile]    ->  <?php sc('[smile]'); ?><br/>
						[bigsmile] -> <?php sc('[bigsmile]') ?><br/>
						[smilewithhorns] -> <?php sc('[smilewithhorns]') ?><br/>
						[frown] -> <?php sc('[frown]') ?><br/>
						[crying] -> <?php sc('[crying]') ?><br/>
						[loudcry] -> <?php sc('[loudcry]') ?><br/>
						[laugh] -> <?php sc('[laugh]') ?><br/>
						[grin] -> <?php sc('[grin]') ?><br/>
						[wink] -> <?php sc('[wink]') ?><br/>
						[tongueout] -> <?php sc('[tongueout]') ?><br/>
						[tongueout-wink] -> <?php sc('[tongueout-wink]') ?><br/>
						[kiss] -> <?php sc('[kiss]') ?><br/>
						[hearteyes] -> <?php sc('[hearteyes]') ?><br/>
						[angry] -> <?php sc('[angry]') ?><br/>
						[scream] -> <?php sc('[scream]') ?><br/>
						[shocked] -> <?php sc('[shocked]') ?><br/>
						[unamused] -> <?php sc('[unamused]') ?><br/>
						[confused] -> <?php sc('[confused]') ?><br/>
						[noexpression] -> <?php sc('[noexpression]') ?><br/>
						[relieved] -> <?php sc('[relieved]') ?><br/>
						[sunglasses] -> <?php sc('[sunglasses]') ?><br/>
						[worried] -> <?php sc('[worried]') ?><br/>
						[fearful] -> <?php sc('[fearful]') ?><br/>
						[triumph] -> <?php sc('[triumph]') ?><br/>
						[sleeping] -> <?php sc('[sleeping]') ?><br/>
						[dizzy] -> <?php sc('[dizzy]') ?><br/>
						[nomouth] -> <?php sc('[nomouth]'); ?><br/>
						[medicalmask] -> <?php sc('[medicalmask]') ?><br/>
						[angel] -> <?php sc('[angel]') ?><br/>
						[delicious] -> <?php sc('[delicious]') ?><br/>
						<br/>
						[sun] -> <?php sc('[sun]') ?><br/>
						[car] -> <?php sc('[car]') ?><br/>
						[checkeredflag] -> <?php sc('[checkeredflag]') ?><br/>
					</code>
				</section> <!-- End Emojis -->

        <!-- Shortcode Attributes -->
        <section id="class_attribute">
          <h2>CSS Classes Attribute</h2>
          Shortcodes can have attributes, as you've probably learned if you have been reading.
          <br/>
          All of the shortcodes we've talked about (except timeline_entry and section_separator) support the classes attribute. <br/>
          <code>
            [shortcode classes="your-css-classes"]
          </code>
          This attribute allows you to specify additional css classes (separate them by a space if you have multiple) for an element. This is useful if you want to slightly change the look of an element. Custom CSS can be defined on the <b>Custom CSS/JS</b> page under the appearance menu.
        </section> <!-- End Shortcode Attributes -->

				<!-- Lazy Loading Images -->
				<section id="lazy_loading">
					<h2>Lazy Loading Images</h2>
					Lazy loading images is useful if you have a page that contains lots of images. <br/>
					<br/>
					By definition, lazy loading something means waiting until the last possible moment to load that object.<br/>
					In this case, images. The technique used is to wait until the image is visible on the screen (in the viewport) and then load it. This reduces the initial page loading time.
					<code>
						[lasy_image loader="URL of image to show while loading" img="URL of image to lazy load"]
					</code>
					By default, images that get lazy loaded are zoomable.
				</section> <!-- End Lazy Loading Images -->

				<!-- Image Galleries -->
				<section id="image_gallery">
					<h2>Image Galleries</h2>
					Image galleries are useful for showing lots of pictures on a single page. By default, all images in a gallery are lazy loaded and zoomable.
					<code>
						[image_gallery loader="URL of image to show while loading images"]<br/>
						<tab></tab>[gallery_image img="URL of image in gallery" desc="Image description"]<br/>
						<tab></tab>.<br/>
						<tab></tab>.<br/>
						<tab></tab>.<br/>
						<tab></tab>[gallery_image img="URL of image in gallery" desc="Image description"]<br/>
						[/image_gallery]
					</code>
				</section> <!-- End Image Galleries -->

      </article> <!-- End Shortcodes -->

      <!-- Hero Images -->
      <article id="page_post">
        <h2>Page/Post Features</h2>
        WordPress has built in features for pages and posts, these features make the viewers experience better, and can   allows pages to be different from other pages.

        <!-- Hero Images -->
        <section id="hero_images">
          <h3>Featured Images</h3>
          Featured images are the large images that are displayed before the content on pages or posts. Specifying a featured image is extremely simple, on the screen to edit the page/post, there should be a box that looks like this:
          <br/>
          <img src="data:image/png;base64,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"><br/>
          This box lets you set the Featured Image, simply click "Set featured image" then choose an existing image, or use the "Upload Files" tab in the top right corner to upload an image. <br/><br/>
          Featured images should be high resolution pictures that are compressed for web use.
          <br/>
          <h4>If you do not see the "Featured Image" box</h4>
          Follow these steps:
            <br/>
            <tab></tab>1. At the top of the screen, click on the "Screen Options" tab<br/>
              <tab></tab>2. Select the box that says "Featured Image"<br/>
          You should now see the box.
        </section> <!-- End Hero Images -->

        <!-- Templates -->
        <section id="page_templates">
          <h3>Page Templates</h3>
          Aside from the default page template, there is a second one that places Social Media Share buttons at the bottom of the page, (Facebook, Twitter, and Goolge+). <br/>This template, called "Social Media Sharing Enabled" is useful for pages that are specific, such as detailed pages on timeline elements. <br/><br/>By default, all blog posts have the sharing links at the bottom.
          <br/><br/>
          To select this template for use on a page. On the screen to edit the page, you should see this box:
          <br/>
          <img src="data:image/png;base64,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">
          <br/>All you do is select the dropdown menu for "Template" and select "Social Media Sharing Enabled".<br/>
          <br/>
          <h4>If you do not see the "Page Attributes" box</h4>
          Follow these steps:
            <br/>
              <tab></tab>1. At the top of the screen, click on the "Screen Options" tab<br/>
              <tab></tab>2. Select the box that says "Page Attributes"<br/>
          You should now see the box.
        </section> <!-- End Templates -->

        <!-- Subpages -->
        <section id="sub_pages">
          <h3>Subpages</h3>
          If you want to make a page the subpage of another page, then use the "Parent" drop down box in the "Page Attributes" box (shown above).<br/><br/> You should only give pages a parent if it makes logical sense to. For example, if you have a detailed page about a timeline element, then the parent of that page should be the page that contains the timeline.<br/><br/>
          If you do not to this, then the URL of pages will be messed up. <br/>Here is an example the URL for two pages, one being a subpage of the other.
          <code>
            http://example.com/parent<br/>
            http://example.com/parent/subpage
          </code>
          Now, here is an example using the same pages, except one is not specified as a parent:
          <code>
            http://example.com/parent<br/>
            http://example.com/subpage
          </code>
          Hopefully this shows how important setting parent pages when needed is.
        </section> <!-- End Sub Pages -->

      </article> <!-- End Page/Post Features -->

      <!-- Website Practices -->
      <article id="gen_stuff">
        <h2>Best Practices</h2>
        This section is intended to help future members in knowing some best practices for maintaining and updating a website.

        <!-- Image Compression -->
        <section id="image_compression">
          <h3>Image Compression</h3>
          In the age of modern technology, it's not uncommon for cameras on cellphones to take pictures that can be upwards of 5MBs in size, high end cameras take pictures that can be double, or triple that file size. No matter what you do, <b>DO NOT USE THESE FILE SIZES ON WEBPAGES</b>
          <br/><br/>
          Seriously, <B>DON'T DO IT.</b>
            <br/><br/>
          You will break the entire experience for the users. Images that size take a few seconds to download, even on high speed connections. A website that loads images of that size might not even load on slower connections.
          <br/><br/>
          <h4>Solution</h4>
          To solve this problem, you can either use a WordPress plugin that compresses images for you, or use a website that does this, such as <a href="https://tinypng.com/" target="_blank">TinyPNG</a>.
          <br/><br/>Also, stick with only using .png and .jpg files on a webpage, no GIFs or Bitmaps.
        </section> <!-- End Image Compression -->

        <!-- Script Interference -->
        <section id="script_issues">
          <h3>Script Interference</h3>
          Under no circumstances should you ever use/implement a script that interferes with the user experience.<br/><br/>
          These include, but are not limited to:<br/>
          <tab></tab>- Scroll Jacking (Parallax Scrolling, slowing down scrolling, speeding up scrolling, etc...)<br/>
          <tab></tab>- Keeping the user on a page<br/>
          <tab></tab>- Scripts that impliment popups (Ads, newsletter subscriptions, etc...)<br/>
          <tab></tab><tab></tab>- Popups that happen because the user clicked on something (Social Media Sharing) are an exception<br/>
        </section> <!-- End Script Interference -->

        <!-- Fonts -->
        <section id="font_use">
          <h3>Fonts</h3>
          Fonts can make or break the user experience, the font used on this theme is <a href="https://www.fontsquirrel.com/fonts/source-sans-pro" target="_blank">Source Sans Pro</a> (this documentation page uses WordPress's font) by Adobe. <br/><br/>
          If you are going to specify another font for an element, please use a <a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Font</a> so that all users, no matter what device, will see the same font.<br/><br/>Do not use more than 3 fonts on a page.
        </section> <!-- End Fonts -->

				<!-- Read More -->
				<section id="readmore">
					<h3>Read More Links</h3>
					It is considered a good idea to put a read more link on posts that are rather long. This way, on the page that displays all the blog posts, you only see a snipped of the post and not the entire thing.<br/>
					To do this, simply add the following into your post where you want the link to appear:
					<code>
						&lt;!--more--&gt;
					</code>
					This is best when placed about 300 characters into a post, and before any images or attachments.
				</section> <!-- End Read More -->
      </article> <!-- End Website Practices -->

    </div>
  <?php
}



function sct_theme_docs_validate ( $input )
{
  return $input;
}
