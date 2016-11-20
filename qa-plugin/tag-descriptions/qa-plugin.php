<?php

/*
	Plugin Name: Tag Descriptions Tutorial
	Plugin URI: http://www.question2answer.org/plugins-tutorial.php
	Plugin Description: Allows tag descriptions to be displayed as tooltips
	Plugin Version: 1.0
	Plugin Date: 2012-11-06
	Plugin Author: Question2Answer
	Plugin Author URI: http://www.question2answer.org/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: 
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

qa_register_plugin_module(
	'widget', // type of module
	'qa-tag-desc-widget.php', // PHP file containing module class
	'qa_tag_descriptions_widget', // module class name in that PHP file
	'Tag Descriptions' // human-readable name of module
);

qa_register_plugin_module(
	'page', // type of module
	'qa-tag-desc-edit.php', // PHP file containing module class
	'qa_tag_descriptions_edit_page', // name of module class
	'Tag Description Edit Page' // human-readable name of module
);

qa_register_plugin_overrides('qa-tag-desc-overrides.php');

qa_register_plugin_layer(
	'qa-tag-desc-layer.php', // PHP file containing layer
	'Tag Description Layer' // human-readable name of layer
);

qa_register_plugin_phrases(
	'qa-tag-desc-lang-*.php', // pattern for language files
	'plugin_tag_desc' // prefix to retrieve phrases
);