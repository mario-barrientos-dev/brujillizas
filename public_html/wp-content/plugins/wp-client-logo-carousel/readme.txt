=== Client Logo Carousel ===
Tags: Client slider, clients slider, clients carousel, testimonial slider,clients-carousel,clients-plugin,carousel-plugin,owl carousel, carousel, logo, logo slider, logo carousel, carousel slider, partners slider, partners carousel, sponsors slider, sponsors carousel, affiliates slider, affiliates carousel, lazy load, carousel lazy load, lazy load carousel.
Contributors: amu02aftab
Author: amu02aftab
Tested up to: 5.6
License: GPLv2
Requires at least: 3.5.0
Stable tag: 3.0

== Description ==
* Display client logos responsive carousel with the help of a shortcode in editor as well as template page. 
Having different carousel settings.
* It allows you to display logos of clients, partners, sponsors, affiliates etc in carousel slider. 

<strong>Default Carousel</strong>

* It contains all logos added in backend. For default carousel, we can call shortcode to our wordpress editor directly, by using 
<pre>
[wpaft_logo_slider]
</pre>

* And we can call shortcode to our php template file using 
<pre>
echo do_shortcode('[wpaft_logo_slider]'); 
</pre>

<strong>Carousel By category</strong>

* To show logos from a particular category. We can call shortcode to our wordpress editor directly, by using 
<pre>
[wpaft_logo_slider category="SLUG OF CAROUSEL CATEGORY"]
</pre>
* And we can call shortcode to our php template file using 
<pre>
echo do_shortcode('[wpaft_logo_slider category="SLUG OF CAROUSEL CATEGORY"]'); 
</pre>
<strong>NOTE:</strong> Be sure the 'SLUG OF CAROUSEL CATEGORY' is the slug of category.

<strong>Plugin Features</strong>

* Simple and light weight
* Fully responsive
* Multiple carousels  
* Support all modern browsers
* Having different settings in admin
* Ability to add client links to each logo
* Different settings to order(arrange) slide images
* Auto slide option
* Navigation arrows.
* Settings panel
* Control number of logos to be displayed


== Screenshots ==

1. Back end client logo carousel settings(go to wp-admin->WP Client Logo->Logo Carousel Settings).
2. Back end Carousel Category (go to wp-admin->WP Client Logo->Carousel Category).
3. Back end add	client logo(go to wp-admin->WP Client Logo->Add New Client Logo.)
4. Back end client logo listing page(go to wp-admin->WP Client Logo->WP Client Logo.)
5. Front end look of client logo.


== Frequently Asked Questions ==
1. No technical skills needed.

== Changelog ==

= 3.0.0 =
* Multiple carousel feature
* Slides by category
* Carousel categories
* Fixes some alignment issues

= 2.0.0 =
* Random Order (setting)
* Different settings to order(arrange) slide images.
* when you don't put in a URL for the logo, disable link on slide images.
* Fixes some alignment issues

= 1.0.1 =
* Bug fixes
* Update readme.txt

= 1.0.0 =
* Initial release

== Upgrade Notice == 
This is first version no known notices yet

== Installation ==
- Upload the folder "wp-client-logo-carousel" to "/wp-content/plugins/" '
- Activate the plugin through the "Plugins" menu in WordPress .
- Update settings for carousel going to wp-admin->WP Client Logo->Logo Carousel Settings
- Add	client logo going to wp-admin->WP Client Logo->Add New Client Logo.
- <strong>Default Carousel:</strong> It contains all logos added in backend. For default carousel, we can call shortcode to our wordpress editor directly, by using 

<pre>
[wpaft_logo_slider]
</pre>

* And we can call shortcode to our php template file using 
<pre>
 echo do_shortcode('[wpaft_logo_slider]'); 
</pre>

- <strong>Carousel By category:</strong> To show logos from a particular category. We can call shortcode to our wordpress editor directly, by using 
<pre>
[wpaft_logo_slider category="SLUG OF CAROUSEL CATEGORY"]
</pre>
* And we can call shortcode to our php template file using 
<pre>
  echo do_shortcode('[wpaft_logo_slider category="SLUG OF CAROUSEL CATEGORY"]'); 
</pre>
<strong>NOTE:</strong> Be sure the 'SLUG OF CAROUSEL CATEGORY' is the slug of category. 
