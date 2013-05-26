<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: config.php
// Desc: Users config file for Konrad framwork site

/**
	* Display errors. If not on, turn it on. Default is off locally.
*/
if (!ini_get('display_errors')) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}
else {
		error_reporting(-1);
}

/**
	* Set debug info on off
*/
$ko->config['debug']['display-konrad'] = false;

/**
	* Set debug for database
*/
$ko->config['debug']['db-num-queries'] = false;
$ko->config['debug']['db-queries'] = false;
$ko->config['debug']['session']=false;
$ko->config['debug']['timer']=false;
$ko->config['debug']['konrad'] = false;

/**
	* Define SESSION name
*/
$ko->config['session_name'] = preg_replace("/[:\.\/-_]/", '', $_SERVER['SERVER_NAME']); // don't forget to escape assumed delimeters / or use alternate #
$ko->config['session_key']="konrad";

/**
	* Define server timezone
*/
$ko->config['timezone']="Europe/Stockholm";

/**
	* Define internal character encoding
*/
$ko->config['language'] = 'sv';
$ko->config['character_encoding']='UTF-8';


/**
	* define and enable/disable the controllers and their respective classname.
	* Array-key is matched against the URL, like so: the url 'developer/dump' would instantiate the controller with the key 'developer'…CCDeveloper and call method 'dump' in that class. This processessing is done in $ko->FrontControllerRoute();--which is called from within index.php
*/


/**
	* CCX==Class Controller X
	* Change "mypage" to change url name to personal site
*/
$ko->config['controllers'] = array(
"index"=>array("enabled"=>true, "class"=>"CCIndex"),
"user"=>array("enabled"=>true, "class"=>"CCUser"),
"admin"=>array("enabled"=>true, "class"=>"CCAdminControlPanel"),
"blog"=>array("enabled"=>true, "class"=>"CCBlog"),
"theme"=>array("enabled"=>true, "class"=>"CCTheme"),
"testpage"=>array("enabled"=>true, "class"=>"CCPersonalController"),
"doepage"=>array("enabled"=>true, "class"=>"CCDoeController"));

/**
	* Default settings for theme
*/

$footer="<p>Footer: &copy; Konrad by Fredrik &aring;hman based on &copy; Lydia by Mikael Roos (mos@dbwebb.se) for course @ BTH.</p>";

// the name of the theme in the theme directory!'path' =>'site/themes/mytheme'. change stylesheet to style.php and change path to themes/grid to run style.php at first install, and my-navbar to navbar or vice versa.
// Regions array is an array of valid regions.
$ko->config['theme'] = array(
	'path' =>'themes/grid',
	'parent'=>'themes/grid',
	'stylesheet'=>'style.php',
	'template_file'=>'index.tpl.php',
	'regions'=>array(
		'navbar',
		'flash',
		'featured-first',
		'featured-middle',
		'featured-last',
		'primary',
		'sidebar',
		'triptych-first',
		'triptych-middle',
		'triptych-last',
		'footer-column-one',
		'footer-column-two',
		'footer-column-three',
		'footer-column-four',
		'footer'),
	'menu_to_region' => array('navbar'=>'navbar'),
		'data'=>array(
		'header'=>"Konrad's grid!",
		'slogan'=>"A smoking dragon, was a fire breathing dragon.",
		'favicon'=>'favicon.ico',
		'logo'=>'Konrad_logo.png',
		'logo_width'=>80,
		'logo_height'=>72,
		'footer'=>$footer));

/**
 * Default menu array
 */
$ko->config['menus']=array(
	'navbar'=>array(
	'home'=>array('url'=>'home', 'label'=>'Home'),
	'admin'=>array('url'=>'admin', 'label'=>'Admin'),
	'blog'=>array('url'=>'blog', 'label'=>'Blog')));
 
/**
 * Routing table for user created urls.
 * Route the user urls to controller/method/arguments
 */
$ko->config['routing']=array('home'=>array('enabled'=>true, 'url'=>'index/index'));

/**
	* Set base url incase one wants to use the default calculated.
*/
$ko->config['base_url'] = null;

/**
	* What Urls to be used?
	* defualt = 0	 => index.php/controller/method/arg1/arg2/...
	* clean = 1 => controller/method/arg1/arg2/...
	* querystring = 2 => index.php?q=controller/method/arg1/arg2/...
*/
$ko->config['url_type'] = 1;

/**
	* Data Source Name, DNS
	* Set database
*/
$ko->config['database'][0]['dsn'] = "sqlite:" . KONRAD_SITE_PATH . "/data/ckonrad.sqlite";

/**
	* What hashing method to use
*/
$ko->config['hashing_algorithm'] = "sha1salt";

/**
	* Enable, disable new user account
*/
$ko->config['create_new_users']=true;

?>