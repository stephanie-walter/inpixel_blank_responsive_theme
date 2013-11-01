Inpixelitrust Responsive blank theme for WordPress V2
==============================

Demo link : <a href="http://www.inpixelitrust.fr/blank-responsive"> demo </a>
==============================

*Description:*
Inpixelitrust blank theme for starting a WordPress project based on <a href="http://randyjensenonline.com/thoughts/handcrafted-wp-starter-theme/">Randy Jensen & Randy Hoyt HTML5 starter theme </a> with other goodies added plus chunks of Paul Irish's <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a> and pieces of <a href="http://knacss.com/">Raphael Goetter's knacss in it</a>
<a href="http://www.inpixelitrust.fr/blog/en/inpixelitrust-responsive-blank-theme-wordpress/">More details about the theme can be found here</a>

*Specificities of the theme*

* HTML5
* Uses Paul Irish's conditionnal tags for IE
* Uses <a href="http://knacss.com/">Raphael Goetter's knacss  V2.9</a> for the basic layout
* Default full screen, one left sidebar template and a right sidebar template for pages
* Responsive two levels menu using media queries and jQuery (based on <a href="http://codepen.io/bradfrost/full/qwJvF">multi toggle navigation</a>)
* Keyboard accessibile menu (both normal and responsive version)
* Embeds the <a href="https://github.com/inpixelitrust/WP-cleanup-enhanced">Wp-cleanup-enhanced code </a> (you can't use both plugin version and in template, so if you use the plugin please comment the line that calls the functions/wordpress_cleanup.php in functions.php)
* Embeds <a href="http://wpengineer.com/2230/removing-comments-absolutely-wordpress/">the Remove comments absolute plugin</a> (you can comment the line that calls unctions/remove-comments-absolute.php in functions.php to disable it)
* Embeds ready to use script clean up functions functions/script_style_cleanups.php
* Embeds a starting template for a custom option page functions/theme-options.php
* Embeds a starting template for custom post types functions/custom_post_types.php
* Embeds a version of modernizr, you can change the script in js/modernizr.custom.js
* Embeds functions, CSS, and images for the customisation of the admin area (css/custom_admin.css) and the login page (css/custom_login.css)
* Enables now updates from WordPress directly, you'll have to <a href="http://wordpress.org/extend/plugins/theme-updater/">install Theme Updater</a>. For more information <a href="http://www.disruptiveconversations.com/2012/02/how-to-auto-update-wordpress-custom-themes-using-github.html">see tutorial hier </a>
* Under <a href="http://wordpress.org/about/gpl/">GPL V2 Licence</a>

*Big Thanks to <a href="http://jmperso.eu/howdy">JM for the French translations !</a>*
*Big Thanks to for many little updates <a href="http://www.creativejuiz.fr/blog/">Geoffrey C.</a>*

----------------------------------------------------


*Changelog*
*v2 :* 
* KNACSS framework updated to 2.6

*v1.5 :* 
* KNACSS framework was included into an external file for easier maintenance (read important note in CSS)
* KNACSS available in LESS and Sass flavor
* Responsive menu was rebuild and is now fully keyboard accessible


*v1.4 :* 
* Add a "Continue Reading" like to the excerpt
* Change the entry-meta, now they are split and can be used one by one
* Corrected some FR translations


*v1.2 :* 
* Removed the full-page-template : now all pages are full page by default
* Added right-sidebar-page : if you need a right sidebar
* Made it work with single.php 
