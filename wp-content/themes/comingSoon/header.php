<?php
	/**
		* The template for displaying the header
		*
		* Displays all of the head element and everything up until the "site-content" div.
		*
		* @package WordPress
		* @subpackage Coming Soon
		* @since Coming Soon 1.0
	*/
?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?> class="no-js">
	<head>
		<title>Coming Soon</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/screen.css" />
	    <?php wp_head(); ?>
	</head>
	<body>